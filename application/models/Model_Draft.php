<?php

class Model_Draft extends CI_Model
{

  function validateId($id)
  {
    return $this->db->get_where('draft_laporan', array('id_draft' => $id))->num_rows();
  }

  function insertDraft($data, $id_draft){

    $simpan = $this->db->insert('draft_laporan',$data);
    if($simpan){
      return 1;
    } else{
      return 0;
    }
  }

  function deleteDraft($id){
    $hapus = $this->db->delete('draft_laporan', array('id_draft' => $id));
    if($hapus){
      return 1;
    } else{
      return 0;
    }
  }

  function getDatadraft(){
    $this->db->select('draft_laporan.id_draft,tgl_draft,draft_laporan.id_penilaian,id_pendaftaran,tanah_deskripsi,worksheet_tanah,jendela,covering_letter,pernyataan_penilai,asumsi,tinjauan,gambar_situasi,foto_foto,peta_lokasi,draft_laporan.id_peg,nama_peg');
    $this->db->from('draft_laporan');
    $this->db->join('penilaian','draft_laporan.id_penilaian = penilaian.id_penilaian');
    $this->db->join('pegawai','draft_laporan.id_peg = pegawai.id_peg');
    return $this->db->get();

  }

  function getDraft($id){
    $getdata = $this->db
              ->join('penilaian','draft_laporan.id_penilaian = penilaian.id_penilaian')
              ->join('pegawai','draft_laporan.id_peg = pegawai.id_peg')
              ->get_where('draft_laporan',array('id_draft' => $id));

    return $getdata;
  }

  function getLaporandraft($dari, $sampai){
    $this->db->where('tgl_draft >=',$dari);
    $this->db->where('tgl_draft <=',$sampai);
    $this->db->select('draft_laporan.id_draft,tgl_draft,draft_laporan.id_penilaian,id_pendaftaran,tanah_deskripsi,worksheet_tanah,jendela,covering_letter,pernyataan_penilai,asumsi,tinjauan,gambar_situasi,foto_foto,peta_lokasi,draft_laporan.id_peg,nama_peg');
    $this->db->from('draft_laporan');
    $this->db->join('penilaian','draft_laporan.id_penilaian = penilaian.id_penilaian');
    $this->db->join('pegawai','draft_laporan.id_peg = pegawai.id_peg');
    return $this->db->get();
  }
}
?>
