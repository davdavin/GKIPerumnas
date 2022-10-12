<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konten extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect('login');
        }

        $this->load->model(array('M_Konten'));
        $this->load->helper(array('form', 'url', 'file'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Konten";
        $data['kontenFotoIbadah'] = $this->M_Konten->tampil_konten_foto_ibadah()->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/konten/v_konten.php', $data);
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
        $data['title'] = "Konten";
        $data['kontenSlide'] = $this->M_Konten->tampil_edit_slide($id_slide)->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/konten/v_edit_slide.php', $data);
    }

    public function proses_edit_slide()
    {
        $id_slide = $this->input->post('id_slide');
        $judul_slide = $this->input->post('judul_slide');
        $deskripsi_slide = $this->input->post('deskripsi_slide');
        $gambar_lama = $this->input->post('gambar_lama');
        $gambar_baru = $_FILES['gambar_baru']['name'];

        $this->form_validation->set_rules('judul_slide', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi_slide', 'Dekripsi', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_judul' => form_error('judul_slide'),
                'error_deskripsi' => form_error('deskripsi_slide')
            );
            echo json_encode($respon);
        } else {

            $where = array('id_slide' => $id_slide);

            if ($gambar_baru == "") {
                $data = array(
                    'judul_slide' => $judul_slide,
                    'deskripsi_slide' => $deskripsi_slide,
                    'gambar_slide' => $gambar_lama
                );

                $this->M_Konten->update_record($where, $data, 'konten_slide');
                $respon['sukses'] = "Berhasil diubah";
                echo json_encode($respon);
            } else {
                //upload file
                $config['upload_path'] = './resources/assets/img/slide/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 100000; //100 MB

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar_baru')) {
                    $respon = array(
                        'sukses' => false,
                        'error_foto' => "Tidak berhasil upload. Perhatikan ukuran file dan tipe file"
                    );
                    echo json_encode($respon);
                } else {
                    $data = array(
                        'judul_slide' => $judul_slide,
                        'deskripsi_slide' => $deskripsi_slide,
                        'gambar_slide' => $this->upload->data('file_name')
                    );

                    @unlink('./resources/assets/img/slide/' . $gambar_lama); //untuk hapus gambar lama

                    $this->M_Konten->update_record($where, $data, 'konten_slide');
                    $respon['sukses'] = "Berhasil diubah";
                    echo json_encode($respon);
                }
            }
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

            $respon['sukses'] = "Berhasil ganti foto";
            echo json_encode($respon);
        }
    }
}
