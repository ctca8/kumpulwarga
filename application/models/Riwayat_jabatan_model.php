<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_jabatan_model extends CI_Model
{

	public $table= 'riwayat_jabatan';
	public $id= 'id_rj';
	public $id_pdk= 'id_pdk';

	public function __construct(){
		parent::__construct();
	}

	// get data by id_pdk
    function get_by_id($id_pdk)
    {
        $this->db->where($this->id_pdk, $id_pdk);
        return $this->db->get($this->table)->row();
    }
}