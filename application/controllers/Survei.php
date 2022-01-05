<?php
class Survei extends CI_Controller

{
  function __construct()
  {
   parent::__construct();
   checklogin();
   cekNotif();
   $this->load->model('Model_Survei');
   $this->load->model('Model_Pendaftaran');
   $this->load->model('Model_Tanah');
   $this->load->model('Model_Pegawai');
  }

  function index()
  {
    $id = $this->session->userdata('id_peg');
    $data['survei'] = $this->Model_Survei->getDatasurvei($id)->result();
    $this->template->load('template/template', 'survei/view_survei', $data);
  }

  function inputsurvei(){
    $data['pendaftaran'] = $this->Model_Pendaftaran->getDatapendaftaran()->result();
    $data['tanah'] = $this->Model_Tanah->getDataTanah()->result();
    $this->template->load('template/template', 'survei/input_survei', $data);
  }

  function cekPembanding(){
    $jumlahpembanding = $this->Model_Survei->cekPembanding()->num_rows();
    echo $jumlahpembanding;
  }

  function simpanpembandingtemp(){
    $no_pembanding = $this->input->post('no_pembanding');
    $validateIdpembanding = $this->Model_Survei->validateIdpembanding($no_pembanding);

    if ($validateIdpembanding > 0) {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
        <i class="fa fa-close"></i>
        ID Sudah Terdaftar
        </div>');
        redirect("Survei");
    } else {
    $tgl_data = $this->input->post('tgl_data');
    $alamat_pembanding = $this->input->post('alamat_pembanding');
    $luas_tanah_pembanding = $this->input->post('luas_tanah_pembanding');
    $legalitas_pembanding = $this->input->post('legalitas_pembanding');
    $bentuk_tanah_pembanding = $this->input->post('bentuk_tanah_pembanding');
    $elevasi_pembanding = $this->input->post('elevasi_pembanding');
    $lebar_jalan_pembanding = $this->input->post('lebar_jalan_pembanding');
    $jarak_ke_tanah_dinilai = $this->input->post('jarak_ke_tanah_dinilai');
    $peruntukan_pembanding = $this->input->post('peruntukan_pembanding');
    $karakteristik_ekonomi = $this->input->post('karakteristik_ekonomi');
    $harga_penawaran_transaksi = $this->input->post('harga_penawaran_transaksi');
    $sumber_data = $this->input->post('sumber_data');
    $person = $this->input->post('person');
    $telepon = $this->input->post('telepon');
    $catatan = $this->input->post('catatan');
    $qty = $this->input->post('qty');
    $id_peg = $this->input->post('id_peg');

    $cekpembandingtemp = $this->Model_Survei->cekPembandingtemp($no_pembanding, $id_peg)->num_rows();
    if($cekpembandingtemp > 0){
      echo "1";
    }else{
      $data = array(
        'no_pembanding' => $no_pembanding,
        'tgl_data' => $tgl_data,
        'alamat_pembanding' => $alamat_pembanding,
        'luas_tanah_pembanding' => $luas_tanah_pembanding,
        'legalitas_pembanding' => $legalitas_pembanding,
        'bentuk_tanah_pembanding' => $bentuk_tanah_pembanding,
        'elevasi_pembanding' => $elevasi_pembanding,
        'lebar_jalan_pembanding' => $lebar_jalan_pembanding,
        'jarak_ke_tanah_dinilai' => $jarak_ke_tanah_dinilai,
        'peruntukan_pembanding' => $peruntukan_pembanding,
        'karakteristik_ekonomi' => $karakteristik_ekonomi,
        'harga_penawaran_transaksi' => $harga_penawaran_transaksi,
        'sumber_data' => $sumber_data,
        'person' => $person,
        'telepon' => $telepon,
        'catatan' => $catatan,
        'qty' => $qty,
        'id_peg' => $id_peg
      );

      $simpan = $this->Model_Survei->insertPembandingtemp($data);
    }
  }
  }

  function getDatapembandingtemp(){
    $id_peg = $this->input->post('id_peg');
    $data['pembanding_temp'] = $this->Model_Survei->getDatapembandingtemp($id_peg)->result();
    $this->load->view('survei/pembanding_detail_temp', $data);
  }

  function hapusPembandingtemp(){
    $no_pembanding = $this->input->post('no_pembanding');
    $id_peg = $this->input->post('id_peg');
    $hapus = $this->Model_Survei->deletePembandingtemp($no_pembanding, $id_peg);
    echo $hapus;
  }

