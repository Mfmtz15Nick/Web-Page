<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_Model extends CI_Model{

  public function __construct(){
    parent::__construct();
  }

  public function createCategory($data) { //OK
      $this->db->insert('categorias', $data);
      return $this->db->insert_id();
  }

  public function getAllCategories () { //OK
  	$query = $this->db->get('categorias');
  	return $query->result();
  }

  public function getCategoryById ($id) { //OK
  	$query = $this->db->where('cat_id', $id)->get('categorias');
  	return $query->row();
  }


  public function updateCategoryById($id, $data) { //OK
      return $this->db->where('cat_id', $id)
                      ->update('categorias', $data);
  }

  public function deleteCategoryById ($id) { //OK
  	$query = $this->db->where('cat_id', $id)->delete('categorias');
  	if($this->db->affected_rows()>0)
   		return $id;
   	return false;
  }

  public function deleteAllCategories () { //OK
  	$this->db->empty_table('categorias');
  	if($this->db->affected_rows()>0)
   		return "Categorias borradas";
   	return false;
  }
}
?>