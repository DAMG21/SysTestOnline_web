<?php
class Login_model extends CI_Model{
  function validate($usuario,$password){
    $this->db->where('email_teacher',$usuario);
    $this->db->where('password_teacher',$password);
    $result = $this->db->get('teachers',1);
    return $result;
  }
  function validate_student($email,$token){
    $this->db->where('email_student',$email);
    $this->db->where('token_student',$token);
    $this->db->where('status','1');
    $result = $this->db->get('students',1);
    return $result;
  }
}
