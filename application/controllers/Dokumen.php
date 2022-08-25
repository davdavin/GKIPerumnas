<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect('Login_Admin');
        }

        $this->load->model(array('M_Dokumen'));
        $this->load->helper(array('form', 'url', 'file'));
    }

    public function index()
    {
        $data['dokumen'] = $this->M_Dokumen->tampil()->result();
        $data['pengumpulanDokumen'] = $this->M_Dokumen->tampil_pengumpulan()->result();
        $this->load->view('templates/header.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('v_lihat_dokumen.php', $data);
    }

    public function view_file($dokumen)
    {
        /*  $data = file_get_contents(base_url() . "dokumenFormulir/" . $dokumen);
        var_dump($data);
        $this->output->set_output(file_get_contents(base_url() . 'dokumenFormulir/' . $dokumen)); */

        $data['dokumen'] = $this->db->query("SELECT dokumen FROM dokumen WHERE dokumen = '$dokumen'")->row_array();
        //   $this->load->view('templates/header.php');
        $this->load->view('v_lihat_file.php', $data);
    }

    public function tambah_dokumen()
    {
        $baris = $this->M_Dokumen->tampil()->num_rows();
        $kode_dokumen = 'DKM' . $baris + 1;
        $jenis_dokumen = $this->input->post('jenis');
        $keterangan = $this->input->post('keterangan');

        //upload file
        $config['upload_path'] = './dokumenFormulir/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 5000; //5 MB

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('dokumen')) {
            $this->session->set_flashdata('gagal', 'Tidak berhasil upload file');
            redirect('Dokumen');
        } else {
            $dokumen = $this->upload->data('file_name');

            $data = array(
                'kode_dokumen' => $kode_dokumen,
                'jenis_dokumen' => $jenis_dokumen,
                'dokumen' => $dokumen,
                'keterangan' => $keterangan
            );

            $this->M_Dokumen->insert_record($data, 'dokumen');
            $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
            redirect('Dokumen');
        }
    }

    public function edit_dokumen($id_dokumen)
    {
        $where = array('id_dokumen' => $id_dokumen);
        $data['dokumenEdit'] = $this->M_Dokumen->tampil_edit($where, 'dokumen')->result();
        $this->load->view('templates/header.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('v_edit_dokumen.php', $data);
    }

    public function proses_edit_dokumen()
    {
        $id_dokumen = $this->input->post('id_dokumen');
        $kode_dokumen = $this->input->post('kode_dokumen');
        $jenis_dokumen = $this->input->post('jenis');
        $keterangan = $this->input->post('keterangan');
        $dokumen_lama = $this->input->post('dokumen_lama');

        $where = array('id_dokumen' => $id_dokumen);

        if ($_FILES['dokumen_baru']['name'] == "") {
            $data = array(
                'kode_dokumen' => $kode_dokumen,
                'jenis_dokumen' => $jenis_dokumen,
                'dokumen' => $dokumen_lama,
                'keterangan' => $keterangan
            );

            $this->M_Dokumen->update_record($where, $data, 'dokumen');
            $this->session->set_flashdata('sukses', 'Data berhasil diubah');
            redirect('Dokumen');
        } else {
            //upload file
            $config['upload_path'] = './dokumenFormulir/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 5000; //5 MB

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('dokumen_baru')) {
                echo "Upload gagal, tolong periksa format dan size file";
            } else {
                $dokumen = $this->upload->data('file_name');

                $data = array(
                    'kode_dokumen' => $kode_dokumen,
                    'jenis_dokumen' => $jenis_dokumen,
                    'dokumen' => $dokumen,
                    'keterangan' => $keterangan
                );

                @unlink('./dokumenFormulir/' . $dokumen_lama);

                $this->M_Dokumen->update_record($where, $data, 'dokumen');
                $this->session->set_flashdata('sukses', 'Data berhasil diubah');
                redirect('Dokumen');
            }
        }
    }

    public function hapus_dokumen($id_dokumen)
    {
        $where = array('id_dokumen' => $id_dokumen);
        $this->M_Dokumen->delete_record($where, 'dokumen');
        $this->session->set_flashdata('sukses', 'Formulir berhasil dihapus');
        redirect('Dokumen');
    }
}
