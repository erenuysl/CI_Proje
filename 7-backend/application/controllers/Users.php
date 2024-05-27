<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        if(empty($this->session->id)){
			redirect(base_url("main"));
		}


        $this->viewFolder = "Users_v";
        $this->load->model("Users_Model");
        $this->load->library("upload");
        $this->load->library('session');
    }

    public function index()
    {
        $items = $this->Users_Model->getAll();
        $viewData = new stdClass();
        $viewData->items = $items;
        $viewData->subViewFolder = "list";
        $viewData->viewFolder = $this->viewFolder;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form()
    {
        $viewData = new stdClass();
        $viewData->subViewFolder = "add";
        $viewData->viewFolder = $this->viewFolder;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save()
    {
        /* Sınıfın Yüklenmesi */
        $this->load->library("form_validation");

        /* Kuralların Yazılması */
        $this->form_validation->set_rules("email", "Kullanıcı adı", "required|trim|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("name", "İsim", "required|trim");
        $this->form_validation->set_rules("surname", "Soyisim", "required|trim");
        $this->form_validation->set_rules("password", "Şifre", "required|trim");
        $this->form_validation->set_rules("re-password", "Şifre Tekrarı", "required|trim|matches[password]");

        /* Mesajların Oluşturulması */
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır.",
                "valid_email" => "<b>{field}</b> geçerli bir e-posta değildir.",
                "is_unique" => "<b>{field}</b> daha önceden sistemde kayıtlıdır.",
                "matches" => "Şifreler birbiriyle uyuşmuyor."
            )
        );

        /* Çalıştırılması */
        $validate = $this->form_validation->run();

        if ($validate) {
            //echo "Validasyon başarılı, kayıt devam eder.";

            $data = array(
                "email" => $this->input->post("email"),
                "name" => $this->input->post("name"),
                "surname" => $this->input->post("surname"),
                "password" => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
                "is_active" => 1
            );

            $insert = $this->Users_Model->add($data);

            if ($insert) {
                redirect(base_url("Users"));
            } else {
                echo "Kayıt Ekleme Sırasında Bir Hata Oluştu.";
            }
        } else {
            //echo "Validasyon başarısız, kayıt ekleme işlemine geri döner.";
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->formError = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_form($id)
    {
        $item = $this->Users_Model->get(
            array(
                "id" => $id
            )
        );

        $viewData = new stdClass();
        $viewData->item = $item;
        $viewData->subViewFolder = "update";
        $viewData->viewFolder = $this->viewFolder;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {
        /* Sınıfın Yüklenmesi */
        $this->load->library("form_validation");
    
        /* Kuralların Yazılması */
        $this->form_validation->set_rules("name", "İsim", "required|trim");
        $this->form_validation->set_rules("surname", "Soyisim", "required|trim");
        
        // E-posta adresi sadece güncellenmişse kontrol yap
        $userData = $this->Users_Model->get(array("id" => $id));
        if ($this->input->post("email") !== $userData->email) {
            $this->form_validation->set_rules("email", "E-posta adresi", "required|trim|valid_email|callback_check_unique_email[$id]");
        } else {
            $this->form_validation->set_rules("email", "E-posta adresi", "trim|valid_email");
        }
    
        /* Mesajların Oluşturulması */
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır.",
                "valid_email" => "<b>{field}</b> geçerli bir e-posta değildir.",
                "check_unique_email" => "Bu email adresi başka bir kullanıcı tarafından kullanılıyor",
                "matches" => "Şifreler birbiriyle uyuşmuyor."
            )
        );
    
        /* Çalıştırılması */
        $validate = $this->form_validation->run();
    
        if ($validate) {
            $data = array(
                "name" => $this->input->post("name"),
                "surname" => $this->input->post("surname"),
                "is_active" => 1
            );
    
            // E-posta adresi güncellenmişse veritabanını güncelle
            if ($this->input->post("email") !== $userData->email) {
                $data["email"] = $this->input->post("email");
            }
    
            $update = $this->Users_Model->update(
                array(
                    "id" => $id
                ),
                $data
            );
    
            if ($update) {
                redirect(base_url("Users"));
            } else {
                echo "Başarısız...";
            }
        } else {
            $item = $this->Users_Model->get(
                array(
                    "id" => $id
                )
            );
    
            $viewData = new stdClass();
            $viewData->item = $item;
            $viewData->subViewFolder = "update";
            $viewData->viewFolder = $this->viewFolder;
            $viewData->formError = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    
    public function delete($id)
    {
        $data = array(
            "id" => $id
        );
        $this->Users_Model->delete($data);
        redirect(base_url("Users"));
    }
    
    public function check_unique_email($email, $id)
    {
        // Düzenleme işlemi ise ve e-posta değişmediyse doğrulamayı geç
        $user = $this->Users_Model->get(array('id' => $id));
        if ($user && $user->email === $email) {
            return TRUE;
        }
    
        // Yeni bir e-posta adresi girildiyse doğrulamayı yap
        $existing_user = $this->db->get_where('users', ['email' => $email])->row();
        if ($existing_user) {
            $this->form_validation->set_message('check_unique_email', 'Bu e-posta adresi başka bir kullanıcı tarafından kullanılıyor.');
            return FALSE;
        }
    
        return TRUE;
    }
    
      public function update_pass($id)
    {
        $item = $this->Users_Model->get(
            array(
                "id" => $id
            )
        );

        $viewData = new stdClass();
        $viewData->item = $item;
        $viewData->subViewFolder = "update_pass";
        $viewData->viewFolder = $this->viewFolder;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function new_pass($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('old-password', 'Eski Şifre', 'required|trim');
        $this->form_validation->set_rules('new-password', 'Yeni Şifre', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('confirm-password', 'Yeni Şifre Tekrar', 'required|trim|matches[new-password]');
        /* Mesajların Oluşturulması */
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır.",
                "min_length" => "Şifre en az 3 karakterden oluşmalıdır.",
                "matches" => "Şifreler birbiriyle uyuşmuyor."
            )
        );
     
    
        if ($this->form_validation->run() === FALSE) {
            // Hatalı giriş, formu tekrar göster
            $item = $this->Users_Model->get(
                array(
                    "id" => $id
                )
            );
    
            $viewData = new stdClass();
            $viewData->item = $item;
            $viewData->subViewFolder = "update_pass";
            $viewData->viewFolder = $this->viewFolder;
            $viewData->formError = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {
            // Doğrulama başarılı, şifreyi güncelle
            $old_password = $this->input->post('old-password');
            $new_password = $this->input->post('new-password');
           

            if ($this->Users_Model->verify_password($id, $old_password)) {
                $this->Users_Model->update_password($id, $new_password);
                redirect(base_url("Users"));
            } else {

               echo "Veri tabanina ekleme islemi basarisiz";
            }
        }
    }
    
        
    
}
