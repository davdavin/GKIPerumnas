<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Konten'));
    }

    public function index()
    {
        $data['galeri'] = $this->M_Konten->tampil_foto_ibadah()->result();
      $this->load->view('v_lihat_galeri.php', $data);
    }
}