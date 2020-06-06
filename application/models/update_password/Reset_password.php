<?php
class reset_password extends CI_Model
{
  public function modify_password($password)
  {
    $id_teacher =  $this->session->userdata('id_teacher');

       $update = array(
              'password_teacher' => $password);
               $this->db->where('id_teacher', $id_teacher);
           if ($this->db->update('teachers',$update))
          {
               echo "1";
              }else{
               echo "0";
          }
  }
 
 }