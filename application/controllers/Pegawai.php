<?php
class Pegawai extends CI_Controller

{
  function __construct()
  {
  	parent::__construct();
    checklogin();
    cekNotif();
    $this->load->model('Model_Pegawai');
  }

  function index()
  {
    $data['pegawai'] = $this->Model_Pegawai->getDataPegawailevel()->result();
    $this->template->load('template/template', 'pegawai/view_pegawai', $data);
  }

  function inputpegawai(){
    $this->load->view('pegawai/input_pegawai');
  }

  function simpanpegawai(){
    $id_peg = $this->input->post('id_peg');
    $validateId = $this->Model_Pegawai->validateId($id_peg);

    if ($validateId > 0) {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
        <i class="fa fa-close"></i>
        ID Sudah Terdaftar
        </div>');
        redirect("Pegawai");
    } else {
    $nama_peg = $this->input->post('nama_peg');
    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));
    $level = $this->input->post('level');
    $alamat_peg = $this->input->post('alamat_peg');
    $telp_peg = $this->input->post('telp_peg');
    $email_peg = $this->input->post('email_peg');
    $izin_profesi = $this->input->post('izin_profesi');
    $foto_peg = $_FILES['foto_peg'];
    //upload FOTO
    if ($foto_peg=''){}else{
      $config['upload_path'] = './assets/upload/';
      $config['allowed_types'] = 'jpg|png|jpeg';
      $config['max_size'] = '2048';

      $this->load->library('upload', $config);

      if(!$this->upload->do_upload('foto_peg')){

      }else{
        $foto_peg = $this->upload->data('file_name');
      }
    }


    $data = array(
      'id_peg' => $id_peg,
      'nama_peg' => $nama_peg,
      'username' => $username,
      'password' => $password,
      'level' => $level,
      'alamat_peg' => $alamat_peg,
      'telp_peg' => $telp_peg,
      'email_peg' => $email_peg,
      'izin_profesi' => $izin_profesi,
      'foto_peg' => $foto_peg
    );

    $simpan = $this->Model_Pegawai->insertPegawai($data);
    if($simpan == 1){
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Disimpan
      </div>');
      redirect("Pegawai");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Disimpan
      </div>');
    }
  }
}

  function editpegawai(){
    $id_peg = $this->uri->segment(3);
    $data['pegawai'] = $this->Model_Pegawai->getPegawai($id_peg)->row_array();
    $this->load->view('pegawai/edit_pegawai', $data);
  }

  function updatepegawai(){
    $id_peg = $this->input->post('id_peg');
    $nama_peg = $this->input->post('nama_peg');
    $username = $this->input->post('username');
    $level = $this->input->post('level');
    $alamat_peg = $this->input->post('alamat_peg');
    $telp_peg = $this->input->post('telp_peg');
    $email_peg = $this->input->post('email_peg');
    $izin_profesi = $this->input->post('izin_profesi');

    //upload FOTO
    if (!empty($_FILES['foto_peg']['name'])) {
      $config['upload_path'] = './assets/upload/';
      $config['allowed_types'] = 'jpg|png|jpeg';
      $config['max_size'] = '2048';

      $this->load->library('upload', $config);

      if(!$this->upload->do_upload('foto_peg')){
        echo $this->upload->display_errors();
      }else{
        $foto_peg = $this->upload->data('file_name');
        $data['foto_peg'] = $foto_peg; //mengambil data di form
        unlink('assets/upload/'. $this->input->post('old_pict', TRUE)); //menghapus foto yang lama
      }
    } else {
    $this->foto_peg = $post['old_pict'];
    }

    $data = array(
      'id_peg' => $id_peg,
      'nama_peg' => $nama_peg,
      'username' => $username,
      'level' => $level,
      'alamat_peg' => $alamat_peg,
      'telp_peg' => $telp_peg,
      'email_peg' => $email_peg,
      'izin_profesi' => $izin_profesi,

    );
    if($foto_peg != ''){
          $data['foto_peg'] = $foto_peg;
          unlink('assets/upload/'. $this->input->post('old_pict', TRUE));
      }

    $simpan = $this->Model_Pegawai->updatePegawai($data, $id_peg);
    if($simpan == 1){
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Diupdate
      </div>');
      redirect("Pegawai");
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
      <i class="fa fa-close"></i>
      Data Gagal Diupdate
      </div>');
    }
  }

  function hapuspegawai($id_peg){
    $id_peg = $this->uri->segment(3);
    $imgdata = $this->Model_Pegawai->getPegawai($id_peg)->row_array();
    $hapus = $this->Model_Pegawai->deletePegawai($id_peg);
    if($hapus){
      if(!empty($imgdata['foto_peg'])){
        unlink('assets/upload/'.$imgdata['foto_peg']);
      }
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Data Berhasil Dihapus
      </div>');
      redirect("Pegawai");
      }else{
        $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
        <i class="fa fa-close"></i>
        Data Gagal Dihapus
        </div>');
      }

  }

  function resetpasspegawai(){
    $id_peg = $this->uri->segment(3);
    $data['pegawai'] = $this->Model_Pegawai->getPegawai($id_peg)->row_array();
    $this->load->view('pegawai/reset_pass_peg', $data);
  }

  function resetpasspegawai_act(){

      $password_baru = $this->input->post('password_baru');
      $ulangi_password = $this->input->post('ulangi_password');

      $data = array('password' => md5($password_baru));
      $id = array('id_peg' => $id_peg = $this->uri->segment(3));

      $this->Model_Pegawai->updatePassword($id, $data, 'pegawai');
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Password Berhasil Diubah, Silahkan Logout dan Login Kembali dengan Password Baru Anda.
      </div>');
      redirect('Pegawai/resetpasspegawai');

  }

}
?>
