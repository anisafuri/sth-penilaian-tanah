<?php

class Model_Notification extends CI_Model
{
    function create($data)
    {
        return $this->db->insert('notifikasi',$data);
    }
}
