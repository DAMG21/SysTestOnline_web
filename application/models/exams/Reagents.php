<?php
class Reagents extends CI_Model
{

  public function reagents_BD($id_exam)
    {
      $this->db->select('*');
      $this->db->where('id_exam',$id_exam);
      $this->db->from("reagents_exam");
      //$this->db->limit(1); 
      //$this->db->order_by('id_exam', 'RANDOM');
      $this->db->order_by('id_reagents DESC');
      $data = $this->db->get();

      if ($data->num_rows() > 0)
        return $data;
    }
  public function add_reagent_BD($data)
	{
		 if ($this->db->insert("reagents_exam",$data)) {
	        echo 'Reactivo agregado correctamente';
	        }else{
	        echo 'No capturado!';
	        }
	    return true;
	}
   public function remove_reagents_BD($id_reagents,$rute_exercise)
    {
      unlink($rute_exercise); 
      $this->db->where('id_reagents', $id_reagents);
      if ($this->db->delete('reagents_exam')) {
          echo 'Reactivo eliminado correctamente';
          }else{
          echo 'No eliminado';
          }
    }
   public function update_reagent_BD($update,$id_reagent)
    {
               $this->db->where('id_reagents', $id_reagent);
           if ($this->db->update('reagents_exam',$update))
          {
               echo "Reactivo actualizado correctamente";
              }else{
               echo "Reactivo no editado";
          }
    }
     public function assign_exam_BD($exam)
      { 
        $datos = array(
                'id_exam' => $exam['id_exam'],
                'id_group' =>$exam['id_group'],
                'active' => 1,
              );

         if ($this->db->insert("assign_exam",$datos)) {
              echo 'Examen asignado correctamente';
              }else{
              echo 'No capturado!';
              }
          return true;
      }
    public function assign_configuration_BD($configuration)
    {
      $update = array(
                'min' => $configuration['min'],
                'seg' => $configuration['seg'],
                'show_reagents' => $configuration['show_reagents'],
              );
          $this->db->where('id_group', $this->session->userdata('id_group'));
          if ($this->db->update('groups',$update))
          {
               echo "Configuracion guardada";
              }else{
               echo "Reactivo no editado";
          }
    }
    public function desassign_exam_BD($id_assign)
      {
        $update = array(
              'active' => 0);

        $this->db->where('id_assign', $id_assign);
        if ($this->db->update('assign_exam',$update)) {
            echo 'Asignacion eliminada correctamente';
            }else{
            echo 'No eliminado';
            }
      }
    public function remove_assign_exam_group_BD($id_assign)
    {
      $this->db->where('id_assign', $id_assign);
      if ($this->db->delete('assign_exam')) {
          echo 'Examen eliminado correctamente';
          }else{
          echo 'No eliminado';
          }
    }

}
