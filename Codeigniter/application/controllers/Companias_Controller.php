<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Companias_Controller extends CI_Controller{

  public function __construct() {
      parent::__construct();
      $this->load->model('Companias_Model');
  }

  function index() {
      sendError(404);
  }


  public function getAllCompanies () { //Terminado
    if ($this->input->post()) {
      $data = $this->Companias_Model->getAllCompanies();
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
      echo "There's an error.";
    }
  }

  public function getCompanyById() { //Finished
     if ($this->input->post()) {
      $id = $this->input->post('com_id');
      $data = $this->Companias_Model->getCompanyById($id);
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
       echo "Ha ocurrido un error.";
    }
  }

  public function createCompany () { //Terminado
    if ($this->input->post()) {
    $information = array(
      'com_nombre' => $this->input->post('com_nombre'),
      'com_img' => $this->input->post('com_img'),
      'com_fecha_reg' => $this->input->post('com_fecha_reg'),
      'com_estatus' => $this->input->post('com_estatus'),
      'sub_id' => $this->input->post('sub_id'),
      'com_ubicacion' => $this->input->post('com_ubicacion'),
      'com_email' => $this->input->post('com_email'),
      'com_telefono' => $this->input->post('com_telefono'),
      'com_video_prom' => $this->input->post('com_video_prom'),
      'com_facebook' => $this->input->post('com_facebook'),
      'com_twitter' => $this->input->post('com_twitter'),
      'com_pagina_web' => $this->input->post('com_pagina_web'),
      'com_insta' => $this->input->post('com_insta'),
      'com_apertura' => $this->input->post('com_apertura'),
      'com_cierre' => $this->input->post('com_cierre'),
      'com_estrellas' => $this->input->post('com_estrellas')
          );
    $data = $this->Companias_Model->addCompany($information);
    header("content-type:application/json");
    echo json_encode($data);
    }
    else {
      echo "Ha ocurrido un error";
    }
  }

  public function deleteCompanyById () { //Terminado
    if ($this->input->post()) {
      $id = $this->input->post('com_id');
      $data = $this->Companias_Model->deleteCompanyById($id);
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
      echo "Ha ocurrido un error";
    }
  }

  public function deleteAllCompanies () { //Terminado
    if ($this->input->post()) {
      $data = $this->Companias_Model->deleteAllCompanies();
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
      echo "Ha ocurrido un error";
    }
  }

  public function updateCompanyById () { //Finished
     if ($this->input->post()) {
      $id = $this->input->post('com_id');
      $information = array(
        'com_nombre' => $this->input->post('com_nombre'),
        'com_img' => $this->input->post('com_img'),
        'com_fecha_reg' => $this->input->post('com_fecha_reg'),
        'com_estatus' => $this->input->post('com_estatus'),
        'sub_id' => $this->input->post('sub_id'),
        'com_ubicacion' => $this->input->post('com_ubicacion'),
        'com_email' => $this->input->post('com_email'),
        'com_telefono' => $this->input->post('com_telefono'),
        'com_video_prom' => $this->input->post('com_video_prom'),
        'com_facebook' => $this->input->post('com_facebook'),
        'com_twitter' => $this->input->post('com_twitter'),
        'com_pagina_web' => $this->input->post('com_pagina_web'),
        'com_insta' => $this->input->post('com_insta'),
        'com_apertura' => $this->input->post('com_apertura'),
        'com_cierre' => $this->input->post('com_cierre'),
        'com_estrellas' => $this->input->post('com_estrellas')
            );
      $data = $this->Companias_Model->updateCompanyById($id, $information);
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
      echo "Ha ocurrido un error";
    }
  }

  public function getCompaniesBySubCategoryId () { //Completo
    if ($this->input->post()) {
      $id = $this->input->post('sub_id');
      $data = $this->Companias_Model->getCompaniesBySubCategoryId($id);
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
       echo "Ha ocurrido un error.";
    }
  }

  public function updateCompanyIdOfSubcategoryByCompanyId () { //Terminado
    if ($this->input->post()) {
      $id = $this->input->post('com_id');
      $information = array('sub_id' => $this->input->post('sub_id'));
      $data = $this->Companias_Model->updateCompanyIdOfSubcategoryByCompanyId($id, $information);
      header("content-type:application/json");
      echo json_encode($data);
    }
    else {
       echo "Ha ocurrido un error.";
    }
  }
}