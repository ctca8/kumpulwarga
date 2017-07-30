<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tampilan extends CI_Controller {

	// controller ini berguna untuk membuat user interface
	// tidak mempengaruhi sistem
	
	function __construct()
    {
        parent::__construct();
        $this->load->library('calendar');

        if ($this->session->userdata('logged')<>1) {
            redirect(site_url('auth'));
        }
    }

	public function index()
	{
		$data= array(
			'title' => "beranda"
			);
		$this->template->display('beranda', $data);
	}

	public function agenda()
	{
		$data= array(
			'title' => "agenda"
			);
		$this->template->display('agenda/list_agenda', $data);
		// echo $this->calendar->generate();
	}

	public function pengumuman()
	{
		$data= array(
			'title' => "pengumuman"
			);
		$this->template->display('adminlte/konten_kosongan', $data);
	}

	public function keuangan()
	{
		$data= array(
			'title' => "keuangan"
			);
		$this->template->display('adminlte/konten_kosongan', $data);
	}

	public function inventaris()
	{
		$data= array(
			'title' => "inventaris"
			);
		$this->template->display('adminlte/konten_kosongan', $data);
	}

	public function login()
	{
		$this->load->view('login');
	}
}
