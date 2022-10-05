<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Permintaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model(array('M_Permintaan'));
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('v_permintaan_perubahan.php');
    }

    public function kirim()
    {
        $no_anggota = $this->input->post('noAnggota');
        $nohp = $this->input->post('nohp');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $pekerjaan = $this->input->post('pekerjaan');
        $pendidikan = $this->input->post('pendidikan');

        $this->form_validation->set_rules('noAnggota', 'No. Anggota', 'trim|required');
        if ($this->input->post('pilihNoHP') == "pilih") {
            $this->form_validation->set_rules('nohp', 'Nomor Handphone', 'trim|required|min_length[9]|max_length[15]');
        }
        if ($this->input->post('pilihEmail') == "pilih") {
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
        }
        if ($this->input->post('pilihAlamat') == "pilih") {
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        }
        if ($this->input->post('pilihPekerjaan') == "pilih") {
            $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
        }
        if ($this->input->post('pilihPendidikan') == "pilih") {
            $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');
        }

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('min_length', '{field} minimal {param} angka');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} angka');

        if ($this->form_validation->run() == FALSE) {
            $respon = array(
                'sukses' => false,
                'error_no_anggota' => form_error('noAnggota'),
                'error_nohp' => form_error('nohp'),
                'error_email' => form_error('email'),
                'error_alamat' => form_error('alamat'),
                'error_pekerjaan' => form_error('pekerjaan'),
                'error_pendidikan' => form_error('pendidikan')
            );
            echo json_encode($respon);
        } else {
            $cek_id_anggota = $this->db->query("SELECT id_anggota, no_anggota FROM anggota_jemaat WHERE no_anggota = '$no_anggota'")->num_rows();
            if ($cek_id_anggota == 0) {
                $respon = array(
                    'sukses' => false,
                    'error_no_anggota' => 'No. Anggota tidak ditemukan'
                );
                echo json_encode($respon);
            } else {
                $this->load->library('encryption');

                if ($nohp == NULL) {
                    $nohp = NULL;
                } else {
                    $nohp = $this->encryption->encrypt($nohp);
                }
                if ($email == NULL) {
                    $email = NULL;
                } else {
                    $email = $this->encryption->encrypt($email);
                }
                if ($alamat == NULL) {
                    $alamat = NULL;
                } else {
                    $alamat = $this->encryption->encrypt($alamat);
                }
                if ($pekerjaan == NULL) {
                    $pekerjaan = NULL;
                } else {
                    $pekerjaan = $this->encryption->encrypt($pekerjaan);
                }
                if ($pendidikan == NULL) {
                    $pendidikan = NULL;
                } else {
                    $pendidikan = $this->encryption->encrypt($pendidikan);
                }

                $tanggal = date('Y-m-d H:i:s');

                $ambil_id_anggota = $this->db->query("SELECT id_anggota, nama_lengkap_anggota, email_anggota FROM anggota_jemaat WHERE no_anggota = '$no_anggota'")->row_array();

                $data = array(
                    'id_anggota' => $ambil_id_anggota['id_anggota'], 'nohp_baru' => $nohp, 'email_baru' => $email,
                    'alamat_baru' => $alamat, 'pekerjaan_baru' => $pekerjaan, 'pendidikan_baru' => $pendidikan, 'tanggal_permintaan' => $tanggal, 'is_notif' => 0, 'is_updated' => 0
                );
                $this->M_Permintaan->insert_record($data, 'permintaan_perubahan_data_jemaat');
                //masih coba
                if($email == NULL) {
                    $to = $ambil_id_anggota['email_enggota'];
                }
                if($email != NULL) {
                    $to = $this->input->post('email');
                }
                $subject = "Berhasil kirim";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: officehourcompany@gmail.com";
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
                     <!--  <img src='base_url('resources/assets/img/logo-GKI-tr.png')' alt='logoGKI'> -->
                        <img src='' alt='logoGKI'>
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
                            <h3>Hallo " . $ambil_id_anggota['nama_lengkap_anggota'] . ",</h3>
                            <h4>Telah berhasil dikirim data yang ingin diperbaharui. Berikut ini data yang ingin diperbaharui:</h4>
                        </div>
                    </td>
                </tr>
            </table>
            </td>
         </tr><!-- end tr -->
         <tr>
         <table class='bg_light' role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
                 <tr style='border-bottom: 1px solid rgba(0,0,0,.05);'>
                     <td valign='middle' width='80%'' style='text-align:left; padding: 0 2.5em;'>
                         <div class='detail-entry'>";
                if ($nohp != NULL) {
                    $message .= "
                           <div class='text'>
                               <h3>No. Handphone</h3>
                               <p>" . $this->input->post('nohp') . "</p>
                           </div>";
                }
                if ($email != NULL) {
                    $message .= "
                           <div class='text'>
                               <h3>Email</h3>
                               <p>" . $this->input->post('email') . "</p>
                           </div>";
                }
                if ($alamat != NULL) {
                    $message .= "
                           <div class='text'>
                               <h3>Alamat</h3>
                               <p>" . $this->input->post('alamat') . "</p>
                           </div>";
                }
                if ($pekerjaan != NULL) {
                    $message .= "
                           <div class='text'>
                               <h3>Pekerjaan</h3>
                               <p>" . $this->input->post('pekerjaan') . "</p>
                           </div>";
                }
                $message .= " 
                         </div>
                     </td>
                 </tr>
         </table>
     </tr><!-- end tr -->
     <!-- 1 Column Text + Button : END -->
     </table>
     <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%' style='margin: auto;'>
         <tr>
         <td valign='middle' class='bg-content footer email-section'>
           <table>
               <tr>
               <td valign='top' width='33.333%' style='padding-top: 20px;'>
                 <table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
                   <tr>
                     <td style='text-align: left; padding-left: 5px; padding-right: 5px;'>
                         <h3 class='heading' style='text-align: center;'>Kontak Info</h3>
                         <ul>
                             <li><span class='text'>203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                           <li><span class='text'>+2 392 3929 210</span></a></li>
                       </ul>
                     </td>
                   </tr>
                 </table>
               </td>
             </tr>
           </table>
         </td>
       </tr><!-- end: tr -->
       <tr>
         <td class='bg_light' style='text-align: center;'>
             <p>No longer want to receive these email? You can <a href='#' style='color: rgba(0,0,0,.8);'>Unsubscribe here</a></p>
         </td>
       </tr>
     </table>

   </div>
 </center>
</body>
</html>
";

                mail($to, $subject, $message, $headers);
                $respon['sukses'] = "Berhasil Dikirim";
                echo json_encode($respon);
            }
        }
    }
}
