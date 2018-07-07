<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Companias_Model extends CI_Model{

  public function __construct(){
    parent::__construct();
  }

  public function addCompany ($data) { //OK
    $this->db->insert('compañias', $data);
    return $this->db->insert_id();
  }

  public function getCompanyById ($id) { //OK
    $query = $this->db->where('com_id', $id)->get('compañias');
    return $query->row();
  }

  public function getAllCompanies () { //OK
    $query = $this->db->get('compañias');
    return $query->result();
  }

  public function deleteCompanyById ($id) { //OK
    $query = $this->db->where('com_id', $id)->delete('compañias');
    if($this->db->affected_rows()>0)
      return $id;
    return false;
  }

  public function deleteAllCompanies () { //OK
    $this->db->empty_table('compañias');
    if($this->db->affected_rows()>0)
      return "Compañias borradas";
    return false;
  }

  public function updateCompanyById ($id) { //OK
     return $this->db->where('com_id', $id)
                      ->update('compañias', $data);
  }

   public function getCompaniesBySubCategoryId ($id) { //OK
    $query = $this->db->where('com_id', $id)->get('compañias');
    return $query->result();
  }

  public function updateCompanyIdOfSubcategoryByCompanyId ($id, $data) { //OK
     return $this->db->where('com_id', $id)->update('compañias', $data);
  }
}