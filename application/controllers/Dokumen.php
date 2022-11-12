<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Dokumen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect('login');
        }

        $this->load->model(array('M_Dokumen'));
        $this->load->helper(array('form', 'url', 'file'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Dokumen";
        $data['dokumen'] = $this->M_Dokumen->tampil()->result();
        $data['pengumpulanDokumen'] = $this->M_Dokumen->tampil_pengumpulan()->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/dokumen/v_lihat_dokumen.php', $data);
    }

    public function tampil_dokumen()
    {
        $dokumen = $this->M_Dokumen->tampil()->result();
        echo json_encode($dokumen);
    }

    public function tampil_pengumpulan()
    {
        $pengumpulan = $this->M_Dokumen->tampil_pengumpulan()->result_array();
        for ($i = 0; $i < count($pengumpulan); $i++) {
            $pengumpulan[$i]['created_at'] = tanggal_indonesia($pengumpulan[$i]['created_at']);
        }
        echo json_encode($pengumpulan);
    }

    public function view_file($dokumen)
    {
        $data['dokumen'] = $this->db->query("SELECT nama_dokumen FROM dokumen WHERE nama_dokumen = '$dokumen'")->row_array();
        $this->load->view('admin/dokumen/v_lihat_file.php', $data);
    }

    public function tambah_dokumen()
    {
        $jenis_dokumen = $this->input->post('jenis');
        $keterangan = $this->input->post('keterangan');

        $this->form_validation->set_rules('jenis', 'Jenis', 'required|is_unique[dokumen.jenis_dokumen]');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if (empty($_FILES['dokumen']['name'])) {
            $this->form_validation->set_rules('dokumen', 'Dokumen', 'required');
        }

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('is_unique', '{field} dokumen ini sudah ada');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_jenis' => form_error('jenis'),
                'error_dokumen' => form_error('dokumen'),
                'error_keterangan' => form_error('keterangan')
            );
            echo json_encode($respon);
        } else {
            //upload file
            $config['upload_path'] = './dokumenFormulir/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 5000; //5 MB

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('dokumen')) {
                $respon['sukses'] = false;
                $respon['error_dokumen'] = "Tidak berhasil upload file. Format file hanya pdf dan ukuran file maksimal 5MB";
                echo json_encode($respon);
            } else {
                $tanggal = date('Y-m-d H:i:s');
                $dokumen = $this->upload->data('file_name');

                $data = array(
                    'jenis_dokumen' => $jenis_dokumen,
                    'nama_dokumen' => $dokumen,
                    'keterangan' => $keterangan,
                    'status_dokumen' => 'DITERBITKAN',
                    'created_at' => $tanggal
                );

                $this->M_Dokumen->insert_record($data, 'dokumen');
                $respon['sukses'] = "Data berhasil disimpan";
                echo json_encode($respon);
            }
        }
    }

    public function edit_dokumen($id_dokumen)
    {
        $data['title'] = "Dokumen";
        $where = array('id_dokumen' => $id_dokumen);
        $data['dokumenEdit'] = $this->M_Dokumen->tampil_edit($where, 'dokumen')->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/dokumen/v_edit_dokumen.php', $data);
    }

    public function proses_edit_dokumen()
    {
        $id_dokumen = $this->input->post('id_dokumen');
        $jenis_dokumen_lama = $this->input->post('jenis_lama');
        $jenis_dokumen = $this->input->post('jenis');
        $keterangan = $this->input->post('keterangan');
        $dokumen_lama = $this->input->post('dokumen_lama');
        $status = $this->input->post('status');

        if ($jenis_dokumen_lama != $jenis_dokumen) {
            $this->form_validation->set_rules('jenis', 'Jenis', 'required|is_unique[dokumen.jenis_dokumen]');
        }
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('is_unique', '{field} dokumen ini sudah ada');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_jenis' => form_error('jenis'),
                'error_keterangan' => form_error('keterangan')
            );
            echo json_encode($respon);
        } else {

            $tanggal = date('Y-m-d H:i:s');
            $where = array('id_dokumen' => $id_dokumen);

            if ($_FILES['dokumen_baru']['name'] == "") {
                $data = array(
                    'jenis_dokumen' => $jenis_dokumen,
                    'nama_dokumen' => $dokumen_lama,
                    'keterangan' => $keterangan,
                    'status_dokumen' => $status,
                    'updated_at' => $tanggal,
                );

                $this->M_Dokumen->update_record($where, $data, 'dokumen');
                $respon['sukses'] = "Data berhasil diubah";
                echo json_encode($respon);
            } else {
                //upload file
                $config['upload_path'] = './dokumenFormulir/';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 5000; //5 MB

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('dokumen_baru')) {
                    $respon['sukses'] = false;
                    $respon['error_dokumen'] = "Tidak berhasil upload file. Format file hanya pdf dan ukuran file maksimal 5MB";
                    echo json_encode($respon);
                } else {
                    $dokumen = $this->upload->data('file_name');

                    $data = array(
                        'jenis_dokumen' => $jenis_dokumen,
                        'nama_dokumen' => $dokumen,
                        'keterangan' => $keterangan,
                        'status_dokumen' => $status,
                        'updated_at' => $tanggal
                    );

                    @unlink('./dokumenFormulir/' . $dokumen_lama);

                    $this->M_Dokumen->update_record($where, $data, 'dokumen');
                    $respon['sukses'] = "Data berhasil diubah";
                    echo json_encode($respon);
                }
            }
        }
    }
}
