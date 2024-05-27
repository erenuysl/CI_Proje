<?php
class Product_Category_Model extends CI_Model
{

    public function __construct(){
        parent::__construct();
    }

    public function add($data = array()){
        return $this->db->insert("Product_Categories", $data);
    }
    public function get($where =array() ){
        return $this->db->where($where)->get('Product_Categories')->row();

    }

    public function getAll($order = "id ASC"){
        return $this->db->order_by($order)->get("Product_Categories")->result();
    }
    public function delete($where = array())
    {
        return $this->db->where($where)->delete("Product_Categories");
    }

    public function update($where = array(), $data = array())
    {
        return $this->db->where($where)->update("Product_Categories", $data);
    }

}

?>