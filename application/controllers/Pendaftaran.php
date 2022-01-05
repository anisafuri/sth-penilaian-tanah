<?php
class Pendaftaran extends CI_Controller

{
  function __construct()
  {
   parent::__construct();
   checklogin();
   cekNotif();
   $this->load->model('Model_Pendaftaran');
   $this->load->model('Model_Pemberitugas');
   $this->load->model('Model_Pemilikaset');
   $this->load->model('Model_Pegawai');
   $this->load->model('Model_Tanah');
  }

  function index()
  {
    $data['pendaftaran'] = $this->Model_Pendaftaran->getDatapendaftaran()->result();
    $this->template->load('template/template', 'pendaftaran/view_pendaftaran', $data);

  }

  function inputPendaftaran(){

    $bulan = date('m');
    $tahun = date('Y');
    // $getLastProposal = $this->Model_Pendaftaran->getLastProposal($bulan,$tahun)->row_array();
    $getLastPendaftaran = $this->Model_Pendaftaran->getCount($tahun);
  	// $nomor_terakhir = $getLastProposal['no_proposal'];
    // $no_proposal = buatkode($nomor_terakhir,$bulan.$tahun,3);
    $id_pendaftaran = buatNomorPendaftaran($getLastPendaftaran,$bulan,$tahun,3);

    $data['id_pendaftaran'] = $id_pendaftaran;
    $data['pemberi_tugas'] = $this->Model_Pemberitugas->getDataPemberitugas()->result();
    $data['pemilik_aset'] = $this->Model_Pemilikaset->getDataPemilikaset()->result();
    $data['pegawai'] = $this->Model_Pegawai->getDataPegawai()->result();
    $data['tanah'] = $this->Model_Tanah->getDataTanah()->result();
    $this->template->load('template/template', 'pendaftaran/input_pendaftaran', $data);
  }

  function cekTanah(){
    $jumlahsertifikat = $this->Model_Pendaftaran->cekTanah()->num_rows();
    echo $jumlahsertifikat;
  }

  function cekLuas(){
    $totalluas = $this->Model_Pendaftaran->cekLuas()->num_rows();
    echo $totalluas;
  }

  function simpantanahtemp(){
    $no_sertifikat = $this->input->post('no_sertifikat');
    $hak_tanah = $this->input->post('hak_tanah');
    $kabupaten = $this->input->post('kabupaten');
    $nama_pemegang_hak = $this->input->post('nama_pemegang_hak');
    $luas = $this->input->post('luas');
    $qty = $this->input->post('qty');
    $id_pemilik = $this->input->post('id_pemilik');

    $cektanahtemp = $this->Model_Pendaftaran->cekTanahtemp($no_sertifikat, $id_pemilik)->num_rows();
    if($cektanahtemp > 0){
      echo "1";
    }else{
      $data = array(
        'no_sertifikat' => $no_sertifikat,
        'hak_tanah' => $hak_tanah,
        'kabupaten' => $kabupaten,
        'nama_pemegang_hak' => $nama_pemegang_hak,
        'luas' => $luas,
        'qty' => $qty,
        'id_pemilik' => $id_pemilik
      );

      $simpan = $this->Model_Pendaftaran->insertTanahtemp($data);
    }

  }

  function getDatatanahtemp(){
    $id_pemilik = $this->input->post('id_pemilik');
    $data['tanahtemp'] = $this->Model_Pendaftaran->getDatatanahtemp($id_pemilik)->result();
    $this->load->view('pendaftaran/pendaftaran_detail_temp', $data);
  }

  function hapusTanahtemp(){
    $no_sertifikat = $this->input->post('no_sertifikat');
    $id_pemilik = $this->input->post('id_pemilik');
    $hapus = $this->Model_Pendaftaran->deleteTanahtemp($no_sertifikat, $id_pemilik);
    echo $hapus;
  }

