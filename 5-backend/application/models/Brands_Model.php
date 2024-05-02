<?php
class Brands_Model extends CI_Model
{

    public function __construct(){
        parent::__construct();
    }

    public function add($data = array()){
        return $this->db->insert("Brands", $data);
    }
    public function get($where =array() ){
        return $this->db->where($where)->get('Brands')->row();

    }

    public function getAll($order = "id ASC"){
        return $this->db->order_by($order)->get("Brands")->result();
    }
    public function delete($where = array())
    {
        return $this->db->where($where)->delete("Brands");
    }

    public function update($where = array(), $data = array())
    {
        return $this->db->where($where)->update("Brands", $data);
    }

}

?>