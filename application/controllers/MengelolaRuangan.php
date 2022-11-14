<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class MengelolaRuangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != 'login') {
            redirect('login');
        }

        $this->load->model(array('M_Ruangan'));
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Ruangan";
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/ruangan/v_mengelola_ruangan.php');
    }

    public function tampil_ruangan()
    {
        $ruangan = $this->M_Ruangan->tampil()->result();
        echo json_encode($ruangan);
    }

    public function pilih_ruangan()
    {
        if (!isset($_POST['searchRuangan'])) {
            $ruangan = $this->db->query("SELECT * FROM ruangan")->result_array();
        } else {
            $search = strtolower($_POST['searchRuangan']);
            $ruangan = $this->db->query("SELECT * FROM ruangan WHERE nama_ruangan LIKE '%$search%'")->result_array();
        }

        $list = array();
        for ($i = 0; $i < count($ruangan); $i++) {
            $list[$i]['id'] = $ruangan[$i]['id_ruangan'];
            $list[$i]['text'] = $ruangan[$i]['nama_ruangan'];
        }

        echo json_encode($list);
    }

    public function tambah_ruangan()
    {

        $nama = $this->input->post('nama_ruangan');
        $kapasitas = $this->input->post('kapasitas');
        $perlengkapan = $this->input->post('perlengkapan');
        //  $foto = $_FILES['foto']['name'];

        $this->form_validation->set_rules('nama_ruangan', 'Nama', 'required');
        $this->form_validation->set_rules('perlengkapan', 'Perlengkapan', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|greater_than[0]');
        $requiredImage = 1;
        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Foto', 'required');
            $requiredImage = 0;
        }
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('greater_than', 'Harus lebih dari 0');

        $uploadOk = 1;
        $config['upload_path'] = './resources/assets/img/ruangan/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 5000; //5 MB
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto') == FALSE) {
            $uploadOk = 0;
        } else {
            $uploadOk = 1;
        }

        if ($this->form_validation->run() == FALSE || $uploadOk == 0) {
            $respon = array(
                'sukses' => false,
                'error_nama' => form_error('nama_ruangan'),
                'error_kapasitas' => form_error('kapasitas'),
                'error_perlengkapan' => form_error('perlengkapan')
            );
            if ($requiredImage == 0) {
                $respon['error_foto'] = form_error('foto');
            } else if ($uploadOk == 0) {
                $respon['error_foto'] = "Tidak berhasil upload file. Format file hanya jpg, png dan ukuran file maksimal 5MB";
            }
            echo json_encode($respon);
        } else {
            $tanggal = date('Y-m-d H:i:s');
            $foto = $this->upload->data('file_name');
            $data = array(
                'nama_ruangan' => $nama, 'kapasitas' => $kapasitas, 'perlengkapan' => $perlengkapan, 'foto' => $foto, 'status_ruangan' => 'TERSEDIA', 'created_at' => $tanggal
            );

            $this->M_Ruangan->insert_record($data, 'ruangan');

            $respon['sukses'] = "Data berhasil disimpan";
            echo json_encode($respon);
        }
    }

    public function edit_ruangan($id_ruangan)
    {
        $data['title'] = "Ruangan";
        $data['edit_ruangan'] = $this->M_Ruangan->pilih_ruangan($id_ruangan)->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/ruangan/v_edit_ruangan.php', $data);
    }

    public function proses_edit_ruangan()
    {
        $id_ruangan = $this->input->post('id_ruangan');
        $nama = $this->input->post('nama_ruangan');
        $kapasitas = $this->input->post('kapasitas');
        $perlengkapan = $this->input->post('perlengkapan');
        $status = $this->input->post('status');
        $foto_lama = $this->input->post('foto_lama');
        $foto_baru = $_FILES['foto_baru']['name'];

        $this->form_validation->set_rules('nama_ruangan', 'Nama', 'required');
        $this->form_validation->set_rules('perlengkapan', 'Perlengkapan', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|greater_than[0]');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('greater_than', 'Harus lebih dari 0');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_nama' => form_error('nama_ruangan'),
                'error_kapasitas' => form_error('kapasitas'),
                'error_perlengkapan' => form_error('perlengkapan')
            );
            echo json_encode($respon);
        } else {
            $tanggal = date('Y-m-d H:i:s');
            $where = array('id_ruangan' => $id_ruangan);

            if ($foto_baru == "") {
                $data = array(
                    'nama_ruangan' => $nama, 'kapasitas' => $kapasitas, 'perlengkapan' => $perlengkapan, 'foto' => $foto_lama, 'status_ruangan' => $status, 'updated_at' => $tanggal
                );

                $this->M_Ruangan->update_record($where, $data, 'ruangan');
                $respon['sukses'] = "Data berhasil diubah";
                echo json_encode($respon);
            } else {
                //upload file
                $config['upload_path'] = './resources/assets/img/ruangan/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = 5000; //5 MB

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto_baru')) {
                    $respon['sukses'] = false;
                    $respon['error_foto'] = "Tidak berhasil upload file. Format file hanya jpg, png dan ukuran file maksimal 5MB";
                    echo json_encode($respon);
                } else {
                    $foto = $this->upload->data('file_name');

                    $data = array(
                        'nama_ruangan' => $nama, 'kapasitas' => $kapasitas, 'perlengkapan' => $perlengkapan, 'foto' => $foto, 'status_ruangan' => $status, 'updated_at' => $tanggal
                    );
                    @unlink('./resources/assets/img/ruangan/' . $foto_lama); //untuk hapus foto lama

                    $this->M_Ruangan->update_record($where, $data, 'ruangan');
                    $respon['sukses'] = "Data berhasil diubah";
                    echo json_encode($respon);
                }
            }
        }
    }

    public function lihat_peminjaman()
    {
        $data['title'] = "Ruangan";
        $data['peminjaman'] = $this->M_Ruangan->informasi_peminjaman()->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/ruangan/v_mengelola_peminjaman.php', $data);
    }

    public function tampil_peminjaman()
    {
        $peminjaman = $this->M_Ruangan->informasi_peminjaman()->result_array();
        for ($i = 0; $i < count($peminjaman); $i++) {
            $peminjaman[$i]['tanggal_booking'] = tanggal_indonesia($peminjaman[$i]['tanggal_booking']);
            $peminjaman[$i]['jam'] = waktu($peminjaman[$i]['jam_mulai']) . ' - ' .  waktu($peminjaman[$i]['jam_selesai']);
        }
        echo json_encode($peminjaman);
    }

    public function update_status()
    {
        $status = $this->input->post('status');
        $pesan = $this->input->post('pesan');
        $tanggal = date('Y-m-d H:i:s');
        $where = array('id_peminjaman' => $this->input->post('id'));
        $data = array('status_peminjaman' => $status, 'pesan' => $pesan, 'updated_at' => $tanggal);
        $this->M_Ruangan->update_record($where, $data, 'peminjaman_ruangan');

        $this->session->set_flashdata('sukses', 'Konfirmasi berhasil');
        redirect('mengelola_ruangan/peminjaman');
    }
}
