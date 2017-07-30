<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('riwayat_alamat_model');
        $this->load->model('riwayat_jabatan_model');
    }

    public function index($error = NULL) {
        $data = array(
            'title' => 'KumpulWarga | Login',
            'action' => site_url('auth/login'),
            'error' => $error
        );
        $this->load->view('login', $data);
    }

    public function login() {        
        $login = $this->auth_model->login($this->input->post('username'), $this->input->post('pass_pdk'));

        if ($login == 1) {
            //ambil data penduduk
            $penduduk = $this->auth_model->data_login($this->input->post('username'), $this->input->post('pass_pdk'));

            // ambil data riwayat alamat
            // pengambilan data sampai dusun
            $riwayat_alamat = $this->riwayat_alamat_model->get_by_id($penduduk->id_pdk);

            // ambil data riwayat jabatan
            $riwayat_jabatan = $this->riwayat_jabatan_model->get_by_id($penduduk->id_pdk);

            // daftarkan session
            $data = array(
                'logged' => TRUE,
                'id_pdk' => $penduduk->id_pdk,
                'nama_pdk' => $penduduk->nama_pdk,
                'photo' => $penduduk->photo,
                'id_rj' => $riwayat_jabatan->id_rj,
                'status_jabatan' => $riwayat_jabatan->stts_rj,
                'jabatan' => $riwayat_jabatan->id_j,
                'id_rt' => $riwayat_alamat->id_rt,
                'rt' => $riwayat_alamat->nama_rt,
                'id_rw' => $riwayat_alamat->id_rw,
                'rw' => $riwayat_alamat->nama_rw,
                'dusun' => $riwayat_alamat->nama_dusun,
                'id_kel' => $riwayat_alamat->id_kel,
                'kelurahan' => $riwayat_alamat->nama_kel,
            );
            $this->session->set_userdata($data);

            //redirect ke halaman sukses
            redirect(site_url('warga'));
        } else {
            //tampilkan pesan error
            $error = 'NIK / password salah';
            $this->index($error);
        }
    }

    function logout() {
        //destroy session
        $this->session->sess_destroy();
        
        //redirect ke halaman login
        redirect(site_url('auth'));
    }

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */