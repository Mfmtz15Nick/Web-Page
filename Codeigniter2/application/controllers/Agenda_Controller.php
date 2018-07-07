<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda_Controller extends CI_Controller{

  public function __construct() {
      parent::__construct();
      $this->load->model('Agenda_Model');
  }

  function index() {
      sendError(404);
  }


  public function getAll () { //Terminado
    if ($this->input->post()) {
    	$data = $this->Agenda_Model->getAll();
      	header("content-type:application/json");
      	echo json_encode($data);
    }
    else {
      echo "There's an error.";
    }
  }

  public function getById() { //Finished
     if ($this->input->post()) {
     	$id = $this->input->post('agenda_id');
      	$data = $this->Agenda_Model->getById($id);
      	header("content-type:application/json");
      	echo json_encode($data);
    }
    else {
       echo "Ha ocurrido un error.";
    }
  }

  public function add () { //Terminado
    if ($this->input->post()) {
	    $information = array(
	      'evento_id' => $this->input->post('evento_id'),
	          );
	    $data = $this->Agenda_Model->add($information);
	    header("content-type:application/json");
	    echo json_encode($data);
    }
    else {
      echo "Ha ocurrido un error";
    }
  }

  public function deleteById () { //Terminado
    if ($this->input->post()) {
    	$id = $this->input->post('agenda_id');
      	$data = $this->Agenda_Model->deleteById($id);
      	header("content-type:application/json");
      	echo json_encode($data);
    }
    else {
      echo "Ha ocurrido un error";
    }
  }

  public function deleteAll () { //Terminado
    if ($this->input->post()) {
      	$data = $this->Agenda_Model->deleteAll();
      	header("content-type:application/json");
      	echo json_encode($data);
    }
    else {
      echo "Ha ocurrido un error";
    }
  }

  public function updateById () { //Finished
     if ($this->input->post()) {
     	$id = $this->input->post('agenda_id');
       	$information = array(
	        'evento_id' => $this->input->post('evento_id'),
        );
      $data = $this->Agenda_Model->updateById($id, $information);
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
      echo "Ha ocurrido un error";
    }
  }

  public function getAllByEventId () {
  	if($this->input->post()) {
  		$id = $this->input->post('evento_id');
  		$data = $this->Agenda_Model->getAllByEventId($id);
  		header("content-type:application/json");
      	echo json_encode($data);
  	}
  	else {
  		echo "There's an error";
  	}
  }

  
}