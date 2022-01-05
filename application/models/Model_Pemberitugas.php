<?php

class Model_Pemberitugas extends CI_Model
{
  function validateId($id)
  {
    return $this->db->get_where('pemberi_tugas', array('id_pemberitugas' => $id))->num_rows();
  }

  function getDataPemberitugas(){
    return $this->db->get('pemberi_tugas');
  }

  function insertPemberitugas($data){
    $simpan = $this->db->insert('pemberi_tugas',$data);
    if($simpan){
      return 1;
    } else{
      return 0;
    }
  }

  function getPemberitugas($id_pemberitugas){
    return $this->db->get_where('pemberi_tugas', array('id_pemberitugas' => $id_pemberitugas));
  }

  function updatePemberitugas($data, $id_pemberitugas){
    $simpan = $this->db->update('pemberi_tugas',$data,array('id_pemberitugas' => $id_pemberitugas));
    if($simpan){
      return 1;
    } else{
      return 0;
    }
  }

  function deletePemberitugas($id_pemberitugas){
    $hapus = $this->db->delete('pemberi_tugas', array('id_pemberitugas' => $id_pemberitugas));
    if($hapus){
      return 1;
    } else{
      return 0;
    }
  }
}
?>
