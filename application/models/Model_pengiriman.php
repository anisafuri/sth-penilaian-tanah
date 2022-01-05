<?php

class Model_Pengiriman extends CI_Model
{

  function validateId($id)
  {
    return $this->db->get_where('pengiriman', array('id_pengiriman' => $id))->num_rows();
  }

  function insertPengiriman($data, $id_pengiriman){

    $simpan = $this->db->insert('pengiriman',$data);
    if($simpan){
      return 1;
    } else{
      return 0;
    }
  }

  function deletePengiriman($id){
    $hapus = $this->db->delete('pengiriman', array('id_pengiriman' => $id));
    if($hapus){
      return 1;
    } else{
      return 0;
    }
  }

  function getDatapengiriman(){
    $this->db->select('pengiriman.id_pengiriman,tgl_pengiriman,pengiriman.id_peg,nama_peg,penerima,alamat_penerima,up,isi,pengiriman.id_report,final_report');
    $this->db->from('pengiriman');
    $this->db->join('laporan_final','pengiriman.id_report = laporan_final.id_report');
    $this->db->join('pegawai','pengiriman.id_peg = pegawai.id_peg');
    return $this->db->get();

  }

  function getPengiriman($id){
    $getdata = $this->db
              ->join('laporan_final','pengiriman.id_report = laporan_final.id_report')
              ->join('pegawai','pengiriman.id_peg = pegawai.id_peg')
              ->get_where('pengiriman',array('id_pengiriman' => $id));

    return $getdata;
  }

  function getLaporanpengiriman($dari, $sampai){
    $this->db->where('tgl_pengiriman >=',$dari);
    $this->db->where('tgl_pengiriman <=',$sampai);
    $this->db->select('pengiriman.id_pengiriman,tgl_pengiriman,pengiriman.id_peg,nama_peg,penerima,alamat_penerima,up,isi,pengiriman.id_report,final_report');
    $this->db->from('pengiriman');
    $this->db->join('laporan_final','pengiriman.id_report = laporan_final.id_report');
    $this->db->join('pegawai','pengiriman.id_peg = pegawai.id_peg');
    return $this->db->get();
  }
}
?>
