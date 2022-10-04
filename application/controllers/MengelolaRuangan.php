<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

    public function tambah_ruangan()
    {

        $nama = $this->input->post('nama_ruangan');
        $kapasitas = $this->input->post('kapasitas');
        $perlengkapan = $this->input->post('perlengkapan');
        //  $foto = $_FILES['foto']['name'];

        $this->form_validation->set_rules('nama_ruangan', 'Nama', 'trim|required');
        $this->form_validation->set_rules('perlengkapan', 'Perlengkapan', 'trim|required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'trim|required|greater_than[0]');
        $requiredImage = 1;
        //  for ($i = 1; $i <= $count; $i++) {
        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Foto', 'required');
            $requiredImage = 0;
        }
        //   }
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
            $foto = $this->upload->data('file_name');
            $data = array(
                'nama_ruangan' => $nama, 'kapasitas' => $kapasitas, 'perlengkapan' => $perlengkapan, 'foto' => $foto
            );

            $this->M_Ruangan->insert_record($data, 'ruangan');

            $respon['sukses'] = "Berhasil ditambahkan";
            echo json_encode($respon);
            //    $id_ruangan = $this->db->insert_id();
            // for ($i = 1; $i <= $count; $i++) {
            //     // $foto = $this->upload->data('file_name');
            //     $detail = array(
            //         'id_ruangan' => $id_ruangan, 'foto' => $_FILES['foto' . $count]['name']
            //     );
            //     $this->M_Ruangan->insert_record($detail, 'detail_ruangan');
            // }

            /*   if (!$this->upload->do_upload('foto')) {
                $respon = array(
                    'sukses' => false,
                    'error_foto' => "Tidak berhasil upload file. Format file hanya gif, jpg, png dan ukuran file maksimal 5MB"
                );
                echo json_encode($respon);
            } else {
                $foto = $this->upload->data('file_name');
                $data = array(
                    'nama_ruangan' => $nama, 'kapasitas' => $kapasitas, 'perlengkapan' => $perlengkapan, 'foto' => $foto
                );

                $this->M_Ruangan->insert_record($data, 'ruangan');
                $respon['sukses'] = "Berhasil ditambahkan";
                echo json_encode($respon);
            } */
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
        }
        echo json_encode($peminjaman);
    }

    public function update_status()
    {
        $where = array('id_peminjaman' => $this->input->post('id'));
        $data = array('status_peminjaman' => $this->input->post('status'));
        $this->M_Ruangan->update_record($where, $data, 'peminjaman_ruangan');
        $this->session->set_flashdata('sukses', 'Berhasil ubah status');
        redirect('mengelola_ruangan/peminjaman');
    }
}
