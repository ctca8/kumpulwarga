<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* kontroler ini akan mengelola modul agenda
*/

class Agenda extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Agenda_model');
		$this->load->model('Riwayat_alamat_model');

		if ($this->session->userdata('logged')<>1) {
            redirect(site_url('auth'));
        }
	}

	public function index()
	{
		
		$list_agenda= $this->Agenda_model->get_all($this->session->userdata('id_rt'));

		$data = array(
			'title' => "agenda",
			'action' => site_url('agenda/tambah_action'),
			// 'agenda_data' => $list_agenda,
			);
		$this->template->display('agenda/list_agenda', $data);
		// $this->template->display('agenda/coba_calendar', $data);

	}

	public function tambah_action()
	{

        // jika jabatanya sebagai Lurah akan menambahkan agenda 
        // ke masing2 rt di kelurahan terkait
        if ($this->session->userdata('jabatan')=="3") {
            $list_rt = $this->Riwayat_alamat_model->get_by_kelurahan($this->session->userdata('id_kel'));

            foreach ($list_rt as $rt) {
                 // set data untuk memasukan ke database
				$data = array(
					'id_rt' => $rt->id_rt,
					'id_rj' => $this->session->userdata('id_rj'),
					'title' => $this->input->post('nama_agenda', TRUE),
					'description' => $this->input->post('keterangan_agenda', TRUE),
					'start' => $this->input->post('tgl_mulai', TRUE),
					'end' => $this->input->post('tgl_selesai', TRUE),
					'lokasi' => $this->input->post('lokasi', TRUE),
					'status_agenda' => $this->input->post('status_agenda', TRUE),
					'kode_unik' => md5($this->input->post('nama_agenda').$this->input->post('keterangan_agenda')),
					);
                // insert ke database
                $this->Agenda_model->insert($data);
            }

        }

        // jika jabatanya sebagai Ketua RW akan menambahkan agenda 
        // ke masing2 rt di RW terkait
        if ($this->session->userdata('jabatan')=="2") {
            $list_rt = $this->Riwayat_alamat_model->get_by_rw($this->session->userdata('id_rw'));

            foreach ($list_rt as $rt) {
                 // set data untuk memasukan ke database
				$data = array(
					'id_rt' => $rt->id_rt,
					'id_rj' => $this->session->userdata('id_rj'),
					'title' => $this->input->post('nama_agenda', TRUE),
					'description' => $this->input->post('keterangan_agenda', TRUE),
					'start' => $this->input->post('tgl_mulai', TRUE),
					'end' => $this->input->post('tgl_selesai', TRUE),
					'lokasi' => $this->input->post('lokasi', TRUE),
					'status_agenda' => $this->input->post('status_agenda', TRUE),
					'kode_unik' => md5($this->input->post('nama_agenda').$this->input->post('keterangan_agenda')),
					);
                // insert ke database
                $this->Agenda_model->insert($data);
            }

        }

         // jika jabatanya sebagai RT akan menambahkan agenda 
        // ke RT-nya sendiri
        if ($this->session->userdata('jabatan')=="1") {
            // set data untuk memasukan ke database
			$data = array(
				'id_rt' => $this->session->userdata('id_rt'),
				'id_rj' => $this->session->userdata('id_rj'),
				'title' => $this->input->post('nama_agenda', TRUE),
				'description' => $this->input->post('keterangan_agenda', TRUE),
				'start' => $this->input->post('tgl_mulai', TRUE),
				'end' => $this->input->post('tgl_selesai', TRUE),
				'lokasi' => $this->input->post('lokasi', TRUE),
				'status_agenda' => $this->input->post('status_agenda', TRUE),
				'kode_unik' => md5($this->input->post('nama_agenda').$this->input->post('keterangan_agenda')),
				);

			// insert ke database
			$this->Agenda_model->insert($data);
        }







  //   	// set data untuk memasukan ke database
		// $data = array(
		// 	'id_rt' => $this->session->userdata('id_rt'),
		// 	'id_rj' => $this->session->userdata('id_rj'),
		// 	'title' => $this->input->post('nama_agenda', TRUE),
		// 	'description' => $this->input->post('keterangan_agenda', TRUE),
		// 	'start' => $this->input->post('tgl_mulai', TRUE),
		// 	'end' => $this->input->post('tgl_selesai', TRUE),
		// 	'lokasi' => $this->input->post('lokasi', TRUE),
		// 	'status_agenda' => $this->input->post('status_agenda', TRUE),
		// 	);

		// // insert ke database
		// $this->Agenda_model->insert($data);
		
		redirect(site_url('agenda'));

	}

	public function detail_agenda($id_agenda)
	{
		$row = $this->Agenda_model->get_by_id($id_agenda);
        if ($row) {
            $data = array(
		        'title' => "agenda",
		        'id_agenda' => $row->id_agenda,
		        'id_rt' => $row->id_rt,
		        'id_rj' => $row->id_rj,
		        'judul' => $row->title,
		        'description' => $row->description,
		        'start' => $row->start,
		        'end' => $row->end,
		        'lokasi' => $row->lokasi,
		        'status_agenda' => $row->status_agenda,
		        );
            $this->template->display('agenda/detail_agenda', $data);
        } else {
            // $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agenda'));
        }
	}

	// melempar data dalam bentuk json untuk calendar
	public function getEvents()
	{
		
		$result = $this->Agenda_model->get_all($this->session->userdata('id_rt'));
		echo json_encode($result);

	}

	public function ubah_form($id_agenda)
	{
	
		$row = $this->Agenda_model->get_by_id($id_agenda);
		$data = array(
			'action' => site_url('Agenda/ubah_action'),
			'id_agenda' => $row->id_agenda,
			'title' => $row->title,
			'description' => $row->description,
			'start' => $row->start,
			'end' => $row->end,
			'lokasi' => $row->lokasi,
			'status_agenda' => $row->status_agenda,
			);
		$this->template->display('agenda/form_edit', $data);

	}

	public function ubah_action()
	{

		$row = $this->Agenda_model->get_by_id($this->input->post('id_agenda'));

		$data = array(
			'title' => $this->input->post('title'), 
			'description' => $this->input->post('description'), 
			'start' => $this->input->post('start'), 
			'end' => $this->input->post('end'),
			'lokasi' => $this->input->post('lokasi'),
			'status_agenda' => $this->input->post('status_agenda'),
			);

		$list_edit = $this->Agenda_model->get_by_kode_unik($row->kode_unik);
        foreach ($list_edit as $edit) {
            $this->Agenda_model->update($edit->id_agenda, $data);
        }

		// $this->Agenda_model->update($this->input->post('id_agenda'), $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>Agenda berhasil diubah!</h4>
              </div>');
		$this->detail_agenda($this->input->post('id_agenda'));

	}

	public function hapus_action($id_agenda)
	{
		
		$row = $this->Agenda_model->get_by_id($id_agenda);

        if ($row) {
            $list_hapus = $this->Agenda_model->get_by_kode_unik($row->kode_unik);
	        foreach ($list_hapus as $hapus) {
	            $this->Agenda_model->delete($hapus->id_agenda);
	        }

            // $this->Agenda_model->delete($id_agenda);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>Agenda berhasil dihapus!</h4>
              </div>');
            redirect(site_url('agenda'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i>agenda gagal dihapus!</h4>
              </div>');
            redirect(site_url('agenda'));
        }
	}

}
