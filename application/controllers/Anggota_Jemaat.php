<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota_Jemaat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect('login');
        }

        $this->load->model(array('M_Anggota_Jemaat', 'M_Wilayah', 'M_Permintaan'));
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        //  $data['jemaat'] = $this->M_Anggota_Jemaat->tampil()->result();
        $data['title'] = "Jemaat";
        $data['wilayah'] = $this->M_Wilayah->tampil()->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/jemaat/v_lihat_anggota_jemaat.php', $data);
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
        $baris =  $this->M_Anggota_Jemaat->tampil()->num_rows();
        $no_anggota = '0000' . $baris + 1;
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

        $this->form_validation->set_rules('nama_anggota', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_anggota', 'Alamat', 'required');
        $this->form_validation->set_rules('nohp', 'No. Handphone', 'required|min_length[9]|max_length[15]');
        $this->form_validation->set_rules('id_wilayah', 'Wilayah', 'required');
        $this->form_validation->set_rules('email_anggota', 'Email', 'required|valid_email|is_unique[anggota_jemaat.email_anggota]');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('golongan_darah', 'Golongan Darah', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('kelompok_etnis', 'Kelompok Etnis', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('valid_email', '{field} harus valid');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');
        $this->form_validation->set_message('min_length', '{field} minimal {param} angka');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} angka');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_nama' => form_error('nama_anggota'),
                'error_alamat' => form_error('alamat_anggota'),
                'error_nohp' => form_error('nohp'),
                'error_wilayah' => form_error('id_wilayah'),
                'error_email' => form_error('email_anggota'),
                'error_jenis_kelamin' => form_error('jenis_kelamin'),
                'error_golongan_darah' => form_error('golongan_darah'),
                'error_status' => form_error('status'),
                'error_pendidikan' => form_error('pendidikan'),
                'error_pekerjaan' => form_error('pekerjaan'),
                'error_kelompok' => form_error('kelompok_etnis'),
                'error_tanggal_lahir' => form_error('tanggal_lahir'),
                'error_tanggal_baptis' => form_error('tanggal_baptis'),
                'error_tanggal_sidi' => form_error('tanggal_sidi'),
                'error_tanggal_atestasi_masuk' => form_error('tanggal_atestasi_masuk'),
                'error_tanggal_atestasi_keluar' => form_error('tanggal_atestasi_keluar'),
                'error_tanggal_meninggal' => form_error('tanggal_meninggal'),
                'error_tanggal_dkh' => form_error('tanggal_dkh'),
                'error_tanggal_ex_dkh' => form_error('tanggal_ex_dkh')
            );
            echo json_encode($respon);
        } else {

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
            $respon['sukses'] = "Data berhasil disimpan";
            echo json_encode($respon);
        }
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
        $data['title'] = "Jemaat";
        $data['detailJemaat'] = $this->M_Anggota_Jemaat->tampil_detail($id_anggota)->result();
        $data['wilayah'] = $this->M_Wilayah->tampil()->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/jemaat/v_detail_anggota_jemaat.php', $data);
    }

    public function edit_anggota($id_anggota)
    {
        $data['title'] = 'Jemaat';
        $where = array('id_anggota' => $id_anggota);
        $data['jemaatEdit'] = $this->M_Anggota_Jemaat->tampil_edit($where, 'anggota_jemaat')->result();
        $data['wilayah'] = $this->M_Wilayah->tampil()->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/jemaat/v_edit_anggota_jemaat.php', $data);
    }

    public function proses_edit_anggota()
    {
        $no_anggota = $this->input->post('no_anggota');
        $nama_anggota = $this->input->post('nama_anggota');
        $alamat_anggota = $this->input->post('alamat_anggota');
        $nohp_anggota = $this->input->post('nohp');
        $id_wilayah = $this->input->post('id_wilayah');
        $email_sekarang = $this->input->post('email_sekarang');
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

        $this->form_validation->set_rules('nama_anggota', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_anggota', 'Alamat', 'required');
        $this->form_validation->set_rules('nohp', 'No. Handphone', 'required|min_length[9]|max_length[15]');
        $this->form_validation->set_rules('id_wilayah', 'Wilayah', 'required');
        if ($email_anggota != $email_sekarang) {
            $this->form_validation->set_rules('email_anggota', 'Email', 'required|valid_email|is_unique[anggota_jemaat.email_anggota]');
        }
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('golongan_darah', 'Golongan Darah', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('kelompok_etnis', 'Kelompok Etnis', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('valid_email', '{field} harus valid');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');
        $this->form_validation->set_message('min_length', '{field} minimal {param} angka');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} angka');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_nama' => form_error('nama_anggota'),
                'error_alamat' => form_error('alamat_anggota'),
                'error_nohp' => form_error('nohp'),
                'error_wilayah' => form_error('id_wilayah'),
                'error_email' => form_error('email_anggota'),
                'error_jenis_kelamin' => form_error('jenis_kelamin'),
                'error_golongan_darah' => form_error('golongan_darah'),
                'error_status' => form_error('status'),
                'error_pendidikan' => form_error('pendidikan'),
                'error_pekerjaan' => form_error('pekerjaan'),
                'error_kelompok' => form_error('kelompok_etnis'),
                'error_tanggal_lahir' => form_error('tanggal_lahir'),
                'error_tanggal_baptis' => form_error('tanggal_baptis'),
                'error_tanggal_sidi' => form_error('tanggal_sidi'),
                'error_tanggal_atestasi_masuk' => form_error('tanggal_atestasi_masuk'),
                'error_tanggal_atestasi_keluar' => form_error('tanggal_atestasi_keluar'),
                'error_tanggal_meninggal' => form_error('tanggal_meninggal'),
                'error_tanggal_dkh' => form_error('tanggal_dkh'),
                'error_tanggal_ex_dkh' => form_error('tanggal_ex_dkh')
            );
            echo json_encode($respon);
        } else {

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
            $respon['sukses'] = 'Berhasil diubah';
            echo json_encode($respon);
        }
    }

    public function ubah_data_jemaat($id_permintaan)
    {
        $data['title'] = "Jemaat";
        $data['permintaanPerubahan'] = $this->M_Permintaan->tampil_data_permintaan($id_permintaan)->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('v_respon_perubahan_data.php', $data);
    }

    public function proses_permintaan_perubahan()
    {
        $id_permintaan = $this->input->post('id_permintaan');
        $no_anggota = $this->input->post('no_anggota');
        $nohp_anggota = $this->input->post('nohp');
        $email_anggota = $this->input->post('email_anggota');
        $alamat_anggota = $this->input->post('alamat_anggota');
        $pekerjaan_anggota = $this->input->post('pekerjaan');
        $pendidikan_anggota = $this->input->post('pendidikan');

        $where = array(
            'no_anggota' => $no_anggota
        );
        if ($nohp_anggota != "-") {
            $nohp_baru = array('nohp_anggota' => $nohp_anggota);
            $this->M_Anggota_Jemaat->update_record($where, $nohp_baru, 'anggota_jemaat');
        }
        if ($email_anggota != "-") {
            $email_baru = array('email_anggota' => $email_anggota);
            $this->M_Anggota_Jemaat->update_record($where, $email_baru, 'anggota_jemaat');
        }
        if ($alamat_anggota != "-") {
            $alamat_baru = array('alamat_anggota' => $alamat_anggota);
            $this->M_Anggota_Jemaat->update_record($where, $alamat_baru, 'anggota_jemaat');
        }
        if ($pekerjaan_anggota != "-") {
            $pekerjaan_baru = array('pekerjaan_anggota' => $pekerjaan_anggota);
            $this->M_Anggota_Jemaat->update_record($where, $pekerjaan_baru, 'anggota_jemaat');
        }
        if ($pendidikan_anggota != "-") {
            $pendidikan_baru = array('pendidikan_anggota' => $pendidikan_anggota);
            $this->M_Anggota_Jemaat->update_record($where, $pendidikan_baru, 'anggota_jemaat');
        }
        $where_permintaan = array(
            'id_permintaan' => $id_permintaan
        );
        $permintaan = array('is_updated' => 1);
        $this->M_Permintaan->update_record($where_permintaan, $permintaan, 'permintaan_perubahan_data_jemaat');
        $this->session->set_flashdata('sukses', 'Data berhasil diubah');
        redirect('Anggota_Jemaat');
    }
}
