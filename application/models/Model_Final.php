<?php

class Model_Final extends CI_Model
{

  function validateId($id)
  {
    return $this->db->get_where('laporan_final', array('id_report' => $id))->num_rows();
  }

  function insertFinal($data, $id_report){

    $simpan = $this->db->insert('laporan_final',$data);
    if($simpan){
      return 1;
    } else{
      return 0;
    }
  }

  function deleteFinal($id){
    $hapus = $this->db->delete('laporan_final', array('id_report' => $id));
    if($hapus){
      return 1;
    } else{
      return 0;
    }
  }

  function getDatafinal(){
    $this->db->select('laporan_final.id_report,laporan_final.id_draft,tgl_report,final_report,laporan_final.id_peg,nama_peg');
    $this->db->from('laporan_final');
    $this->db->join('draft_laporan','laporan_final.id_draft = draft_laporan.id_draft');
    $this->db->join('pegawai','laporan_final.id_peg = pegawai.id_peg');
    return $this->db->get();

  }

  function getFinal($id){
    $getdata = $this->db
              ->join('draft_laporan','laporan_final.id_draft = draft_laporan.id_draft')
              ->join('pegawai','laporan_final.id_peg = pegawai.id_peg')
              ->get_where('laporan_final',array('id_report' => $id));

    return $getdata;
  }

  function getLaporanfinal($dari, $sampai){
    $this->db->where('tgl_report >=',$dari);
    $this->db->where('tgl_report <=',$sampai);
    $this->db->select('laporan_final.id_report,laporan_final.id_draft,tgl_report,final_report,laporan_final.id_peg,nama_peg');
    $this->db->from('laporan_final');
    $this->db->join('draft_laporan','laporan_final.id_draft = draft_laporan.id_draft');
    $this->db->join('pegawai','laporan_final.id_peg = pegawai.id_peg');
    return $this->db->get();
  }
}
?>
