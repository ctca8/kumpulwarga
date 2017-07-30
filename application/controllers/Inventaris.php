<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Inventaris_model');
		$this->load->model('Peminjaman_model');
		$this->load->model('Riwayat_alamat_model');
		$this->load->model('Keuangan_model');

		if ($this->session->userdata('logged')<>1) {
            redirect(site_url('auth'));
        }
	}

	public function index()
	{

		// untuk menandai peminjaman inventaris yang memerlukan konfirmasi
		$list_konfirmasi_pinjam = $this->Peminjaman_model->get_by_status();

		$list_inventaris = $this->Inventaris_model->get_all($this->session->userdata('id_rt'));

		// mengambil data rt di dalam satu kelurahan
		$list_rt = $this->Riwayat_alamat_model->get_by_kelurahan($this->session->userdata('id_kel'));

		$data = array(
			'title' => "inventaris",
			'action' => site_url('inventaris/tambah_action'),
			'inventaris_data' => $list_inventaris,
			'konfirmasi_pinjam_data' => $list_konfirmasi_pinjam,
			'rt_data' => $list_rt,
			);

		if ($this->session->userdata('status_jabatan')=="aktif" && $this->session->userdata('jabatan')=="1") {
			$this->template->display('inventaris/admin_list_inventaris', $data);
		} else {
			$this->template->display('inventaris/pdk_list_inventaris', $data);
		}

	}

	public function inventaris_rt()
	{

		// mengambil data rt di dalam satu kelurahan
		$list_rt = $this->Riwayat_alamat_model->get_by_kelurahan($this->session->userdata('id_kel'));

		$list_inventaris = $this->Inventaris_model->get_all($this->input->post('id_rt'));

		$data = array(
			'title' => "inventaris",
			'inventaris_data' => $list_inventaris,
			'rt_data' => $list_rt,
			);

		$this->template->display('inventaris/pdk_list_inventaris', $data);

	}

	public function tambah_action()
	{

		// SETTINGAN UNTUK UPLOAD GAMBAR
		$config['upload_path']          = './assets/gambar/inventaris/';
    $config['allowed_types']        = 'gif|jpg|png';
		$config['overwrite'] = TRUE;
		$config['encrypt_name'] = TRUE;

    $this->load->library('upload', $config);

    	//memindahkan gambar ke folder gambar
    	$this->upload->do_upload('gambar_inventaris');

		$data = array(
			'id_rt' => $this->session->userdata('id_rt'),
			'id_rj' => $this->session->userdata('id_rj'),
			'nama_inventaris' => $this->input->post('nama_inventaris',TRUE),
			'jumlah_inventaris' => $this->input->post('jumlah_inventaris', TRUE),
			'deskripsi_inventaris' => $this->input->post('deskripsi_inventaris',TRUE),
			'kondisi_inventaris' => $this->input->post('kondisi_inventaris',TRUE),
			'biaya_pinjam' => $this->input->post('biaya_pinjam',TRUE),
			'biaya_denda' => $this->input->post('biaya_denda',TRUE),
			'gambar_inventaris' => $this->upload->data('file_name'),
			);

		// insert ke database
		$this->Inventaris_model->insert($data);

		redirect(site_url('inventaris'));

	}

	public function detail_inventaris($id_inventaris)
	{

		$list_peminjaman = $this->Peminjaman_model->get_by_inventaris($id_inventaris);

		$row = $this->Inventaris_model->get_by_id($id_inventaris);
        if ($row) {
            $data = array(
		        'title' => "inventaris",
		        'id_inventaris' => $row->id_inventaris,
		        'id_rt' => $row->id_rt,
		        'id_rj' => $row->id_rj,
		        'nama_inventaris' => $row->nama_inventaris,
		        'jumlah_inventaris' => $row->jumlah_inventaris,
		        'deskripsi_inventaris' => $row->deskripsi_inventaris,
		        'kondisi_inventaris' => $row->kondisi_inventaris,
		        'biaya_pinjam' => $row->biaya_pinjam,
		        'biaya_denda' => $row->biaya_denda,
		        'gambar_inventaris' => $row->gambar_inventaris,
		        'peminjaman_data' => $list_peminjaman,
		        );
            $this->template->display('inventaris/detail_inventaris', $data);
        } else {
            // $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('inventaris'));
        }
	}

	public function form_pinjam($id_inventaris)
	{
		$data_inventaris = $this->Inventaris_model->get_by_id($id_inventaris);

		$data = array(
			'title' => "inventaris",
			'id_inventaris' => $id_inventaris,
			'action' => site_url('inventaris/pinjam_action'),

			// DATA INVENTARIS
			'nama_inventaris' => $data_inventaris->nama_inventaris,
			'jumlah_inventaris' => $data_inventaris->jumlah_inventaris,
			'gambar_inventaris' => $data_inventaris->gambar_inventaris,
			);

		$this->template->display('inventaris/form_pinjam_inventaris', $data);

	}

	public function pinjam_action()
	{

		$data_inventaris = $this->Inventaris_model->get_by_id($this->input->post('id_inventaris'));

				//HITUNG TOTAL BAYAR
				$start_date = new DateTime($this->input->post('tgl_pinjam'));
        $end_date = new DateTime($this->input->post('tgl_kembali'));
        $interval = $start_date->diff($end_date);

        if ($interval->days=="0") {
					//JIKA INTERVAL HANYA SEHARI
        	$bayar_total=$data_inventaris->biaya_pinjam*$this->input->post('jumlah_pinjam');
        } else {
					$bayar_total=$interval->days*$data_inventaris->biaya_pinjam*$this->input->post('jumlah_pinjam');
        }
        //JIKA PEMINJAM DARI LUAR RT
        if ($data_inventaris->id_rt != $this->session->userdata('id_rt')) {
        	$bayar_total=$bayar_total+3000;
        }

    // SET DATA UNTUK INPUTAN DATABASE PEMINJAMAN
		$data = array(
			'id_pdk' => $this->session->userdata('id_pdk'),
			'id_inventaris' => $this->input->post('id_inventaris'),
			'tgl_pinjam' => $this->input->post('tgl_pinjam'),
			'tgl_kembali' => $this->input->post('tgl_kembali'),
			'jumlah_pinjam' => $this->input->post('jumlah_pinjam'),
			'total_bayar' => $bayar_total,
			'status_peminjaman' => "menunggu konfirmasi",
			);

		$this->Peminjaman_model->insert($data);
		$this->detail_inventaris($this->input->post('id_inventaris'));
	}

	// UNTUK MELAYANI REQUEST AJAX DETAIL PEMINJAMAN
	public function pinjam_detail()
	{

		$id_peminjaman= $this->input->post('id_peminjaman');
		$nama_inventaris= $this->input->post('nama_inventaris');
		$peminjaman_data= $this->Peminjaman_model->get_by_id($id_peminjaman);

		$data = array(
				'nama_inventaris' => $nama_inventaris,
				'tgl_pinjam' => $peminjaman_data->tgl_pinjam,
				'tgl_kembali' => $peminjaman_data->tgl_kembali,
				'jumlah_pinjam' => $peminjaman_data->jumlah_pinjam,
				'jumlah_kembali' => $peminjaman_data->jumlah_kembali,
				'total_bayar' => $peminjaman_data->total_bayar,
				'total_denda' => $peminjaman_data->total_denda,
				'keterangan_kembali' => $peminjaman_data->keterangan_kembali,
			);

		$this->template->display('inventaris/detail_peminjaman', $data);

	}

	// DILAKSANAKAN OLEH ADMIN
	public function konfirmasi_pinjam($id_peminjaman, $status_peminjaman)
	{

		// MENGAMBIL DATA PEMINJAMAN
		$data_peminjaman = $this->Peminjaman_model->get_by_id($id_peminjaman);
		// MENGAMBIL DATA INVENTARIS
		$data_inventaris = $this->Inventaris_model->get_by_id($data_peminjaman->id_inventaris);

		// PENGKONDISIAN UPDATE INVENTARIS MODEL BERDASARKAN STATUS
		if ($status_peminjaman=="disetujui") {
			// MENGURANGI JUMLAH INVENTARIS
			$data = array('jumlah_inventaris' => $data_inventaris->jumlah_inventaris-$data_peminjaman->jumlah_pinjam, );
			// UPDATE JUMLAH INVENTARIS KE DATABASE
			$this->Inventaris_model->update($data_inventaris->id_inventaris, $data);

			// UPDATE KE DATABASE PEMINJAMAN
	        $data2 = array(
				'status_peminjaman' => $status_peminjaman,
				);
			$this->Peminjaman_model->update($id_peminjaman, $data2);

		} elseif ($status_peminjaman=="kembali") {

			// MENAMBAH JUMLAH INVENTARIS SESUAI DENGAN YANG DIKEMBALIKAN
			$jumlah_inventaris= $data_inventaris->jumlah_inventaris;
			$jumlah_kembali= $this->input->post('jumlah_kembali');

			$data = array(
				'jumlah_inventaris' => $jumlah_inventaris + $jumlah_kembali,
				);

			// INPUT JUMLAH INVENTARIS KEMBALI
			$this->Inventaris_model->update($data_inventaris->id_inventaris, $data);

			// MENGHITUNG TOTAL DENDA
			$jumlah_pinjam=$data_peminjaman->jumlah_pinjam;
			$jumlah_kembali=$this->input->post('jumlah_kembali');
			$biaya_denda=$data_inventaris->biaya_denda;

			$total_denda = ($jumlah_pinjam - $jumlah_kembali) * $biaya_denda;

			// OTOMATIS MENAMBAH KEUANGAN KE DALAM KAS
			$data_keuangan = array(
	            'id_rt'           => $this->session->userdata('id_rt'),
	            'id_rj'           => $this->session->userdata('id_rj'),
	            'nominal'         => $total_denda + $data_peminjaman->total_bayar,
	            'status_uang'     => "masuk",
	            'keterangan_uang' => "uang peminjaman ".$data_inventaris->nama_inventaris,
	            'tgl_uang'        => $data_peminjaman->tgl_kembali,
	        	);

	        $this->Keuangan_model->insert($data_keuangan);

	    // UPDATE KE DATABASE PEMINJAMAN
	    $data_pinjam = array(
				'jumlah_kembali' => $this->input->post('jumlah_kembali'),
				'total_denda' => $total_denda,
				'keterangan_kembali' => $this->input->post('keterangan_kembali'),
				'status_peminjaman' => $status_peminjaman,
				);
			$this->Peminjaman_model->update($id_peminjaman, $data_pinjam);

		} else {
			// SESI INI AKAN DIEKSEKUSI JIKA PEMINJAMAN DITOLAK
			// UPDATE KE DATABASE PEMINJAMAN
	    $data2 = array(
				'status_peminjaman' => $status_peminjaman,
				);
			$this->Peminjaman_model->update($id_peminjaman, $data2);
		}

		$this->detail_inventaris($data_peminjaman->id_inventaris);
	}

	// FORM KEMBALI
	public function form_kembali($id_peminjaman)
	{
		// MENGAMBIL DATA PEMINJAMAN BERDASARKAN ID
		$data_peminjaman=$this->Peminjaman_model->get_by_id($id_peminjaman);

		$data = array(
			'title' => "inventaris",

			'id_peminjaman' => $id_peminjaman,
			'tgl_kembali' => $data_peminjaman->tgl_kembali,
			'jumlah_pinjam' => $data_peminjaman->jumlah_pinjam,
			'total_bayar' => $data_peminjaman->total_bayar,
			);

		$this->template->display('inventaris/form_kembali', $data);

	}

	/*
	* dalam method ini nanti juga bisa diubah status inventaris
	* sehingga inventaris tidak dapat dihapus tetapi dapat diubah status
	* menjadi rusak, hilang atau dijual
	*/
	public function ubah_inventaris_form($id_inventaris)
	{

		$row = $this->Inventaris_model->get_by_id($id_inventaris);

		$data = array(
			'title' => "inventaris",
			'action' => site_url('inventaris/ubah_inventaris_action'),

			'id_inventaris' => $row->id_inventaris,
			'nama_inventaris' => $row->nama_inventaris,
			'jumlah_inventaris' => $row->jumlah_inventaris,
			'deskripsi_inventaris' => $row->deskripsi_inventaris,
			'kondisi_inventaris' => $row->kondisi_inventaris,
			'biaya_pinjam' => $row->biaya_pinjam,
			'biaya_denda' => $row->biaya_denda,
			'gambar_inventaris' => $row->gambar_inventaris,
			);

		$this->template->display('inventaris/form_ubah', $data);
	}

	public function ubah_inventaris_action()
	{
		$data = array(
			'jumlah_inventaris' => $this->input->post('jumlah_inventaris'),
			'deskripsi_inventaris' => $this->input->post('deskripsi_inventaris'),
			'kondisi_inventaris' => $this->input->post('kondisi_inventaris'),
			'biaya_pinjam' => $this->input->post('biaya_pinjam'),
			);

		$this->Inventaris_model->update($this->input->post('id_inventaris'), $data);
        redirect(site_url('inventaris'));
	}

}

/* End of file Inventaris.php */
/* Location: ./application/controllers/Inventaris.php */
