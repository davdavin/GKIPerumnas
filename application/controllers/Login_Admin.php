<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_Admin'));
    }

    function index()
    {
        $this->load->view('v_login_admin.php');
    }

    function verifikasi()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'username' => $username
        );

        //   $cek_status = $this->M_Admin->cek_status($username)->num_rows();
        $cek_login = $this->M_Admin->cek_login('admin', $where)->row_array();

        if ($cek_login) {
            if ($cek_login['status_admin'] == 1) {
                if (password_verify($password, $cek_login['password'])) {
                    $session = array(
                        'username' => $cek_login['username'],
                        'status' => 'login'
                    );

                    $this->session->set_userdata($session);
                    redirect('Dashboard');
                } else {
                    $this->session->set_flashdata('info', 'Password salah');
                    redirect('Login_Admin');
                }
            } else {
                $this->session->set_flashdata('info', 'Akun ini tidak aktif');
                redirect('Login_Admin');
            }
        } else {
            $this->session->set_flashdata('info', 'Username salah');
            redirect('Login_Admin');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('Login_Admin');
    }
}
