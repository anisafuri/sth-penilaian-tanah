<?php
class Model_Auth extends CI_Model
{
  //cek login berdasarkan parameter username dan password
  function getLogin($username, $password)
  {
    //melakukan pencarian data ke dalam database-tabel pegawai dimana...
    return $this->db->get_where('pegawai', array('username' => $username, 'password' => $password));
  }


  function updatePassword($where, $data, $table){
    $this->db->where($where);
    $this->db->update($table, $data);
  }
}
 ?>
