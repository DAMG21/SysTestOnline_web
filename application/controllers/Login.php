<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('login_model');
    $this->load->helper('url');
  }
  function index(){
    $this->load->view('login_view');
  }
  function auth(){
    $usuario    = $this->input->post('usuario',TRUE);
    $password = md5($this->input->post('password',TRUE));
    $validate = $this->login_model->validate($usuario,$password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $id_group  = $data['id_group'];
        $nombre  = $data['name_teacher'];
        $email_teacher  = $data['email_teacher'];
        $clave  = $data['id_teacher'];
        $password  = $data['password_teacher'];
        $sesdata = array(
            'password_teacher'  => $password,
            'nombre'  => $nombre,
            'id_teacher'  => $clave,
            'id_group'  => $id_group,
            'email_teacher'  => $email_teacher,
            'logged_in' => TRUE);
        $this->session->set_userdata($sesdata);

            redirect('page/panel');

    }else{
        echo $this->session->set_flashdata('msg','Usuario o Contraseña no valida, porfavor intentelo nuevamente');
        redirect('login');
    }
  }
  function logout(){
      $this->session->sess_destroy();
      redirect('login');
  }

  
}
