<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal_umum extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('laporan/M_jurnal_umum', 'model');
	}

	public function index()
	{
		$periode = $this->input->get('periode');
		if ($periode === null) {
			$m = date('m');
			$y = date('Y');
		} else {
			$m = date('m', strtotime($periode));
			$y = date('Y', strtotime($periode));
		}
		$data = [
			'title'			=> 'Jurnal Umum',
			'row_jurnal'		=> $this->model->get_row_jurnal($y, $m),
			'jurnal'			=> $this->model->get_jurnal($y, $m),
			'month'			=> $m,
			'year'			=> $y
		];
		$this->load->view('laporan/jurnal_umum', $data);
	}
}

/* End of file Jurnal_umum.php */
