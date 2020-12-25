<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/M_akun', 'model');
	}

	public function index()
	{
		$data = [
			'title'		=> 'Data Akun',
			'akun'		=> $this->model->GetAkun(),
			'subAkun'		=> $this->model->GetSubAkun()
		];
		$this->load->view('master/akun/data_akun', $data);
	}
	public function store()
	{
		$request = $this->model->insert();
		$this->session->set_flashdata($request['label'], $request['msg']);
		redirect('master/akun');
	}
}

/* End of file Akun.php */
