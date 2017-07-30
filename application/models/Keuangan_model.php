<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan_model extends CI_Model {

	public $table = 'keuangan';
	public $id_keuangan = 'id_keuangan';
	public $order = 'ASC';

	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_keuangan)
	{
		$this->db->where($this->id_keuangan, $id_keuangan);
		return $this->db->get($this->table)->row();
	}

	public function get_all($id_rt)
	{
		$this->db->where('id_rt', $id_rt);
		$this->db->order_by('tgl_uang', $this->order);
		return $this->db->get($this->table)->result();
	}

	function get_by_bulan($bulan, $id_rt)
    {
        $this->db->where('month(tgl_uang)', $bulan);
        $this->db->where('id_rt', $id_rt);
        return $this->db->get($this->table)->result();
    }

    public function update($id_keuangan, $data)
    {
    	$this->db->where($this->id_keuangan, $id_keuangan);
    	$this->db->update($this->table, $data);
    }

    public function delete($id_keuangan)
    {
    	# code...
    }
}

/* End of file Keuangan_model.php */
/* Location: ./application/models/Keuangan_model.php */