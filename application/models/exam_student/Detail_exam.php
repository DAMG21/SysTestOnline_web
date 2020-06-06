<?php
class detail_exam extends CI_Model
{

  public function information_exam_BD()
    {
      $this->db->select('e.id_exam,a.id_group,e.exam, g.detail_group,g.show_reagents,g.subject,g.institution,g.period,g.quarter,t.name_teacher,t.ap_patern,t.ap_matern,t.email_teacher, g.min, g.seg');
      $this->db->where('a.id_exam=e.id_exam');
      $this->db->where('g.id_group=a.id_group');
      $this->db->where('e.id_teacher=t.id_teacher');
      $this->db->where('a.active=1');
      $this->db->where('a.id_group',$this->session->userdata('id_group'));
      $this->db->from("assign_exam a, exams e, groups g, teachers t");
      $data = $this->db->get();
      if ($data->num_rows() > 0)
        return $data;
    }

   public function reagents_exam_BD()
      {
        $this->db->select('*');
        $this->db->where('a.id_exam=e.id_exam');
        $this->db->where('e.id_exam=r.id_exam');
        $this->db->where('a.active=1');
        $this->db->where('a.id_group',$this->session->userdata('id_group'));
        $this->db->from("assign_exam a, exams e, reagents_exam r");
        $this->db->limit($this->session->userdata('show_reagents')); 
        $this->db->order_by('e.id_assign', 'RANDOM');

        $data = $this->db->get();
        if ($data->num_rows() > 0)
          return $data;

      }

  public function save_answers($validation)
  {
    foreach($validation as $id_pregunta=>$respuesta)
      {
        $datos = array('answer' => $respuesta,
                'id_student' => $this->session->userdata('id_student'),
                'id_exam' => $this->session->userdata('id_exam'),
                'id_group' => $this->session->userdata('id_group'),
                'id_question' => $id_pregunta);
          if ($this->db->insert('answers',$datos))
            {
              echo '';
                  $status = array(
                          'status' =>0);
                  $this->db->where('id_student', $this->session->userdata('id_student'));
               if ($this->db->update('students',$status))
                  {
                   echo "";
                  }else{
                   echo "";
              }

              }
              else
              {
              echo '';
            }

      }

  }
  public function save_detail_exam($total_preguntas,$correctas,$sin_decimales)
  {

    $datos = array('id_student' => $this->session->userdata('id_student'),
                'id_exam' => $this->session->userdata('id_exam'),
                'id_group' => $this->session->userdata('id_group'),
                'total_questions' => $total_preguntas,
                'correct_answers' => $correctas,
                'qualification' => $sin_decimales);

          if ($this->db->insert('evaluation_detail',$datos))
            {
              echo "";
               }else{
              echo "";
               }

  }

}
