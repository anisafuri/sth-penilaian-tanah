<?php

class Model_Reviewing extends CI_Model
{

  function validateId($id)
  {
    return $this->db->get_where('reviewing', array('id_reviewing' => $id))->num_rows();
  }

  function insertReviewing($data, $id_reviewing){

    $simpan = $this->db->insert('reviewing',$data);
    if($simpan){
      return 1;
    } else{
      return 0;
    }
  }

  function deleteReviewing($id){
    $hapus = $this->db->delete('reviewing', array('id_reviewing' => $id));
    if($hapus){
      return 1;
    } else{
      return 0;
    }
  }

  function getDatareviewing($id = null, $level = null){
    $this->db->select('reviewing.id_reviewing,reviewing.id_peg,nama_peg,reviewing.tgl_reviewing,reviewing.id_penilaian,status_reviewing,komentar');
    $this->db->from('reviewing');
    $this->db->join('penilaian','reviewing.id_penilaian = penilaian.id_penilaian');
    $this->db->join('pegawai','reviewing.id_peg = pegawai.id_peg');
    if ($id) {
      if ($level == 'Penilai') {
        $this->db->where('penilaian.id_peg',$id);
      } else {
        $this->db->where('reviewing.id_peg',$id);
      }
    }
    return $this->db->get();

  }

  function getReviewing($id){
    $getdata = $this->db
              ->join('penilaian','reviewing.id_penilaian = penilaian.id_penilaian')
              ->join('pegawai','reviewing.id_peg = pegawai.id_peg')
              ->get_where('reviewing',array('id_reviewing' => $id));

    return $getdata;
  }

  function getLaporanreviewing($dari, $sampai){
    $this->db->where('tgl_reviewing >=',$dari);
    $this->db->where('tgl_reviewing <=',$sampai);
    $this->db->select('reviewing.id_reviewing,reviewing.id_peg,nama_peg,reviewing.tgl_reviewing,reviewing.id_penilaian,status_reviewing,komentar');
    $this->db->from('reviewing');
    $this->db->join('penilaian','reviewing.id_penilaian = penilaian.id_penilaian');
    $this->db->join('pegawai','penilaian.id_peg = pegawai.id_peg');
    return $this->db->get();
  }
}
?>
