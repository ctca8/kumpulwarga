<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Keuangan_model');

        if ($this->session->userdata('logged') != 1) {
            redirect(site_url('auth'));
        }
    }

    public function index()
    {

        $list_keuangan = $this->Keuangan_model->get_all($this->session->userdata('id_rt'));

        // memanggil fungsi hitung_saldo()
        $saldo = $this->hitung_saldo($list_keuangan);

        $data = array(
            'title'         => 'keuangan',
            'action'        => site_url('keuangan/tambah_action'),
            'keuangan_data' => $list_keuangan,
            'saldo'         => $saldo,
        );

        $this->template->display('keuangan/list_keuangan', $data);
    }

    public function uang_bulanan()
    {
        // mengambil data bulan dari inputan
        $bulan = $this->input->post('filter_bulan', true);

        // mengambil data dari database berdasakan bulan
        $list_keuangan = $this->Keuangan_model->get_by_bulan($bulan, $this->session->userdata('id_rt'));

        // memanggil fungsi hitung_saldo()
        $saldo = $this->hitung_saldo($list_keuangan);

        $data = array(
            'title'         => 'keuangan',
            'action'        => site_url('keuangan/tambah_action'),
            'keuangan_data' => $list_keuangan,
            'saldo'         => $saldo,
        );

        $this->template->display('keuangan/list_keuangan', $data);
    }

    public function tambah_action()
    {

        $data = array(
            'id_rt'           => $this->session->userdata('id_rt'),
            'id_rj'           => $this->session->userdata('id_rj'),
            'nominal'         => $this->input->post('nominal', true),
            'status_uang'     => $this->input->post('status_uang', true),
            'keterangan_uang' => $this->input->post('keterangan_uang', true),
            'tgl_uang'        => $this->input->post('tgl_uang', true),
        );

        $this->Keuangan_model->insert($data);

        redirect(site_url('keuangan'));

    }

    // untuk menghitung saldo keuagan
    public function hitung_saldo($keuangan_data)
    {
        $uangmasuk  = 0;
        $uangkeluar = 0;
        
        foreach ($keuangan_data as $keuangan) {
            if ($keuangan->status_uang == "masuk") {
                $uangmasuk = $uangmasuk + $keuangan->nominal;
            } elseif($keuangan->status_uang == "keluar") {
                $uangkeluar = $uangkeluar + $keuangan->nominal;
            }
        }

        $saldo = $uangmasuk - $uangkeluar;
        return $saldo;
    }

    // untuk mengubah status keuangan
    public function ubah_form($id_keuangan)
    {
        
        $row = $this->Keuangan_model->get_by_id($id_keuangan);

        $data = array(
            'title' => "Informasi Kas",
            'action' => site_url('keuangan/ubah_action'),

            'id_keuangan' => $row->id_keuangan,
            'nominal' => $row->nominal,
            'status_uang' => $row->status_uang,
            'keterangan_uang' => $row->keterangan_uang,
            'tgl_uang' => $row->tgl_uang,
            );

        $this->template->display('keuangan/form_ubah', $data);
    }

    public function ubah_action()
    {
        // dalam pengerjaan
        $data = array(
            'status_uang' => "dihapus",
            'keterangan_uang' => $this->input->post('keterangan_uang'),
            );

        $this->Keuangan_model->update($this->input->post('id_keuangan'), $data);
        redirect(site_url('keuangan'));

    }

    public function hapus_action($id_keuangan)
    {
        // dalam pengerjaan

    }

}

/* End of file Keuangan.php */
/* Location: ./application/controllers/Keuangan.php */
