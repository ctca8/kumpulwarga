<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warga extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Warga_model');
		$this->load->model('Riwayat_alamat_model');
	}

	public function index()
	{
		$list_warga = $this->Warga_model->get_by_rt($this->session->userdata('id_rt'));
		// $list_warga = $this->Warga_model->get_by_rw($this->session->userdata('id_rw'));
		// $list_warga = $this->Warga_model->get_by_kelurahan($this->session->userdata('id_kel'));
		if ($this->session->userdata('status_jabatan')=="aktif" && $this->session->userdata('jabatan')!="1") {
			if ($this->session->userdata('jabatan')=="2") {
				$list_rt = $this->Riwayat_alamat_model->get_by_rw($this->session->userdata('id_rw'));
			} elseif ($this->session->userdata('jabatan')=="3") {
				$list_rt = $this->Riwayat_alamat_model->get_by_kelurahan($this->session->userdata('id_kel'));
			}

			$data = array(
				'title' => "warga",
				'warga_data' => $list_warga,
				'rt_data' => $list_rt,
				);

		} else {
			$data = array(
				'title' => "warga",
				'warga_data' => $list_warga,
				);
		}

		$this->template->display('warga/warga_list', $data);
	}

	public function warga_rt()
	{
		$rt = $this->input->post('id_rt');
		$list_warga = $this->Warga_model->get_by_rt($rt);
		
		if ($this->session->userdata('jabatan')=="2") {
			$list_rt = $this->Riwayat_alamat_model->get_by_rw($this->session->userdata('id_rw'));
		} elseif ($this->session->userdata('jabatan')=="3") {
			$list_rt = $this->Riwayat_alamat_model->get_by_kelurahan($this->session->userdata('id_kel'));
		}

		$data = array(
			'title' => "warga",
			'warga_data' => $list_warga,
			'rt_data' => $list_rt,
			);

		$this->template->display('warga/warga_list', $data);
	}

}

/* End of file Warga.php */
/* Location: ./application/controllers/Warga.php */