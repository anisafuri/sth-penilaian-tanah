<?php

class Model_Tanah extends CI_Model
{
  function validateId($id)
  {
    return $this->db->get_where('tanah', array('no_sertifikat' => $id))->num_rows();
  }

  function getDataTanah(){
    return $this->db->get('tanah');
  }

  function insertTanah($data){
    $simpan = $this->db->insert('tanah',$data);
    if($simpan){
      return 1;
    } else{
      return 0;
    }
  }

  function getTanah($id){
    return $this->db->get_where('tanah', array('no_sertifikat' => $id));
  }

  function updateTanah($data, $id){
    $simpan = $this->db->update('tanah',$data,array('no_sertifikat' => $id));
    if($simpan){
      return 1;
    } else{
      return 0;
    }
  }

  function deleteTanah($id){
    $hapus = $this->db->delete('tanah', array('no_sertifikat' => $id));
    if($hapus){
      return 1;
    } else{
      return 0;
    }
  }
}
?>
