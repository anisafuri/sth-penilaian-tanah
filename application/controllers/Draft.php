<?php
class Draft extends CI_Controller

{
  function __construct()
  {
   parent::__construct();
   checklogin();
   cekNotif();
   $this->load->model('Model_Draft');
   $this->load->model('Model_Penilaian');

  }

  function index()
  {
    $data['draft_laporan'] = $this->Model_Draft->getDatadraft()->result();
    $this->template->load('template/template', 'draft/view_draft', $data);

  }

  function inputdraft(){

    $data['penilaian'] = $this->Model_Penilaian->getDatapenilaian()->result();
    $this->template->load('template/template', 'draft/input_draft', $data);
  }

  function simpandraft(){
    $id_draft = $this->input->post('id_draft');
    $validateId = $this->Model_Draft->validateId($id_draft);
    if ($validateId > 0) {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
        <i class="fa fa-close"></i>
        ID Sudah Terdaftar
        </div>');
        redirect("Draft");
    } else {
    $tgl_draft = $this->input->post('tgl_draft');
    $id_penilaian = $this->input->post('id_penilaian');
    $jendela = $this->input->post('jendela');
    $covering_letter = $this->input->post('covering_letter');
    $pernyataan_penilai = $this->input->post('pernyataan_penilai');
    $asumsi = $this->input->post('asumsi');
    $tinjauan = $this->input->post('tinjauan');
    $gambar_situasi = $this->input->post('gambar_situasi');
    $foto_foto = $this->input->post('foto_foto');
    $peta_lokasi = $this->input->post('peta_lokasi');
    $id_peg = $this->input->post('id_peg');

    //UPLOAD FILE

    $jendela_filename = null;
    $covering_letter_filename = null;
    $pernyataan_penilai_filename = null;
    $asumsi_filename = null;
    $tinjauan_filename = null;
    $gambar_situasi_filename = null;
    $foto_foto_filename = null;
    $peta_lokasi_filename = null;
    $config['upload_path']          = './assets/upload/';
    $config['allowed_types']        = 'xls|xlsx|csv|doc|word|docx|pdf';
    $config['max_size']             = '3072';

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('jendela')) {
      $error = array('error' => $this->upload->display_errors());
      echo json_encode($error);
      return false;
    } else {
        // $data = array('upload_data' => $this->upload->data());
        $jendela_filename = $this->upload->data('file_name');
    }

    if (!$this->upload->do_upload('covering_letter')) {
      $error = array('error' => $this->upload->display_errors());
      echo json_encode($error);
      return false;
    } else {
        // $data = array('upload_data' => $this->upload->data());
        $covering_letter_filename = $this->upload->data('file_name');
    }

    if (!$this->upload->do_upload('pernyataan_penilai')) {
      $error = array('error' => $this->upload->display_errors());
      echo json_encode($error);
      return false;
    } else {
        // $data = array('upload_data' => $this->upload->data());
        $pernyataan_penilai_filename = $this->upload->data('file_name');
    }

    if (!$this->upload->do_upload('asumsi')) {
      $error = array('error' => $this->upload->display_errors());
      echo json_encode($error);
      return false;
    } else {
        // $data = array('upload_data' => $this->upload->data());
        $asumsi_filename = $this->upload->data('file_name');
    }

    if (!$this->upload->do_upload('tinjauan')) {
      $error = array('error' => $this->upload->display_errors());
      echo json_encode($error);
      return false;
    } else {
        // $data = array('upload_data' => $this->upload->data());
        $tinjauan_filename = $this->upload->data('file_name');
    }

    if (!$this->upload->do_upload('gambar_situasi')) {
      $error = array('error' => $this->upload->display_errors());
      echo json_encode($error);
      return false;
    } else {
        // $data = array('upload_data' => $this->upload->data());
        $gambar_situasi_filename = $this->upload->data('file_name');
    }

    if (!$this->upload->do_upload('foto_foto')) {
      $error = array('error' => $this->upload->display_errors());
      echo json_encode($error);
      return false;
    } else {
        // $data = array('upload_data' => $this->upload->data());
        $foto_foto_filename = $this->upload->data('file_name');
    }

    if (!$this->upload->do_upload('peta_lokasi')) {
      $error = array('error' => $this->upload->display_errors());
      echo json_encode($error);
      return false;
    } else {
        // $data = array('upload_data' => $this->upload->data());
        $peta_lokasi_filename = $this->upload->data('file_name');
    }


    $data = array(
      'id_draft' => $id_draft,
      'tgl_draft' => $tgl_draft,
      'id_penilaian' => $id_penilaian,
      'jendela' => $jendela_filename,
      'covering_letter' => $covering_letter_filename,
      'pernyataan_penilai' => $pernyataan_penilai_filename,
      'asumsi' => $asumsi_filename,
      'tinjauan' => $tinjauan_filename,
      'gambar_situasi' => $gambar_situasi_filename,
      'foto_foto' => $foto_foto_filename,
      'peta_lokasi' => $peta_lokasi_filename,
      'id_peg' => $id_peg

    );

    $simpan = $this->Model_Draft->insertDraft($data, $id_draft);
    if($simpan == 1){
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Disimpan
      </div>');
      redirect("Draft");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Disimpan
      </div>');
    }
  }
}

  function hapusdraft()
  {
    $id = $this->input->get('id');

    $delete = $this->Model_Draft->deleteDraft($id);

    if ($delete) {
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Dihapus
      </div>');
      redirect("Draft");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Dihapus
      </div>');
    }

  }

  function cetakdraft()
  {
    $id = $this->input->get('id');
    $data['draft_laporan'] = $this->Model_Draft->getDraft($id)->row_array();
    $this->load->view('draft/cetak_draft', $data);
  }

  function laporandraft()
  {
    $this->template->load('template/template', 'draft/frm_laporandraft');
  }

  function cetaklaporandraft()
  {
    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');
    $data['dari'] = $dari;
    $data['sampai'] = $sampai;
    $data['laporandraft'] = $this->Model_Draft->getLaporandraft($dari,$sampai)->result();
    if(isset($_POST['export'])){
      // Fungsi header dengan mengirimkan raw data excel
        header("Content-type: application/vnd-ms-excel");

        // Mendefinisikan nama file ekspor "hasil-export.xls"
        header("Content-Disposition: attachment; filename=Laporan Draft.xls");
    }

    $this->load->view('draft/cetak_laporandraft', $data);
  }
}
?>
