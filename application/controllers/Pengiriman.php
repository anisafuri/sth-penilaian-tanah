<?php
class Pengiriman extends CI_Controller

{
  function __construct()
  {
   parent::__construct();
   checklogin();
   cekNotif();
   $this->load->model('Model_Pengiriman');
   $this->load->model('Model_Final');
   $this->load->model('Model_Pegawai');
  }

  function index()
  {
    $data['pengiriman'] = $this->Model_Pengiriman->getDatapengiriman()->result();
    $this->template->load('template/template', 'pengiriman/view_pengiriman', $data);

  }

  function inputpengiriman(){
    $data['laporan_final'] = $this->Model_Final->getDatafinal()->result();
    $data['pegawai'] = $this->Model_Pegawai->getDataPegawai()->result();
    $this->template->load('template/template', 'pengiriman/input_pengiriman', $data);
  }

  function simpanpengiriman(){
    $id_pengiriman = $this->input->post('id_pengiriman');
    $validateId = $this->Model_Pengiriman->validateId($id_pengiriman);

    if ($validateId > 0) {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
        <i class="fa fa-close"></i>
        ID Sudah Terdaftar
        </div>');
        redirect("Pengiriman");
    } else {
    $tgl_pengiriman = $this->input->post('tgl_pengiriman');
    $id_peg = $this->input->post('id_peg');
    $penerima = $this->input->post('penerima');
    $alamat_penerima = $this->input->post('alamat_penerima');
    $up = $this->input->post('up');
    $isi = $this->input->post('isi');
    $id_report = $this->input->post('id_report');


    $data = array(
      'id_pengiriman' => $id_pengiriman,
      'tgl_pengiriman' => $tgl_pengiriman,
      'id_peg' => $id_peg,
      'penerima' => $penerima,
      'alamat_penerima' => $alamat_penerima,
      'up' => $up,
      'isi' => $isi,
      'id_report' => $id_report
    );

    $simpan = $this->Model_Pengiriman->insertPengiriman($data, $id_pengiriman);
    if($simpan == 1){
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Disimpan
      </div>');
      redirect("Pengiriman");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Disimpan
      </div>');
    }
  }
}

  function hapuspengiriman()
  {
    $id = $this->input->get('id');

    $delete = $this->Model_Pengiriman->deletePengiriman($id);

    if ($delete) {
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Dihapus
      </div>');
      redirect("Pengiriman");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Dihapus
      </div>');
    }

  }

  function cetakpengiriman()
  {
    $id = $this->input->get('id');
    $data['pengiriman'] = $this->Model_Pengiriman->getPengiriman($id)->row_array();
    $this->load->view('pengiriman/cetak_pengiriman', $data);
  }

  function laporanpengiriman()
  {
    $this->template->load('template/template', 'pengiriman/frm_laporanpengiriman');
  }

  function cetaklaporanpengiriman()
  {
    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');
    $data['dari'] = $dari;
    $data['sampai'] = $sampai;
    $data['laporanpengiriman'] = $this->Model_Pengiriman->getLaporanpengiriman($dari,$sampai)->result();
    if(isset($_POST['export'])){
      // Fungsi header dengan mengirimkan raw data excel
        header("Content-type: application/vnd-ms-excel");

        // Mendefinisikan nama file ekspor "hasil-export.xls"
        header("Content-Disposition: attachment; filename=Laporan Pengiriman.xls");
    }

    $this->load->view('pengiriman/cetak_laporanpengiriman', $data);
  }
}
?>
