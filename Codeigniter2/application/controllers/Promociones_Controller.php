<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promociones_Controller extends CI_Controller{

  public function __construct() {
      parent::__construct();
      $this->load->model('Promociones_Model');
  }

  function index() {
      sendError(404);
  }

  public function getAllPromotions () { //Terminado
    if ($this->input->post()) {
      $data = $this->Promociones_Model->getAllPromotions();
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
      echo "There's an error.";
    }
  }

  public function getPromotionById() { //Finished
     if ($this->input->post()) {
      $id = $this->input->post('promo_id');
      $data = $this->Promociones_Model->getPromotionById($id);
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
       echo "Ha ocurrido un error.";
    }
  }

  public function addPromotion () { //Terminado
    if ($this->input->post()) {
    $information = array(
      'promo_descripcion' => $this->input->post('promo_descripcion'),
      'com_id' => $this->input->post('com_id'),
      'fecha_inicio' => $this->input->post('fecha_inicio'),
      'fecha_limite' => $this->input->post('fecha_limite'),
      'promo_img' => $this->input->post('promo_img')
          );
    $data = $this->Promociones_Model->addPromotion($information);
    header("content-type:application/json");
    echo json_encode($data);
    }
    else {
      echo "Ha ocurrido un error";
    }
  }

  public function deletePromotionById () { //Terminado
    if ($this->input->post()) {
      $id = $this->input->post('promo_id');
      $data = $this->Promociones_Model->deletePromotionById($id);
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
      echo "Ha ocurrido un error";
    }
  }

  public function deleteAllPromotions () { //Terminado
    if ($this->input->post()) {
      $data = $this->Promociones_Model->deleteAllPromotions();
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
      echo "Ha ocurrido un error";
    }
  }

  public function updatePromotionById () { //Finished
     if ($this->input->post()) {
      $id = $this->input->post('promo_id');
      $information = array(
        'promo_descripcion' => $this->input->post('promo_descripcion'),
        'com_id' => $this->input->post('com_id'),
        'fecha_inicio' => $this->input->post('fecha_inicio'),
        'fecha_limite' => $this->input->post('fecha_limite'),
        'promo_img' => $this->input->post('promo_img')
      );
      $data = $this->Promociones_Model->updatePromotionById($id, $information);
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
      echo "Ha ocurrido un error";
    }
  }

  public function getPromotionsByCompanyId () { //Completo
    if ($this->input->post()) {
      $id = $this->input->post('com_id');
      $data = $this->Promociones_Model->getPromotionsByCompanyId($id);
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
       echo "Ha ocurrido un error.";
    }
  }

  public function updatePromotionCompanyId () { //Terminado
    if ($this->input->post()) {
      $id = $this->input->post('promo_id');
      $information = array('com_id' => $this->input->post('com_id'));
      $data = $this->Promociones_Model->updatePromotionCompanyId($id, $information);
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
       echo "Ha ocurrido un error.";
    }
  }
}