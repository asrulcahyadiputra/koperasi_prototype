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
| DATA MASTER
| -------------------------------------------------------------------------
*/
$route['master/anggota']								= 'master/Anggota';
$route['master/anggota/simpan']						= 'master/Anggota/store';
$route['master/anggota/edit']							= 'master/Anggota/update';
$route['master/anggota/hapus/(:any)']					= 'master/Anggota/destroy/$1';
