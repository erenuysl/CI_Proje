<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {


	 public function __construct(){
        parent::__construct();
		
    }
	public function index()
	{
        $this->load->model("Login_Model");
		if(!empty($this->session->id)){
			redirect(base_url("Users"));
		}
		$this->load->view('index');
		
	}
    public function logout()
	{
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('surname');
		$this->session->unset_userdata('id');
	redirect(base_url("main"));
	}
	public function resume()
	{
        $this->load->model("Login_Model");
		if(!empty($this->session->id)){
			redirect(base_url("Users"));
		}

		$data = array(
			"email" => $this->input->post("email"),
			"password" => $this->input->post("pass")
		);

		$response = $this->Login_Model->get($data);
		if($response){

			$datas = array(
				'id'  =>  $response[0]->id,
				'name'     =>  $response[0]->name,
				'surname' =>  $response[0]->surname,
				'email' =>  $response[0]->email
		);
		
		$this->session->set_userdata( $datas);

		redirect(base_url("Users"));

		}else{
			$this->load->view('index');
		}
	}
}
