<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategorias_Controller extends CI_Controller {

	public function __construct() {
      parent::__construct();
      $this->load->model('Subcategorias_Model');
  	}

	public function getAllSubCategories () { //Completed
		if($this->input->post()) {
			$data = $this->Subcategorias_Model->getAllSubCategories();
			header("content-type:application/json");
			echo json_encode($data);
		}
		else {
			echo "Error";
		}	
	}

	public function getSubCategoryById() { //Completed
		if($this->input->post()) {
			$id = $this->input->post('sub_id');
			$data = $this->Subcategorias_Model->getSubCategoryById($id);
			header("content-type:application/json");
			echo json_encode($data);
		}
		else {
			echo "error";
		}
	}

	public function createSubCategory () { //Completed
		if($this->input->post()) {
			$information = ['sub_nombre' => $this->input->post('sub_nombre'), 'cat_id' => $this->input->post('cat_id')];
			$data = $this->Subcategorias_Model->createSubCategory($information);
			header("content-type:application/json");
			echo json_encode($data);
		}
		else {
			echo "error";
		}
	}

	public function deleteSubCategoryById ($id) { //Completed
		if($this->input->post()) {
			$id = $this->input->post('sub_id');
			$data = $this->Subcategorias_Model->deleteSubCategoryById($id);
			header("content-type:application/json");
			echo json_encode($data);
		}
		else {
			echo "error";
		}
	}

	public function deleteAllSubCategories () { //Completed
		if($this->input->post()) {
			$data = $this->Subcategorias_Model->deleteAllSubCategories();
			header("content-type:application/json");
			echo json_encode($data);
		}
		else {
			echo "error";
		}
	}

	public function updateSubCategoryById () { //Completed
		if($this->input->post()) {
			$id = $this->input->post('sub_id');
			$information = ['sub_nombre' => $this->input->post('sub_nombre'), 'cat_id' => $this->input->post('cat_id')];
			$data = $this->Subcategorias_Model->updateSubCategoryById($id, $information);
			header("content-type:application/json");
			echo json_encode($data);
		}
		else {
			echo "error";
		}
	}

	public function updateCategoryIdOfSubcategoryById () { //Completed
		if($this->input->post()) {
			$sub_id = $this->input->post('sub_id');
			$information = ['cat_id' => $this->input->post('cat_id')];
			$data = $this->Subcategorias_Model->updateCategoryIdOfSubcategoryById($sub_id, $information);
			header("content-type:application/json");
			echo json_encode($data);
		}
		else {
			echo "error";
		}
	}

	public function getSubcategoriesByCategoryId () { //Completed
		if($this->input->post()) {
			$id = $this->input->post('cat_id');
			$data = $this->Subcategorias_Model->getSubcategoriesByCategoryId($id);
			header("content-type:application/json");
			echo json_encode($data);
		}
		else {
			echo "error";
		}
	}
}