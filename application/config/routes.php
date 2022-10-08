<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//baca artikel
$route['artikel/(:num)'] = 'Artikel/baca_artikel/$1';

$route['booking/(:num)'] = 'Ruangan/booking_ruangan/$1';

//pengumpulan dokumen
$route['pengumpulan'] = 'Pengumpulan_Dokumen';

// login admin
$route['login'] = 'Login_Admin';
$route['login/verifikasi'] = 'Login_Admin/verifikasi';
$route['logout'] = 'Login_Admin/logout';

$route['forgot_password'] = 'Login_Admin/forgot_password';
$route['change_password/(:any)'] = 'Login_Admin/change_password/$1';
$route['proses_change_password'] = 'Login_Admin/proses_change_password';

//dashboard admin
$route['admin/dashboard'] = 'Admin';

//mengelola artikel
$route['mengelola_artikel'] = 'MengelolaArtikel';
$rotue['mengelola_artikel/tampil_artikel'] = 'MengelolaArtikel/tampil_artikel';
$route['mengelola_artikel/tambah'] = 'MengelolaArtikel/tambah_artikel';
$route['mengelola_artikel/tipe'] = 'MengelolaArtikel/tipe_artikel';
$route['mengelola_artikel/proses_tambah'] = 'MengelolaArtikel/proses_tambah_artikel';
$route['mengelola_artikel/edit/(:num)'] = 'MengelolaArtikel/edit_artikel/$1';
$route['mengelola_artikel/proses_edit'] = 'MengelolaArtikel/proses_edit_artikel';
$route['mengelola_artikel/hapus/(:num)'] = 'MengelolaArtikel/hapus_artikel/$1';

//mengelola ruangan
$route['mengelola_ruangan'] = 'MengelolaRuangan';
$route['mengelola_ruangan/tampil'] = 'MengelolaRuangan/tampil_ruangan';
$route['mengelola_ruangan/tambah'] = 'MengelolaRuangan/tambah_ruangan';
$route['mengelola_ruangan/edit/(:num)'] = 'MengelolaRuangan/edit_ruangan/$1';
$route['mengelola_ruangan/proses_edit'] = 'MengelolaRuangan/proses_edit_ruangan';
$route['mengelola_ruangan/peminjaman'] = 'MengelolaRuangan/lihat_peminjaman';
$route['mengelola_ruangan/tampil_peminjaman'] = 'MengelolaRuangan/tampil_peminjaman';
$route['mengelola_ruangan/update_status'] = 'MengelolaRuangan/update_status';
$route['mengelola_ruangan/hapus/(:num)'] = 'MengelolaRuangan/hapus_peminjaman/$1';

// dashboard admin
/*$route['dashboard'] = 'Dashboard';

// kelola admin
$route['admin'] = 'Admin';
$route['admin/tambah'] = 'Admin/tambah_admin';
$route['admin/proses_edit_status'] = 'Admin/proses_edit_status';
$route['admin/hapus/(:num)'] = 'Admin/hapus_admin/$1';

// anggota Jemaat
$route['anggota_jemaat'] = 'Anggota_Jemaat';
$route['anggota_jemaat/tambah'] = 'Anggota_Jemaat/tambah_anggota_jemaat';
$route['anggota_jemaat/detail/(:num)'] = 'Anggota_Jemaat/lihat_detail_anggota/$1';
$route['anggota_jemaat/edit/(:num)'] = 'Anggota_Jemaat/edit_anggota/$1';
$route['anggota_jemaat/proses_edit'] = 'Anggota_Jemaat/proses_edit';
$route['anggota_jemaat/hapus/(:num)'] = 'Anggota_Jemaat/hapus_anggota/$1';

// respon permintaan perubahan
$route['anggota_jemaat/ubah_data_jemaat/(:num)'] = 'Anggota_Jemaat/ubah_data_jemaat/$1';
$route['anggota_jemaat/proses_permintaan_perubahan'] = 'Anggota_Jemaat/proses_permintaan_perubahan'; */