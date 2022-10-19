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

        $this->form_validation->set_rules('nama_ruangan', 'Nama', 'trim|required');
        $this->form_validation->set_rules('perlengkapan', 'Perlengkapan', 'trim|required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'trim|required|greater_than[0]');
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
                'nama_ruangan' => $nama, 'kapasitas' => $kapasitas, 'perlengkapan' => $perlengkapan, 'foto' => $foto, 'created_at' => $tanggal
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
        $foto_lama = $this->input->post('foto_lama');
        $foto_baru = $_FILES['foto_baru']['name'];

        $this->form_validation->set_rules('nama_ruangan', 'Nama', 'trim|required');
        $this->form_validation->set_rules('perlengkapan', 'Perlengkapan', 'trim|required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'trim|required|greater_than[0]');

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
                    'nama_ruangan' => $nama, 'kapasitas' => $kapasitas, 'perlengkapan' => $perlengkapan, 'foto' => $foto_lama, 'updated_at' => $tanggal
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
                        'nama_ruangan' => $nama, 'kapasitas' => $kapasitas, 'perlengkapan' => $perlengkapan, 'foto' => $foto, 'updated_at' => $tanggal
                    );
                    @unlink('./resources/assets/img/ruangan/' . $foto_lama); //untuk hapus foto lama

                    $this->M_Ruangan->update_record($where, $data, 'ruangan');
                    $respon['sukses'] = "Data berhasil diubah";
                    echo json_encode($respon);
                }
            }
        }
    }

    public function hapus_ruangan($id_ruangan)
    {
        $tanggal = date('Y-m-d H:i:s');
        $where = array('id_ruangan' => $id_ruangan);
        $data = array('deleted_at' => $tanggal);
        $this->M_Ruangan->update_record($where, $data, 'ruangan');
        $this->session->set_flashdata('sukses', 'Berhasil dihapus');
        redirect('mengelola_ruangan');
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

    public function proses_peminjaman()
    {
        $id_ruangan = $this->input->post('id_ruangan');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nohp = $this->input->post('nohp');
        $keperluan = $this->input->post('keperluan');
        $tanggal_booking = $this->input->post('tanggal_booking');
        $jam_mulai = $this->input->post('jam_mulai');
        $jam_selesai = $this->input->post('jam_selesai');

        $peminjaman = $this->db->query("SELECT tanggal_booking, jam_mulai, jam_selesai FROM peminjaman_ruangan WHERE id_ruangan = '$id_ruangan'")->result_array();

        $uploadOk = 1;
        for ($i = 0; $i < count($peminjaman); $i++) {
            $temp_jam_mulai_db = strtotime($peminjaman[$i]['jam_mulai']);
            $temp_jam_selesai_db = strtotime($peminjaman[$i]['jam_selesai']);
            if (strtotime($peminjaman[$i]['tanggal_booking']) == strtotime($tanggal_booking)) {

                if ($temp_jam_mulai_db >= strtotime($jam_mulai) && $temp_jam_selesai_db <= strtotime($jam_selesai) || $temp_jam_mulai_db <= strtotime($jam_mulai) && $temp_jam_selesai_db <= strtotime($jam_selesai) && $temp_jam_selesai_db >= strtotime($jam_mulai) || $temp_jam_mulai_db >= strtotime($jam_mulai) && $temp_jam_selesai_db >= strtotime($jam_selesai) && $temp_jam_mulai_db <= strtotime($jam_selesai)  || $temp_jam_mulai_db <= strtotime($jam_mulai) && $temp_jam_selesai_db >= strtotime($jam_selesai)) {
                    $uploadOk = 0;
                    $respon['sukses'] = false;
                    $respon['error_booking'] = "Tidak berhasil booking";
                    echo json_encode($respon);
                    break;
                    /*  $this->session->set_flashdata('gagal', 'Tidak berhasil booking');
                    redirect('mengelola_ruangan/peminjaman'); */
                } else {
                    $uploadOk = 1;
                }
            } else {
                $uploadOk = 1;
            }
        }


        if ($uploadOk == 1) {
            $tanggal = date('Y-m-d H:i:s');
            $data = array(
                'id_ruangan' => $id_ruangan, 'nama_peminjam' => $nama, 'email_peminjam' => $email, 'nohp_peminjam' => $nohp, 'keperluan' => $keperluan,
                'tanggal_booking' => $tanggal_booking, 'jam_mulai' => $jam_mulai, 'jam_selesai' => $jam_selesai, 'status_peminjaman' => 'SEDANG DIPROSES', 'created_at' => $tanggal
            );
            $this->M_Ruangan->insert_record($data, 'peminjaman_ruangan');
            $respon['sukses'] = "Berhasil booking";

            echo json_encode($respon);
            //  $this->session->set_flashdata('sukses', 'Berhasil booking');
            // redirect('mengelola_ruangan/peminjaman');
        }
    }

    public function update_status()
    {
        $nama = $this->input->post('nama_peminjam');
        $email = $this->input->post('email_peminjam');
        $status = $this->input->post('status');
        $pesan = $this->input->post('pesan');
        $tanggal = date('Y-m-d H:i:s');
        $where = array('id_peminjaman' => $this->input->post('id'));
        $data = array('status_peminjaman' => $status, 'pesan' => $pesan, 'updated_at' => $tanggal);
        $this->M_Ruangan->update_record($where, $data, 'peminjaman_ruangan');

        if ($status == "DITERIMA") {
            $to = $email;
            $subject = "Konfirmasi Peminjaman Ruangan";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: gerejagkiperumnass@gmail.com";
            $message = "
        <html>
        <head>
        <link href='https://fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700' rel='stylesheet'>
        <!-- CSS Reset : BEGIN -->
        <style>
        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
        margin: 0 auto !important;
        padding: 0 !important;
        height: 100% !important;
        width: 100% !important;
        background: #9eccf4;
        }
        /* What it does: Stops email clients resizing small text. */
        * {
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
        }
        
        /* What it does: Centers email on Android 4.4 */
        div[style*='margin: 16px 0'] {
        margin: 0 !important;
        }
        
        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
        mso-table-lspace: 0pt !important;
        mso-table-rspace: 0pt !important;
        }
        
        /* What it does: Fixes webkit padding issue. */
        table {
        border-spacing: 0 !important;
        border-collapse: collapse !important;
        table-layout: fixed !important;
        margin: 0 auto !important;
        }
        
        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
        -ms-interpolation-mode:bicubic;
        }
        
        /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
        a {
        text-decoration: none;
        }
        
        /* What it does: A work-around for email clients meddling in triggered links. */
        *[x-apple-data-detectors],  /* iOS */
        .unstyle-auto-detected-links *,
        .aBn {
        border-bottom: 0 !important;
        cursor: default !important;
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        }
        
        /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
        .a6S {
        display: none !important;
        opacity: 0.01 !important;
        }
        
        /* What it does: Prevents Gmail from changing the text color in conversation threads. */
        .im {
        color: inherit !important;
        }
        
        /* If the above doesn't work, add a .g-img class to any image in question. */
        img.g-img + div {
        display: none !important;
        }
        
        /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
        /* Create one of these media queries for each additional viewport size you'd like to fix */
        
        /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
        u ~ div .email-container {
        min-width: 320px !important;
        }
        }
        /* iPhone 6, 6S, 7, 8, and X */
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
        u ~ div .email-container {
        min-width: 375px !important;
        }
        }
        /* iPhone 6+, 7+, and 8+ */
        @media only screen and (min-device-width: 414px) {
        u ~ div .email-container {
        min-width: 414px !important;
        }
        }
        </style>
        
        <!-- CSS Reset : END -->
        
        <!-- Progressive Enhancements : BEGIN -->
        <style>
        
        .primary{
        background: #17bebb;
        }
        .bg-content {
        background: #9eccf4;
        }
        .bg_light{
        background: #f7fafa;
        } 
        body{
        font-family: 'Work Sans', sans-serif;
        font-weight: 400;
        font-size: 15px;
        line-height: 1.8;
        color: rgba(0,0,0,.4);
        }
        
        a{
        color: #17bebb;
        }
        
        /*LOGO*/
        
        .logo h1{
        margin: 0;
        }
        .logo h1 a{
        color: #17bebb;
        font-size: 24px;
        font-weight: 700;
        font-family: 'Work Sans', sans-serif;
        }
        
        /*HERO*/
        .hero{
        position: relative;
        z-index: 0;
        }
        
        .hero .text{
        color: rgb(0, 0, 0);
        }
        .hero .text h2{
        color: #000;
        font-size: 34px;
        margin-bottom: 15px;
        font-weight: 300;
        line-height: 1.2;
        }
        .hero .text h3{
        font-size: 24px;
        font-weight: 200;
        }
        .hero .text h2 span{
        font-weight: 600;
        color: #000;
        }
        
        
        /*detail*/
        .detail-entry{
        display: block;
        position: relative;
        float: left;
        padding-top: 20px;
        }
        .detail-entry .text{
        width: calc(100% - 125px);
        padding-left: 20px;
        }
        .detail-entry .text h3{
        margin-bottom: 0;
        padding-bottom: 0;
        }
        .detail-entry .text p{
        margin-top: 0;
        }
        .detail-entry img, .detail-entry .text{
        float: left;
        }
        
        ul.social{
        padding: 0;
        }
        ul.social li{
        display: inline-block;
        margin-right: 10px;
        }
        
        /*FOOTER*/
        
        .footer{
        border-top: 1px solid rgba(0,0,0,.05);
        color: rgba(0,0,0,.5);
        }
        .footer .heading{
        color: #000;
        font-size: 20px;
        }
        .footer ul{
        margin: 0;
        padding: 0;
        }
        .footer ul li{
        list-style: none;
        margin-bottom: 10px;
        }
        .footer ul li a{
        color: rgba(0,0,0,1);
        }
        
        @media screen and (max-width: 500px) {
        
        
        }
        </style>
        </head>
        
        <body width='100%' style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;'>
        <!-- <center style='width: 100%; background-color: #f1f1f1;'>
        <div style='display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;'>
        &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
        </div> -->
        <div style='max-width: 600px; margin: 0 auto;' class='email-container'>
        <!-- BEGIN BODY -->
        <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%' style='margin: auto;'>
        <tr>
        <td valign='top' class='bg-content' style='padding: 1em 2.5em 0 2.5em;'>
        <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
         <tr>
             <td class='logo' style='text-align: center;'>
             <h2>GKI Perumnas</h2>
             </td>
         </tr>
        </table>
        </td>
        </tr><!-- end tr -->
        <tr>
        <td valign='middle' class='hero bg_light' style='padding: 2em 0 2em 0;'>
        <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
        <tr>
            <td style='padding: 0 2.5em; text-align: left;'>
                <div class='text'>
                    <h3>Hallo " . $nama . ",</h3>
                    <h4>Peminjaman ruangan diterima. Jika ada hal yang ingin ditanyakan dapat menghubungi nomor telepon (021) 5520209. Terima kasih. Tuhan memberkati.</h4>
                </div>
            </td>
        </tr>
        </table>
        </td>
        </tr><!-- end tr -->
        <tr>
        <!-- 1 Column Text + Button : END -->
        </table>
        
        </div>
        </center>
        </body>
        </html>
        ";
            mail($to, $subject, $message, $headers);
            $this->session->set_flashdata('sukses', 'Konfirmasi berhasil dikirim');
            redirect('mengelola_ruangan/peminjaman');
        }

        if ($status == "DITOLAK") {
            $to = $email;
            $subject = "Peminjaman Ruangan";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: gerejagkiperumnass@gmail.com";
            $message = "
        <html>
        <head>
        <link href='https://fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700' rel='stylesheet'>
        <!-- CSS Reset : BEGIN -->
        <style>
        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
        margin: 0 auto !important;
        padding: 0 !important;
        height: 100% !important;
        width: 100% !important;
        background: #9eccf4;
        }
        /* What it does: Stops email clients resizing small text. */
        * {
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
        }
        
        /* What it does: Centers email on Android 4.4 */
        div[style*='margin: 16px 0'] {
        margin: 0 !important;
        }
        
        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
        mso-table-lspace: 0pt !important;
        mso-table-rspace: 0pt !important;
        }
        
        /* What it does: Fixes webkit padding issue. */
        table {
        border-spacing: 0 !important;
        border-collapse: collapse !important;
        table-layout: fixed !important;
        margin: 0 auto !important;
        }
        
        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
        -ms-interpolation-mode:bicubic;
        }
        
        /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
        a {
        text-decoration: none;
        }
        
        /* What it does: A work-around for email clients meddling in triggered links. */
        *[x-apple-data-detectors],  /* iOS */
        .unstyle-auto-detected-links *,
        .aBn {
        border-bottom: 0 !important;
        cursor: default !important;
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        }
        
        /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
        .a6S {
        display: none !important;
        opacity: 0.01 !important;
        }
        
        /* What it does: Prevents Gmail from changing the text color in conversation threads. */
        .im {
        color: inherit !important;
        }
        
        /* If the above doesn't work, add a .g-img class to any image in question. */
        img.g-img + div {
        display: none !important;
        }
        
        /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
        /* Create one of these media queries for each additional viewport size you'd like to fix */
        
        /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
        u ~ div .email-container {
        min-width: 320px !important;
        }
        }
        /* iPhone 6, 6S, 7, 8, and X */
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
        u ~ div .email-container {
        min-width: 375px !important;
        }
        }
        /* iPhone 6+, 7+, and 8+ */
        @media only screen and (min-device-width: 414px) {
        u ~ div .email-container {
        min-width: 414px !important;
        }
        }
        </style>
        
        <!-- CSS Reset : END -->
        
        <!-- Progressive Enhancements : BEGIN -->
        <style>
        
        .primary{
        background: #17bebb;
        }
        .bg-content {
        background: #9eccf4;
        }
        .bg_light{
        background: #f7fafa;
        } 
        body{
        font-family: 'Work Sans', sans-serif;
        font-weight: 400;
        font-size: 15px;
        line-height: 1.8;
        color: rgba(0,0,0,.4);
        }
        
        a{
        color: #17bebb;
        }
        
        /*LOGO*/
        
        .logo h1{
        margin: 0;
        }
        .logo h1 a{
        color: #17bebb;
        font-size: 24px;
        font-weight: 700;
        font-family: 'Work Sans', sans-serif;
        }
        
        /*HERO*/
        .hero{
        position: relative;
        z-index: 0;
        }
        
        .hero .text{
        color: rgb(0, 0, 0);
        }
        .hero .text h2{
        color: #000;
        font-size: 34px;
        margin-bottom: 15px;
        font-weight: 300;
        line-height: 1.2;
        }
        .hero .text h3{
        font-size: 24px;
        font-weight: 200;
        }
        .hero .text h2 span{
        font-weight: 600;
        color: #000;
        }
        
        
        /*detail*/
        .detail-entry{
        display: block;
        position: relative;
        float: left;
        padding-top: 20px;
        }
        .detail-entry .text{
        width: calc(100% - 125px);
        padding-left: 20px;
        }
        .detail-entry .text h3{
        margin-bottom: 0;
        padding-bottom: 0;
        }
        .detail-entry .text p{
        margin-top: 0;
        }
        .detail-entry img, .detail-entry .text{
        float: left;
        }
        
        ul.social{
        padding: 0;
        }
        ul.social li{
        display: inline-block;
        margin-right: 10px;
        }
        
        /*FOOTER*/
        
        .footer{
        border-top: 1px solid rgba(0,0,0,.05);
        color: rgba(0,0,0,.5);
        }
        .footer .heading{
        color: #000;
        font-size: 20px;
        }
        .footer ul{
        margin: 0;
        padding: 0;
        }
        .footer ul li{
        list-style: none;
        margin-bottom: 10px;
        }
        .footer ul li a{
        color: rgba(0,0,0,1);
        }
        
        @media screen and (max-width: 500px) {
        
        
        }
        </style>
        </head>
        
        <body width='100%' style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;'>
        <!-- <center style='width: 100%; background-color: #f1f1f1;'>
        <div style='display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;'>
        &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
        </div> -->
        <div style='max-width: 600px; margin: 0 auto;' class='email-container'>
        <!-- BEGIN BODY -->
        <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%' style='margin: auto;'>
        <tr>
        <td valign='top' class='bg-content' style='padding: 1em 2.5em 0 2.5em;'>
         <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
             <tr>
                 <td class='logo' style='text-align: center;'>
                 <h2>GKI Perumnas</h2>
                 </td>
             </tr>
         </table>
        </td>
        </tr><!-- end tr -->
        <tr>
        <td valign='middle' class='hero bg_light' style='padding: 2em 0 2em 0;'>
        <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
            <tr>
                <td style='padding: 0 2.5em; text-align: left;'>
                    <div class='text'>
                        <h3>Hallo " . $nama . ",</h3>
                        <h4>Mohon maaf peminjaman anda kami tolak. Mohon menghubungi nomor telepon (021) 5520209 untuk informasi lengkapnya. Terima kasih. Tuhan memberkati</h4>
                    </div>
                </td>
            </tr>
        </table>
        </td>
        </tr><!-- end tr -->
        <tr>
        <!-- 1 Column Text + Button : END -->
        </table>
        
        </div>
        </center>
        </body>
        </html>
        ";

            mail($to, $subject, $message, $headers);
            $this->session->set_flashdata('sukses', 'Konfirmasi berhasil dikirim');
            redirect('mengelola_ruangan/peminjaman');
        }

        if ($status == "SELESAI") {
            $this->session->set_flashdata('sukses', 'Berhasil ubah status');
            redirect('mengelola_ruangan/peminjaman');
        }
    }

    public function hapus_peminjaman($id_peminjaman)
    {
        $tanggal = date('Y-m-d H:i:s');
        $where = array('id_peminjaman' => $id_peminjaman);
        $data = array('deleted_at' => $tanggal);
        $this->M_Ruangan->update_record($where, $data, 'peminjaman_ruangan');
        $this->session->set_flashdata('sukses', 'Berhasil dihapus');
        redirect('mengelola_ruangan/peminjaman');
    }
}
