<?php
function tanggal_indonesia($tanggal_lengkap)
{
    $tanggal = date_format(date_create($tanggal_lengkap), "d/n/Y");
    $nama_bulan = array(
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    );
    $pisah = explode("/", $tanggal);

    $tanggal_baru = $pisah[0] . ' ' . $nama_bulan[$pisah[1]] . ' ' . $pisah[2];
    return $tanggal_baru; //echo $tanggal_baru;
}

/*function login_status()
{
$ci = get_istance(); //kaykanya
    if ($status != "login") {
        redirect('Login_Admin');
    }
}*/