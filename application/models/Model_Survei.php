<?php

class Model_Survei extends CI_Model
{

  function checkId($id) {
   return $this->db->get_where('survei',array('id_survei' => $id));
 }

  function validateIdpembanding($no_pembanding)
  {
    return $this->db->get_where('pembanding', array('no_pembanding' => $no_pembanding))->num_rows();
  }

  function validateIdsurvei($id_survei)
  {
    return $this->db->get_where('survei', array('id_survei' => $id_survei))->num_rows();
  }

  function validateIdlingkungan($id_lingkungan)
  {
    return $this->db->get_where('lingkungan', array('id_lingkungan' => $id_lingkungan))->num_rows();
  }

  function cekPembanding(){
      $id_peg = $this->session->userdata('id_peg');
      return $this->db->get_where('pembanding_temp',array('id_peg' => $id_peg));
  }

  function cekPembandingtemp($no_pembanding, $id_peg){
        return $this->db->get_where('pembanding_temp', array('no_pembanding' => $no_pembanding,'id_peg' => $id_peg));
  }

  function insertPembandingtemp($data){
        $this->db->insert('pembanding_temp', $data);
  }

  function getDatapembandingtemp($id_peg){
    $this->db->select('pembanding_temp.no_pembanding,tgl_data,alamat_pembanding,luas_tanah_pembanding,legalitas_pembanding,
    bentuk_tanah_pembanding,elevasi_pembanding,lebar_jalan_pembanding,jarak_ke_tanah_dinilai,peruntukan_pembanding,
    karakteristik_ekonomi,harga_penawaran_transaksi,sumber_data,person,telepon,catatan,qty,id_peg');
    $this->db->from('pembanding_temp');
    $this->db->where('id_peg', $id_peg);

    return $this->db->get();
  }

  function deletePembandingtemp($no_pembanding, $id_peg){
    $hapus = $this->db->delete('pembanding_temp', array('no_pembanding' => $no_pembanding, 'id_peg' => $id_peg));
    if($hapus){
      return 1;
    }
  }

  function insertSurvei($data, $id_peg, $id_survei){
    $simpan = $this->db->insert('survei',$data);
    if($simpan){
      $detailsurvei = $this->db->get_where('pembanding_temp',array('id_peg' => $data['id_peg']));
      $berhasil = 0;
      $error = 0;
      foreach($detailsurvei->result() as $d){
        $datadetail = array(
          'no_pembanding'=> $d->no_pembanding,
          'tgl_data' => $d->tgl_data,
          'id_survei' => $data['id_survei'],
          'alamat_pembanding' => $d->alamat_pembanding,
          'luas_tanah_pembanding' => $d->luas_tanah_pembanding,
          'legalitas_pembanding' => $d->legalitas_pembanding,
          'bentuk_tanah_pembanding' => $d->bentuk_tanah_pembanding,
          'elevasi_pembanding' => $d->elevasi_pembanding,
          'lebar_jalan_pembanding' => $d->lebar_jalan_pembanding,
          'jarak_ke_tanah_dinilai' => $d->jarak_ke_tanah_dinilai,
          'peruntukan_pembanding' => $d->peruntukan_pembanding,
          'karakteristik_ekonomi' => $d->karakteristik_ekonomi,
          'harga_penawaran_transaksi' => $d->harga_penawaran_transaksi,
          'sumber_data' => $d->sumber_data,
          'person' => $d->person,
          'telepon' => $d->telepon,
          'catatan' => $d->catatan,
          'qty' => $d->qty,
          'id_peg' => $d->id_peg
        );
        $simpandetail = $this->db->insert('pembanding', $datadetail);
        if($simpandetail){
          $berhasil++;
        }else{
          $error++;
        }
      }
      if($error>0){
        $hapusdetailsurvei = $this->db->delete('pembanding', array('id_survei' => $data['id_survei']));
        $hapusdatasurvei = $this->db->delete('survei', array('id_survei' => $data['id_survei']));
        $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
        <i class="fa fa-close mr-2"></i>
        Data Gagal Disimpan !</div>');
        redirect('Survei/inputsurvei');
      }else{
        $hapustemporary = $this->db->delete('pembanding_temp', array('id_peg' => $data['id_peg']));
        if($hapustemporary){
          $id_lingkungan = $this->input->post('id_lingkungan');
          $validateIdlingkungan = $this->Model_Survei->validateIdlingkungan($id_lingkungan);

          if ($validateIdlingkungan > 0) {
            $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
              <i class="fa fa-close"></i>
              ID Sudah Terdaftar
              </div>');
              redirect('Survei/inputsurvei');
          } else {
          $id_survei = $this->input->post('id_survei');
          $karakteristik_lingkungan = $this->input->post('karakteristik_lingkungan');
          $kepadatan_pengembangan = $this->input->post('kepadatan_pengembangan');
          $pertumbuhan = $this->input->post('pertumbuhan');
          $sarana = $this->input->post('sarana');
          $prasarana = $this->input->post('prasarana');

          $data = array(
            'id_lingkungan' => $id_lingkungan,
            'id_survei' => $data['id_survei'],
            'karakteristik_lingkungan' => $karakteristik_lingkungan,
            'kepadatan_pengembangan' => $kepadatan_pengembangan,
            'pertumbuhan' => $pertumbuhan,
            'sarana' => $sarana,
            'prasarana' => $prasarana,
            'id_peg' => $data['id_peg']
          );

          $simpanlingkungan = $this->db->insert('lingkungan', $data, $id_peg, $id_survei);
          if($simpanlingkungan){
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            <i class="fa fa-check mr-2"></i>
            Data Berhasil Disimpan !</div>');
            redirect('Survei/inputsurvei');
          }else{
            $hapusdetailsurvei = $this->db->delete('pembanding', array('id_survei' => $data['id_survei']));
            $hapusdatasurvei = $this->db->delete('survei', array('id_survei' => $data['id_survei']));
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
            <i class="fa fa-close mr-2"></i>
            Data Gagal Disimpan !</div>');
            redirect('Survei/inputsurvei');
          }
        }
        }else{
          $hapusdetailsurvei = $this->db->delete('pembanding', array('id_survei' => $data['id_survei']));
          $hapusdatasurvei = $this->db->delete('survei', array('id_survei' => $data['id_survei']));
          $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
          <i class="fa fa-close mr-2"></i>
          Data Gagal Disimpan !</div>');
          redirect('Survei/inputsurvei');
        }
      }
    }
  }



  function getDatasurvei($id = null){
    $this->db->select('survei.id_survei,tgl_inspeksi,survei.id_pendaftaran,survei.id_lingkungan,
    survei.id_peg,nama_peg,bentuk_tanah,elevasi,batasan_thd_tanah,
    peraturan_tata_kota,pemenuhan_thd_peraturan_tatakota');
    $this->db->from('survei');
    $this->db->join('pendaftaran','survei.id_pendaftaran = pendaftaran.id_pendaftaran');
    $this->db->join('lingkungan','survei.id_lingkungan = lingkungan.id_lingkungan');
    $this->db->join('pegawai','survei.id_peg = pegawai.id_peg');
    if ($id) {
      $this->db->where('survei.id_peg',$id);
    }
    return $this->db->get();

  }

  function deleteSurvei($id_survei)
  {
    $hapus =  $this->db->delete('survei', array('id_survei' => $id_survei));
    if($hapus){
      $hapusdetail = $this->db->delete('pembanding', array('id_survei' => $id_survei));
      if ($hapusdetail){
        $hapuslingkungan = $this->db->delete('lingkungan', array('id_survei' => $id_survei));
        if($hapuslingkungan){
          $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
          <i class="fa fa-check"></i>
          Data Berhasil Dihapus
          </div>');
          redirect("Survei");
        }
      }
    }
  }


  function getSurvei($id_survei){
    $this->db->select('survei.id_survei,tgl_inspeksi,survei.id_pendaftaran,survei.id_lingkungan,karakteristik_lingkungan,kepadatan_pengembangan,pertumbuhan,sarana,prasarana,
    survei.id_peg,nama_peg,bentuk_tanah,elevasi,batasan_thd_tanah,
    peraturan_tata_kota,pemenuhan_thd_peraturan_tatakota');
    $this->db->from('survei');
    $this->db->join('pendaftaran','survei.id_pendaftaran = pendaftaran.id_pendaftaran');
    $this->db->join('lingkungan','survei.id_lingkungan = lingkungan.id_lingkungan');
    $this->db->join('pegawai','survei.id_peg = pegawai.id_peg');
    $this->db->where('survei.id_survei',$id_survei);
    return $this->db->get();
  }

  function getDetailsurvei($id_survei){
    $detailsurvei = $this->db
              ->get_where('pembanding',array('id_survei' => $id_survei));

    return $detailsurvei;
  }

  function getLaporansurvei($dari, $sampai, $id_peg){
    $this->db->select('survei.id_survei,tgl_inspeksi,survei.id_pendaftaran,survei.id_lingkungan,
    survei.id_peg,nama_peg,bentuk_tanah,elevasi,batasan_thd_tanah,
    peraturan_tata_kota,pemenuhan_thd_peraturan_tatakota');
    $this->db->from('survei');
    $this->db->join('pendaftaran','survei.id_pendaftaran = pendaftaran.id_pendaftaran');
    $this->db->join('lingkungan','survei.id_lingkungan = lingkungan.id_lingkungan');
    $this->db->join('pegawai','survei.id_peg = pegawai.id_peg');
    $this->db->where('survei.tgl_inspeksi >=',$dari);
    $this->db->where('survei.tgl_inspeksi <=',$sampai);
    $this->db->where('survei.id_peg',$id_peg);
    return $this->db->get();
  }

}
?>
