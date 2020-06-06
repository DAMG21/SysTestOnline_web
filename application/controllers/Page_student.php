<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class page_student extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    if($this->session->userdata('logged_in')!==TRUE){
      redirect('login_student');
    }
  }
    public function view_exam()
    {
      $this->load->model('exam_student/detail_exam');
      $information_exam = $this->detail_exam->information_exam_BD();
              $data  = $information_exam->row_array();
              $show_reagents=$data['show_reagents'];
              $id_exam=$data['id_exam'];
              $num_reagents = array(
            'id_exam'  => $id_exam,
            'show_reagents'  => $show_reagents,
            'logged_in' => TRUE);
        $this->session->set_userdata($num_reagents);
      $datos['information_exam']=$information_exam;

      $reagents_exam = $this->detail_exam->reagents_exam_BD();
      $datos['reagents_exam']=$reagents_exam;

      $this->load->view('exam_student',$datos);
    }
    public function validation_exam()
    {
      $this->load->model('exam_student/detail_exam');
      $validation = $this->input->post();
      //print_r($validation);
      $this->detail_exam->save_answers($validation);
      $this->load->view('script',$validation);
      $correctas= count(array_filter($validation, function($v) {
        return  $v == 1;
      }, ARRAY_FILTER_USE_BOTH));
     echo '<center><h2>Respuestas correctas: '.$correctas.' </h2></center> ';
     $total_preguntas=count($validation);
     echo '<center><h2>Total de preguntas: '.$total_preguntas.' </h2></center> ';

          $porcentaje = (10 * $correctas) / $total_preguntas;
          $sin_decimales = number_format($porcentaje, 1, '.', '');
          echo '<center><h2>Calificación: '.$sin_decimales.' </h2></center> ';
    $this->detail_exam->save_detail_exam($total_preguntas,$correctas,$sin_decimales);

    $this->session->sess_destroy();

    }


  }