  function simpansurvei(){
    $id_survei = $this->input->post('id_survei');
    $validateIdsurvei = $this->Model_Survei->validateIdsurvei($id_survei);

    if ($validateIdsurvei > 0) {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
        <i class="fa fa-close"></i>
        ID Sudah Terdaftar
        </div>');
        redirect('survei/inputsurvei');
    } else {
    $tgl_inspeksi = $this->input->post('tgl_inspeksi');
    $id_pendaftaran = $this->input->post('id_pendaftaran');
    $id_lingkungan = $this->input->post('id_lingkungan');
    $id_peg = $this->input->post('id_peg');
    $bentuk_tanah = $this->input->post('bentuk_tanah');
    $elevasi = $this->input->post('elevasi');
    $batasan_thd_tanah = $this->input->post('batasan_thd_tanah');
    $peraturan_tata_kota = $this->input->post('peraturan_tata_kota');
    $pemenuhan_thd_peraturan_tatakota = $this->input->post('pemenuhan_thd_peraturan_tatakota');

    // Cek id survey
    $checkIdSurvey = $this->Model_Survei->checkId($id_survei);
    if ($checkIdSurvey->num_rows() > 0) {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      ID Survey telah terdaftar
      </div>');
      redirect("Survei/inputsurvei");
      } else {
        $data = array(
          'id_survei' => $id_survei,
          'tgl_inspeksi' => $tgl_inspeksi,
          'id_pendaftaran' => $id_pendaftaran,
          'id_lingkungan' => $id_lingkungan,
          'id_peg' => $id_peg,
          'bentuk_tanah' => $bentuk_tanah,
          'elevasi' => $elevasi,
          'batasan_thd_tanah' => $batasan_thd_tanah,
          'peraturan_tata_kota' => $peraturan_tata_kota,
          'pemenuhan_thd_peraturan_tatakota' => $pemenuhan_thd_peraturan_tatakota
        );

        $simpan = $this->Model_Survei->insertSurvei($data, $id_peg, $id_survei);
        if($simpan == 1){
          $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
          <i class="fa fa-check"></i>
          Data Berhasil Disimpan
          </div>');
          redirect("Survei");
        } else {
          $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
          <i class="fa fa-close"></i>
          Data Gagal Disimpan
          </div>');
          redirect("Survei/inputsurvei");
        }
      }
    }
  }

  function hapussurvei()
  {
    $id_survei = $this->uri->segment(3);
    $hapus = $this->Model_Survei->deleteSurvei($id_survei);
    if ($hapus) {
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Dihapus
      </div>');
      redirect("Survei");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Dihapus
      </div>');
    }

  }

  function cetaksurvei()
  {
    $id_survei = $this->uri->segment(3);
    $data['survei'] = $this->Model_Survei->getSurvei($id_survei)->row_array();
    $data['detailsurvei'] = $this->Model_Survei->getDetailsurvei($id_survei)->result();
    $this->load->view('survei/cetak_survei', $data);
  }

  function detailsurvei(){
    $id_survei = $this->uri->segment(3);
    $data['survei'] = $this->Model_Survei->getSurvei($id_survei)->row_array();
    $data['detailsurvei'] = $this->Model_Survei->getDetailsurvei($id_survei)->result();
    $this->template->load('template/template', 'survei/detail_survei', $data);
  }

  function laporansurvei()
  {
    $data['pegawai'] = $this->Model_Pegawai->getDataPegawai('Penilai')->result();
    $this->template->load('template/template', 'survei/frm_laporansurvei', $data);
  }

  function cetaklaporansurvei()
  {
    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');
    $id_peg = $this->input->post('id_peg');

    $data['dari'] = $dari;
    $data['sampai'] = $sampai;
    $data['laporansrv'] = $this->Model_Survei->getLaporansurvei($dari,$sampai,$id_peg)->result();
    if(isset($_POST['export'])){
      // Fungsi header dengan mengirimkan raw data excel
        header("Content-type: application/vnd-ms-excel");

        // Mendefinisikan nama file ekspor "hasil-export.xls"
        header("Content-Disposition: attachment; filename=Laporan Survei.xls");
    }
    $this->load->view('survei/cetak_laporansurvei', $data);
  }

}
?>
