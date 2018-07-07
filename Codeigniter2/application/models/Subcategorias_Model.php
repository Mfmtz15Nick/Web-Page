<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategorias_Model extends CI_Model{

  public function __construct(){
    parent::__construct();
  }

  public function createSubCategory($data) { //OK
      $this->db->insert('subcategorias', $data);
      return $this->db->insert_id();
  }

  public function getAllSubCategories () { //OK
  	$query = $this->db->get('subcategorias');
  	return $query->result();
  }

  public function getSubCategoryById ($id) { //OK
  	$query = $this->db->where('sub_id', $id)->get('subcategorias');
  	return $query->row();
  }

  public function updateSubCategoryById($id, $data) { //OK
      return $this->db->where('sub_id', $id)->update('subcategorias', $data);
  }

  public function deleteSubCategoryById ($id) { //OK
  	$query = $this->db->where('sub_id', $id)->delete('subcategorias');
  	if($this->db->affected_rows()>0)
   		return $id;
   	return false;
  }

  public function deleteAllSubCategories () { //OK
  	$this->db->empty_table('subcategorias');
  	if($this->db->affected_rows()>0)
   		return "Categorias borradas";
   	return false;
  }

  public function getSubcategoriesByCategoryId ($id) { //OK
  	$query = $this->db->where('cat_id', $id)->get('subcategorias');
  	return $query->result();
  }

  public function updateCategoryIdOfSubcategoryById ($id, $data) { //OK
  	 return $this->db->where('sub_id', $id)->update('subcategorias', $data);
  }
}
?>