<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Permintaan'));
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('v_permintaan_perubahan.php');
    }

    public function kirim()
    {
        $no_anggota = $this->input->post('noAnggota');
        $nohp = $this->input->post('nohp');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $pekerjaan = $this->input->post('pekerjaan');

        $this->form_validation->set_rules('noAnggota', 'No. Anggota', 'trim|required');
        if ($this->input->post('pilihNoHP') == "pilih") {
            $this->form_validation->set_rules('nohp', 'Nomor Handphone', 'trim|required|min_length[9]|max_length[15]');
        }
        if ($this->input->post('pilihEmail') == "pilih") {
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
        }
        if ($this->input->post('pilihAlamat') == "pilih") {
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        }
        if ($this->input->post('pilihPekerjaan') == "pilih") {
            $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
        }

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('min_length', '{field} minimal {param} angka');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} angka');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_no_anggota' => form_error('noAnggota'),
                'error_nohp' => form_error('nohp'),
                'error_email' => form_error('email'),
                'error_alamat' => form_error('alamat'),
                'error_pekerjaan' => form_error('pekerjaan')
            );
            echo json_encode($respon);
        } else {
            $cek_id_anggota = $this->db->query("SELECT id_anggota, no_anggota FROM anggota_jemaat WHERE no_anggota = '$no_anggota'")->row_array();
            if ($cek_id_anggota['no_anggota'] == "$no_anggota") {
                $respon = array(
                    'sukses' => false,
                    'error_no_anggota' => 'No. Anggota tidak ditemukan'
                );
                echo json_encode($respon);
            } else {
                $this->load->library('encryption');

                if ($nohp == NULL) {
                    $nohp = NULL;
                } else {
                    $nohp = $this->encryption->encrypt($nohp);
                }
                if ($email == NULL) {
                    $email = NULL;
                } else {
                    $email = $this->encryption->encrypt($email);
                }
                if ($alamat == NULL) {
                    $alamat = NULL;
                } else {
                    $alamat = $this->encryption->encrypt($alamat);
                }
                if ($pekerjaan == NULL) {
                    $pekerjaan = NULL;
                } else {
                    $pekerjaan = $this->encryption->encrypt($pekerjaan);
                }

                date_default_timezone_set('Asia/Jakarta');
                $tanggal = date('Y-m-d H:i:s');

                $ambil_id_anggota = $this->db->query("SELECT id_anggota FROM anggota_jemaat WHERE no_anggota = '$no_anggota'")->row_array();

                $data = array(
                    'id_anggota' => $ambil_id_anggota['id_anggota'], 'nohp_baru' => $nohp, 'email_baru' => $email,
                    'alamat_baru' => $alamat, 'pekerjaan_baru' => $pekerjaan, 'tanggal_permintaan' => $tanggal, 'is_notif' => 0, 'is_updated' => 0
                );
                $this->M_Permintaan->insert_record($data, 'permintaan_perubahan_data_jemaat');
                //masih coba
                // $to = "projectwebdua@gmail.com";
                // $subject = "My subject";
                // $txt = "Segera akan di infokan. Jika sudah di update.";
                // $headers = "From: officehourcompany@gmail.com";

                // mail($to, $subject, $txt, $headers);
                $respon['sukses'] = "Berhasil Dikirim";
                echo json_encode($respon);
            }
        }
    }
}
