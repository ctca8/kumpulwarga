<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* model ini untuk mengelola modul pengumuman
*/

class Upload_model extends CI_Model
{
	
	public $table = 'gambar';
	public $id = 'id_gambar';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	function get_all()
	{
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}
}
