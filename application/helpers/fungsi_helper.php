<?php
function tanggal_indonesia($tanggal_lengkap)
{
    $tanggal = date_format(date_create($tanggal_lengkap), "d/n/Y");
    $nama_bulan = array(
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    );
    $pisah = explode("/", $tanggal);

    $tanggal_baru = $pisah[0] . " " . $nama_bulan[$pisah[1]] . " " . $pisah[2];
    return $tanggal_baru; //echo $tanggal_baru;
}

function waktu($waktu) {
    $waktu_baru = date_format(date_create($waktu), "H:i");
    return $waktu_baru;
}

function dekripsi_notifikasi($data) {
//$ci =& get_instance();

$ci =& get_instance();

    $ci->load->library('encryption');
    if($data == NULL) {
        return "-";
    } else {
        return $ci->encryption->decrypt($data);
    }
}

function mata_uang_indo($nominal) {
    return "Rp. " . number_format($nominal, '2', ',', '.') ;
}

/*function login_status($status)
{
$ci = get_instance(); //kaykanya
    if ($status != "login") {
        redirect('Login_Admin');
    }
}*/