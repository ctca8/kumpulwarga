<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_alamat_model extends CI_Model
{

    public $table  = 'riwayat_alamat';
    public $id     = 'id_ra';
    public $id_pdk = 'id_pdk';

    public function __construct()
    {
        parent::__construct();
    }

    // get data alamat by id_pdk
    // alamat yang diambil sampai kelurahan
    public function get_by_id($id_pdk)
    {
        $this->db->where($this->id_pdk, $id_pdk);
        $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
        $this->db->join('rw', 'rt.id_rw = rw.id_rw');
        $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
        $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');

        // $this->db->join('penduduk', 'peminjaman.id_pdk = penduduk.id_pdk');
        return $this->db->get($this->table)->row();
    }

    // mengambil data seluruh RT dalam satu kelurahan
    public function get_by_kelurahan($id_kel)
    {
        $this->db->where('id_kel', $id_kel);
        $this->db->join('rw', 'rt.id_rw = rw.id_rw');
        $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
        return $this->db->get('rt')->result();
    }

    // mengambil data seluruh RT dalam satu RW
    public function get_by_rw($id_rw)
    {
        $this->db->where('rt.id_rw', $id_rw);
        $this->db->join('rw', 'rt.id_rw = rw.id_rw');
        return $this->db->get('rt')->result();
    }

}
