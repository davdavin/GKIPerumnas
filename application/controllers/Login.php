<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Profil'));
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }

    function index()
    {
        $this->load->view('auth/jemaat/v_login.php');
    }

    function validasi()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        $this->form_validation->set_message('required', '{field} wajib diisi');


        if ($this->form_validation->run() == FALSE) {
            //$this->index();
            $respon = array(
                'sukses' => false,
                'error_username' => form_error('username'),
                'error_pass' => form_error('password')
            );
            echo json_encode($respon);
        } else {

            $where = array('username' => $username);

            $cek_login = $this->M_Profil->cek_login('anggota_jemaat', $where)->row_array();

            if ($cek_login) {
                if ($cek_login['status_akun'] == 1) { //$cek_login['status_akun'] == 1
                    if (password_verify($password, $cek_login['password'])) {
                        $session = array(
                            'id' => $cek_login['id_anggota'],
                            'username' => $cek_login['username'],
                            'status_jemaat' => "login",
                        );
                        $this->session->set_userdata($session);
                        $respon['sukses'] = "Berhasil Login";
                        echo json_encode($respon);
                    } else {
                        $respon = array(
                            'sukses' => false,
                            'error_pass' => "Password salah"
                        );
                        echo json_encode($respon);
                    }
                } else {
                    $respon = array(
                        'sukses' => false,
                        'status' => "Tidak aktif"
                    );
                    echo json_encode($respon);
                }
            } else {
                $respon = array(
                    'sukses' => false,
                    'error_username' => "Username salah"
                );
                echo json_encode($respon);
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login/jemaat');
    }
}
