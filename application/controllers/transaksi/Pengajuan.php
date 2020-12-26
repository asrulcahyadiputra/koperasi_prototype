<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}


	public function index()
	{
		$data = [
			'title'		=> 'Pengajuan Pinjaman'
		];
	}
}

/* End of file Pengajuan.php */
