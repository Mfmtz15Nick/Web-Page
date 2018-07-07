<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_Controller extends CI_Controller{

  public function __construct() {
      parent::__construct();
      $this->load->model('Evento_Model');
  }

  function index() {
      sendError(404);
  }

  public function addEvent () {
    if ( $this->input->post() ) {
      $information = array(
        'evento_nombre' => $this->input->post('evento_nombre'),
        'evento_descripcion' => $this->input->post('evento_descripcion'),
        'evento_fecha_inicio' => $this->input->post('evento_fecha_inicio'),
        'evento_fecha_fin' => $this->input->post('evento_fecha_fin'),
        'evento_ubicacion' => $this->input->post('evento_ubicacion'),
        'evento_limite_invitados' => $this->input->post('evento_limite_invitados'),
        'evento_img' => $this->input->post('evento_img'),
        'com_id' => $this->input->post('com_id')
          );
      $data = $this->Evento_Model->addEvent($information);
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
      echo "There's an error.";
    }
  }

  public function getAllEvents () {
    if ($this->input->post()) {
      $data = $this->Evento_Model->getAllEvents();
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
      echo "There's an error.";
    }
  }

  public function getEventById () {
    if($this->input->post()) {
      $id = $this->input->post('evento_id');
      $data = $this->Evento_Model->getEventById($id);
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
      echo "There's an error.";
    }
  }

  public function deleteAllEvents () {
    if($this->input->post()) {
      $data = $this->Evento_Model->deleteAllEvents();
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
      echo "There's an error.";
    }
  }

  public function deleteEventById () {
    if($this->input->post()) {
      $id = $this->input->post('evento_id');
      $data = $this->Evento_Model->deleteEventById($id);
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
      echo "There's an error.";
    }
  }

  public function updateEventById () {
    if ($this->input->post()) {
      $id = $this->input->post('evento_id');
      $information = array(
        'evento_nombre' => $this->input->post('evento_nombre'),
        'evento_descripcion' => $this->input->post('evento_descripcion'),
        'evento_fecha_inicio' => $this->input->post('evento_fecha_inicio'),
        'evento_fecha_fin' => $this->input->post('evento_fecha_fin'),
        'evento_ubicacion' => $this->input->post('evento_ubicacion'),
        'evento_limite_invitados' => $this->input->post('evento_limite_invitados'),
        'evento_img' => $this->input->post('evento_img'),
        'com_id' => $this->input->post('com_id')
      );
      $data = $this->Evento_Model->updateEventById($id, $information);
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
      echo "There's an error.";
    }
  }

  public function getEventsByCompanyId () {
    if($this->input->post()) {
      $id = $this->input->post('com_id');
      $data = $this->Evento_Model->getEventsByCompanyId($id);
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
      echo "There's an error.";
    }
  }


  

}
