<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
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
			'title'		=> 'Data Anggota',
			'anggota'		=> $this->model->all()
		];
		$this->load->view('master/anggota/data_anggota', $data);
	}
	public function store()
	{
		$request = $this->model->insert();
		$this->session->set_flashdata($request['label'], $request['msg']);
		redirect('master/anggota');
	}
	public function update()
	{
		$request = $this->model->update();
		$this->session->set_flashdata($request['label'], $request['msg']);
		redirect('master/anggota');
	}
	public function destroy($id)
	{
		$request = $this->model->delete($id);
		$this->session->set_flashdata($request['label'], $request['msg']);
		redirect('master/anggota');
	}
}

/* End of file Anggota.php */
