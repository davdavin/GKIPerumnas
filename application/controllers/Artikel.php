<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Artikel', 'M_Anggota_Jemaat'));
    }

    public function index()
    {
        $data['title'] = "Artikel";

        //masih coba
        //PAGINATION
        $this->load->library('pagination');

        //config
        $config['base_url'] =  base_url() . 'Artikel/index';
        $config['total_rows'] = $this->db->query("SELECT * FROM artikel")->num_rows();
        $config['per_page'] = 4; //10
        //  $config['num_links'] = 2;

        //styling
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo'; //ini dari htmlnya jadi nampilin panahnya ada 2 //r = right
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo'; //ini dari htmlnya jadi nampilin panahnya ada 2 //l = left
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">'; //cur = current page, yang lagi aktif
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">'; //digit
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');


        //initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['artikel'] = $this->M_Artikel->semua_artikel($config['per_page'], $data['start'])->result();
        $this->load->view('artikel/v_list_artikel.php', $data);
    }

    public function cari()
    {
        // $data = [];
        if (!isset($_POST['searchTerm'])) {
            $artikel = $this->db->query("SELECT * FROM artikel")->result_array();
        } else {
            $search = strtolower($_POST['searchTerm']);
            $artikel = $this->db->query("SELECT id_artikel, judul_artikel FROM artikel WHERE judul_artikel LIKE '%$search%'")->result_array();
        }

        $list = array();
        for ($i = 0; $i < count($artikel); $i++) {
            $list[$i]['id'] = $artikel[$i]['id_artikel'];
            $list[$i]['text'] = $artikel[$i]['judul_artikel'];
        }

        echo json_encode($list);
    }

    public function cari_renungan_harian()
    {
        if (!isset($_POST['searchTerm'])) {
            $renungan = $this->db->query("SELECT * FROM artikel WHERE id_tipe_artikel = 1")->result_array();
        } else {
            $search = strtolower($_POST['searchTerm']);
            $renungan = $this->db->query("SELECT id_artikel, judul_artikel FROM artikel WHERE id_tipe_artikel = 1 AND judul_artikel LIKE '%$search%'")->result_array();
        }

        $list = array();
        for ($i = 0; $i < count($renungan); $i++) {
            $list[$i]['id'] = $renungan[$i]['id_artikel'];
            $list[$i]['text'] = $renungan[$i]['judul_artikel'];
        }

        echo json_encode($list);
    }

    public function hasil_pencarian()
    {
        $id_artikel = $this->input->post('artikel');
        if ($id_artikel == NULL) {
            redirect('Artikel');
        } else {
            //$this->baca_artikel($id_artikel);
            redirect('Artikel/baca_artikel/' . $id_artikel);
        }
    }

    public function baca_artikel($id_artikel)
    {
        //cek menggunakan pdf atau tidak
        $cek_artikel = $this->M_Artikel->cek_pdf($id_artikel)->row_array();

        if ($cek_artikel['file'] != NULL) {
            //  $data['artikel'] = $this->M_Artikel->pilihan_artikel($id_artikel)->result();
            $data['artikel'] = $this->M_Artikel->pilihan_artikel($id_artikel)->row_array();
            $this->load->view('artikel/v_lihat_pdf.php', $data);
        } else {
            $data['artikel'] = $this->M_Artikel->pilihan_artikel($id_artikel)->result();
            $this->load->view('artikel/v_baca_artikel.php', $data);
        }
    }

    public function pagination_tipe_artikel($function, $tipe)
    {
        $this->load->library('pagination');

        //config
        $config['base_url'] = base_url() . 'Artikel/' . $function;
        $config['total_rows'] = $this->db->query("SELECT * FROM artikel JOIN tipe_artikel ON tipe_artikel.id_tipe_artikel = artikel.id_tipe_artikel WHERE tipe_artikel = '$tipe'")->num_rows();
        $config['per_page'] = 4; //10
        //  $config['num_links'] = 2;

        //styling
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo'; //ini dari htmlnya jadi nampilin panahnya ada 2 //r = right
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo'; //ini dari htmlnya jadi nampilin panahnya ada 2 //l = left
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">'; //cur = current page, yang lagi aktif
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">'; //digit
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');
        //initialize
        $this->pagination->initialize($config);
    }

    public function renungan_harian()
    {
        $data['title'] = "Renungan Harian";
        $this->pagination_tipe_artikel('renungan_harian', $data['title']);
        $per_page = 4; //10
        $start = $this->uri->segment(3);
        $data['renungan'] = $this->M_Artikel->pilih_tipe_artikel('Renungan Harian', $per_page, $start)->result();
        //  $data['renungan'] = $this->M_Artikel->pilih_tipe_artikel('Renungan Harian')->result();
        $this->load->view('artikel/v_renungan_harian.php', $data);
    }

    public function bacaan_doa()
    {
        $data['title'] = "Doa Harian";
        $this->pagination_tipe_artikel('bacaan_doa', $data['title']);
        $per_page = 4;
        $start = $this->uri->segment(3);
        $data['doa_harian'] = $this->M_Artikel->pilih_tipe_artikel('Doa Harian', $per_page, $start)->result();
        $this->load->view('artikel/v_bacaan_doa.php', $data);
    }

    public function warta_jemaat()
    {
        $data['title'] = "Warta Jemaat";
        $this->pagination_tipe_artikel('warta_jemaat', $data['title']);
        $per_page = 4;
        $start = $this->uri->segment(3);
        $data['warta'] = $this->M_Artikel->pilih_tipe_artikel('Warta Jemaat', $per_page, $start)->result();
        $this->load->view('artikel/v_warta_jemaat.php', $data);
    }

    public function artikel_lainnya()
    {
        $data['title'] = "Artikel Lainnya";
        $this->pagination_tipe_artikel('artikel_lainnya', $data['title']);
        $per_page = 4;
        $start = $this->uri->segment(3);
        $data['artikel'] = $this->M_Artikel->pilih_tipe_artikel('Artikel Lainnya', $per_page, $start)->result();
        $this->load->view('artikel/v_artikel_lainnya.php', $data);
    }

    public function pdf($id_artikel)
    {
        $this->load->library('Pdf');
        $data['artikel'] = $this->M_Artikel->pilihan_artikel($id_artikel)->result();
        $html = $this->load->view('artikel/v_dompdf.php', $data, true);
        $this->pdf->createPDF($html, 'Artikel', false);
    }
}
