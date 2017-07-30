<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

	public $table = 'peminjaman';
	public $id = 'id_peminjaman';
	public $order = 'DESC';

	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	// dipakai untuk mengambil seluruh data peminjaman yang ada di RT 
	// dan berstatus menunggu konfirmasi
	public function get_by_status()
	{
		// $this->db->where('id_rt', $id_rt);
		$this->db->where('status_peminjaman', "menunggu konfirmasi");
		return $this->db->get($this->table)->result();
	}

	// dipakai di detail inventaris untuk menampilkan riwayat peminjaman
	public function get_by_inventaris($id_inventaris)
	{
		$this->db->where('id_inventaris', $id_inventaris);
		$this->db->order_by($this->id, $this->order);

		// join ke tabel penduduk untuk mendapatkan data penduduk
		$this->db->join('penduduk', 'peminjaman.id_pdk = penduduk.id_pdk');
		return $this->db->get($this->table)->result();
	}

	public function get_by_id($id_peminjaman)
	{
		$this->db->where($this->id, $id_peminjaman);
		return $this->db->get($this->table)->row();
	}

	public function update($id_peminjaman, $data)
	{
		
		$this->db->where($this->id, $id_peminjaman);
		$this->db->update($this->table, $data);
	}

}

/* End of file peminjaman_model.php */
/* Location: ./application/models/peminjaman_model.php */