<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumpulan_Dokumen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Dokumen'));
        $this->load->helper(array('form', 'url'));
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
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m-d');

        //upload file
        $config['upload_path'] = './pengumpulanDokumen/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 5000; //5 MB

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('dokumen')) {
            echo "Upload Gagal, pastikan ukuran file tidak melebihi ketentuan dan format file pdf";
        } else {
            $config = [
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'protocol'  => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_user' => 'hery.uph@gmail.com',   // Email gmail
                'smtp_pass'   => 'uph.123456',     // Password gmail
                'smtp_crypto' => 'ssl',
                'smtp_port'   => 465,
                'crlf'    => "\r\n",
                'newline' => "\r\n"
            ];

            // Load library email dan konfigurasinya
            $this->load->library('email');

            $this->email->initialize($config);

            // Email dan nama pengirim
            $this->email->from('hery.uph@gmail.com', 'hery uph');
            // Email penerima
            $this->email->to($email_pengumpul);
            // Subject
            $this->email->subject('Halo');
            // Isi
            $this->email->message("Dokumen Anda sudah Kami Terima");

            if ($this->email->send()) {
                echo 'Sukses! Email terkirim.';
            } else {
                echo 'Error! email tidak dapat dikirim.';
            }

            $dokumen = $this->upload->data('file_name');
            $data = array(
                'id_dokumen' => $id_dokumen,
                'nama_lengkap_pengumpul' => $nama_pengumpul,
                'email_pengumpul' => $email_pengumpul,
                'kumpul_dokumen' => $dokumen,
                'tanggal_kumpul' => $tanggal
            );

            $this->M_Dokumen->insert_record($data, 'pengumpulan_dokumen');
            redirect('Home');
        }
    }
}
