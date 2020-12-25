<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/
$route['default_controller'] = 'Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| MAIN ROUTING
| -------------------------------------------------------------------------
*/
$route['dashboard']									= 'Dashboard';

/*
| -------------------------------------------------------------------------
| DATA MASTER ANGGOTA
| -------------------------------------------------------------------------
*/
$route['master/anggota']								= 'master/Anggota';
$route['master/anggota/simpan']						= 'master/Anggota/store';
$route['master/anggota/edit']							= 'master/Anggota/update';
$route['master/anggota/hapus/(:any)']					= 'master/Anggota/destroy/$1';

/*
| -------------------------------------------------------------------------
| DATA MASTER PEGAWAI
| -------------------------------------------------------------------------
*/
$route['master/pegawai']								= 'master/pegawai';
$route['master/pegawai/simpan']						= 'master/pegawai/store';
$route['master/pegawai/edit']							= 'master/pegawai/update';
$route['master/pegawai/hapus/(:any)']					= 'master/pegawai/destroy/$1';

/*
| -------------------------------------------------------------------------
| DATA MASTER USER
| -------------------------------------------------------------------------
*/
$route['master/user']								= 'master/User';
$route['master/user/simpan']							= 'master/User/store';
$route['master/user/status/(:any)/(:any)']				= 'master/User/update/$1/$2';
$route['master/user/hapus/(:any)']						= 'master/User/destroy/$1';
