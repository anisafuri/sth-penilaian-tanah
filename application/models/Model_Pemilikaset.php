<?php

class Model_Pemilikaset extends CI_Model
{
  function validateId($id)
  {
    return $this->db->get_where('pemilik_aset', array('id_pemilik' => $id))->num_rows();
  }
  
  function getDataPemilikaset(){
    return $this->db->get('pemilik_aset');
  }

  function insertPemilikaset($data){
    $simpan = $this->db->insert('pemilik_aset',$data);
    if($simpan){
      return 1;
    } else{
      return 0;
    }
  }

  function getPemilikaset($id_pemilik){
    return $this->db->get_where('pemilik_aset', array('id_pemilik' => $id_pemilik));
  }

  function updatePemilikaset($data, $id_pemilik){
    $simpan = $this->db->update('pemilik_aset',$data,array('id_pemilik' => $id_pemilik));
    if($simpan){
      return 1;
    } else{
      return 0;
    }
  }

  function deletePemilikaset($id_pemilik){
    $hapus = $this->db->delete('pemilik_aset', array('id_pemilik' => $id_pemilik));
    if($hapus){
      return 1;
    } else{
      return 0;
    }
  }
}
?>
