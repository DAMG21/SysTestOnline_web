<?php
class exam_student extends CI_Model{
  function detail_exam_BD($id_exam,$id_student){
      $this->db->select('*');
      $this->db->where('r.id_reagents=a.id_question');
      $this->db->where('a.id_student',$id_student);
      $this->db->where('a.id_exam',$id_exam);
      $this->db->from("answers a, reagents_exam r");
      $data = $this->db->get();
      if ($data->num_rows() > 0)
        return $data;
  }
  public function detail_information_exam_BD($id_exam,$id_student)
  {

      $this->db->select('*');
      $this->db->where('e.id_exam=s.id_exam');
      $this->db->where('e.id_group=g.id_group');
      $this->db->where('e.id_exam',$id_exam);
      $this->db->where('e.id_student',$id_student);
      $this->db->where('e.id_student=t.id_student');
      $this->db->where('e.id_group',$this->session->userdata('id_group'));
      $this->db->from("evaluation_detail e, exams s, groups g, students t");
      $data = $this->db->get();
      if ($data->num_rows() > 0)
        return $data;
  }

}
