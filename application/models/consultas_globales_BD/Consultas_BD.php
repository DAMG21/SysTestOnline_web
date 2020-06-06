<?php
class consultas_BD extends CI_Model
{
  public function assigned_subjects()
  {
      $this->db->select(' a.refplantel, a.ref_modalidad, a.refcarrera, a.refnivel, a.refmateria, a.refgrupo, a.refcuatri, a.refprofesor, a.vigente, d.clave, d.ap_paterno, d.ap_materno, d.nombre');
      $this->db->where('a.refprofesor=d.clave');
      $this->db->where('a.vigente', 1);
      $this->db->where('a.refprofesor',$this->session->userdata('clave'));
      $this->db->from("asigna_materia a, docentes d");
      $data = $this->db->get();
      if ($data->num_rows() > 0)
        return $data; 
  }

public function list_students_BD($data_search)
{
  $data = array(
            'i.refcarrera' => $data_search['career'],
            'i.refgrupo' => $data_search['group'],
            'i.refnivel' => $data_search['level']);
  $this->db->select(' q.fecha_ipparcial,q.fecha_fpparcial,q.fecha_isparcial,q.fecha_fsparcial,q.fecha_itparcial,q.fecha_ftparcial ,q.cuatrimestre,i.refnivel, i.refgrupo, i.refcarrera ,a.matricula,a.ap_paterno,a.ap_materno,a.nombre,i.matricula,i.refcuatri');
      $this->db->where('a.matricula=i.matricula');
      $this->db->where('q.cuatrimestre=i.refcuatri');
      $this->db->where($data);
      $this->db->where('i.vigente', 1);
      $this->db->from("alumnos a,inscripcion i, cuatrimestre q");
      $data = $this->db->get();
      if ($data->num_rows() > 0)
        return $data; 
}

   public function capture_partial1_BD($data_capture)
  {
    $periodo =  $data_capture['period'];
    $quarter =  $data_capture['quarter'];
    $group =  $data_capture['group'];
    $subject =  $data_capture['subject'];
    $enrollment =  $data_capture['enrollment'];

    $datos = array('refcuatri' => $periodo,
            'nivel' => $quarter,
            'grupo' => $group,
            'refmateria' => $subject,
            'refalumno' => $enrollment,
            'parcial1' => $data_capture['qualification'],
            'faltas1' => $data_capture['faults']);

    $query = $this->db->query("SELECT refcuatri,nivel,grupo,refmateria,refalumno,parcial1 FROM calif_parciales WHERE refcuatri='$periodo' AND nivel='$quarter' AND grupo='$group' AND  refmateria='$subject' AND refalumno='$enrollment'");

    if ($query->num_rows()==0){
     if ($this->db->insert('calif_parciales',$datos))
    {
         echo "Calificacion asignada correctamente";
        }else{
         echo "Calificacion no asignada";
    }

    }

      }

  public function capture_partial2_BD($data_capture)
  {
    $periodo =  $data_capture['period'];
    $quarter =  $data_capture['quarter'];
    $group =  $data_capture['group'];
    $subject =  $data_capture['subject'];
    $enrollment =  $data_capture['enrollment'];

     $update = array(
            'parcial2' => $data_capture['qualification'],
            'faltas2' => $data_capture['faults']);
     $where = array('refcuatri' => $periodo,
            'nivel' => $quarter,
            'grupo' => $group,
            'refmateria' => $subject,
            'refalumno' => $enrollment);

         $this->db->where($where);
     if ($this->db->update('calif_parciales',$update))
    {
         echo "Calificacion asignada correctamente";
        }else{
         echo "Calificacion no asignada";
    }

      }
  public function capture_partial3_BD($data_capture)
  {
    $periodo =  $data_capture['period'];
    $quarter =  $data_capture['quarter'];
    $group =  $data_capture['group'];
    $subject =  $data_capture['subject'];
    $enrollment =  $data_capture['enrollment'];

     $update = array(
            'parcial3' => $data_capture['qualification'],
            'faltas3' => $data_capture['faults']);
     $where = array('refcuatri' => $periodo,
            'nivel' => $quarter,
            'grupo' => $group,
            'refmateria' => $subject,
            'refalumno' => $enrollment);

         $this->db->where($where);
     if ($this->db->update('calif_parciales',$update))
    {
         echo "Calificacion asignada correctamente";
        }else{
         echo "Calificacion no asignada";
    }

  }
   public function list_students_qualifications_BD($data_search)
  {
      $this->db->distinct();
      $this->db->select('i.refcarrera,c.nivel,c.parcial3,c.parcial2, c.parcial1, a.matricula,a.ap_paterno,a.ap_materno,a.nombre,i.matricula,i.refcuatri');
      $this->db->where('c.refmateria',$data_search['subject']);
      $this->db->where('i.refgrupo',$data_search['group']);
      $this->db->where('i.refcarrera',$data_search['career']);
      $this->db->where('i.vigente', 1);
      $this->db->where('a.matricula=i.matricula');
      $this->db->where('c.refalumno=a.matricula');
      $this->db->from("alumnos a,inscripcion i, calif_parciales c");
      $data = $this->db->get();
      if ($data->num_rows() > 0)
        return $data;  
  }

  public function t_consulta_docentes_BD($query)
  {
   $this->db->select("*");
    //$this->db->where('vigente','1');
    $this->db->from("docentes");
    if($query != '')
    {
      $this->db->like('clave', $query);
      $this->db->or_like('nombre', $query);     
    }
    $this->db->order_by('clave', 'DESC');
    return $this->db->get(); 
  }
  public function t_consulta_carreras_BD($query)
  {
   $this->db->select("*");
    //$this->db->where('vigente','1');
    $this->db->from("carreras");
    if($query != '')
    {
      $this->db->like('clave', $query);
      $this->db->or_like('carrera', $query);     
    }
    $this->db->order_by('clave', 'DESC');
    return $this->db->get(); 
  }

  public function t_consulta_materias_BD($query)
  {
   $this->db->select("*");
    //$this->db->where('vigente','1');
    $this->db->from("materias");
    if($query != '')
    {
      $this->db->like('clave', $query);
      $this->db->or_like('ref_carrera', $query);     
    }
    $this->db->order_by('nivel', 'DESC');
    return $this->db->get(); 
  }

  public function t_consulta_asigna_materias_BD($query)
  {
    $this->db->select("a.vigente,a.idasignacion, a.refnivel, a.refcarrera,a.refcuatri, a.refmateria, a.refgrupo, a.refprofesor, d.clave, d.nombre, d.ap_paterno, d.ap_materno");
    $this->db->where('d.clave=a.refprofesor');
    $this->db->where('a.vigente',1);
    $this->db->from("asigna_materia a, docentes d");
    if($query != '')
    {
      $this->db->like('a.refcarrera', $query);
    }
    $this->db->order_by('a.refnivel', 'DESC');
    return $this->db->get(); 
  }
}