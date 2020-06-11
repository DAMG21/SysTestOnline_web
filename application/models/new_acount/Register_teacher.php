<?php
class register_teacher extends CI_Model
{
  public function new_acount($data_capture)
  {
    $datos = array('name_teacher' => $data_capture['nombre'],
              'ap_patern' => $data_capture['ap_paterno'],
              'ap_matern' => $data_capture['ap_materno'],
              'email_teacher' => $data_capture['email'],
              'password_teacher' => md5($data_capture['pass2']));
      
      if ($this->db->insert('teachers',$datos))
      {
            echo 'Materia asignada correctamente';
            }
            else
            {
            echo 'No guardado';
      }
  }
  public function information_teacher()
    {
          $this->db->select('*');
          $this->db->where('id_teacher',$this->session->userdata('id_teacher'));
          $this->db->from("teachers");
          $data = $this->db->get();
          if ($data->num_rows() > 0)
            return $data; 
    }
 
 }