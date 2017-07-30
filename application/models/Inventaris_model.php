<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris_model extends CI_Model {

	public $table = 'inventaris';
	public $id = 'id_inventaris';
	public $order = 'DESC';

	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_all($id_rt)
	{
		$this->db->where('id_rt', $id_rt);
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}

	public function get_by_id($id)
	{
		$this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
	}

	public function update($id_inventaris, $data)
	{
		$this->db->where($this->id, $id_inventaris);
		$this->db->update($this->table, $data);
	}

}

/* End of file Inventaris_model.php */
/* Location: ./application/models/Inventaris_model.php */