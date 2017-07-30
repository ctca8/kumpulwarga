<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* model ini untuk mengelola modul agenda
*/

class Agenda_model extends CI_Model
{
	
	public $table = 'agenda';
	public $id_agenda = 'id_agenda';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	function get_all($id_rt)
	{
		$this->db->where('id_rt', $id_rt);
		$this->db->order_by($this->id_agenda, $this->order);
		return $this->db->get($this->table)->result();
	}

	public function get_by_id($id_agenda)
	{
		$this->db->where($this->id_agenda, $id_agenda);
        return $this->db->get($this->table)->row();
	}
	
	public function get_by_kode_unik($kode_unik)
	{
		$this->db->where('kode_unik', $kode_unik);
        return $this->db->get($this->table)->result();
	}

	public function update($id_agenda, $data)
	{
		$this->db->where($this->id_agenda, $id_agenda);
		$this->db->update($this->table, $data);
	}

	public function delete($id_agenda)
	{
		$this->db->where($this->id_agenda, $id_agenda);
		$this->db->delete($this->table);
	}
}
