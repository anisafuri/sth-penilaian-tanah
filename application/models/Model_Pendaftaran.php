<?php

class Model_Pendaftaran extends CI_Model
{
  function validateId($id)
  {
    return $this->db->get_where('pendaftaran', array('id_pendaftaran' => $id))->num_rows();
  }

  function cekTanah($id_pemilik){

      return $this->db->get_where('pendaftaran_detail_temp',array('id_pemilik' => $id_pemilik));
  }
  function cekLuas(){
      $id_pemilik = $this->input->post('id_pemilik');
      return $this->db->get_where('pedaftaran_detail_temp',array('id_pemilik' => $id_pemilik));
  }

  function getCount($year)
  {
    $query = $this->db->from('pendaftaran')
        ->where('YEAR(tgl_pendaftaran)', $year)
        ->get();

    return $query->num_rows();
  }

  function getLastPendaftaran($bulan, $tahun){

      $this->db->select('id_pendaftaran');
      $this->db->from('pendaftaran');
      $this->db->where('MONTH(tgl_pendaftaran)', $bulan);
      $this->db->where('YEAR(tgl_pendaftaran)', $tahun);
      $this->db->order_by('id_pendaftaran','desc');
      $this->db->limit(1);
      return $this->db->get();
    }

    function cekTanahtemp($no_sertifikat, $id_pemilik){
          return $this->db->get_where('pendaftaran_detail_temp', array('no_sertifikat' => $no_sertifikat,'id_pemilik' => $id_pemilik));
    }

    function insertTanahtemp($data){
          $this->db->insert('pendaftaran_detail_temp', $data);
    }

    function getDatatanahtemp($id_pemilik){
      $this->db->select('pendaftaran_detail_temp.no_sertifikat,hak_tanah,kabupaten,nama_pemegang_hak,luas,qty,id_pemilik');
      $this->db->from('pendaftaran_detail_temp');
      $this->db->where('id_pemilik', $id_pemilik);

      return $this->db->get();
    }

    function deleteTanahtemp($no_sertifikat, $id_pemilik){
      $hapus = $this->db->delete('pendaftaran_detail_temp', array('no_sertifikat' => $no_sertifikat, 'id_pemilik' => $id_pemilik));
      if($hapus){
        return 1;
      }
    }


    function insertPendaftaran($data,$id_pemilik,$id_pendaftaran){
      $simpan = $this->db->insert('pendaftaran',$data);
      if($simpan){
        $detailpendaftaran = $this->db->get_where('pendaftaran_detail_temp',array('id_pemilik' => $id_pemilik));
        $berhasil = 0;
        $error = 0;
        foreach($detailpendaftaran->result() as $d){
          $datadetail = array(
            'id_pendaftaran'=> $id_pendaftaran,
            'no_sertifikat' => $d->no_sertifikat,
            'hak_tanah' => $d->hak_tanah,
            'kabupaten' => $d->kabupaten,
            'nama_pemegang_hak' => $d->nama_pemegang_hak,
            'luas' => $d->luas,
            'qty' => $d->qty,
            'id_pemilik' => $d->id_pemilik
          );
          $simpandetail = $this->db->insert('pendaftaran_detail', $datadetail);
          if($simpandetail){
            $berhasil++;
          }else{
            $error++;
          }
        }
        if($error>0){
          $hapusdetailpendaftaran = $this->db->delete('pendaftaran_detail', array('id_pendaftaran' => $data['id_pendaftaran']));
          $hapusdatapendaftaran = $this->db->delete('pendaftaran', array('id_pendaftaran' => $data['id_pendaftaran']));
          $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
          <i class="fa fa-close mr-2"></i>
          Data Gagal Disimpan !</div>');
          redirect('Pendaftaran/inputPendaftaran');
        }else{
          $hapustemporary = $this->db->delete('pendaftaran_detail_temp', array('id_pemilik' => $data['id_pemilik']));
          $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
          <i class="fa fa-check mr-2"></i>
          Data Berhasil Disimpan !</div>');
          redirect('Pendaftaran');
        }
    }
  }

