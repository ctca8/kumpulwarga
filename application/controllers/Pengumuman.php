<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * kontroler ini akan mengelola modul pengumuman
 */

class Pengumuman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengumuman_model');
        $this->load->model('Riwayat_alamat_model');

        // settingan untuk upload gambar
        $config['upload_path']   = './assets/gambar/pengumuman/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = TRUE;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->load->helper('file');

        if ($this->session->userdata('logged') != 1) {
            redirect(site_url('auth'));
        }
    }

    public function index()
    {

        $list_pengumuman = $this->Pengumuman_model->get_all($this->session->userdata('id_rt'));

        $data = array(
            'title'           => "pengumuman",
            'action'          => site_url('pengumuman/tambah_action'),
            'pengumuman_data' => $list_pengumuman,
        );
        $this->template->display('pengumuman/list_pengumuman', $data);
    }

    public function tambah_action()
    {

        // jika jabatanya sebagai Lurah akan menambahkan pengumuman 
        // ke masing2 rt di kelurahan terkait
        if ($this->session->userdata('jabatan')=="3") {
            $list_rt = $this->Riwayat_alamat_model->get_by_kelurahan($this->session->userdata('id_kel'));

            //memindahkan gambar ke folder gambar
            $this->upload->do_upload('gambar_pengumuman');
            foreach ($list_rt as $rt) {
                 $data = array(
                    'id_rt'             => $rt->id_rt,
                    'id_rj'             => $this->session->userdata('id_rj'),
                    'judul'             => $this->input->post('judul', TRUE),
                    'isi_pengumuman'    => $this->input->post('isi_pengumuman', TRUE),
                    'gambar_pengumuman' => $this->upload->data('file_name'),
                );
                // insert ke database
                $this->Pengumuman_model->insert($data);
            }

        }

        // jika jabatanya sebagai RW akan menambahkan pengumuman 
        // ke masing2 rt di RW terkait
        if ($this->session->userdata('jabatan')=="2") {
            $list_rt = $this->Riwayat_alamat_model->get_by_rw($this->session->userdata('id_rw'));

            //memindahkan gambar ke folder gambar
            $this->upload->do_upload('gambar_pengumuman');
            foreach ($list_rt as $rt) {
                 $data = array(
                    'id_rt'             => $rt->id_rt,
                    'id_rj'             => $this->session->userdata('id_rj'),
                    'judul'             => $this->input->post('judul', TRUE),
                    'isi_pengumuman'    => $this->input->post('isi_pengumuman', TRUE),
                    'gambar_pengumuman' => $this->upload->data('file_name'),
                );
                // insert ke database
                $this->Pengumuman_model->insert($data);
            }

        }

        // jika jabatanya sebagai RT akan menambahkan pengumuman 
        // ke RT-nya sendiri
        if ($this->session->userdata('jabatan')=="1") {
            //memindahkan gambar ke folder gambar
            $this->upload->do_upload('gambar_pengumuman');
            $data = array(
                    'id_rt'             => $this->session->userdata('id_rt'),
                    'id_rj'             => $this->session->userdata('id_rj'),
                    'judul'             => $this->input->post('judul', TRUE),
                    'isi_pengumuman'    => $this->input->post('isi_pengumuman', TRUE),
                    'gambar_pengumuman' => $this->upload->data('file_name'),
                );
                // insert ke database
                $this->Pengumuman_model->insert($data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>Pengumuman berhasil ditambahkan!</h4>
              </div>');
        redirect(site_url('pengumuman'));

    }

    // menset data di form ubah pengumuman
    public function ubah_form($id_pengumuman)
    {
    	$pengumuman = $this->Pengumuman_model->get_by_id($id_pengumuman);

    	$data = array(
    		'title' => "pengumuman",
    		'action' => site_url('pengumuman/ubah_action'),

    		'id_pengumuman' => $id_pengumuman,
    		'judul' => $pengumuman->judul,
    		'isi_pengumuman' => $pengumuman->isi_pengumuman,
    		'gambar_pengumuman' => $pengumuman->gambar_pengumuman,
    		);

    	$this->template->display('pengumuman/form_edit', $data);
    }

    public function ubah_action()
    {   
        
        $row= $this->Pengumuman_model->get_by_id($this->input->post('id_pengumuman'));

        //memindahkan gambar ke folder gambar
        $this->upload->do_upload('gambar_pengumuman');
        // kondisi untuk mengatasi jika gambar tidak diubah
        if($this->upload->data('file_name')!="") {
            @unlink('./assets/gambar/pengumuman/'.$row->gambar_pengumuman);
            $data = array(
                'judul'             => $this->input->post('judul', TRUE),
                'isi_pengumuman'    => $this->input->post('isi_pengumuman', TRUE),
                'gambar_pengumuman' => $this->upload->data('file_name'),
                );
        }else{
            $data = array(
                'judul'             => $this->input->post('judul', TRUE),
                'isi_pengumuman'    => $this->input->post('isi_pengumuman', TRUE),
                );
        }

        $list_edit = $this->Pengumuman_model->get_by_gambar($row->gambar_pengumuman);
        foreach ($list_edit as $edit) {
            $this->Pengumuman_model->update($edit->id_pengumuman, $data);
        }

    	// $this->Pengumuman_model->update($this->input->post('id_pengumuman'), $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>Pengumuman berhasil diubah!</h4>
              </div>');
    	redirect(site_url('pengumuman'));

    }

    public function hapus_action($id_pengumuman)
    {

        $row = $this->Pengumuman_model->get_by_id($id_pengumuman);

        $list_hapus = $this->Pengumuman_model->get_by_gambar($row->gambar_pengumuman);
        foreach ($list_hapus as $hapus) {
            $this->Pengumuman_model->delete($hapus->id_pengumuman);
        }
        @unlink('./assets/gambar/pengumuman/'.$row->gambar_pengumuman);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>Pengumuman berhasil dihapus!</h4>
              </div>');
        redirect(site_url('pengumuman'));

        // if ($row) {
        //     $this->Pengumuman_model->delete($id_pengumuman);
        //     @unlink('./assets/gambar/pengumuman/'.$row->gambar_pengumuman);
        //     $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        //         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        //         <h4><i class="icon fa fa-check"></i>Pengumuman berhasil dihapus!</h4>
        //       </div>');
        //     redirect(site_url('pengumuman'));
        // } else {
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
        //         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        //         <h4><i class="icon fa fa-ban"></i>Pengumuman gagal dihapus!</h4>
        //       </div>');
        //     redirect(site_url('pengumuman'));
        // }
    }

}
