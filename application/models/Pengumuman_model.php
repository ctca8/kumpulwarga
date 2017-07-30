<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * model ini untuk mengelola modul pengumuman
 */

class Pengumuman_model extends CI_Model
{

    public $table = 'pengumuman';
    public $id    = 'id_pengumuman';
    public $order = 'DESC';

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // ambil semua pengumuman
    // kelompokan berdasarkan rt dan jabatan
    public function get_all($id_rt)
    {
        $this->db->where('pengumuman.id_rt', $id_rt);
        $this->db->join('riwayat_jabatan', 'pengumuman.id_rj = riwayat_jabatan.id_rj');
        $this->db->join('jabatan', 'riwayat_jabatan.id_j = jabatan.id_j');
        $this->db->join('penduduk', 'riwayat_jabatan.id_pdk = penduduk.id_pdk');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // mengambil data pengumuman berdasarkan id_pengumuman
    public function get_by_id($id_pengumuman)
    {
    	$this->db->where($this->id, $id_pengumuman);
    	return $this->db->get($this->table)->row();
    }

    // mengambil data pengumuman berdasarkan gambar_pengumuman
    // sengaja menggunakan gambar karena gambar ini datanya unik atau terenskripsi
    public function get_by_gambar($gambar_pengumuman)
    {
        $this->db->where('gambar_pengumuman', $gambar_pengumuman);
        return $this->db->get($this->table)->result();
    }

    // edit data pengumuman
    public function update($id_pengumuman, $data)
    {
    	$this->db->where($this->id, $id_pengumuman);
    	$this->db->update($this->table, $data);
    }

    // menghapus data pengumuman
    public function delete($id_pengumuman)
    {
    	$this->db->where($this->id, $id_pengumuman);
    	$this->db->delete($this->table);
    }

}
