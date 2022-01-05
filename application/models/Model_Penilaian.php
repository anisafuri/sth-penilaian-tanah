<?php

class Model_Penilaian extends CI_Model
{

  function validateId($id)
  {
    return $this->db->get_where('penilaian', array('id_penilaian' => $id))->num_rows();
  }

  function insertPenilaian($data, $id_penilaian){

    $simpan = $this->db->insert('penilaian',$data);
    if($simpan){
      return 1;
    } else{
      return 0;
    }
  }

  function deletePenilaian($id){
    $hapus = $this->db->delete('penilaian', array('id_penilaian' => $id));
    if($hapus){
      return 1;
    } else{
      return 0;
    }
  }

  function getDatapenilaian($id = null, $level = null){
    $this->db->select('penilaian.id_penilaian,tgl_perhitungan_nilai,penilaian.id_survei,penilaian.id_pendaftaran,penilaian.tgl_penilaian,penilaian.id_peg,nama_peg,keterangan_nilai,worksheet_tanah,tanah_deskripsi,ringkasan_penilaian');
    $this->db->from('penilaian');
    $this->db->join('pendaftaran','penilaian.id_pendaftaran = pendaftaran.id_pendaftaran');
    $this->db->join('survei','penilaian.id_survei = survei.id_survei');
    $this->db->join('pegawai','penilaian.id_peg = pegawai.id_peg');
    if ($id) {
      if ($level == 'Penilai') {
        $this->db->where('penilaian.id_peg',$id);
      } else {
        $this->db->where('penilaian.id_reviewer',$id);
      }
    }
    return $this->db->get();

  }

  function getPenilaian($id){
    $getdata = $this->db
              ->join('pendaftaran','penilaian.id_pendaftaran = pendaftaran.id_pendaftaran')
              ->join('survei','penilaian.id_survei = survei.id_survei')
              ->join('pegawai','penilaian.id_peg = pegawai.id_peg')
              ->get_where('penilaian',array('id_penilaian' => $id));

    return $getdata;
  }

  function getLaporanpenilaian($dari, $sampai, $id_peg){
    $this->db->select('penilaian.id_penilaian,tgl_perhitungan_nilai,penilaian.id_survei,penilaian.id_pendaftaran,penilaian.tgl_penilaian,penilaian.id_peg,nama_peg,keterangan_nilai,worksheet_tanah,tanah_deskripsi,ringkasan_penilaian');
    $this->db->from('penilaian');
    $this->db->join('pendaftaran','penilaian.id_pendaftaran = pendaftaran.id_pendaftaran');
    $this->db->join('survei','penilaian.id_survei = survei.id_survei');
    $this->db->join('pegawai','penilaian.id_peg = pegawai.id_peg');
    $this->db->where('penilaian.tgl_perhitungan_nilai >=',$dari);
    $this->db->where('penilaian.tgl_perhitungan_nilai <=',$sampai);
    $this->db->where('penilaian.id_peg',$id_peg);
    return $this->db->get();
  }
}
?>
