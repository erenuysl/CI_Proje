<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_Category extends CI_Controller
{
	public $viewFolder = "";
	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "product_category_v";
		$this->load->model("Product_Category_Model");
	}

	public function index()
	{
		$items = $this->Product_Category_Model->getAll();
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
		$this->load->library("form_validation");
		$this->form_validation->set_rules("title", "Ürün kategori adı", "required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır."
			)
		);

		/* Çalıştırılması */
		$validate = $this->form_validation->run();

		if ($validate) {
			//echo "Validasyon başarılı";

			$data = array(
				"title" => $this->input->post("title")
			);

			$insert = $this->Product_Category_Model->add($data);

			if ($insert) {
				redirect(base_url("Product_Category"));
			} else {
				echo "Kayıt Ekleme Sırasında Bir Hata Oluştu.";
			}
		} else {
			//echo "Validasyon başarısız";
			$viewData = new stdClass();
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "add";
			$viewData->formError = true;
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}
	}
	public function update_form($id)
	{

		$item = $this->Product_Category_Model->get(
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
		$this->form_validation->set_rules("title", "Ürün kategori adı", "required|trim");

		/* Mesajların Oluşturulması  */
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır."
			)
		);

		/* Çalıştırılması */
		$validate = $this->form_validation->run();

		if ($validate) {
			//echo "Validasyon başarılı, kayıt güncelleme işlemi devam eder.";

			$data = array(
				"title" => $this->input->post("title")
			);

			$update = $this->Product_Category_Model->update(
				array(
					"id" => $id
				),
				$data
			);

			if ($update) {
				redirect(base_url("Product_Category"));
			} else {
				echo "Başarısız...";
			}
		} else {
			$item = $this->Product_Category_Model->get(
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
		$this->Product_Category_Model->delete($data);

		redirect(base_url("Product_Category"));
	}

}
