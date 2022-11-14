<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status_jemaat') != "login") {
            redirect('login/jemaat');
        }
        $this->load->model(array('M_Profil', 'M_Wilayah'));
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $data['jemaat'] = $this->M_Profil->tampil_informasi($username)->result();
        $data['wilayah'] = $this->M_Wilayah->tampil()->result();
        $this->load->view('profil/v_profil.php', $data);
    }

    public function update_profil()
    {
        $username = $this->session->userdata('username');
        $data['detail'] = $this->M_Profil->tampil_informasi($username)->result();
        $data['wilayah'] = $this->M_Wilayah->tampil()->result();
        $this->load->view('profil/v_update_informasi.php', $data);
    }

    public function proses_update()
    {
        $no_anggota = $this->input->post('no_anggota');
        $alamat_anggota = $this->input->post('alamat_anggota');
        $nohp_anggota = $this->input->post('nohp');
        $email_sekarang = $this->input->post('email_sekarang');
        $email_anggota = $this->input->post('email_anggota');
        $pendidikan_anggota = $this->input->post('pendidikan');
        $pekerjaan_anggota = $this->input->post('pekerjaan');

        $this->form_validation->set_rules('alamat_anggota', 'Alamat', 'required');
        $this->form_validation->set_rules('nohp', 'No. Handphone', 'required|min_length[9]|max_length[15]');
        if ($email_anggota != $email_sekarang) {
            $this->form_validation->set_rules('email_anggota', 'Email', 'required|valid_email|is_unique[anggota_jemaat.email_anggota]');
        }
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('valid_email', '{field} harus valid');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');
        $this->form_validation->set_message('min_length', '{field} minimal {param} angka');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} angka');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_alamat' => form_error('alamat_anggota'),
                'error_nohp' => form_error('nohp'),
                'error_email' => form_error('email_anggota'),
                'error_pendidikan' => form_error('pendidikan'),
                'error_pekerjaan' => form_error('pekerjaan')
            );
            echo json_encode($respon);
        } else {
            $tanggal = date('Y-m-d H:i:s');
            $where = array('no_anggota' => $no_anggota);

            $data = array(
                'alamat_anggota' => $alamat_anggota, 'nohp_anggota' => $nohp_anggota, 'email_anggota' => $email_anggota,
                'pendidikan_anggota' => $pendidikan_anggota, 'pekerjaan_anggota' => $pekerjaan_anggota, 'updated_at' => $tanggal
            );

            $this->M_Profil->update_record($where, $data, 'anggota_jemaat');

            $respon['sukses'] = "Data berhasil diubah";
            echo json_encode($respon);
        }
    }

    public function update_password()
    {
        $this->load->view('profil/v_update_password.php');
    }

    public function proses_update_password()
    {
        $id = $this->session->userdata('id');
        $pass_lama = $this->input->post('currentpass');
        $pass_baru = $this->input->post('newpass');


        $this->form_validation->set_rules('currentpass', 'Password', 'required|trim');
        $this->form_validation->set_rules('newpass', 'Password', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('confirmpass', 'Ulangi Password Baru', 'required|matches[newpass]', array('matches' => '%s tidak sesuai'));

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_currentpass' => form_error('currentpass'),
                'error_newpass' => form_error('newpass'),
                'error_retype' => form_error('confirmpass')
            );
            echo json_encode($respon);
        } else {
            $cek_pass = $this->M_Profil->cek_login('anggota_jemaat', ['id_anggota' => $id])->row_array();
            if (password_verify($pass_lama, $cek_pass['password'])) {
                $tanggal = date('Y-m-d H:i:s');
                $where = array('id_anggota' => $id);
                $data = array(
                    'password' => password_hash($pass_baru, PASSWORD_DEFAULT), 'updated_at' => $tanggal
                );
                $this->M_Profil->update_record($where, $data, 'anggota_jemaat');
                $respon['sukses'] = 'Password berhasil diubah';
                echo json_encode($respon);
            } else {
                $respon = array(
                    'sukses' => false,
                    'error_currentpass' => 'Password anda salah'
                );
                echo json_encode($respon);
            }
        }
    }
}
