<?php
class Tanah extends CI_Controller

{
  function __construct()
  {
  	parent::__construct();
    checklogin();
    cekNotif();
    $this->load->model('Model_Tanah');
  }

  function index()
  {
    $data['tanah'] = $this->Model_Tanah->getDataTanah()->result();
    $this->template->load('template/template', 'tanah/view_tanah', $data);
  }

  function inputtanah(){
    $this->load->view('tanah/input_tanah');
  }

  function simpantanah(){
    $no_sertifikat = $this->input->post('no_sertifikat');
    $validateId = $this->Model_Tanah->validateId($no_sertifikat);
    if ($validateId > 0) {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
        <i class="fa fa-close"></i>
        ID Sudah Terdaftar
        </div>');
        redirect("Tanah");
    } else {
    $hak_tanah = $this->input->post('hak_tanah');
    $status_sertifikat = $this->input->post('status_sertifikat');
    $desa = $this->input->post('desa');
    $kecamatan = $this->input->post('kecamatan');
    $kabupaten = $this->input->post('kabupaten');
    $provinsi = $this->input->post('provinsi');
    $nama_pemegang_hak = $this->input->post('nama_pemegang_hak');
    $tgl_dikeluarkan= date('Y-m-d', strtotime($this->input->post('tgl_dikeluarkan')));
    $tgl_jatuh_tempo = date('Y-m-d', strtotime($this->input->post('tgl_jatuh_tempo')));
    $tgl_gambar_situasi = date('Y-m-d', strtotime($this->input->post('tgl_gambar_situasi')));
    $no_gambar_situasi = $this->input->post('no_gambar_situasi');
    $luas = $this->input->post('luas');

    //UPLOAD FILE

    $filename = [];
    $errors   = [];

    for ($i=0; $i < count($_FILES['sertipikat_tanah']['name']); $i++) {
      $target_dir     = "./assets/upload/";
      // $name           = generateRandomString(10);
      $temp           = explode(".", $_FILES["sertipikat_tanah"]["name"][$i]);
      $newfilename    = generateRandomString(10) .'.'. end($temp);
      $target_file    = $target_dir . $newfilename;
      $imageFileType  = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $uploadOk       = 1;

      // Check if file already exists
      if (file_exists($target_file)) {
        $errors[] = "Sorry, file already exists.";
        $uploadOk = 0;
      }

      // Check file size
      if ($_FILES["sertipikat_tanah"]["size"][$i] > 2000000) {
        $errors[] = "Sorry, your file is too large.";
        $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "pdf" ) {
        $errors[] = "Sorry, only JPG, JPEG, PNG & PDF files are allowed, your file is.". $imageFileType;
        $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        $errors[] = "Sorry, your file was not uploaded.";
      } else {
        if (move_uploaded_file($_FILES["sertipikat_tanah"]["tmp_name"][$i], $target_file)) {
          $filename[] = $newfilename;
        } else {
          $errors[] = "Sorry, there was an error uploading your file.";
        }
      }
    }

    $data = array(
      'no_sertifikat' => $no_sertifikat,
      'hak_tanah' => $hak_tanah,
      'status_sertifikat' => $status_sertifikat,
      'desa' => $desa,
      'kecamatan' => $kecamatan,
      'kabupaten' => $kabupaten,
      'provinsi' => $provinsi,
      'nama_pemegang_hak' => $nama_pemegang_hak,
      'tgl_dikeluarkan' => $tgl_dikeluarkan,
      'tgl_jatuh_tempo' => $tgl_jatuh_tempo,
      'no_gambar_situasi' => $no_gambar_situasi,
      'tgl_gambar_situasi' => $tgl_gambar_situasi,
      'luas' => $luas,
      'sertipikat_tanah' => implode(',',$filename)
    );

    $simpan = $this->Model_Tanah->insertTanah($data);
    if($simpan == 1){
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Disimpan
      </div>');
      redirect("Tanah");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Disimpan
      </div>');
    }
  }
}

  function edittanah(){
    $no_sertifikat = $this->input->get('id');
    $data['tanah'] = $this->Model_Tanah->getTanah($no_sertifikat)->row_array();
    $this->load->view('tanah/edit_tanah', $data);
  }

  function updatetanah(){
    $no_sertifikat = $this->input->post('no_sertifikat');
    $hak_tanah = $this->input->post('hak_tanah');
    $status_sertifikat = $this->input->post('status_sertifikat');
    $desa = $this->input->post('desa');
    $kecamatan = $this->input->post('kecamatan');
    $kabupaten = $this->input->post('kabupaten');
    $provinsi = $this->input->post('provinsi');
    $nama_pemegang_hak = $this->input->post('nama_pemegang_hak');
    $tgl_dikeluarkan= $this->input->post('tgl_dikeluarkan');
    $tgl_jatuh_tempo = $this->input->post('tgl_jatuh_tempo');
    $no_gambar_situasi = $this->input->post('no_gambar_situasi');
    $tgl_gambar_situasi = $this->input->post('tgl_gambar_situasi');
    $luas = $this->input->post('luas');


    $data = array(
      'no_sertifikat' => $no_sertifikat,
      'hak_tanah' => $hak_tanah,
      'status_sertifikat' => $status_sertifikat,
      'desa' => $desa,
      'kecamatan' => $kecamatan,
      'kabupaten' => $kabupaten,
      'provinsi' => $provinsi,
      'nama_pemegang_hak' => $nama_pemegang_hak,
      'tgl_dikeluarkan' => $tgl_dikeluarkan,
      'tgl_jatuh_tempo' => $tgl_jatuh_tempo,
      'no_gambar_situasi' => $no_gambar_situasi,
      'tgl_gambar_situasi' => $tgl_gambar_situasi,
      'luas' => $luas,
    );

    $simpan = $this->Model_Tanah->updateTanah($data, $no_sertifikat);
    if($simpan == 1){
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Diupdate
      </div>');
      redirect("Tanah");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Diupdate
      </div>');
    }
  }

  function hapustanah(){
    $no_sertifikat = $this->input->get('id');
    $hapus = $this->Model_Tanah->deleteTanah($no_sertifikat);
    if($hapus==1){
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Dihapus
      </div>');
      redirect("Tanah");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Dihapus
      </div>');
    }
  }
}
?>
