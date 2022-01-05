<?php
class Pemberitugas extends CI_Controller

{
  function __construct()
  {
  	parent::__construct();
    checklogin();
    cekNotif();
    $this->load->model('Model_Pemberitugas');
  }

  function index()
  {
    $data['pemberi_tugas'] = $this->Model_Pemberitugas->getDataPemberitugas()->result();
    $this->template->load('template/template', 'pemberi_tugas/view_pemberi_tugas', $data);
  }

  function inputpemberitugas(){
    $this->load->view('pemberi_tugas/input_pemberi_tugas');
  }

  function simpanpemberitugas(){
    $id_pemberitugas = $this->input->post('id_pemberitugas');

    $validateId = $this->Model_Pemberitugas->validateId($id_pemberitugas);

    if ($validateId > 0) {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
        <i class="fa fa-close"></i>
        ID Sudah Terdaftar
        </div>');
        redirect("Pemberitugas");
    } else {
      $kode_industri = $this->input->post('kode_industri');
      $nama_pemberitugas = $this->input->post('nama_pemberitugas');
      $alamat_pemberitugas = $this->input->post('alamat_pemberitugas');
      $bidang_usaha = $this->input->post('bidang_usaha');
      $telp_pemberitugas = $this->input->post('telp_pemberitugas');
      $fax_pemberitugas = $this->input->post('fax_pemberitugas');
      $email_pemberitugas = $this->input->post('email_pemberitugas');
      $npwp = $this->input->post('npwp');

      $data = array(
        'id_pemberitugas' => $id_pemberitugas,
        'kode_industri' => $kode_industri,
        'nama_pemberitugas' => $nama_pemberitugas,
        'alamat_pemberitugas' => $alamat_pemberitugas,
        'bidang_usaha' => $bidang_usaha,
        'telp_pemberitugas' => $telp_pemberitugas,
        'fax_pemberitugas' => $fax_pemberitugas,
        'email_pemberitugas' => $email_pemberitugas,
        'npwp' => $npwp
      );

      $simpan = $this->Model_Pemberitugas->insertPemberitugas($data);
      if($simpan == 1){
        $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
        <i class="fa fa-check"></i>
        Data Berhasil Disimpan
        </div>');
        redirect("Pemberitugas");
      } else {
        $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
        <i class="fa fa-close"></i>
        Data Gagal Disimpan
        </div>');
        redirect("Pemberitugas");
      }
    }
  }

  function editpemberitugas(){
    $id_pemberitugas = $this->uri->segment(3);
    $data['pemberi_tugas'] = $this->Model_Pemberitugas->getPemberitugas($id_pemberitugas)->row_array();
    $this->load->view('pemberi_tugas/edit_pemberi_tugas', $data);
  }

  function updatepemberitugas(){
    $id_pemberitugas = $this->input->post('id_pemberitugas');
    $kode_industri = $this->input->post('kode_industri');
    $nama_pemberitugas = $this->input->post('nama_pemberitugas');
    $alamat_pemberitugas = $this->input->post('alamat_pemberitugas');
    $bidang_usaha = $this->input->post('bidang_usaha');
    $telp_pemberitugas = $this->input->post('telp_pemberitugas');
    $fax_pemberitugas = $this->input->post('fax_pemberitugas');
    $email_pemberitugas = $this->input->post('email_pemberitugas');
    $npwp = $this->input->post('npwp');

    $data = array(
      'id_pemberitugas' => $id_pemberitugas,
      'kode_industri' => $kode_industri,
      'nama_pemberitugas' => $nama_pemberitugas,
      'alamat_pemberitugas' => $alamat_pemberitugas,
      'bidang_usaha' => $bidang_usaha,
      'telp_pemberitugas' => $telp_pemberitugas,
      'fax_pemberitugas' => $fax_pemberitugas,
      'email_pemberitugas' => $email_pemberitugas,
      'npwp' => $npwp
    );

    $simpan = $this->Model_Pemberitugas->updatePemberitugas($data, $id_pemberitugas);
    if($simpan == 1){
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Diupdate
      </div>');
      redirect("Pemberitugas");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Diupdate
      </div>');
    }
  }

  function hapuspemberitugas(){
    $id_pemberitugas = $this->uri->segment(3);
    $hapus = $this->Model_Pemberitugas->deletePemberitugas($id_pemberitugas);
    if($hapus == 1){
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Dihapus
      </div>');
      redirect("Pemberitugas");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Dihapus
      </div>');
    }
  }
}
?>
