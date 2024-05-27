<?php
class Login_Model extends CI_Model
{

    public function __construct(){
        parent::__construct();
    }

    public function get($data = array()){
       return $this->db->where($data)->get("users")->result();
        
    }
}

?>