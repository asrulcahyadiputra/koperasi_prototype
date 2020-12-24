<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Pegawai extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/M_pegawai', 'model');
	}


	public function index()
	{
		$data = [
			'title'		=> 'Data Pegawai',
			'pegawai'		=> $this->model->all()
		];
		$this->load->view('master/pegawai/data_pegawai', $data);
	}
	public function store()
	{
		$request = $this->model->insert();
		$this->session->set_flashdata($request['label'], $request['msg']);
		redirect('master/pegawai');
	}
	public function update()
	{
		$request = $this->model->update();
		$this->session->set_flashdata($request['label'], $request['msg']);
		redirect('master/pegawai');
	}
	public function destroy($id)
	{
		$request = $this->model->delete($id);
		$this->session->set_flashdata($request['label'], $request['msg']);
		redirect('master/pegawai');
	}
}

/* End of file Pegawai.php */
