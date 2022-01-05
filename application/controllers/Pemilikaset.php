<?php
class Pemilikaset extends CI_Controller

{
  function __construct()
  {
  	parent::__construct();
    checklogin();
    cekNotif();
    $this->load->model('Model_Pemilikaset');
  }

  function index()
  {
    $data['pemilik_aset'] = $this->Model_Pemilikaset->getDataPemilikaset()->result();
    $this->template->load('template/template', 'pemilik_aset/view_pemilik_aset', $data);
  }

  function inputpemilikaset(){
    $this->load->view('pemilik_aset/input_pemilik_aset');
  }

  function simpanpemilikaset(){
    $id_pemilik = $this->input->post('id_pemilik');
    $validateId = $this->Model_Pemilikaset->validateId($id_pemilik);

    if ($validateId > 0) {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
        <i class="fa fa-close"></i>
        ID Sudah Terdaftar
        </div>');
        redirect("Pemilikaset");
    } else {
    $nama_pemilik = $this->input->post('nama_pemilik');
    $alamat_pemilik = $this->input->post('alamat_pemilik');
    $telp_pemilik = $this->input->post('telp_pemilik');

    $data = array(
      'id_pemilik' => $id_pemilik,
      'nama_pemilik' => $nama_pemilik,
      'alamat_pemilik' => $alamat_pemilik,
      'telp_pemilik' => $telp_pemilik
    );

    $simpan = $this->Model_Pemilikaset->insertPemilikaset($data);
    if($simpan == 1){
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Disimpan
      </div>');
      redirect("Pemilikaset");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Disimpan
      </div>');
    }
  }
}

  function editpemilikaset(){
    $id_pemilik = $this->uri->segment(3);
    $data['pemilik_aset'] = $this->Model_Pemilikaset->getPemilikaset($id_pemilik)->row_array();
    $this->load->view('pemilik_aset/edit_pemilik_aset', $data);
  }

  function updatepemilikaset(){
    $id_pemilik = $this->input->post('id_pemilik');
    $nama_pemilik = $this->input->post('nama_pemilik');
    $alamat_pemilik = $this->input->post('alamat_pemilik');
    $telp_pemilik = $this->input->post('telp_pemilik');

    $data = array(
      'id_pemilik' => $id_pemilik,
      'nama_pemilik' => $nama_pemilik,
      'alamat_pemilik' => $alamat_pemilik,
      'telp_pemilik' => $telp_pemilik
    );

    $simpan = $this->Model_Pemilikaset->updatePemilikaset($data, $id_pemilik);
    if($simpan == 1){
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Diupdate
      </div>');
      redirect("Pemilikaset");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Diupdate
      </div>');
    }
  }

  function hapuspemilikaset(){
    $id_pemilik = $this->uri->segment(3);
    $hapus = $this->Model_Pemilikaset->deletePemilikaset($id_pemilik);
    if($hapus == 1){
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Dihapus
      </div>');
      redirect("Pemilikaset");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Dihapus
      </div>');
    }
  }
}
?>
