<?php
class c_calificaciones extends CI_Controller{
  function __construct(){
    parent::__construct(); 
    $this->load->model('consultas/consultas_BD'); 
  }
  public function alumnos_registrados_IR()
  {
    $output = '';
    $query = '';
    if($this->input->post('query'))
    {
      $query = $this->input->post('query');
    }
    $data = $this->consultas_BD->total_alumnos_IR_BD($query);
    echo 'Total de alumnos activos: ' . $data->num_rows();
    $output .= '
    <center>
    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
            <tr role="row">
             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"><center>Matricula</center></th>
             
             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"><center>Nombre del alumno(a)</center></th>
             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"><center>Carrera</center></th>
             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"><center>Ver calificaciones materias</center></th>
             
            </tr>
    ';
    if($data->num_rows() > 0)
    {
      foreach($data->result() as $datos_inscripcion)
      {
        $output .= '
            <tr>
              <td><center>'.$datos_inscripcion->matricula.'</center></td>
              <td><center>'.$datos_inscripcion->ap_paterno.'&nbsp;'.$datos_inscripcion->ap_materno.'&nbsp;'.$datos_inscripcion->nombre.'</center></td>
              <td><center>'.$datos_inscripcion->refcarrera.'</center></td>
              <td style="width: 10px">
                <center>
                <button type="button" data-toggle="modal" data-target="#ver_calificaciones" class="btn btn-sm btn-primary" data-matricula="'.$datos_inscripcion->matricula.'">
                 <ion-icon name="eye"></ion-icon>
                 </button>
                 </center>
                 </td> 
            </tr>  
        ';
      }
    }
    else
    {
      $output .= '
      <tr>
        <td colspan="5">No se encontraron registros</td>
      </tr>';
    }
    $output .= '</table>';
    echo $output;
  }
  public function total_alumnos_extraordinarios()
  {
    $this->load->model('calificaciones/calificaciones_BD');
    $output = '';
    $query = '';
    if($this->input->post('query'))
    {
      $query = $this->input->post('query');
    }
    $data = $this->calificaciones_BD->total_alumnos_extraordinarios_BD($query);
    echo 'Total de alumnos encontrados: ' . $data->num_rows();
    $output .= '
    <center>
    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
            <tr role="row">
             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"><center>Matricula</center></th>
             
             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"><center>Nombre del alumno(a)</center></th>
             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"><center>Carrera</center></th>
             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"><center>Grupo</center></th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"><center>Materia reprobada</center></th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"><center>Calificacion</center></th>
             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"><center>Cambiar calificacion</center></th>
            </tr>
    ';
    if($data->num_rows() > 0)
    {
      foreach($data->result() as $datos_extraordinario)
      {
        $output .= '
            <tr>
              <td><center>'.$datos_extraordinario->matricula.'</center></td>
              <td><center>'.$datos_extraordinario->ap_paterno.'&nbsp;'.$datos_extraordinario->ap_materno.'&nbsp;'.$datos_extraordinario->nombre.'</center></td>
              <td><center>'.$datos_extraordinario->ref_carrera.'</center></td>
              <td><center>'.$datos_extraordinario->grupo.'</center></td>
              <td><center>'.$datos_extraordinario->refmateria.'</center></td>
              <td><center>'.$datos_extraordinario->final.'</center></td>
              <td style="width: 10px">
                <center>
                <button type="button" data-toggle="modal" data-target="#modificar_calificacion" class="btn btn-sm btn-primary" data-matricula="'.$datos_extraordinario->matricula.'" data-refmateria="'.$datos_extraordinario->refmateria.'" data-final="'.$datos_extraordinario->final.'"
                >
                 <ion-icon name="eye"></ion-icon>
                 </button>
                 </center>
                 </td> 
             
            </tr>  
        ';
      }
    }
    else
    {
      $output .= '
      <tr>
        <td colspan="5">No se encontraron registros</td>
      </tr>';
    }
    $output .= '</table>';
    echo $output;
  }

   public function total_grupos()
  {
    $output = '';
    $query = '';
    if($this->input->post('query'))
    {
      $query = $this->input->post('query');
    }
    $data = $this->consultas_BD->total_grupos_BD($query);
    $output .= '<center>
    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
            <tr role="row">
             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"><center>Grupo</center></th>
             
             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"><center>Nombre del tutor</center></th>
             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"><center>Modalidad</center></th>
             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"><center>Carrera</center></th>
             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"><center>Ver materias</center></th>
            </tr>
    ';
    if($data->num_rows() > 0)
    {
      echo 'Total de grupos activos: ' . $data->num_rows();
      foreach($data->result() as $datos_grupo)
      {
        $output .= '
            <tr>
              <td><center>'.$datos_grupo->grupo.'</center></td>
              <td><center>'.$datos_grupo->ap_paterno.'&nbsp;'.$datos_grupo->ap_materno.'&nbsp;'.$datos_grupo->nombre.'</center></td>
              <td><center>'.$datos_grupo->refmodalidad.'</center></td>
              <td><center>'.$datos_grupo->refcarrera.'</center></td>
              <td style="width: 10px">
                <center>
                <button type="button" data-toggle="modal" data-target="#ver_carga_materias" class="btn btn-sm btn-primary" data-refcarrera="'.$datos_grupo->refcarrera.'" data-grupo="'.$datos_grupo->grupo.'" data-refcuatri="'.$datos_grupo->refcuatri.'">
                 <ion-icon name="eye"></ion-icon>
                 </button>
                 </center>
                 </td> 
            </tr>  
        ';
      }
    }
    else
    {
      $output .= '
      <tr>
        <td colspan="5">No se encontraron registros</td>
      </tr>';
    }
    $output .= '</table>';
    echo $output;
  }
  public function total_alumnos_activos()
  {
    $this->load->model('consultas/consultas_BD'); 

    $output = '';
    $query = '';
    if($this->input->post('query'))
    {
      $query = $this->input->post('query');
    }
    $data = $this->consultas_BD->total_alumnos_IR_BD($query);
    echo 'Total de alumnos encontrados: ' . $data->num_rows();
    $output .= '
    <center>
    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
            <tr role="row">
             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"><center>Matricula</center></th>
             
             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"><center>Nombre del alumno(a)</center></th>
             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"><center>Carrera</center></th>
             <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"><center>Ver calificaciones</center></th>
            </tr>
    ';
    if($data->num_rows() > 0)
    {
      foreach($data->result() as $datos_inscripcion)
      {
        $nivel=$datos_inscripcion->refnivel;
        $output .= '
            <tr>
              <td><center>'.$datos_inscripcion->matricula.'</center></td>
              <td><center>'.$datos_inscripcion->ap_paterno.'&nbsp;'.$datos_inscripcion->ap_materno.'&nbsp;'.$datos_inscripcion->nombre.'</center></td>
              <td><center>'.$datos_inscripcion->refcarrera.'</center></td>
              <td style="width: 10px">
                <center>
                <button type="button" data-toggle="modal" data-target="#ver_calificaciones" class="btn btn-sm btn-primary" data-matricula="'.$datos_inscripcion->matricula.'"
                >
                 <ion-icon name="eye"></ion-icon>
                 </button>
                 </center>
                 </td> 
             
            </tr>  
        ';
      }
    }
    else
    {
      $output .= '
      <tr>
        <td colspan="5">No se encontraron registros</td>
      </tr>';
    }
    $output .= '</table>';
    echo $output;
  }
}
?>
