<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_User'));
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

        //   $cek_status = $this->M_User->cek_status($username)->num_rows();
        $cek_login = $this->M_User->cek_login('user', $where)->row_array();

        if ($cek_login) {
            if ($cek_login['status_user'] == 1) {
                if (password_verify($password, $cek_login['password'])) {
                    $session = array(
                        'username' => $cek_login['username'],
                        'level_user' => $cek_login['id_level_user'],
                        'status' => 'login'
                    );

                    $this->session->set_userdata($session);
                    redirect('admin/dashboard');
                } else {
                    $this->session->set_flashdata('info', 'Password salah');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('info', 'Akun ini tidak aktif');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('info', 'Username salah');
            redirect('login');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
