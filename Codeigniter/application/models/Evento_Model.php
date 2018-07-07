<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_Model extends CI_Model{

  public function __construct(){
    parent::__construct();
  }

  public function addEvent ($data) { //OK
    $this->db->insert('evento', $data);
    return $this->db->insert_id();
  }

  public function getAllEvents () { //OK
    $query = $this->db->get('evento');
    return $query->result();
  }

  public function getEventById ($id) { //OK
    $query = $this->db->where('evento_id', $id)->get('evento');
    return $query->row();
  }

  public function deleteEventById ($id) { //OK
    $query = $this->db->where('evento_id', $id)->delete('evento');
    if($this->db->affected_rows()>0)
      return $id;
    return false;
  }

  public function deleteAllEvents () { //OK
    $this->db->empty_table('evento');
    if($this->db->affected_rows()>0)
      return "Eventos borrados";
    return false;
  }

  public function updateEventById ($id, $data) { //OK
    return $this->db->where('evento_id', $id)->update('evento', $data);
  }

  public function getEventsByCompanyId ($id) { //OK
    $query =  $this->db->where('com_id', $id)->get('evento');
    return $query->result();
  }
}