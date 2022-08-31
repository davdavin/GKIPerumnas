<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota_Jemaat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect('Login_Admin');
        }

        $this->load->model(array('M_Anggota_Jemaat', 'M_Wilayah', 'M_Request'));
    }

    public function index()
    {
        //  $data['jemaat'] = $this->M_Anggota_Jemaat->tampil()->result();
        $data['wilayah'] = $this->M_Wilayah->tampil()->result();
        $notif['notifRequest'] = $this->M_Request->tampil_notifikasi_request()->result();
        $this->load->view('templates/header.php', $notif);
        $this->load->view('templates/sidebar.php');
        $this->load->view('jemaat/v_lihat_anggota_jemaat.php', $data);
    }

    public function tampil_jemaat()
    {
        $query = $this->M_Anggota_Jemaat->tampil()->result();
        echo json_encode($query);
    }

    public function nama_jemaat()
    {
        if (!isset($_POST['searchJemaat'])) {
            $nama = $this->db->query("SELECT id_anggota, nama_lengkap_anggota FROM anggota_jemaat")->result_array();
        } else {
            $search = strtolower($_POST['searchJemaat']);
            $nama = $this->db->query("SELECT id_anggota, nama_lengkap_anggota FROM anggota_jemaat WHERE nama_lengkap_anggota LIKE '%$search%'")->result_array();
        }

        $list = array();
        for ($i = 0; $i < count($nama); $i++) {
            $list[$i]['id'] = $nama[$i]['id_anggota'];
            $list[$i]['text'] = $nama[$i]['nama_lengkap_anggota'];
        }

        echo json_encode($list);
    }

    public function masuk_anggota_jemaat()
    {
        $no_anggota = $this->input->post('no_anggota');
        $nama_anggota = $this->input->post('nama_anggota');
        $alamat_anggota = $this->input->post('alamat_anggota');
        $nohp_anggota = $this->input->post('nohp');
        $id_wilayah = $this->input->post('id_wilayah');
        $email_anggota = $this->input->post('email_anggota');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $golongan_darah = $this->input->post('golongan_darah');
        $status_anggota = $this->input->post('status');
        $pendidikan_anggota = $this->input->post('pendidikan');
        $pekerjaan_anggota = $this->input->post('pekerjaan');
        $kelompok_etnis = $this->input->post('kelompok_etnis');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $tanggal_baptis = $this->input->post('tanggal_baptis');
        $tanggal_sidi = $this->input->post('tanggal_sidi');
        $tanggal_atestasi_masuk = $this->input->post('tanggal_atestasi_masuk');
        $tanggal_atestasi_keluar = $this->input->post('tanggal_atestasi_keluar');
        $tanggal_meninggal = $this->input->post('tanggal_meninggal');
        $tanggal_dkh = $this->input->post('tanggal_dkh');
        $tanggal_ex_dkh = $this->input->post('tanggal_ex_dkh');

        $data = array(
            'id_wilayah' => $id_wilayah, 'no_anggota' => $no_anggota, 'nama_lengkap_anggota' => $nama_anggota, 'alamat_anggota' => $alamat_anggota,
            'nohp_anggota' => $nohp_anggota, 'email_anggota' => $email_anggota, 'jenis_kelamin_anggota' => $jenis_kelamin,
            'golongan_darah_anggota' => $golongan_darah, 'status_anggota' => $status_anggota, 'pendidikan_anggota' => $pendidikan_anggota,
            'pekerjaan_anggota' => $pekerjaan_anggota, 'kelompok_etnis_anggota' => $kelompok_etnis,
            'tanggal_lahir_anggota' => $tanggal_lahir, 'tanggal_baptis_anggota' => $tanggal_baptis, 'tanggal_sidi_anggota' => $tanggal_sidi,
            'tanggal_atestasi_masuk' => $tanggal_atestasi_masuk, 'tanggal_atestasi_keluar' => $tanggal_atestasi_keluar, 'tanggal_meninggal' => $tanggal_meninggal,
            'tanggal_dkh' => $tanggal_dkh, 'tanggal_ex_dkh' => $tanggal_ex_dkh
        );

        $this->M_Anggota_Jemaat->insert_record($data, 'anggota_jemaat');
        $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
        redirect('Anggota_Jemaat');
    }

    public function tambah_akun_jemaat()
    {
        $this->load->library('form_validation');

        $jemaat = $this->input->post('jemaat');
        $username = $this->input->post('username');

        $this->form_validation->set_rules('jemaat', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[15]|is_unique[anggota_jemaat.username]');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_jemaat' => form_error('jemaat'),
                'error_username' => form_error('username')
            );
            echo json_encode($respon);
        } else {
            $cek_akun = $this->db->query("SELECT username FROM anggota_jemaat WHERE id_anggota = '$jemaat'")->row_array();

            if ($cek_akun['username'] != "") {
                $respon = array(
                    'sukses' => false,
                    'error_jemaat' => 'sudah memiliki akun'
                );
                echo json_encode($respon);
            } else {
                $ambil_tglahir_nama = $this->db->query("SELECT nama_lengkap_anggota, tanggal_lahir_anggota FROM anggota_jemaat WHERE id_anggota = '$jemaat'")->row_array();

                //masih coba
                $pisah = explode("/", date_format(date_create($ambil_tglahir_nama['tanggal_lahir_anggota']), "d/m/Y"));

                $pass = $pisah[0] . $pisah[1] . $pisah[2];

                $where = array(
                    'id_anggota' => $jemaat
                );

                $data = array(
                    'username' => strtolower($username), 'password' => password_hash($pass, PASSWORD_DEFAULT), 'status_akun' => 1
                );

                $this->M_Anggota_Jemaat->update_record($where, $data, 'anggota_jemaat');
                $respon['sukses'] = 'Berhasil membuat akun jemaat';
                echo json_encode($respon);
            }
        }
    }

    public function lihat_detail_anggota($id_anggota)
    {
        $data['detailJemaat'] = $this->M_Anggota_Jemaat->tampil_detail($id_anggota)->result();
        $data['wilayah'] = $this->M_Wilayah->tampil()->result();
        $notif['notifRequest'] = $this->M_Request->tampil_notifikasi_request()->result();
        $this->load->view('templates/header.php', $notif);
        $this->load->view('templates/sidebar.php');
        $this->load->view('jemaat/v_detail_anggota_jemaat.php', $data);
    }

    public function edit_anggota($id_anggota)
    {
        $where = array('id_anggota' => $id_anggota);
        $data['jemaatEdit'] = $this->M_Anggota_Jemaat->tampil_edit($where, 'anggota_jemaat')->result();
        $data['wilayah'] = $this->M_Wilayah->tampil()->result();
        $notif['notifRequest'] = $this->M_Request->tampil_notifikasi_request()->result();
        $this->load->view('templates/header.php', $notif);
        $this->load->view('templates/sidebar.php');
        $this->load->view('jemaat/v_edit_anggota_jemaat.php', $data);
    }

    public function proses_edit_anggota()
    {
        $no_anggota = $this->input->post('no_anggota');
        $nama_anggota = $this->input->post('nama_anggota');
        $alamat_anggota = $this->input->post('alamat_anggota');
        $nohp_anggota = $this->input->post('nohp');
        $id_wilayah = $this->input->post('id_wilayah');
        $email_anggota = $this->input->post('email_anggota');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $golongan_darah = $this->input->post('golongan_darah');
        $pendidikan_anggota = $this->input->post('pendidikan');
        $pekerjaan_anggota = $this->input->post('pekerjaan');
        $kelompok_etnis = $this->input->post('kelompok_etnis');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $tanggal_baptis = $this->input->post('tanggal_baptis');
        $tanggal_sidi = $this->input->post('tanggal_sidi');
        $tanggal_atestasi_masuk = $this->input->post('tanggal_atestasi_masuk');
        $tanggal_atestasi_keluar = $this->input->post('tanggal_atestasi_keluar');
        $tanggal_meninggal = $this->input->post('tanggal_meninggal');
        $tanggal_dkh = $this->input->post('tanggal_dkh');
        $tanggal_ex_dkh = $this->input->post('tanggal_ex_dkh');

        if ($tanggal_meninggal) {
            $status_anggota = 0;
        } else {
            $status_anggota = $this->input->post('status');
        }

        $where = array('no_anggota' => $no_anggota);

        $data = array(
            'id_wilayah' => $id_wilayah, 'nama_lengkap_anggota' => $nama_anggota, 'alamat_anggota' => $alamat_anggota,
            'nohp_anggota' => $nohp_anggota, 'email_anggota' => $email_anggota, 'jenis_kelamin_anggota' => $jenis_kelamin,
            'golongan_darah_anggota' => $golongan_darah, 'status_anggota' => $status_anggota,
            'pendidikan_anggota' => $pendidikan_anggota, 'pekerjaan_anggota' => $pekerjaan_anggota, 'kelompok_etnis_anggota' => $kelompok_etnis,
            'tanggal_lahir_anggota' => $tanggal_lahir, 'tanggal_baptis_anggota' => $tanggal_baptis, 'tanggal_sidi_anggota' => $tanggal_sidi,
            'tanggal_atestasi_masuk' => $tanggal_atestasi_masuk, 'tanggal_atestasi_keluar' => $tanggal_atestasi_keluar, 'tanggal_meninggal' => $tanggal_meninggal,
            'tanggal_dkh' => $tanggal_dkh, 'tanggal_ex_dkh' => $tanggal_ex_dkh
        );

        $this->M_Anggota_Jemaat->update_record($where, $data, 'anggota_jemaat');
        $this->session->set_flashdata('sukses', 'Data berhasil diubah');
        redirect('Anggota_Jemaat');
    }

    public function hapus_anggota($id_anggota)
    {
        $where = array('id_anggota' => $id_anggota);
        $data = array('status_anggota' => '0');
        $this->M_Anggota_Jemaat->update_record($where, $data, 'anggota_jemaat');
        $this->session->set_flashdata('sukses', 'Berhasil ubah status menjadi tidak akitf');
        redirect('Anggota_Jemaat');
    }
}
