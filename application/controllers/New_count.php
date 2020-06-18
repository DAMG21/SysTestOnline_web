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
    $email = $this->input->post('email');
    include 'Mailin.php';
    $mailin = new Mailin('denilson.damg@gmail.com', 'BIkvS6KVN01QwfPL');
    $mailin->
    addTo($email, '')->
    setFrom('denilson.damg@gmail.com', 'SysTestOnline')->
    setReplyTo($email,'')->
    setSubject('Gracias por registrarte - SysTestOnline')->
    setText('Hola')->
    setHtml(file_get_contents('http://systestonline.ddns.net/SytestOnline/messages_mail/Register-mail.php'));
    $res = $mailin->send();
    $this->register_teacher->new_acount($data_capture); 
  }
  
}