  function getDatapendaftaran(){
    $this->db->select('pendaftaran.id_pendaftaran,tgl_pendaftaran,jenis_jasa,pendaftaran.id_pemberitugas,nama_pemberitugas,kode_industri,npwp,pendaftaran.id_pemilik,nama_pemilik,pendaftaran.id_peg,nama_peg,izin_profesi,tujuan_penilaian,dasar_penilaian,pendekatan_penilaian,tgl_penilaian');
    $this->db->from('pendaftaran');
    $this->db->join('pemberi_tugas','pendaftaran.id_pemberitugas = pemberi_tugas.id_pemberitugas');
    $this->db->join('pemilik_aset','pendaftaran.id_pemilik = pemilik_aset.id_pemilik');
    $this->db->join('pegawai','pendaftaran.id_peg = pegawai.id_peg');
    $this->db->where('is_delete',0);
    return $this->db->get();

  }

  function detailPendaftaran($id){
    $detail = $this->db
              ->join('pemberi_tugas','pemberi_tugas.id_pemberitugas = pendaftaran.id_pemberitugas')
              ->join('pemilik_aset','pemilik_aset.id_pemilik = pendaftaran.id_pemilik')
              ->join('pegawai','pegawai.id_peg = pendaftaran.id_peg')
              ->join('tanah','tanah.no_sertifikat = pendaftaran.no_sertifikat')
              ->get_where('pendaftaran',array('id_pendaftaran' => $id));

    return $detail;
  }

  function deletePendaftaran($id)
  {
    $query = $this->db
        ->set('is_delete',1)
        ->where('id_pendaftaran', $id)
        ->update('pendaftaran');

    $querydetail = $this->db
        ->set('is_delete',1)
        ->where('id_pendaftaran', $id)
        ->update('pendaftaran_detail');

    if ($query && $querydetail) {
      return true;
    } else {
      return false;
    }

  }

  function getPendaftaran($id){
    $getdata = $this->db
              ->join('pemberi_tugas','pemberi_tugas.id_pemberitugas = pendaftaran.id_pemberitugas')
              ->join('pemilik_aset','pemilik_aset.id_pemilik = pendaftaran.id_pemilik')
              ->join('pegawai','pegawai.id_peg = pendaftaran.id_peg')
              ->get_where('pendaftaran',array('id_pendaftaran' => $id));

    return $getdata;
  }

  function getDetailpendaftaran($id){
    $detailpendaftaran = $this->db
              ->join('tanah','tanah.no_sertifikat = pendaftaran_detail.no_sertifikat')
              ->get_where('pendaftaran_detail',array('id_pendaftaran' => $id));

    return $detailpendaftaran;
  }

  function getLaporanpendaftaran($dari, $sampai){
    $this->db->select('pendaftaran.id_pendaftaran,tgl_pendaftaran,jenis_jasa,pendaftaran.id_pemberitugas,nama_pemberitugas,pendaftaran.id_pemilik,nama_pemilik,pendaftaran.id_peg,nama_peg,tujuan_penilaian,dasar_penilaian,pendekatan_penilaian,tgl_penilaian');
    $this->db->from('pendaftaran');
    $this->db->join('pemberi_tugas','pendaftaran.id_pemberitugas = pemberi_tugas.id_pemberitugas');
    $this->db->join('pemilik_aset','pendaftaran.id_pemilik = pemilik_aset.id_pemilik');
    $this->db->join('pegawai','pendaftaran.id_peg = pegawai.id_peg');
    $this->db->where('tgl_pendaftaran >=',$dari);
    $this->db->where('tgl_pendaftaran <=',$sampai);
    $this->db->where('is_delete',0);
    return $this->db->get();
  }
}
  ?>
