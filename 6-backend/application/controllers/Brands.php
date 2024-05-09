<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brands extends CI_Controller
{
	public $viewFolder = "";
	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "Brands_v";
		$this->load->model("Brands_Model");
		$this->load->library("upload");
	}

	public function index()
	{
		$items = $this->Brands_Model->getAll();
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
        if ($this->input->post()) {
            // Dosya yükleme ayarlarını belirleyin
            $config = array(
                'upload_path' => './assets/images/brand_logo',
                'allowed_types' => 'jpg|jpeg|png',
                'max_size' => 10240, // 10 MB
            );
            $this->upload->initialize($config);
    
            // Dosya boyutu kontrolü
            if (isset($_FILES['img_url']) && $_FILES['img_url']['size'] > 0 && $_FILES['img_url']['size'] <= 10485760) { // 10 MB
                // Dosya türü kontrolü
                $file_ext = pathinfo($_FILES['img_url']['name'], PATHINFO_EXTENSION);
                if (in_array(strtolower($file_ext), array('jpg', 'jpeg', 'png'))) {
                    // Form validasyonu
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('title', 'Marka Adı', 'required');
                    $this->form_validation->set_rules('rank', 'Marka Sıralaması', 'required|numeric|is_unique[brands.rank]');
                    $this->form_validation->set_message(
                        array(
                            "required" => "<b>{field}</b> alanı doldurulmalıdır.",
                            "numeric" => "Girilen değer numara formatında olmalıdır.",
                            "is_unique" => "Bu sıralamada başka bir marka var. Lütfen başka bir sıralama giriniz."
                        )
                    );
    
                    if ($this->form_validation->run()) {
                        // Dosya yükleme işlemi
                        if ($this->upload->do_upload('img_url')) {
                            $upload_data = $this->upload->data();
                            $img_url = $upload_data['file_name'];
    
                            // Form verilerini alma
                            $title = $this->input->post("title");
                            $rank = $this->input->post("rank");
    
                            // Veritabanına kaydetme
                            $data = array(
                                "title" => $title,
                                "rank" => $rank,
                                "img_url" => $img_url
                            );
                            $insert = $this->Brands_Model->add($data);
    
                            if ($insert) {
                                redirect(base_url('Brands'));
                            } else {
                                echo 'Kayıt ekleme sırasında bir hata oluştu.';
                            }
                        } else {
                            $error = $this->upload->display_errors();
                            echo $error;
                        }
                    } else {
                        // Form doğru doldurulmadıysa
                        $viewData = new stdClass();
                        $viewData->viewFolder = $this->viewFolder;
                        $viewData->subViewFolder = 'add';
                        $viewData->formError = true;
                        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
                    }
                } else {
                    echo "Geçersiz dosya türü. Lütfen JPG, JPEG veya PNG formatında bir dosya seçin.";
                }
            } else {
                echo "Marka Logosu seçilmedi veya dosya boyutu uygun değil. Lütfen bir dosya seçin.";
            }
        }
    }
    
    public function update_form($id)
    {
        $item = $this->Brands_Model->get(
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
        if ($this->input->post()) {
            // Form validasyonu
            $this->load->library("form_validation");
            $this->form_validation->set_rules("title", "Ürün kategori adı", "required|trim");
            $this->form_validation->set_rules('rank', 'Marka Sıralaması', 'required|numeric|callback_check_unique_rank['.$id.']');
            $this->form_validation->set_message(
                array(
                    "required" => "<b>{field}</b> alanı doldurulmalıdır.",
                    "numeric" => "Girilen değer numara formatında olmalıdır.",
                    "check_unique_rank" => "Bu sıralamada başka bir marka var. Lütfen başka bir sıralama giriniz."
                )
            );
    
            $validate = $this->form_validation->run();
            if ($validate) {
                $data = array(
                    "title" => $this->input->post("title"),
                    "rank" => $this->input->post("rank")
                );
    
                // Dosya yükleme ayarlarını belirleyin
                $config = array(
                    'upload_path' => './assets/images/brand_logo',
                    'allowed_types' => 'jpg|jpeg|png',
                    'max_size' => 10240, // 10 MB
                );
                $this->upload->initialize($config);
    
                // Dosya yükleme işlemi
                if (isset($_FILES['img_url']) && $_FILES['img_url']['size'] > 0 && $_FILES['img_url']['size'] <= 10485760) { // 10 MB
                    $file_ext = pathinfo($_FILES['img_url']['name'], PATHINFO_EXTENSION);
                    if (in_array(strtolower($file_ext), array('jpg', 'jpeg', 'png'))) {
                        if ($this->upload->do_upload('img_url')) {
                            $upload_data = $this->upload->data();
                            $img_url = $upload_data['file_name'];
                            $data['img_url'] = $img_url;
                        } else {
                            echo "Dosya yükleme işlemi başarısız oldu.";
                            return; // Dosya yüklenemediğinde işlemi sonlandır
                        }
                    } else {
                        echo "Geçersiz dosya türü. Lütfen JPG, JPEG veya PNG formatında bir dosya seçin.";
                        return; // Dosya türü geçerli değilse işlemi sonlandır
                    }
                }
    
                $update = $this->Brands_Model->update(
                    array(
                        "id" => $id
                    ),
                    $data
                );
    
                if ($update) {
                    redirect(base_url("Brands"));
                } else {
                    echo "Güncelleme sırasında bir hata oluştu.";
                }
            } else {
                // Form doğru doldurulmadıysa
                $item = $this->Brands_Model->get(
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
    }
    
    public function check_unique_rank($rank, $id)
{
    // Düzenleme işlemi ise ve sıralama değişmediyse, doğrulamayı geç
    $existing_brand = $this->db->get_where('brands', ['id' => $id, 'rank' => $rank])->row();
    if ($existing_brand) {
        return TRUE;
    }

    // Yeni bir sıralama değeri girildiğinde doğrulama yap
    $existing_rank = $this->db->get_where('brands', ['id !=' => $id, 'rank' => $rank])->row();
    if ($existing_rank) {
        $this->form_validation->set_message('check_unique_rank', 'Bu sıralamada başka bir marka var. Lütfen başka bir sıralama giriniz.');
        return FALSE;
    }
    return TRUE;
}
  
public function delete($id)
{
    $data = array(
        "id" => $id
    );
    $this->Brands_Model->delete($data);

    redirect(base_url("Brands"));
}
    
}



      
    
    
