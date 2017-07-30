<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
    
//    untuk mengecek jumlah username dan pass_pdk yang sesuai
    function login($username,$pass_pdk) {
        $this->db->where('username', $username);
        $this->db->where('pass_pdk', $pass_pdk);
        $query =  $this->db->get('penduduk');
        return $query->num_rows();
    }
    
//    untuk mengambil data hasil login
    function data_login($username,$pass_pdk) {
        $this->db->where('username', $username);
        $this->db->where('pass_pdk', $pass_pdk);
        return $this->db->get('penduduk')->row();
    }
}
