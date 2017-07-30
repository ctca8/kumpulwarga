<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warga_model extends CI_Model {

	public $table = 'penduduk';
	public $id = 'id_pdk';
	public $order = 'DESC';

	public function __construct()
	{
		parent::__construct();
	}

	// mengambil data penduduk berdasarkan RT
	public function get_by_rt($id_rt)
	{
        $this->db->where('riwayat_alamat.id_rt', $id_rt);
        $this->db->join('riwayat_alamat', 'riwayat_alamat.id_pdk = penduduk.id_pdk');
        $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
        $this->db->join('rw', 'rt.id_rw = rw.id_rw');

        $this->db->join('riwayat_jabatan', 'riwayat_jabatan.id_pdk = penduduk.id_pdk', 'left');
        $this->db->join('jabatan', 'jabatan.id_j = riwayat_jabatan.id_j', 'left');
        return $this->db->get($this->table)->result();
	}

	// mengambil data penduduk berdasarkan rw
	public function get_by_rw($id_rw)
	{
        $this->db->where('rt.id_rw', $id_rw);
        $this->db->join('riwayat_alamat', 'riwayat_alamat.id_pdk = penduduk.id_pdk');
        $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
        $this->db->join('rw', 'rt.id_rw = rw.id_rw');

        $this->db->join('riwayat_jabatan', 'riwayat_jabatan.id_pdk = penduduk.id_pdk', 'left');
        $this->db->join('jabatan', 'jabatan.id_j = riwayat_jabatan.id_j', 'left');
        return $this->db->get($this->table)->result();
	}

	// mengambil data penduduk berdasarkan kelurahan
	public function get_by_kelurahan($id_kel)
	{
        $this->db->where('kelurahan.id_kel', $id_kel);
        $this->db->join('riwayat_alamat', 'riwayat_alamat.id_pdk = penduduk.id_pdk');
        $this->db->join('rt', 'riwayat_alamat.id_rt = rt.id_rt');
        $this->db->join('rw', 'rt.id_rw = rw.id_rw');
        $this->db->join('dusun', 'rw.id_dusun = dusun.id_dusun');
        $this->db->join('kelurahan', 'dusun.id_kel = kelurahan.id_kel');

        $this->db->join('riwayat_jabatan', 'riwayat_jabatan.id_pdk = penduduk.id_pdk', 'left');
        $this->db->join('jabatan', 'jabatan.id_j = riwayat_jabatan.id_j', 'left');
        return $this->db->get($this->table)->result();
	}

}

/* End of file Warga_model.php */
/* Location: ./application/models/Warga_model.php */