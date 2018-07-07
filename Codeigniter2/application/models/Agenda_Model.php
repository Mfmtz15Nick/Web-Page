<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda_Model extends CI_Model{

  public function __construct(){
    parent::__construct();
  }

  public function add ($data) { //OK
    $this->db->insert('agenda', $data);
    return $this->db->insert_id();
  }

  public function getById ($id) { //OK
    $query = $this->db->where('agenda_id', $id)->get('agenda');
    return $query->row();
  }

  public function getAll () { //OK
    $query = $this->db->get('agenda');
    return $query->result();
  }

  public function deleteById ($id) { //OK
    $query = $this->db->where('agenda_id', $id)->delete('agenda');
    if($this->db->affected_rows()>0)
      return $id;
    return false;
  }

  public function deleteAll () { //OK
    $this->db->empty_table('agenda');
    if($this->db->affected_rows()>0)
      return "Fechas borradas";
    return false;
  }

  public function updateById ($id) { //OK
     return $this->db->where('agenda_id', $id)
                      ->update('agenda', $data);
  }

   public function getAllByEventId ($id) { //OK
    $query = $this->db->where('evento_id', $id)->get('agenda');
    return $query->result();
  }
}