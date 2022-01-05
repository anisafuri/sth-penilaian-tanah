<?php
class Penilaian extends CI_Controller

{
  function __construct()
  {
   parent::__construct();
   checklogin();
   cekNotif();
   $this->load->model('Model_Penilaian');
   $this->load->model('Model_Pendaftaran');
   $this->load->model('Model_Survei');
   $this->load->model('Model_Pegawai');
   $this->load->model('Model_Notification');
  }

  function index()
  {
    $id = $this->session->userdata('id_peg');
    $level = $this->session->userdata('level');
    $data['penilaian'] = $this->Model_Penilaian->getDatapenilaian($id, $level)->result();
    $this->template->load('template/template', 'penilaian/view_penilaian', $data);

  }

  function inputpenilaian(){
    $data['pegawai'] = $this->Model_Pegawai->getDataPegawai('Reviewer')->result();
    $data['pendaftaran'] = $this->Model_Pendaftaran->getDatapendaftaran()->result();
    $data['survei'] = $this->Model_Survei->getDatasurvei()->result();
    $this->template->load('template/template', 'penilaian/input_penilaian', $data);
  }

  function simpanpenilaian(){
    $id_penilaian = $this->input->post('id_penilaian');
    $validateId = $this->Model_Penilaian->validateId($id_penilaian);

    if ($validateId > 0) {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
        <i class="fa fa-close"></i>
        ID Sudah Terdaftar
        </div>');
        redirect("Penilaian");
    } else {
    $tgl_perhitungan_nilai = $this->input->post('tgl_perhitungan_nilai');
    $id_survei = $this->input->post('id_survei');
    $id_pendaftaran = $this->input->post('id_pendaftaran');
    $tgl_penilaian = $this->input->post('tgl_penilaian');
    $id_peg = $this->input->post('id_peg');
    $id_reviewer = $this->input->post('id_reviewer');
    $keterangan_nilai = $this->input->post('keterangan_nilai');
    $worksheet_tanah = $this->input->post('worksheet_tanah');
    $tanah_deskripsi = $this->input->post('tanah_deskripsi');
    $ringkasan_penilaian = $this->input->post('ringkasan_penilaian');

    //UPLOAD FILE

    $worksheet_tanah_filename = null;
    $tanah_deskripsi_filename = null;
    $ringkasan_penilaian_filename = null;
    $config['upload_path']          = './assets/upload/';
    $config['allowed_types']        = 'xls|xlsx|csv|doc|word|docx|pdf';

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('worksheet_tanah')) {
      $error = array('error' => $this->upload->display_errors());
      echo json_encode($error);
      return false;
    } else {
        // $data = array('upload_data' => $this->upload->data());
        $worksheet_tanah_filename = $this->upload->data('file_name');
    }

    if (!$this->upload->do_upload('tanah_deskripsi')) {
      $error = array('error' => $this->upload->display_errors());
      echo json_encode($error);
      return false;
    } else {
        // $data = array('upload_data' => $this->upload->data());
        $tanah_deskripsi_filename = $this->upload->data('file_name');
    }

    if (!$this->upload->do_upload('ringkasan_penilaian')) {
      $error = array('error' => $this->upload->display_errors());
      echo json_encode($error);
      return false;
    } else {
        // $data = array('upload_data' => $this->upload->data());
        $ringkasan_penilaian_filename = $this->upload->data('file_name');
    }


    $data = array(
      'id_penilaian' => $id_penilaian,
      'tgl_perhitungan_nilai' => $tgl_perhitungan_nilai,
      'id_survei' => $id_survei,
      'id_pendaftaran' => $id_pendaftaran,
      'tgl_penilaian' => $tgl_penilaian,
      'id_peg' => $id_peg,
      'id_reviewer' => $id_reviewer,
      'keterangan_nilai' => $keterangan_nilai,
      'worksheet_tanah' => $worksheet_tanah_filename,
      'tanah_deskripsi' => $tanah_deskripsi_filename,
      'ringkasan_penilaian' => $ringkasan_penilaian_filename

    );

    $simpan = $this->Model_Penilaian->insertPenilaian($data,$id_peg, $id_penilaian);
    if($simpan == 1){
      // Create notification
      $notif = $this->Model_Notification->create(array(
        'id_peg' => $data['id_reviewer'],
        'description' => 'Penilaian baru telah diinput',
        'link' => site_url('Penilaian/detailpenilaian?id=' . $data['id_penilaian']),
        'created_at' => date('Y-m-d H:i:s'),
      ));
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Disimpan
      </div>');
      redirect("Penilaian");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Disimpan
      </div>');
    }
  }
}

  function hapuspenilaian()
  {
    $id = $this->input->get('id');

    $delete = $this->Model_Penilaian->deletePenilaian($id);

    if ($delete) {
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Dihapus
      </div>');
      redirect("Penilaian");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Dihapus
      </div>');
    }

  }

  function cetakpenilaian()
  {
    $id = $this->input->get('id');
    $data['penilaian'] = $this->Model_Penilaian->getPenilaian($id)->row_array();
    $this->load->view('penilaian/cetak_penilaian', $data);
  }

  function detailpenilaian(){
    $id = $this->input->get('id');
    $data['penilaian'] = $this->Model_Penilaian->getPenilaian($id)->row_array();
    $this->template->load('template/template', 'penilaian/detail_penilaian', $data);
  }

  function laporanpenilaian()
  {
    $data['pegawai'] = $this->Model_Pegawai->getDataPegawai('Penilai')->result();
    $this->template->load('template/template', 'penilaian/frm_laporanpenilaian', $data);
  }

  function cetaklaporanpenilaian()
  {
    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');
    $id_peg = $this->input->post('id_peg');

    $data['dari'] = $dari;
    $data['sampai'] = $sampai;
    $data['laporanpenilaian'] = $this->Model_Penilaian->getLaporanpenilaian($dari,$sampai,$id_peg)->result();
    if(isset($_POST['export'])){
      // Fungsi header dengan mengirimkan raw data excel
        header("Content-type: application/vnd-ms-excel");

        // Mendefinisikan nama file ekspor "hasil-export.xls"
        header("Content-Disposition: attachment; filename=Laporan Penilaian.xls");
    }

    $this->load->view('penilaian/cetak_laporanpenilaian', $data);
  }
}
?>
