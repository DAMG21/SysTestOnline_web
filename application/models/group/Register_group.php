<?php
class register_group extends CI_Model
{
  public function register_group_BD($group)
  {
    $datos = array('detail_group' => $group['group'],
              'institution' => $group['insti'],
              'id_teacher' => $this->session->userdata('id_teacher'),
              'subject' => $group['subject'],
              'quarter' => $group['quarter'],
              'period' => $group['period']);
      
      if ($this->db->insert('groups',$datos))
        {
          echo 'Grupo registrado correctamente';
          }
          else
          {
          echo 'No guardado';
        }
  }
  public function detail_group_BD()
    {
      $this->db->select('*');
      $this->db->where('id_teacher',$this->session->userdata('id_teacher'));
      $this->db->from("groups");
      $data = $this->db->get();
      if ($data->num_rows() > 0)
        return $data;
    }
    public function detail_configuration_group_BD()
    {
      $this->db->select('*');
      $this->db->where('id_group',$this->session->userdata('id_group'));
      $this->db->from("groups");
      $data = $this->db->get();
      if ($data->num_rows() > 0)
        return $data;
    }
    public function remove_group_BD($id_group)
    {
      $this->db->where('id_group', $id_group);
      if ($this->db->delete('groups')) {
                $this->db->where('id_group', $id_group);
                if ($this->db->delete('students')) {
                  $this->db->where('id_group', $id_group);
                  if ($this->db->delete('evaluation_detail')) {
                echo 'Grupo eliminado correctamente del sistema';
                }else{
                  echo '';
                  }
                }else{
                  echo '';
                  }

          }else{
          echo '';
          }
    }


  public function edit_group_BD($edit_group)
    {
      $id_group =  $edit_group['id_group'];
       $update = array(
              'detail_group' => $edit_group['group'],
              'subject' => $edit_group['subject'],
              'institution' => $edit_group['insti'],
              'period' => $edit_group['period'],
              'quarter' => $edit_group['quarter']);
               $this->db->where('id_group', $id_group);
           if ($this->db->update('groups',$update))
          {
               echo "Grupo editado correctamente";
              }else{
               echo "Grupo no editado";
          }

        }
  public function view_group_BD()
  {
      $this->db->select('*');
      $this->db->where('id_group',$this->session->userdata('id_group'));
      $this->db->from("students");
      $data = $this->db->get();
      if ($data->num_rows() > 0)
        return $data;
  }
  public function exams_BD()
  {
      $this->db->select('*');
      $this->db->where('id_teacher',$this->session->userdata('id_teacher'));
      $this->db->from("exams");
      $data = $this->db->get();
      if ($data->num_rows() > 0)
        return $data;
  }
  public function assign_exams_BD()
  {
      $this->db->select('e.id_exam, a.id_exam, e.exam, a.id_assign');
      $this->db->where('a.id_group',$this->session->userdata('id_group'));
      $this->db->where('e.id_exam=a.id_exam');
      $this->db->where('a.active=1');
      $this->db->from("exams e, assign_exam a");
      $data = $this->db->get();
      if ($data->num_rows() > 0)
        return $data;
  }

}
