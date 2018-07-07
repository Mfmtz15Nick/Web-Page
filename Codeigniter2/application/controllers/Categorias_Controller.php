<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
      	$this->load->model('Categorias_Model');
  	}

	function index() {
	    sendError(404);
	}

	public function getAllCategories () { //Finished
		if($this->input->post()) {
			$data = $this->Categorias_Model->getAllCategories();
			header("content-type:application/json");
			echo json_encode($data);
		}
		else {
			echo "There's an error";
		}
	}

	public function getCategoryById() { //Finished
		if ($this->input->post()) {
			$id = $this->input->post('cat_id');
			$data = $this->Categorias_Model->getCategoryById($id);
			header("content-type:application/json");
			echo json_encode($data);
		}
		else {
			 echo "Ha ocurrido un error.";
		}
	}

	public function createCategory () { //Finished
		if ($this->input->post()) {
			$info = $this->input->post('cat_nombre');
			$information = ['cat_nombre' => $info];
			$data = $this->Categorias_Model->createCategory($information);
			header("content-type:application/json");
			echo json_encode($data);
		}
		else {
			echo "Hay un error.";
		}
	}

	public function deleteCategoryById () { //Finished
		if ($this->input->post()) {
			$id = $this->input->post('cat_id');
			$data = $this->Categorias_Model->deleteCategoryById($id);
			header("content-type:application/json");
			echo json_encode($data);
		}
		else {
			echo "Hay un error.";
		}
	}

	public function deleteAllCategories () { //Finished
		if($this->input->post()) {
			$data = $this->Categorias_Model->deleteAllCategories();
			header("content-type:application/json");
			echo json_encode($data);
		}
		else {
			echo "Hay un error.";
		}
	}

	public function updateCategoryById ($id, $info) { //Finished
		if($this->input->post()) {
			$id = $this->input->post('cat_id');
			$information = ['cat_nombre' => $this->input->post('cat_nombre')];
			$data = $this->Categorias_Model->updateCategoryById($id, $information);
			header("content-type:application/json");
			echo json_encode($data);
		}
		else {
			echo "Error.";
		}
	}
}