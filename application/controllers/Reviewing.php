<?php
class Reviewing extends CI_Controller

{
  function __construct()
  {
   parent::__construct();
   checklogin();
   cekNotif();
   $this->load->model('Model_Reviewing');
   $this->load->model('Model_Penilaian');
   $this->load->model('Model_Notification');
  }

  function index()
  {
    $id = $this->session->userdata('id_peg');
    $level = $this->session->userdata('level');
    $data['reviewing'] = $this->Model_Reviewing->getDatareviewing($id, $level)->result();
    $this->template->load('template/template', 'reviewing/view_reviewing', $data);

  }

  function inputreviewing(){

    $id = $this->session->userdata('id_peg');
    $data['penilaian'] = $this->Model_Penilaian->getDatapenilaian($id)->result();
    $this->template->load('template/template', 'reviewing/input_reviewing', $data);
  }

  function simpanreviewing(){
    $id_owner_penilaian = $this->input->post('id_owner_penilaian');
    $id_reviewing = $this->input->post('id_reviewing');
    $validateId = $this->Model_Reviewing->validateId($id_reviewing);

    if ($validateId > 0) {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
        <i class="fa fa-close"></i>
        ID Sudah Terdaftar
        </div>');
        redirect("Reviewing");
    } else {
    $id_peg = $this->input->post('id_peg');
    $tgl_reviewing = $this->input->post('tgl_reviewing');
    $id_penilaian = $this->input->post('id_penilaian');
    $status_reviewing = $this->input->post('status_reviewing');
    $komentar = $this->input->post('komentar');

    $data = array(
      'id_reviewing' => $id_reviewing,
      'id_peg' => $id_peg,
      'tgl_reviewing' => $tgl_reviewing,
      'id_penilaian' => $id_penilaian,
      'status_reviewing' => $status_reviewing,
      'komentar' => $komentar
    );

    $simpan = $this->Model_Reviewing->insertReviewing($data, $id_reviewing);
    if($simpan == 1){
      // Create notification
      $notif = $this->Model_Notification->create(array(
        'id_peg' => $id_owner_penilaian,
        'description' => 'Review baru telah diberikan',
        'link' => site_url('Reviewing/detailreviewing?id=' . $data['id_reviewing']),
        'created_at' => date('Y-m-d H:i:s'),
      ));
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Disimpan
      </div>');
      redirect("Reviewing");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Disimpan
      </div>');
    }
  }
}

  function hapusreviewing()
  {
    $id = $this->input->get('id');

    $delete = $this->Model_Reviewing->deleteReviewing($id);

    if ($delete) {
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Dihapus
      </div>');
      redirect("Reviewing");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Dihapus
      </div>');
    }

  }

  function cetakreviewing()
  {
    $id = $this->input->get('id');
    $data['reviewing'] = $this->Model_Reviewing->getReviewing($id)->row_array();
    $this->load->view('reviewing/cetak_reviewing', $data);
  }

  function detailreviewing(){
    $id = $this->input->get('id');
    $data['reviewing'] = $this->Model_Reviewing->getReviewing($id)->row_array();
    $this->template->load('template/template', 'reviewing/detail_reviewing', $data);
  }

  function laporanreviewing()
  {
    $this->template->load('template/template', 'reviewing/frm_laporanreviewing');
  }

  function cetaklaporanreviewing()
  {
    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');
    $data['dari'] = $dari;
    $data['sampai'] = $sampai;
    $data['laporanreviewing'] = $this->Model_Reviewing->getLaporanreviewing($dari,$sampai)->result();
    if(isset($_POST['export'])){
      // Fungsi header dengan mengirimkan raw data excel
        header("Content-type: application/vnd-ms-excel");

        // Mendefinisikan nama file ekspor "hasil-export.xls"
        header("Content-Disposition: attachment; filename=Laporan Reviewing.xls");
    }

    $this->load->view('reviewing/cetak_laporanreviewing', $data);
  }
}
?>
