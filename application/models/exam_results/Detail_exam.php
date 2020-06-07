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
  public function open_question_incorrect_BD($id_answer,$id_student,$id_exam)
  {
       $update = array(
              'flag' => 0);
               $this->db->where('id_answer', $id_answer);
           if ($this->db->update('answers',$update))
          {
                $query = $this->db->query("select sum(flag) as total from answers where id_student=$id_student and id_exam=$id_exam and flag=1");
                  foreach ($query->result() as $row)
                  {
                          $correct= $row->total;
                  }
                  $query2 = $this->db->query("select * from answers where id_student=$id_student and id_exam=$id_exam");

                  $total_question = $query2->num_rows();
                  $porcentaje = (10 * $correct) / $total_question;
                  $sin_decimales = number_format($porcentaje, 1, '.', '');

                  $new_qualification = array(
                  'correct_answers' => $correct,
                  'qualification' => $sin_decimales,
                    );

                  $this->db->where('id_student', $id_student);
                  $this->db->where('id_exam', $id_exam);
                  $this->db->update('evaluation_detail',$new_qualification);
              }else{
               echo "Grupo no editado";
          }
  }
  public function open_question_correct_BD($id_answer,$id_student,$id_exam)
  {
           $update = array(
              'flag' => 1);
               $this->db->where('id_answer', $id_answer);
           if ($this->db->update('answers',$update))
          {
               $query = $this->db->query("select sum(flag) as total from answers where id_student=$id_student and id_exam=$id_exam and flag=1");
                  foreach ($query->result() as $row)
                  {
                          $correct= $row->total;
                  }
                  $query2 = $this->db->query("select * from answers where id_student=$id_student and id_exam=$id_exam");

                  $total_question = $query2->num_rows();
                  $porcentaje = (10 * $correct) / $total_question;
                  $sin_decimales = number_format($porcentaje, 1, '.', '');

                  $new_qualification = array(
                  'correct_answers' => $correct,
                  'qualification' => $sin_decimales,
                    );

                  $this->db->where('id_student', $id_student);
                  $this->db->where('id_exam', $id_exam);
                  $this->db->update('evaluation_detail',$new_qualification);
              }else{
               echo "Grupo no editado";
          }
  }

}

