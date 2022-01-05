<?php

function cekNotif() {
    $CI =& get_instance();
    $id = $CI->session->userdata('id_peg');

    $notif = $CI->db->from('notifikasi')
            ->select('*')
            ->where('id_peg',$id)
            ->limit(5)
            ->order_by('created_at','DESC')
            ->get()
            ->result_array();

    $tmp_data = [];
    foreach ($notif as $key => $value) {
        $tmp_data[] = $value;
    }

    $CI->session->set_tempdata('notif', $tmp_data, 300);

    return $notif;

}
