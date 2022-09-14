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

// login admin
$route['login'] = 'login_admin';
$route['login/verifikasi'] = 'login_admin/verifikasi';
$route['logout'] = 'login_admin/logout';

// dashboard admin
/*$route['dashboard'] = 'dashboard';

// kelola admin
$route['admin'] = 'admin';
$route['admin/tambah'] = 'admin/tambah_admin';
$route['admin/proses_edit_status'] = 'admin/proses_edit_status';
$route['admin/hapus/(:num)'] = 'admin/hapus_admin/$1';

// anggota Jemaat
$route['anggota_jemaat'] = 'anggota_jemaat';
$route['anggota_jemaat/tambah'] = 'anggota_jemaat/tambah_anggota_jemaat';
$route['anggota_jemaat/detail/(:num)'] = 'anggota_jemaat/lihat_detail_anggota/$1';
$route['anggota_jemaat/edit/(:num)'] = 'anggota_jemaat/edit_anggota/$1';
$route['anggota_jemaat/proses_edit'] = 'anggota_jemaat/proses_edit';
$route['anggota_jemaat/hapus/(:num)'] = 'anggota_jemaat/hapus_anggota/$1';

// respon permintaan perubahan
$route['anggota_jemaat/ubah_data_jemaat/(:num)'] = 'anggota_jemaat/ubah_data_jemaat/$1';
$route['anggota_jemaat/proses_permintaan_perubahan'] = 'anggota_jemaat/proses_permintaan_perubahan'; */