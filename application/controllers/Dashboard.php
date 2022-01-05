<?php
class Dashboard extends CI_Controller
{
  function __construct()
  {
  	parent::__construct();
    checklogin();
    cekNotif();
    $this->load->model('Model_Pemberitugas');
    $this->load->model('Model_Penilaian');
  }


  function index()
  {

    $data['jmlklien'] = $this->Model_Pemberitugas->getDataPemberitugas()->num_rows();
    $data['jmlpenilaian'] = $this->Model_Penilaian->getDatapenilaian()->num_rows();
    $this->template->load('template/template', 'dashboard/dashboard.php', $data);

  }
}