  function simpanpendaftaran(){
    $id_pendaftaran = $this->input->post('id_pendaftaran');
    $validateId = $this->Model_Pendaftaran->validateId($id_pendaftaran);

    if ($validateId > 0) {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
        <i class="fa fa-close"></i>
        ID Sudah Terdaftar
        </div>');
        redirect("Pendaftaran");
    } else {
    $tgl_pendaftaran = $this->input->post('tgl_pendaftaran');
    $jenis_jasa = $this->input->post('jenis_jasa');
    $id_pemberitugas = $this->input->post('id_pemberitugas');
    $id_pemilik = $this->input->post('id_pemilik');
    $id_peg = $this->input->post('id_peg');
    $tujuan_penilaian = $this->input->post('tujuan_penilaian');
    $dasar_penilaian = implode(",",$this->input->post('dasar_penilaian'));
    $pendekatan_penilaian = $this->input->post('pendekatan_penilaian');
    $tgl_penilaian = $this->input->post('tgl_penilaian');

    $data = array(
      'id_pendaftaran' => $id_pendaftaran,
      'tgl_pendaftaran' => $tgl_pendaftaran,
      'jenis_jasa' => $jenis_jasa,
      'id_pemberitugas' => $id_pemberitugas,
      'id_pemilik' => $id_pemilik,
      'id_peg' => $id_peg,
      'tujuan_penilaian' => $tujuan_penilaian,
      'dasar_penilaian' => $dasar_penilaian,
      'pendekatan_penilaian' => $pendekatan_penilaian,
      'tgl_penilaian' => $tgl_penilaian,
    );

    $simpan = $this->Model_Pendaftaran->insertPendaftaran($data, $id_pemilik, $id_pendaftaran);
    if($simpan == 1){
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Disimpan
      </div>');
      redirect("Pendaftaran");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Disimpan
      </div>');
    }
  }
}

  function detailpendaftaran(){
    $id = $this->input->get('id');
    $data['pendaftaran'] = $this->Model_Pendaftaran->getPendaftaran($id)->row_array();
    $data['detailpendaftaran'] = $this->Model_Pendaftaran->getDetailpendaftaran($id)->result();
    $this->template->load('template/template', 'pendaftaran/detail_pendaftaran', $data);
  }


  function hapuspendaftaran()
  {
    $id = $this->input->get('id');

    $delete = $this->Model_Pendaftaran->deletePendaftaran($id);

    if ($delete) {
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Dihapus
      </div>');
      redirect("Pendaftaran");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Dihapus
      </div>');
    }

  }

  function cetakpendaftaran()
  {
    $id = $this->input->get('id');
    $data['pendaftaran'] = $this->Model_Pendaftaran->getPendaftaran($id)->row_array();
    $data['detailpendaftaran'] = $this->Model_Pendaftaran->getDetailpendaftaran($id)->result();
    $this->load->view('pendaftaran/cetak_pendaftaran', $data);
  }

  function laporanpendaftaran()
  {
    //$id = $this->input->get('id');
    //$data['pendaftaran'] = $this->Model_Pendaftaran->getPendaftaran($id)->row_array();
    //$data['detailpendaftaran'] = $this->Model_Pendaftaran->getDetailpendaftaran($id)->result();
    $this->template->load('template/template', 'pendaftaran/frm_laporanpendaftaran');
  }

  function cetaklaporanpendaftaran()
  {
    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');

    $data['dari'] = $dari;
    $data['sampai'] = $sampai;
    $data['laporanpend'] = $this->Model_Pendaftaran->getLaporanpendaftaran($dari,$sampai)->result();
    if(isset($_POST['export'])){
      // Fungsi header dengan mengirimkan raw data excel
        header("Content-type: application/vnd-ms-excel");

        // Mendefinisikan nama file ekspor "hasil-export.xls"
        header("Content-Disposition: attachment; filename=Laporan Pendaftaran.xls");
    }

    $this->load->view('pendaftaran/cetak_laporanpendaftaran', $data);
  }
}
?>
