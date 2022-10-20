<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set("Asia/Jakarta");

class Pengumpulan_Dokumen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Dokumen'));
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['jenisDokumen'] = $this->M_Dokumen->tampil()->result();
        $this->load->view('v_kumpul_dokumen.php', $data);
    }

    function kumpul_dokumen()
    {
        $nama_pengumpul = $this->input->post('nama_pengumpul');
        $email_pengumpul = $this->input->post('email_pengumpul');
        $id_dokumen = $this->input->post('id_dokumen');

        $this->form_validation->set_rules('nama_pengumpul', 'Nama', 'required');
        $this->form_validation->set_rules('email_pengumpul', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('id_dokumen', 'Jenis Dokumen', 'required');
        if (empty($_FILES['dokumen']['name'])) {
            $this->form_validation->set_rules('dokumen', 'File', 'required');
        }

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('valid_email', '{field} harus valid');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_nama' => form_error('nama_pengumpul'),
                'error_email' => form_error('email_pengumpul'),
                'error_jenis' => form_error('id_dokumen'),
                'error_dokumen' => form_error('dokumen')
            );
            echo json_encode($respon);
        } else {
            //upload file
            $config['upload_path'] = './pengumpulanDokumen/';
            $config['allowed_types'] = 'zip';
            $config['max_size'] = 5000; //5 MB

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('dokumen')) {
                $respon = array(
                    'sukses' => false,
                    'error_dokumen' => "Upload Gagal, pastikan ukuran file tidak melebihi ketentuan dan format file zip"
                );
                echo json_encode($respon);
            } else {
                $tanggal = date('Y-m-d H:i:s');
                $dokumen =  $this->upload->data('file_name');
                $data = array(
                    'id_dokumen' => $id_dokumen,
                    'nama_lengkap_pengumpul' => $nama_pengumpul,
                    'email_pengumpul' => $email_pengumpul,
                    'nama_dokumen' => $dokumen,
                    'created_at' => $tanggal
                );
                $this->M_Dokumen->insert_record($data, 'pengumpulan_dokumen');
                $respon['sukses'] = "Pengumpulan berhasil";
                echo json_encode($respon);
            }
        }
    }
}
