<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/M_user', 'model');
	}

	public function index()
	{
		$data = [
			'title'		=> 'Data user',
			'user'		=> $this->model->get_user(),
			'pegawai'		=> $this->model->get_pegawai()
		];
		$this->load->view('master/user/data_user', $data);
	}
	public function store()
	{
		$request = $this->model->insert();
		$this->session->set_flashdata($request['label'], $request['msg']);
		redirect('master/user');
	}
	public function update($id_user, $status)
	{
		$request = $this->model->update($id_user, $status);
		$this->session->set_flashdata($request['label'], $request['msg']);
		redirect('master/user');
	}
	public function destroy($id)
	{
		$request = $this->model->delete($id);
		$this->session->set_flashdata($request['label'], $request['msg']);
		redirect('master/user');
	}
}

/* End of file User.php */
