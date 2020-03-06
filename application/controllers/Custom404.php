<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom404 extends CI_Controller {

  
  public function index(){
  	$this->load->model('Masukan_model');
  	$logs = $this->Masukan_model->logs(); 
  	
    $this->load->view('404');
 
  }

}