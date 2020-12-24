<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/M_anggota', 'model');
	}


	public function index()
	{
		$data = [
			'title'	=> 'Data Anggota'
		];
		$this->load->view('master/anggota/data_anggota', $data);
	}
	public function store()
	{
		$request = $this->model->insert();
		$this->session->set_flashdata($request['label'], $request['msg']);
		redirect('master/anggota');
	}
}

/* End of file Anggota.php */
