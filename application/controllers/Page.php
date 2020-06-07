<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    if($this->session->userdata('logged_in')!==TRUE){
      redirect('login');
    }
  }
    public function panel()
    {
      $this->load->view('menu_arriba');
      $this->load->view('contenido');      
    }

    public function my_profile()//modulo mi perfil se consulta la informacion del docente en la base de datos
    {
      $this->load->model('new_acount/register_teacher');
      $information_teacher = $this->register_teacher->information_teacher();
      $datos['information_teacher']=$information_teacher;

      $this->load->view('menu_arriba');
      $this->load->view('my_profile',$datos);      
    }
    public function groups()//modulo grupos se consulta los grupos del docente mediante su id del maetsro y trae la informacion de todos los grupos
    {
      $this->load->model('group/register_group');
      $information_group = $this->register_group->detail_group_BD();
      $datos['detail_group'] = $information_group;
      $this->load->view('menu_arriba');
      $this->load->view('groups',$datos);      
    }
    public function new_group()//se crea un nuevo grupo mediante el id del maestro
    {
      $this->load->model('group/register_group');
      $group = $this->input->post();
      $this->register_group->register_group_BD($group); 
    }
    public function remove_group()// se elimina el grupo del docente
    {
      $this->load->model('group/register_group');
      $id_group = $this->input->post('id_group');
      $this->register_group->remove_group_BD($id_group); 
    }
    public function remove_assign_exam()
    {
        $this->load->model('exams/reagents');
        $id_assign = $this->input->post('id_assign');
        $this->reagents->remove_assign_exam_group_BD($id_assign); 
    }
    public function list_exams_group()
    {
      $this->load->model('exam_results/detail_exam');
      $id_group = $this->input->post('id_group');
        $info_group = array(
        'id_group'  => $id_group,
        'logged_in' => TRUE);
      $this->session->set_userdata($info_group);
      $exams = $this->detail_exam->exams_BD($id_group);
      $datos['exams'] = $exams;

      $this->load->view('menu_arriba');
      $this->load->view('exam_results/list_exams_group',$datos); 
    }
    public function list_qualification()
    {
      $this->load->library('session');
      $this->load->model('exam_results/detail_exam');
      $id_group = $this->input->post('id_group');
      $id_exam = $this->input->post('id_exam');
      $exam = $this->input->post('exam');
      $id = array(
        'id_group'  => $id_group,
        'id_exam'  => $id_exam,
        'exam'  => $exam,
        'logged_in' => TRUE);
      $this->session->set_userdata($id);

      $result = $this->detail_exam->list_students_BD($id_group,$id_exam);
      $datos['list_students'] = $result;

      $information_exam = $this->detail_exam->information_exam_BD($id_group,$id_exam);
      $datos['information_exam'] = $information_exam;

      $this->load->view('menu_arriba');
      $this->load->view('exam_results/list_students',$datos); 

    }
    public function validation_password()
    {
      $this->load->view('menu_arriba');
      $this->load->view('reset_password/form_validation_password'); 
    }
    public function edit_group()//se edita el grupo del docente
    {
      $this->load->model('group/register_group');
      $edit_group = $this->input->post();
      $this->register_group->edit_group_BD($edit_group); 
    }
    public function view_group()
    {
      $this->load->library('session');
      $this->load->model('group/register_group');
      $id_group = $this->input->post('id_group');
      $subject = $this->input->post('subject');
      $info_group = array(
        'id_group'  => $id_group,
        'subject'  => $subject,
        'logged_in' => TRUE);
      $this->session->set_userdata($info_group);

      $group = $this->register_group->view_group_BD();
      $datos['info_group'] = $group;

      $configuration = $this->register_group->detail_configuration_group_BD();
      $datos['configuration_group'] = $configuration;

      $exam = $this->register_group->exams_BD();
      $datos['detail_exam'] = $exam;

      $assign_exam = $this->register_group->assign_exams_BD();
      $datos['assign_exam'] = $assign_exam;

      $this->load->view('menu_arriba');
      $this->load->view('view_students_groups',$datos); 
    }
    public function add_token()
    {
      $this->load->model('students/detail_students');
     $token = $this->input->post();
      $this->detail_students->add_token_BD($token); 
    }
    public function remove_token()
    {
      $this->load->model('students/detail_students');
      $token = $this->input->post();
      $this->detail_students->remove_token_BD($token); 
    }
    public function add_student()
    {
      $this->load->model('students/detail_students');
      $information_student = $this->input->post();
      $this->detail_students->add_student_BD($information_student); 

    }
    public function remove_student()
    {
      $this->load->model('students/detail_students');
      $id_student = $this->input->post('id_student');
      $this->detail_students->remove_student_BD($id_student); 
    }
    public function edit_student()
    {
      $this->load->model('students/detail_students');
      $info = $this->input->post();
      $this->detail_students->edit_student_BD($info);
    }
    public function all_active_tokens()
    {
      $this->load->model('students/detail_students');
      $id_group = $this->input->post('group');
      $this->detail_students->all_active_tokens_BD($id_group);
    }
    public function all_deactivate_tokens()
    {
      $this->load->model('students/detail_students');
      $id_group = $this->input->post('group');
      $this->detail_students->all_deactivate_tokens_BD($id_group);
    }
    public function list_examns()
    {
      $this->load->model('exams/list_examns');
      $list_exams = $this->list_examns->list_exams_BD();
      $datos['exams'] = $list_exams;
      $this->load->view('menu_arriba');
      $this->load->view('examns/list_examns',$datos);   
    }
    public function add_exam()
    {
      $this->load->model('exams/list_examns');
      $name = $this->input->post();
      $this->list_examns->add_exam_BD($name);
    }
    public function remove_exam()
    {
      $this->load->model('exams/list_examns');
      $id_exam = $this->input->post('id_exam');
      $this->list_examns->remove_exam_BD($id_exam);
    }
    public function edit_exam()
    {
      $this->load->model('exams/list_examns');
      $info_exam = $this->input->post();
      $this->list_examns->edit_exam_BD($info_exam);
    }
    public function react_exam()
    {
      $this->load->model('exams/reagents');
      $id_exam = $this->input->post('id_exam');
      $exam = $this->input->post('exam');
      $reagents = $this->reagents->reagents_BD($id_exam);
      $this->load->library('session');
        $id_exam = array(
                'id_exam'  => $id_exam,
                'exam'  => $exam,
                'logged_in' => TRUE);
              $this->session->set_userdata($id_exam);
      $datos['reagents'] = $reagents;
      $this->load->view('menu_arriba');
      $this->load->view('examns/reagents',$datos);  
    }
    public function remove_reagent()
    {
      $this->load->model('exams/reagents');
      $id_reagents = $this->input->post('id_reagents');
      $rute_exercise = $this->input->post('rute_exercise');
      $this->reagents->remove_reagents_BD($id_reagents,$rute_exercise); 
    }
    public function edit_reagent()
    {
          $this->load->model('exams/reagents');
          $fechaYhora = Time(); 
      //obtenemos el modelo para despues utilizarlo             
         $image_path = '../sytesto_online/ejercicios'; //definimos la ruta en la que se guardara la imagen
         $config['upload_path']   = $image_path; 
         $config['allowed_types'] = '*'; //permitimos que cualquier tipo de archivo se guarde
         $config['max_size']      = 555000000;//$config definimos las propiedades de las imagenes a subir
         $config['max_width']     = 5000000; 
         $config['max_height']    = 5000000; 
         $config['file_name']    = $fechaYhora.''.$_FILES['imagen_ejercicio']['name'];  
         $this->load->library('upload', $config); //cargamos la configuracion necesaria 
     if ( ! $this->upload->do_upload('imagen_ejercicio')){
            $nombre_foto =$_FILES['imagen_ejercicio']['name'];  //obtenemos el nombre de la imagen
            $id_reagent =  $this->input->post('id_reagents');
            $update=array(
              'type_question' => $this->input->post('type_question2'),
              'question' => $this->input->post('react'),
              'option_correct' => $this->input->post('option_correct'),
              'option_incorrect1' => $this->input->post('option_incorrect1'),
              'option_incorrect2' => $this->input->post('option_incorrect2'),
              'option_incorrect3' => $this->input->post('option_incorrect3'),
             );
              $this->reagents->update_reagent_BD($update,$id_reagent);
         }else{  
            $nombre_foto =$_FILES['imagen_ejercicio']['name'];  //obtenemos el nombre de la imagen
            $id_reagent =  $this->input->post('id_reagents');
            $update=array(
              'type_question' => $this->input->post('type_question2'),
              'question' => $this->input->post('react'),
              'option_correct' => $this->input->post('option_correct'),
              'option_incorrect1' => $this->input->post('option_incorrect1'),
              'option_incorrect2' => $this->input->post('option_incorrect2'),
              'option_incorrect3' => $this->input->post('option_incorrect3'),
              'img_exercise'=>$fechaYhora.''.$nombre_foto,
              'ruta_exercise'=>$image_path.'/'.$fechaYhora.''.$nombre_foto,
             );
              $this->reagents->update_reagent_BD($update,$id_reagent);
      }
    }
    public function assign_exam()
    {
      $this->load->model('exams/reagents');
      $exam = $this->input->post();
      $this->reagents->assign_exam_BD($exam); 
    }
    public function assign_configuration()
    {
      $this->load->model('exams/reagents');
      $configuration = $this->input->post();
      $this->reagents->assign_configuration_BD($configuration); 
    }
    public function desassign_exam()
    {
      $this->load->model('exams/reagents');
      $id_assign = $this->input->post('id_assign');
      $this->reagents->desassign_exam_BD($id_assign); 
    }
    public function add_reagent()
    {
      $this->load->model('exams/reagents');
         $fechaYhora = Time(); 
      //obtenemos el modelo para despues utilizarlo             
         $image_path = '../sytesto_online/ejercicios'; //definimos la ruta en la que se guardara la imagen
         $config['upload_path']   = $image_path; 
         $config['allowed_types'] = '*'; //permitimos que cualquier tipo de archivo se guarde
         $config['max_size']      = 555000000000000000000000000;//$config definimos las propiedades de las imagenes a subir
         $config['max_width']     = 555000000000000000000000000; 
         $config['max_height']    = 555000000000000000000000000;
         $nombre_foto = $_FILES['imagen_ejercicio']['name'];  //obtenemos el nombre de la imagen
         $extension = pathinfo($nombre_foto, PATHINFO_EXTENSION);

         $config['file_name']    = $fechaYhora.'.'.$extension;  
         $this->load->library('upload', $config); //cargamos la configuracion necesaria 
     if ( ! $this->upload->do_upload('imagen_ejercicio')) {
            $nombre_foto =$_FILES['imagen_ejercicio']['name'];  //obtenemos el nombre de la imagen
           $extension = pathinfo($nombre_foto, PATHINFO_EXTENSION);
           echo $extension;
            $data=array(
              'id_exam' => $this->session->userdata('id_exam'),
              'type_question' => $this->input->post('type_question'),
              'question' => $this->input->post('react'),
              'option_correct' => $this->input->post('question_correct'),
              'option_incorrect1' => $this->input->post('question_incorrect1'),
              'option_incorrect2' => $this->input->post('question_incorrect2'),
              'option_incorrect3' => $this->input->post('question_incorrect3'));
               $this->reagents->add_reagent_BD($data);
         }else{ 
            
            $nombre_foto = $_FILES['imagen_ejercicio']['name'];  //obtenemos el nombre de la imagen
            $extension = pathinfo($nombre_foto, PATHINFO_EXTENSION);
            $data=array(
              'id_exam' => $this->session->userdata('id_exam'),
              'type_question' => $this->input->post('type_question'),
              'question' => $this->input->post('react'),
              'option_correct' => $this->input->post('question_correct'),
              'option_incorrect1' => $this->input->post('question_incorrect1'),
              'option_incorrect2' => $this->input->post('question_incorrect2'),
              'option_incorrect3' => $this->input->post('question_incorrect3'),
              'img_exercise'=>$fechaYhora.'.'.$extension,
              'ruta_exercise'=>$image_path.'/'.$fechaYhora.'.'.$extension,
             );
               $this->reagents->add_reagent_BD($data);
      }
    }

    public function validation_password_2()
    {
       $password = md5($this->input->post('password'));
       $password_actual = $this->session->userdata('password_teacher');
       if ($password === $password_actual) {
         echo "1";
       } else {
         echo "0";
       }

    }

    public function page_reset_password()
    {
      $this->load->view('menu_arriba');
      $this->load->view('reset_password/reset_password');  
    }

    public function update_password()
    {
      $this->load->model('update_password/reset_password');
      $password = md5($this->input->post('new_password'));
      $repeat_password = md5($this->input->post('repeat_password'));

      if ($password === $repeat_password) {
        $this->reset_password->modify_password($password);
      } else {
        echo "0";
      }
      
    }
    public function view_exam_student()
    {
      $this->load->model('view_exam/exam_student');
      $this->load->view('menu_arriba');
      $id_exam = $this->input->post("id_exam");
      $id_student = $this->input->post("id_student");

      $detail_information_exam = $this->exam_student->detail_information_exam_BD($id_exam,$id_student);
      $datos['information'] = $detail_information_exam;

      $detail_exam = $this->exam_student->detail_exam_BD($id_exam,$id_student);
      $datos['detail_exam'] = $detail_exam;

      $this->load->view('view_exam/exam_student',$datos); 
    }
    public function delete_evaluation()
    {
      $this->load->model('exam_results/detail_exam');
      $id_exam = $this->input->post('id_exam');
      $id_student = $this->input->post('id_student');
      $id_detail = $this->input->post('id_detail');
      $this->detail_exam->delete_evaluation_BD($id_exam,$id_student,$id_detail); 
    }
    public function open_question_incorrect()
    {
      $this->load->model('exam_results/detail_exam');
      $id_answer = $this->input->post('id_answer');
      $id_student = $this->input->post('id_student');
      $id_exam = $this->input->post('id_exam');
      $this->detail_exam->open_question_incorrect_BD($id_answer,$id_student,$id_exam); 
    }
    public function open_question_correct()
    {
      $this->load->model('exam_results/detail_exam');
      $id_answer = $this->input->post('id_answer');
      $id_student = $this->input->post('id_student');
      $id_exam = $this->input->post('id_exam');
      $this->detail_exam->open_question_correct_BD($id_answer,$id_student,$id_exam); 
    }
    public function logout()
    {
      $this->session->sess_destroy();
      redirect('login');
    }
}
