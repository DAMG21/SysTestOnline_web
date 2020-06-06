<?php
class detail_exam extends CI_Model
{

  public function list_students_BD($id_group,$id_exam)
    {
      $this->db->select('*');
      $this->db->where('e.id_student = s.id_student');
      $this->db->where('e.id_group=s.id_group');
      $this->db->where('e.id_exam=m.id_exam');
      $this->db->where('e.id_exam',$id_exam);
      $this->db->where('e.id_group',$id_group);
      $this->db->from("evaluation_detail e, students s, exams m");
      $data = $this->db->get();
      if ($data->num_rows() > 0)
        return $data;
    }

  public function information_exam_BD($id_group,$id_exam)
  {
  	  $this->db->select('*');
      $this->db->where('a.active=1');
      $this->db->where('a.id_group=g.id_group');
      $this->db->where('a.id_exam=e.id_exam');
      $this->db->where('e.id_exam',$id_exam);
      $this->db->where('a.id_group',$id_group);
      $this->db->from("assign_exam a, groups g, exams e");
      $data = $this->db->get();
      if ($data->num_rows() > 0)
        return $data;
  }
  public function exams_BD($id_group)
  {
      $this->db->where('e.id_exam=a.id_exam');
      $this->db->where('a.id_group',$id_group);
      $this->db->from("assign_exam a, exams e");
      $this->db->order_by('a.active', 'DESC');
      $data = $this->db->get();
      if ($data->num_rows() > 0)
        return $data;
  }
  public function delete_evaluation_BD($id_exam,$id_student,$id_detail)
  {
        $this->db->where('id_detail',$id_detail);
        $this->db->where('id_student',$id_student);
        $this->db->where('id_exam',$id_exam);
    if ($this->db->delete('evaluation_detail')) {
          $this->db->where('id_student',$id_student);
          $this->db->where('id_exam',$id_exam);
          $this->db->delete('answers');
      }else{
          echo "No se pudo eliminar la evaluacion";
      }
  }

}

