<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class new_count extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
  }
  public function register_teacher()
  {
    $this->load->view('register_teacher');      
  }
  public function data_new_count()
  {
    $this->load->model('new_acount/register_teacher');
    $data_capture = $this->input->post();
    $this->register_teacher->new_acount($data_capture); 
  }
  
}
