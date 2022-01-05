<?php

class Model_Pegawai extends CI_Model
{
  function validateId($id)
  {
    return $this->db->get_where('pegawai', array('id_peg' => $id))->num_rows();
  }

  function getDataPegawailevel(){

      $this->db->where('level !=','Admin');

      return $this->db->get('pegawai');
    }

  function getDataPegawai($level=null){
    if ($level) {
      $this->db->where('level',$level);
    }
      return $this->db->get('pegawai');
    }

  function insertPegawai($data){
    $simpan = $this->db->insert('pegawai',$data);
    if($simpan){
      return 1;
    } else{
      return 0;
    }
  }

  function getPegawai($id_peg){
    return $this->db->get_where('pegawai', array('id_peg' => $id_peg));
  }



  function updatePegawai($data, $id_peg){
    $simpan = $this->db->update('pegawai',$data,array('id_peg' => $id_peg));
    if($simpan){
      return 1;
    } else{
      return 0;
    }
  }

  function deletePegawai($id_peg){
    $hapus = $this->db->delete('pegawai', array('id_peg' => $id_peg));
    if($hapus){
      return 1;
    } else{
      return 0;
    }
  }

  function updatePassword($where, $data, $table){
    $this->db->where($where);
    $this->db->update($table, $data);
  }
}
?>
