<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Pendeta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect('login');
        }

        $this->load->model(array('M_Pendeta'));
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Pendeta";
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/pendeta/v_lihat_pendeta.php');
    }

    public function tampil_pendeta()
    {
        $query = $this->M_Pendeta->tampil()->result_array();

        for ($i = 0; $i < count($query); $i++) {
            $query[$i]['tanggal_lahir_pendeta'] = tanggal_indonesia($query[$i]['tanggal_lahir_pendeta']);
        }

        echo json_encode($query);
    }

    public function tambah_pendeta()
    {
        $baris = $this->M_Pendeta->tampil()->num_rows();
        $no_pendeta = '0000' . $baris + 1;
        $nama_pendeta = $this->input->post('nama_pendeta');
        $alamat_pendeta = $this->input->post('alamat_pendeta');
        $nohp_pendeta = $this->input->post('nohp');
        $email_pendeta = $this->input->post('email_pendeta');
        $jenis_kelamin_pendeta = $this->input->post('jenis_kelamin');
        $tanggal_lahir_pendeta = $this->input->post('tanggal_lahir');
        $status_pendeta = $this->input->post('status');

        $this->form_validation->set_rules('nama_pendeta', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_pendeta', 'Alamat', 'required');
        $this->form_validation->set_rules('nohp', 'No. Handphone', 'required|min_length[9]|max_length[15]');
        $this->form_validation->set_rules('email_pendeta', 'Email', 'required|valid_email|is_unique[pendeta.email_pendeta]');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Foto', 'required');
        }

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('valid_email', '{field} harus valid');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');
        $this->form_validation->set_message('min_length', '{field} minimal {param} angka');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} angka');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_nama' => form_error('nama_lengkap'),
                'error_alamat' => form_error('alamat_pendeta'),
                'error_nohp' => form_error('nohp'),
                'error_email' => form_error('email_pendeta'),
                'error_jenis_kelamin' => form_error('jenis_kelamin'),
                'error_tanggal' => form_error('tanggal_lahir'),
                'error_foto' => form_error('foto'),
                'error_status' => form_error('status')
            );
            echo json_encode($respon);
        } else {
            //upload file
            $config['upload_path'] = './resources/assets/img/pendeta/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 5000; //5 MB

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $respon['sukses'] = false;
                $respon['error_foto'] = "Tidak berhasil upload file. Format file hanya jpg, png dan ukuran file maksimal 5MB";
                echo json_encode($respon);
            } else {
                $tanggal = date('Y-m-d H:i:s');
                $foto = $this->upload->data('file_name');

                $data = array(
                    'no_pendeta' => $no_pendeta, 'nama_lengkap_pendeta' => $nama_pendeta,
                    'alamat_pendeta' => $alamat_pendeta, 'nohp_pendeta' => $nohp_pendeta,
                    'email_pendeta' => $email_pendeta, 'jenis_kelamin_pendeta' => $jenis_kelamin_pendeta,
                    'tanggal_lahir_pendeta' => $tanggal_lahir_pendeta, 'foto_pendeta' => $foto, 'status_pendeta' => $status_pendeta, 'id_user' => $this->session->userdata('id_user'), 'created_at' => $tanggal
                );

                $this->M_Pendeta->insert_record($data, 'pendeta');
                $respon['sukses'] = "Data berhasil disimpan";
                echo json_encode($respon);
            }
        }
    }

    public function detail_pendeta($id_pendeta)
    {
        $data['title'] = "Pendeta";
        $data['detailPendeta'] = $this->M_Pendeta->tampil_detail($id_pendeta)->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/pendeta/v_detail_pendeta', $data);
    }

    public function edit_pendeta($id_pendeta)
    {
        $data['title'] = "Pendeta";
        $where = array('id_pendeta' => $id_pendeta);
        $data['pendetaEdit'] = $this->M_Pendeta->tampil_edit($where, 'pendeta')->result();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php');
        $this->load->view('admin/pendeta/v_edit_pendeta', $data);
    }

    public function proses_edit_pendeta()
    {
        $id_pendeta = $this->input->post('id_pendeta');
        $nama_pendeta = $this->input->post('nama_pendeta');
        $alamat_pendeta = $this->input->post('alamat_pendeta');
        $nohp_pendeta = $this->input->post('nohp');
        $email_pendeta = $this->input->post('email_pendeta');
        $jenis_kelamin_pendeta = $this->input->post('jenis_kelamin');
        $tanggal_lahir_pendeta = $this->input->post('tanggal_lahir');
        $foto_lama = $this->input->post('foto_lama');
        $foto_baru = $_FILES['foto_baru']['name'];
        $status_pendeta = $this->input->post('status');

        $profil = $this->M_Pendeta->tampil_detail($id_pendeta)->row_array();

        $this->form_validation->set_rules('nama_pendeta', 'Nama', 'trim|required');
        $this->form_validation->set_rules('alamat_pendeta', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('nohp', 'No. Handphone', 'trim|required|min_length[9]|max_length[15]');
        if ($email_pendeta != $profil['email_pendeta']) {
            $this->form_validation->set_rules('email_pendeta', 'Email', 'trim|required|valid_email|is_unique[pendeta.email_pendeta]');
        }
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('valid_email', '{field} harus valid');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan');
        $this->form_validation->set_message('min_length', '{field} minimal {param} angka');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} angka');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_nama' => form_error('nama_lengkap'),
                'error_alamat' => form_error('alamat_pendeta'),
                'error_nohp' => form_error('nohp'),
                'error_email' => form_error('email_pendeta'),
                'error_jenis_kelamin' => form_error('jenis_kelamin'),
                'error_tanggal' => form_error('tanggal_lahir'),
                'error_status' => form_error('status')
            );
            echo json_encode($respon);
        } else {
            $tanggal = date('Y-m-d H:i:s');
            $where = array('id_pendeta' => $id_pendeta);

            if ($foto_baru == "") {
                $data = array(
                    'nama_lengkap_pendeta' => $nama_pendeta, 'alamat_pendeta' => $alamat_pendeta, 'nohp_pendeta' => $nohp_pendeta,
                    'email_pendeta' => $email_pendeta, 'jenis_kelamin_pendeta' => $jenis_kelamin_pendeta,
                    'tanggal_lahir_pendeta' => $tanggal_lahir_pendeta, 'foto_pendeta' => $foto_lama, 'status_pendeta' => $status_pendeta, 'id_user' => $this->session->userdata('id_user'), 'updated_at' => $tanggal
                );

                $this->M_Pendeta->update_record($where, $data, 'pendeta');
                $respon['sukses'] = "Data berhasil diubah";
                echo json_encode($respon);
            } else {
                //upload file
                $config['upload_path'] = './resources/assets/img/pendeta/';
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
                        'nama_lengkap_pendeta' => $nama_pendeta, 'alamat_pendeta' => $alamat_pendeta, 'nohp_pendeta' => $nohp_pendeta,
                        'email_pendeta' => $email_pendeta, 'jenis_kelamin_pendeta' => $jenis_kelamin_pendeta,
                        'tanggal_lahir_pendeta' => $tanggal_lahir_pendeta, 'foto_pendeta' => $foto, 'status_pendeta' => $status_pendeta, 'id_user' => $this->session->userdata('id_user'), 'updated_at' => $tanggal
                    );

                    @unlink('./resources/assets/img/pendeta/' . $foto_lama); //untuk hapus foto lama

                    $this->M_Pendeta->update_record($where, $data, 'pendeta');
                    $respon['sukses'] = "Data berhasil diubah";
                    echo json_encode($respon);
                }
            }
        }
    }
}
