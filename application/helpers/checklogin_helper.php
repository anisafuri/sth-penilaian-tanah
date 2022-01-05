<?php

//untuk mengecek jika status masih login tapi tab tertutup
//maka ketika membuka url lagi otomatis diarahkan ke dashboard
function checklog(){
  $CI = & get_instance();
  $level = $CI->session->userdata('level');
  if (!empty($level)){
    redirect('Dashboard');
  }
}

function checklogin(){
  $CI = & get_instance();
  $level = $CI->session->userdata('level');
  if (empty($level)){
    redirect('Auth/login');
  }
}

 ?>
