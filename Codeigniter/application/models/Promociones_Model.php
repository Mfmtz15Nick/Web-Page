<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promociones_Model extends CI_Model{

  public function __construct(){
    parent::__construct();
  }

  public function addPromotion ($data) { //OK
    $this->db->insert('promociones', $data);
    return $this->db->insert_id();
  }

  public function getPromotionById ($id) { //OK
    $query = $this->db->where('promo_id', $id)->get('promociones');
    return $query->row();
  }

  public function getAllPromotions () { //OK
    $query = $this->db->get('promociones');
    return $query->result();
  }

  public function deletePromotionById ($id) { //OK
    $query = $this->db->where('promo_id', $id)->delete('promociones');
    if($this->db->affected_rows()>0)
      return $id;
    return false;
  }

  public function deleteAllPromotions () { //OK
    $this->db->empty_table('promociones');
    if($this->db->affected_rows()>0)
      return "Compañias borradas";
    return false;
  }

  public function updatePromotionById ($id) { //OK
     return $this->db->where('promo_id', $id)
                      ->update('promociones', $data);
  }

  public function getPromotionsByCompanyId ($id) {
    $query = $this->db->where('com_id', $id)->get('promociones');
    return $query->result();
  }

  public function updatePromotionCompanyId ($id, $data) {
    return $this->db->where('promo_id', $id)->update('promociones', $data);
  }
}