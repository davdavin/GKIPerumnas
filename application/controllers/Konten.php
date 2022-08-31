<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konten extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect('Login_Admin');
        }

        $this->load->model(array('M_Konten', 'M_Request'));
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['kontenFotoIbadah'] = $this->M_Konten->tampil_konten_foto_ibadah()->result();
        $notif['notifRequest'] = $this->M_Request->tampil_notifikasi_request()->result();
        $this->load->view('templates/header.php', $notif);
        $this->load->view('v_konten.php', $data);
    }

    public function tampil_slide()
    {
        $query = $this->M_Konten->tampil_konten_slide()->result();
        echo json_encode($query);
    }

    public function tampil_foto_ibadah()
    {
        $query = $this->M_Konten->tampil_konten_foto_ibadah()->result();
        echo json_encode($query);
    }

    public function edit_tulisan($id_slide)
    {
        $data['kontenSlide'] = $this->M_Konten->tampil_edit_slide($id_slide)->result();
        $notif['notifRequest'] = $this->M_Request->tampil_notifikasi_request()->result();
        $this->load->view('templates/header.php', $notif);
        $this->load->view('v_edit_slide.php', $data);
    }

    public function proses_edit_slide()
    {
        $id_slide = $this->input->post('id_slide');
        $judul_slide = $this->input->post('judul_slide');
        $deskripsi_slide = $this->input->post('deskripsi_slide');
        $gambar_lama = $this->input->post('gambar_lama');
        $gambar_baru = $_FILES['gambar_baru']['name'];

        $where = array('id_slide' => $id_slide);

        if ($gambar_baru == "") {
            $data = array(
                'judul_slide' => $judul_slide,
                'deskripsi_slide' => $deskripsi_slide,
                'gambar_slide' => $gambar_lama
            );

            $this->M_Konten->update_record($where, $data, 'konten_slide');
            $this->session->set_flashdata('sukses', 'Konten berhasil diubah');
            redirect('Konten');
        } else {
            //upload file
            $config['upload_path'] = './resources/assets/img/slide/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 100000; //100 MB

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar_baru')) {
                /*         $respon = array(
                    'sukses' => false,
                    'error_slide' => "Tidak berhasil upload. Perhatikan ukuran file dan tipe file"
                );
                echo json_encode($respon); */
                $this->session->set_flashdata('gagal', 'Konten tidak berhasil diubah');
                redirect('Konten');
            } else {
                //      $gambar = $this->upload->data('file_name');

                $data = array(
                    'judul_slide' => $judul_slide,
                    'deskripsi_slide' => $deskripsi_slide,
                    'gambar_slide' => $gambar_baru
                );

                @unlink('./resources/assets/img/slide/' . $gambar_lama); //untuk hapus gambar lama

                $this->M_Konten->update_record($where, $data, 'konten_slide');
                $this->session->set_flashdata('sukses', 'Konten berhasil diubah');
                redirect('Konten');

                /*     $this->M_Konten->update_record($where, $data, 'konten_slide');
                $respon['sukses'] = "Berhasil ganti foto";
                echo json_encode($respon); */
            }
        }
    }

    public function proses_edit_gambar()
    {
        $id_slide = $this->input->post('id_slide');
        $gambar_lama = $this->input->post('gambar_lama');
        //upload file
        $config['upload_path'] = './resources/assets/img/slide/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100000; //100 MB
        $config['file_name'] = $_FILES['gambar']['name'];

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')) {
            $respon = array(
                'sukses' => false,
                'error_slide' => "Tidak berhasil upload. Perhatikan ukuran file dan tipe file"
            );
            echo json_encode($respon);
        } else {
            $gambar = $this->upload->data('file_name');

            $where = array('id_slide' => $id_slide);
            $data = array('gambar_slide' => $gambar);

            @unlink('./resources/assets/img/slide/' . $gambar_lama); //untuk hapus gambar lama

            $this->M_Konten->update_record($where, $data, 'konten_slide');
            $respon['sukses'] = "Berhasil ganti foto";
            echo json_encode($respon);
        }
    }

    public function proses_edit_foto_ibadah()
    {
        $id_foto_ibadah = $this->input->post('id_foto_ibadah');
        $foto_lama = $this->input->post('foto_lama');
        $config['file_name'] = $_FILES['fotoIbadah']['name'];

        //upload file
        $config['upload_path'] = './resources/assets/img/gallery/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100000; //100 MB 

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('fotoIbadah')) {
            // $this->session->set_flashdata('gagal', 'Upload gagal');
            //redirect('Konten');
            $respon = array(
                'sukses' => false,
                'error_foto' => "Tidak berhasil upload. Perhatikan ukuran file dan tipe file"
            );
            echo json_encode($respon);
        } else {
            $foto = $this->upload->data('file_name');
            $where = array('id_foto_ibadah' => $id_foto_ibadah);
            $data = array('foto_ibadah' => $foto);

            @unlink('./resources/assets/img/gallery/' . $foto_lama); //untuk hapus foto lama

            $this->M_Konten->update_record($where, $data, 'konten_foto_ibadah');
            // $this->session->set_flashdata('sukses', 'Foto berhasil diubah');
            //edirect('Konten');

            $respon['sukses'] = "Berhasil ganti foto";
            echo json_encode($respon);
        }
    }
}
