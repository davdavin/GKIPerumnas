<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mengelola_Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect('Login_Admin');
        }

        $this->load->model(array('M_Artikel'));
        $this->load->helper(array('form', 'url', 'file'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['artikel'] = $this->M_Artikel->lihat_artikel()->result();
        $this->load->view('templates/header.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/artikel/v_lihat_tabel_artikel.php', $data);
    }

    public function tampil_artikel()
    {
        $artikel = $this->M_Artikel->lihat_artikel()->result();
        echo json_encode($artikel);
    }

    public function tambah_artikel()
    {
        $data['tipe_artikel'] = $this->M_Artikel->tampil_tipe_artikel()->result();
        $this->load->view('templates/header.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/artikel/v_input_artikel.php', $data);
    }

    public function tipe_artikel()
    {
        $data['tipe_artikel'] = $this->M_Artikel->tampil_tipe_artikel()->result();
        $this->load->view('templates/header.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/artikel/v_tipe_artikel.php', $data);
    }

    public function proses_tambah_artikel()
    {
        $judul_artikel = $this->input->post('judul_artikel');
        $id_tipe_artikel = $this->input->post('id_tipe_artikel');
        $deskripsi_singkat = $this->input->post('deskripsi_singkat');
        $tanggal_pembuatan = $this->input->post('tanggal_pembuatan');
        $isi = $this->input->post('isi');

        $this->form_validation->set_rules('judul_artikel', 'Judul', 'trim|required|is_unique[artikel.judul_artikel]');
        $this->form_validation->set_rules('id_tipe_artikel', 'Tipe', 'required');
        $this->form_validation->set_rules('deskripsi_singkat', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('tanggal_pembuatan', 'Tanggal', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_judul' => form_error('judul_artikel'),
                'error_tipe' => form_error('id_tipe_artikel'),
                'error_deskripsi' => form_error('deskripsi_singkat'),
                'error_tanggal' => form_error('tanggal_pembuatan')
            );
            echo json_encode($respon);
        } else {

            if ($isi == "") {
                $config['upload_path'] = './wartaJemaat/';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 5000; //5 MB
                $config['file_name'] = rand(10, 9999) . $_FILES['pdf']['name'];
                //  $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('pdf')) {
                    $respon['sukses'] = false;
                    $respon['error_file'] = "Tidak berhasil upload file. Format file hanya PDF dan ukuran file maksimal 5MB";
                    //  $respon['error_file'] = $this->upload->display_errors();
                    echo json_encode($respon);
                } else {
                    $file = $this->upload->data('file_name');

                    $data = array(
                        'judul_artikel' => $judul_artikel, 'id_tipe_artikel' => $id_tipe_artikel, 'deskripsi_singkat' => $deskripsi_singkat,
                        'isi' => NULL, 'file' => $file, 'tanggal_pembuatan' => $tanggal_pembuatan
                    );

                    $this->M_Artikel->insert_record($data, 'artikel');
                    $respon['sukses'] = "Artikel berhasil ditambah";
                    echo json_encode($respon);
                }
            } else if ($isi != "") {
                $data = array(
                    'judul_artikel' => $judul_artikel, 'id_tipe_artikel' => $id_tipe_artikel, 'deskripsi_singkat' => $deskripsi_singkat,
                    'isi' => $isi, 'tanggal_pembuatan' => $tanggal_pembuatan
                );
                $this->M_Artikel->insert_record($data, 'artikel');
                $respon['sukses'] = "Artikel berhasil ditambah";
                echo json_encode($respon);
            }
        }

        /*      if ($sukses == 1) {
            if ($isi == "") {
                $data = array(
                    'judul_artikel' => $judul_artikel, 'id_tipe_artikel' => $id_tipe_artikel, 'deskripsi_singkat' => $deskripsi_singkat,
                    'file' => $dokumen, 'tanggal_pembuatan' => $tanggal_pembuatan
                );
            } else {

                $data = array(
                    'judul_artikel' => $judul_artikel, 'id_tipe_artikel' => $id_tipe_artikel, 'deskripsi_singkat' => $deskripsi_singkat,
                    'isi' => $isi, 'tanggal_pembuatan' => $tanggal_pembuatan
                );
            }


            $this->M_Artikel->insert_record($data, 'artikel');
            $respon['sukses'] = "Artikel berhasil ditambah";
            echo json_encode($respon);
        } */
    }

    public function edit_artikel($id_artikel)
    {
        $data['artikel_edit'] = $this->M_Artikel->pilihan_artikel($id_artikel)->result();
        $data['tipe_artikel'] = $this->M_Artikel->tampil_tipe_artikel()->result();
        $this->load->view('templates/header.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/artikel/v_edit_artikel.php', $data);
    }

    public function proses_edit_artikel()
    {
        $id_artikel = $this->input->post('id_artikel');
        $judul_artikel = $this->input->post('judul_artikel');
        $id_tipe_artikel = $this->input->post('id_tipe_artikel');
        $deskripsi_singkat = $this->input->post('deskripsi_singkat');
        $tanggal_pembuatan = $this->input->post('tanggal_pembuatan');
        $isi = $this->input->post('isi');

        $where = array('id_artikel' => $id_artikel);

        $artikel_lama = $this->db->query("SELECT judul_artikel, file FROM artikel WHERE id_artikel = '$id_artikel'")->row_array();

        if ($judul_artikel == $artikel_lama['judul_artikel']) {
            $this->form_validation->set_rules('judul_artikel', 'Judul', 'trim|required');
        } else {
            $this->form_validation->set_rules('judul_artikel', 'Judul', 'trim|required|is_unique[artikel.judul_artikel]');
        }
        $this->form_validation->set_rules('id_tipe_artikel', 'Tipe', 'required');
        $this->form_validation->set_rules('deskripsi_singkat', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('tanggal_pembuatan', 'Tanggal', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_judul' => form_error('judul_artikel'),
                'error_tipe' => form_error('id_tipe_artikel'),
                'error_deskripsi' => form_error('deskripsi_singkat'),
                'error_tanggal' => form_error('tanggal_pembuatan')
            );
            echo json_encode($respon);
        } else {

            if ($isi == "") {
                if ($_FILES['pdf']['name'] == "") {
                    $data = array(
                        'judul_artikel' => $judul_artikel, 'id_tipe_artikel' => $id_tipe_artikel, 'deskripsi_singkat' => $deskripsi_singkat,
                        'isi' => NULL, 'file' => $artikel_lama['file'], 'tanggal_pembuatan' => $tanggal_pembuatan
                    );

                    $this->M_Artikel->update_record($where, $data, 'artikel');
                    $respon['sukses'] = "Artikel berhasil ditambah";
                    echo json_encode($respon);
                } else {
                    $config['upload_path'] = './wartaJemaat/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = 5000; //5 MB
                    $config['file_name'] = rand(10, 9999) . $_FILES['pdf']['name'];

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('pdf')) {
                        $respon['sukses'] = false;
                        $respon['error_file'] = "Tidak berhasil upload file. Format file hanya PDF dan ukuran file maksimal 5MB";
                        echo json_encode($respon);
                    } else {
                        $file = $this->upload->data('file_name');

                        $data = array(
                            'judul_artikel' => $judul_artikel, 'id_tipe_artikel' => $id_tipe_artikel, 'deskripsi_singkat' => $deskripsi_singkat,
                            'isi' => NULL, 'file' => $file, 'tanggal_pembuatan' => $tanggal_pembuatan
                        );

                        @unlink('./wartaJemaat/' . $artikel_lama['file']);

                        $this->M_Artikel->update_record($where, $data, 'artikel');
                        $respon['sukses'] = "Artikel berhasil ditambah";
                        echo json_encode($respon);
                    }
                }
            } else if ($isi != "") {
                $data = array(
                    'judul_artikel' => $judul_artikel, 'id_tipe_artikel' => $id_tipe_artikel, 'deskripsi_singkat' => $deskripsi_singkat,
                    'isi' => $isi, 'tanggal_pembuatan' => $tanggal_pembuatan
                );
                $this->M_Artikel->update_record($where, $data, 'artikel');
                $respon['sukses'] = "Artikel berhasil diubah";
                echo json_encode($respon);
            }
        }
    }

    public function hapus_artikel($id_artikel)
    {
        $where = array('id_artikel' => $id_artikel);

        $file = $this->db->query("SELECT file FROM artikel WHERE id_artikel = '$id_artikel'")->row_array();

        if ($file['file'] == NULL) {
            $this->M_Artikel->delete_record($where, 'artikel');
            $this->session->set_flashdata('sukses', 'Artikel berhasil dihapus');
            redirect('Mengelola_Artikel');
        } else {
            @unlink('./wartaJemaat/' . $file['file']);
            $this->M_Artikel->delete_record($where, 'artikel');
            $this->session->set_flashdata('sukses', 'Artikel berhasil dihapus');
            redirect('Mengelola_Artikel');
        }
    }
}
