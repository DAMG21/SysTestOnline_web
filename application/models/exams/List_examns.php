<?php
class list_examns extends CI_Model
{

  public function list_exams_BD()
    {
      $this->db->select('*');
      $this->db->where('id_teacher',$this->session->userdata('id_teacher'));
      $this->db->from("exams");
      $data = $this->db->get();
      if ($data->num_rows() > 0)
        return $data;
    }

   public function add_exam_BD($name)
   {
   		$datos = array('exam' => $name['name_exam'],
                'id_teacher' => $this->session->userdata('id_teacher'));
	      if ($this->db->insert('exams',$datos))
	        {
	          echo 'Examen agregado correctamente';
	          }
	          else
	          {
	          echo 'No guardado';
	        }
   }
   public function remove_exam_BD($id_exam)
    {
      $this->db->where('id_exam', $id_exam);
      if ($this->db->delete('exams')) {
      	      $this->db->where('id_exam', $id_exam);
	          if ($this->db->delete('answers')) {
	          echo 'Examen eliminado correctamente';
	          }else{
	          echo 'No eliminado';
	          }

          }else{
          echo 'No eliminado';
          }
    }
    public function edit_exam_BD($info_exam)
    {
    	$id_exam =  $info_exam['id_exam'];
       $update = array('exam' => $info_exam['exam']);
               $this->db->where('id_exam', $id_exam);
           if ($this->db->update('exams',$update))
          {
               echo "Examen actualizado correctamente";
              }else{
               echo "Examen no editado";
          }
    }

}
