<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class login_student extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('login_model');
    $this->load->helper('url');
  }
  function index(){
    $this->load->view('login_view_student');
  }
  function auth(){
    $email    = $this->input->post('email',TRUE);
    $token = $this->input->post('token',TRUE);
    $validate = $this->login_model->validate_student($email,$token);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $id_student  = $data['id_student'];
        $id_group  = $data['id_group'];
        $sesdata = array(
            'id_group'  => $id_group,
            'id_student'  => $id_student,
            'logged_in' => TRUE);
        $this->session->set_userdata($sesdata);
       echo "<SCRIPT>javascript:window.open('../page_student/view_exam', 'noimporta', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=1500, height=1000,location=NO');</SCRIPT>";
        $this->load->view('login_view_student');
    }else{
        echo $this->session->set_flashdata('msg','Correo o token no valida, porfavor intentelo nuevamente');
        redirect('login_student');
    }
  }
  function logout(){
      $this->session->sess_destroy();
      redirect('login_student');
  }

  
}
