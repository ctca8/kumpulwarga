<?php

/*
* Kelas ini mendependsi ke model Upload_model, 
* view upload_form, dan view upload success
*/

class Upload extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('Upload_model');
  }

  public function index()
  {
      $this->load->view('adminlte/upload_form', array('error' => ' ' ));
  }

  public function do_upload()
  {
    $config['upload_path']          = './assets/gambar/';
    $config['allowed_types']        = 'gif|jpg|png';
    // $config['max_size']             = 100;
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('userfile'))
    {
      $error = array('error' => $this->upload->display_errors());

      $this->load->view('adminlte/upload_form', $error);
    }
    else
    {
      $data = array('upload_data' => $this->upload->data());
      $data2 = array(
              'nama_gambar' => $this->upload->data('file_name'),
              );
      $this->Upload_model->insert($data2);
      $this->load->view('adminlte/upload_success', $data);
    }
  }
}

?>