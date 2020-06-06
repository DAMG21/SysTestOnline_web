<?php
class detail_students extends CI_Model
{

  public function add_token_BD($token)
  {
     $update = array('token_student' => $token['token'],
            'status' => 1);
         $this->db->where('id_student',$token['id_student']);
     if ($this->db->update('students',$update))
    {
         echo "Token asignado correctamente";
        }else{
         echo "Token no asignado";
    }
  }
  public function remove_token_BD($token)
  {
     $update = array('status' => 0);
         $this->db->where('id_student',$token['id_student']);
        $this->db->where('id_group',$token['id_group']);
     if ($this->db->update('students',$update))
    {
         echo "Token asignado correctamente";
        }else{
         echo "Token no asignado";
    }
  }
   public function add_student_BD($information_student)
	  {  
      $hora = date('H:i');
	    $datos = array('name_student' => $information_student['name_student'],
	              'ap_paternal' => $information_student['ap_paternal'],
	              'ap_maternal' => $information_student['ap_maternal'],
	              'email_student' => $information_student['email'],
	              'status' => 0,
	              'id_group' => $this->session->userdata('id_group'),
	              'enrollment' => $information_student['enrollment'],
                'token_student' => hash('crc32b', $hora.$information_student['enrollment'].$this->session->userdata('id_group')));
	      if ($this->db->insert('students',$datos))
	        {
	          echo 'Alumno añadido correctamente';
	          }
	          else
	          {
	          echo 'No guardado';
	        }
	  }
    public function remove_student_BD($id_student)
    {
      $this->db->where('id_student', $id_student);
      if ($this->db->delete('students')) {
          echo 'Alumno eliminado correctamente';
          }else{
          echo 'No eliminado';
          }
    }
    public function edit_student_BD($info)
    {
      $id_student =  $info['id_student'];
       $update = array(
              'name_student' => $info['name_student'],
              'ap_paternal' => $info['ap_paternal'],
              'ap_maternal' => $info['ap_maternal'],
              'email_student' => $info['email'],
              'enrollment' => $info['enrollment']);
               $this->db->where('id_student', $id_student);
           if ($this->db->update('students',$update))
          {
               echo "Alumno editado correctamente";
              }else{
               echo "Alumno no editado";
          }

        }
    public function all_active_tokens_BD($id_group)
    {
       $update = array(
              'status' => 1);
               $this->db->where('id_group', $id_group);
           if ($this->db->update('students',$update))
          {
               echo "Accesos generado correctamente";
              }else{
               echo "Alumno no editado";
          }

    }
    public function all_deactivate_tokens_BD($id_group)
    {
       $update = array(
              'status' => 0);
               $this->db->where('id_group', $id_group);
           if ($this->db->update('students',$update))
          {
               echo "Accesos generado correctamente";
              }else{
               echo "Alumno no editado";
          }

    }

}