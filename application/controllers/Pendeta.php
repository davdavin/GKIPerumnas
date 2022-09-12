<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendeta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect('Login_Admin');
        }

        $this->load->model(array('M_Pendeta'));
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['title'] = "Pendeta";
        $this->load->view('templates/header.php', $data);
        $this->load->view('admin/pendeta/v_lihat_pendeta.php');
    }

    public function tampil_pendeta()
    {
        $query = $this->M_Pendeta->tampil()->result_array();

        for ($i = 0; $i < count($query); $i++) {
            $query[$i]['tanggal_lahir_pendeta'] = tanggal_indonesia($query[$i]['tanggal_lahir_pendeta']);
        }

        echo json_encode($query);
    }

    public function tambah_pendeta()
    {
        $baris = $this->M_Pendeta->tampil()->num_rows();
        $no_pendeta = '0000' . $baris + 1;
        $nama_pendeta = $this->input->post('nama_pendeta');
        $alamat_pendeta = $this->input->post('alamat_pendeta');
        $nohp_pendeta = $this->input->post('nohp');
        $email_pendeta = $this->input->post('email_pendeta');
        $jenis_kelamin_pendeta = $this->input->post('jenis_kelamin');
        $tanggal_lahir_pendeta = $this->input->post('tanggal_lahir');
        $status_pendeta = $this->input->post('status');

        //upload file
        $config['upload_path'] = './resources/assets/img/pendeta/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100000; //100 MB

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            echo "Upload Gagal";
        } else {
            $foto = $this->upload->data('file_name');

            $data = array(
                'no_pendeta' => $no_pendeta, 'nama_lengkap_pendeta' => $nama_pendeta,
                'alamat_pendeta' => $alamat_pendeta, 'nohp_pendeta' => $nohp_pendeta,
                'email_pendeta' => $email_pendeta, 'jenis_kelamin_pendeta' => $jenis_kelamin_pendeta,
                'tanggal_lahir_pendeta' => $tanggal_lahir_pendeta, 'foto_pendeta' => $foto, 'status_pendeta' => $status_pendeta
            );

            $this->M_Pendeta->insert_record($data, 'pendeta');
            $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
            redirect('Pendeta');
        }
    }

    public function detail_pendeta($id_pendeta)
    {
        $data['title'] = "Pendeta";
        $data['detailPendeta'] = $this->M_Pendeta->tampil_detail($id_pendeta)->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('admin/pendeta/v_detail_pendeta', $data);
    }

    public function edit_pendeta($id_pendeta)
    {
        $data['title'] = "Pendeta";
        $where = array('id_pendeta' => $id_pendeta);
        $data['pendetaEdit'] = $this->M_Pendeta->tampil_edit($where, 'pendeta')->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('admin/pendeta/v_edit_pendeta', $data);
    }

    public function proses_edit_pendeta()
    {
        $id_pendeta = $this->input->post('id_pendeta');
        $nama_pendeta = $this->input->post('nama_pendeta');
        $alamat_pendeta = $this->input->post('alamat_pendeta');
        $nohp_pendeta = $this->input->post('nohp');
        $email_pendeta = $this->input->post('email_pendeta');
        $jenis_kelamin_pendeta = $this->input->post('jenis_kelamin');
        $tanggal_lahir_pendeta = $this->input->post('tanggal_lahir');
        $foto_lama = $this->input->post('foto_lama');
        $foto_baru = $_FILES['foto_baru']['name'];
        $status_pendeta = $this->input->post('status');

        $where = array('id_pendeta' => $id_pendeta);

        if ($foto_baru == "") {
            $data = array(
                'nama_lengkap_pendeta' => $nama_pendeta, 'alamat_pendeta' => $alamat_pendeta, 'nohp_pendeta' => $nohp_pendeta,
                'email_pendeta' => $email_pendeta, 'jenis_kelamin_pendeta' => $jenis_kelamin_pendeta,
                'tanggal_lahir_pendeta' => $tanggal_lahir_pendeta, 'foto_pendeta' => $foto_lama, 'status_pendeta' => $status_pendeta
            );

            $this->M_Pendeta->update_record($where, $data, 'pendeta');
            $this->session->set_flashdata('sukses', 'Data berhasil diubah');
            redirect('Pendeta');
        } else {
            //upload file
            $config['upload_path'] = './resources/assets/img/pendeta/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 100000; //100 MB

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_baru')) {
                echo "Upload Gagal";
            } else {
                $foto = $this->upload->data('file_name');

                $data = array(
                    'nama_lengkap_pendeta' => $nama_pendeta, 'alamat_pendeta' => $alamat_pendeta, 'nohp_pendeta' => $nohp_pendeta,
                    'email_pendeta' => $email_pendeta, 'jenis_kelamin_pendeta' => $jenis_kelamin_pendeta,
                    'tanggal_lahir_pendeta' => $tanggal_lahir_pendeta, 'foto_pendeta' => $foto, 'status_pendeta' => $status_pendeta
                );

                @unlink('./resources/assets/img/pendeta/' . $foto_lama); //untuk hapus foto lama

                $this->M_Pendeta->update_record($where, $data, 'pendeta');
                $this->session->set_flashdata('sukses', 'Data berhasil diubah');
                redirect('Pendeta');
            }
        }
    }

    public function hapus_pendeta($id_pendeta)
    {
        $where = array('id_pendeta' => $id_pendeta);
        $data = array('status_pendeta' => '0');
        $this->M_Pendeta->update_record($where, $data, 'pendeta');
        $this->session->set_flashdata('sukses', 'Berhasil ubah status menjadi tidak akitf');
        redirect('Pendeta');
    }
}
