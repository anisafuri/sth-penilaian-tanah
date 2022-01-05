<?php
class Final_Laporan extends CI_Controller

{
  function __construct()
  {
   parent::__construct();
   checklogin();
   cekNotif();
   $this->load->model('Model_Final');
   $this->load->model('Model_Draft');
  }

  function index()
  {
    $data['laporan_final'] = $this->Model_Final->getDatafinal()->result();
    $this->template->load('template/template', 'final/view_final', $data);

  }

  function inputfinal(){

    $data['draft_laporan'] = $this->Model_Draft->getDatadraft()->result();
    $this->template->load('template/template', 'final/input_final', $data);
  }

  function simpanfinal(){
    $id_report = $this->input->post('id_report');
    $validateId = $this->Model_Final->validateId($id_report);
    if ($validateId > 0) {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
        <i class="fa fa-close"></i>
        ID Sudah Terdaftar
        </div>');
        redirect("Final_Laporan");
    } else {
    $id_draft = $this->input->post('id_draft');
    $tgl_report = $this->input->post('tgl_report');
    $final_report = $this->input->post('final_report');
    $id_peg = $this->input->post('id_peg');
    //UPLOAD FILE
    $final_report_filename = null;
    $config['upload_path']          = './assets/upload/';
    $config['allowed_types']        = 'pdf';
    $config['max_size']             = '2048';

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('final_report')) {
      $error = array('error' => $this->upload->display_errors());
      echo json_encode($error);
      return false;
    } else {
        // $data = array('upload_data' => $this->upload->data());
        $final_report_filename = $this->upload->data('file_name');
    }

    $data = array(
      'id_report' => $id_report,
      'id_draft' => $id_draft,
      'tgl_report' => $tgl_report,
      'final_report' => $final_report_filename,
      'id_peg' => $id_peg

    );

    $simpan = $this->Model_Final->insertFinal($data, $id_report);
    if($simpan == 1){
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Disimpan
      </div>');
      redirect("Final_Laporan");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Disimpan
      </div>');
    }
  }
}

  function hapusfinal()
  {
    $id = $this->input->get('id');

    $delete = $this->Model_Final->deleteFinal($id);

    if ($delete) {
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Dihapus
      </div>');
      redirect("Final_Laporan");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Dihapus
      </div>');
    }

  }

  function cetakfinal()
  {
    $id = $this->input->get('id');
    $data['laporan_final'] = $this->Model_Final->getFinal($id)->row_array();
    $this->load->view('final/cetak_final', $data);
  }

  function laporanfinal()
  {
    $this->template->load('template/template', 'final/frm_laporanfinal');
  }

  function cetaklaporanfinal()
  {
    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');
    $data['dari'] = $dari;
    $data['sampai'] = $sampai;
    $data['laporanfinal'] = $this->Model_Final->getLaporanfinal($dari,$sampai)->result();
    if(isset($_POST['export'])){
      // Fungsi header dengan mengirimkan raw data excel
        header("Content-type: application/vnd-ms-excel");

        // Mendefinisikan nama file ekspor "hasil-export.xls"
        header("Content-Disposition: attachment; filename=Laporan Final.xls");
    }

    $this->load->view('final/cetak_laporanfinal', $data);
  }
}
?>
