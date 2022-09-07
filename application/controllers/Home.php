<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Konten', 'M_Dokumen', 'M_Anggota_Jemaat', 'M_Wilayah', 'M_Pendeta', 'M_Artikel'));
    }

    public function index()
    {
        $data['kontenSlide1'] = $this->M_Konten->tampil_konten_slide1()->result();
        $data['kontenSlide2'] = $this->M_Konten->tampil_konten_slide2()->result();
        $data['kontenSlide3'] = $this->M_Konten->tampil_konten_slide3()->result();
        $data['kontenSlide4'] = $this->M_Konten->tampil_konten_slide4()->result();
        $data['kontenSlide5'] = $this->M_Konten->tampil_konten_slide5()->result();
        $data['fotoIbadah'] = $this->M_Konten->tampil_foto_ibadah()->result();
        $data['momen'] = $this->M_Konten->tampil_nama_momen()->result();
        $data['formPendaftaran'] = $this->M_Dokumen->tampil()->result();
        $data['jemaatLaki'] = $this->M_Anggota_Jemaat->tampil_jemaat_lakilaki()->result();
        $data['jemaatPerempuan'] = $this->M_Anggota_Jemaat->tampil_jemaat_perempuan()->result();

        //untuk mengambil data jemaat ulang tahun per minggu
        $awal = strtotime("Monday This Week");
        $akhir = strtotime("+1 days, Sunday This Week");
        $data['jemaatUlangTahun'] = array();
        while ($awal != $akhir) {

            $date = date('Y-m-d', $awal);

            $hasil['hasil'] = $this->M_Anggota_Jemaat->tampil_jemaat_ulang_tahun($date)->result_array();

            $data['jemaatUlangTahun'] = array_merge($data['jemaatUlangTahun'], $hasil['hasil']);

            $awal = strtotime('+1 days', $awal);
        }

        $data['jumlahWilayah'] = $this->M_Wilayah->tampil_total_wilayah()->result();
        $data['pendeta'] = $this->M_Pendeta->tampil_pendeta()->result();
        $data['artikel'] = $this->M_Artikel->tampil()->result();
        $data['warta'] = $this->M_Artikel->tampil_warta()->result();
        $this->load->view('v_home.php', $data);
    }

    /*  public function coba()
    {
        $this->load->library('encryption');

        $input = 'a';

        $encrypt = $this->encryption->encrypt($input);

        echo $encrypt . '<br>';

        echo $this->encryption->decrypt($encrypt) . '<br>';
    }

    function coba2()
    {
        $to = "projectwebdua@gmail.com";
        $subject = "My subject";
        $txt = "Hello world!";
        $headers = "From: officehourcompany@gmail.com";

        mail($to, $subject, $txt, $headers);
    } */
}
