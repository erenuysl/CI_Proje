<?php
class Users_Model extends CI_Model
{

    public function __construct(){
        parent::__construct();
    }

    public function add($data = array()){
        return $this->db->insert("Users", $data);
    }
    public function get($where =array() ){
        return $this->db->where($where)->get('Users')->row();

    }

    public function getAll($order = "id ASC"){
        return $this->db->order_by($order)->get("Users")->result();
    }
    public function delete($where = array())
    {
        return $this->db->where($where)->delete("Users");
    }

    public function update($where = array(), $data = array())
    {
        return $this->db->where($where)->update("Users", $data);
    }
    public function verify_password($id, $old_password)
    {
        // Kullanıcıyı veritabanından alarak şifreyi doğrula
        $user = $this->db->get_where('users', array('id' => $id))->row();
        if ($user && password_verify($old_password, $user->password)) {
            return true; // Şifre doğrulandı
        }
        return false; // Şifre doğrulanamadı
    }
    
    public function update_password($id, $new_password)
    {
        // Yeni şifreyi hashleyerek veritabanına güncelle
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $this->db->update('users', array('password' => $hashed_password), array('id' => $id));
    }
    

}

?>