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

/*
| -------------------------------------------------------------------------
| DATA MASTER CHART OF ACCOUNT
| -------------------------------------------------------------------------
*/
$route['master/akun']								= 'master/Akun';
$route['master/akun/simpan']							= 'master/Akun/store';
$route['master/akun/edit']							= 'master/Akun/update';

/*
| -------------------------------------------------------------------------
| TRANSAKSI PENYETORAN
| -------------------------------------------------------------------------
*/
$route['transaksi/penyetoran']						= 'transaksi/Penyetoran';
$route['transaksi/penyetoran/simpan']					= 'transaksi/Penyetoran/store';
$route['transaksi/penyetoran/edit']					= 'transaksi/Penyetoran/update';

/*
| -------------------------------------------------------------------------
| TRANSAKSI PENARIKAN
| -------------------------------------------------------------------------
*/
$route['transaksi/penarikan']							= 'transaksi/Penarikan';
$route['transaksi/penarikan/find_saldo']				= 'transaksi/penarikan/find_saldo';
$route['transaksi/penarikan/simpan']					= 'transaksi/Penarikan/store';

/*
| -------------------------------------------------------------------------
| TRANSAKSI PENGAJUAN PINJAMAN
| -------------------------------------------------------------------------
*/
$route['transaksi/pengajuan']							= 'transaksi/Pengajuan';
$route['transaksi/pengajuan/buat']						= 'transaksi/Pengajuan/create';
$route['transaksi/pengajuan/simpan']					= 'transaksi/Pengajuan/store';
$route['transaksi/pengajuan/detail/(:any)']				= 'transaksi/Pengajuan/show/$1';


/*
| -------------------------------------------------------------------------
| LAPORAN JURNAL UMUM
| -------------------------------------------------------------------------
*/
$route['laporan/jurnal_umum']							= 'laporan/Jurnal_umum';
