<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect('Login_Admin');
        }
        $this->load->model(array('M_Admin', 'M_Request'));
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['admin'] = $this->M_Admin->tampil()->result();
        $data['levelAdmin'] = $this->M_Admin->tampil_level()->result();
        $notif['notifRequest'] = $this->M_Request->tampil_notifikasi_request()->result();
        $this->load->view('templates/header.php', $notif);
        $this->load->view('templates/sidebar.php');
        $this->load->view('v_lihat_admin.php', $data);
    }

    public function tampil_admin()
    {
        $query = $this->M_Admin->tampil()->result();
        echo json_encode($query);
    }

    public function tambah_admin()
    {
        $nama_admin = $this->input->post('nama_admin');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level = $this->input->post('level');

        $this->form_validation->set_rules('nama_admin', 'Nama', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[15]|is_unique[admin.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[15]');
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_nama' => form_error('nama_admin'),
                'error_username' => form_error('username'),
                'error_password' => form_error('password'),
                'error_level' => form_error('level')
            );
            echo json_encode($respon);
        } else {
            $data = array(
                'id_level_admin' => $level, 'nama_lengkap' => $nama_admin, 'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT), 'status_admin' => 1
            );

            $this->M_Admin->insert_record($data, 'admin');

            $respon['sukses'] = "Data berhasil disimpan";
            echo json_encode($respon);
        }
    }

    public function proses_edit_status()
    {
        $where = array('id_admin' => $this->input->post('id'));
        $data = array('status_admin' => $this->input->post('status'));
        $this->M_Admin->update_record($where, $data, 'admin');
        $this->session->set_flashdata('sukses', 'Berhasil ubah status');
        redirect('Admin');
    }

    public function hapus_admin($id_admin)
    {
        $where = array('id_admin' => $id_admin);
        $data = array('status_admin' => '0');
        $this->M_Admin->update_record($where, $data, 'admin');
        $this->session->set_flashdata('sukses', 'Berhasil ubah status menjadi tidak akitf');
        redirect('Admin');
    }
}
