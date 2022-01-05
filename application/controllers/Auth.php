<?php
class Auth extends CI_Controller {

  function __construct()
   {
   	parent::__construct();
     //untuk me-load Model_Auth.php
     $this->load->model('Model_Auth');
   }

//Fungsi untuk me-load hal login.php
  function login(){
    checklog();
    $this->load->view('auth/login');
  }

  function ceklogin(){
    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));
    //melakukan perintah yg akan mengirimkan 2 parameter ke dalam model_auth
    $login = $this->Model_Auth->getLogin($username, $password);
    //untuk mengecek datanya ada di database atau tidak dengan menggunakan num_rows
    //num_rows berfungsi untuk mengecek jumlah data yg ditemukan
    $ceklogin = $login->num_rows();
    if ($ceklogin) {
      $datalogin = $login->row_array();
      $data = array(
        'id_peg' => $datalogin['id_peg'],
        'nama_peg' => $datalogin['nama_peg'],
        'username' => $datalogin['username'],
        'password' => $datalogin['password'],
        'level' => $datalogin['level'],
        'alamat_peg' => $datalogin['alamat_peg'],
        'telp_peg' => $datalogin['telp_peg'],
        'email_peg' => $datalogin['email_peg'],
        'izin_profesi' => $datalogin['izin_profesi'],
        'foto_peg' => $datalogin['foto_peg']
      );
      //data2 yg telah didapat akan disimpan kedalam Session
      $this->session->set_userdata($data);
      //untuk mengarahkan ke hal dashboard jika username n password ditemukan
      redirect('Dashboard');
    } else {
      $this->session->set_flashdata('msg','<div class="alert alert-warning" role="alert">
      Username / Password Salah !</div>');
      redirect("auth/login");
    }
  }

  function logout(){
    session_destroy();
    redirect('Auth/login');
  }

  function gantipassword(){

    $this->template->load('template/template', 'auth/ganti_password');
  }

  function gantipassword_act(){

      $password_baru = $this->input->post('password_baru');
      $ulangi_password = $this->input->post('ulangi_password');

      $data = array('password' => md5($password_baru));
      $id = array('id_peg' => $this->session->userdata('id_peg'));

      $this->Model_Auth->updatePassword($id, $data, 'pegawai');
      $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">
      <i class="fa fa-check"></i>
      Password Berhasil Diubah, Silahkan Logout dan Login Kembali dengan Password Baru Anda.
      </div>');
      redirect('Auth/gantipassword');

  }


}
