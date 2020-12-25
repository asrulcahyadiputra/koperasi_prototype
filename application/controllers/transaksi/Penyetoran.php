<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penyetoran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi/M_penyetoran', 'model');
	}


	public function index()
	{
		$data = [
			'title'		=> 'Penyetoran Simpanan',
			'anggota'		=> $this->model->GetAnggotaAktif(),
			'transaksi'	=> $this->model->GetTransaksi()
		];
		$this->load->view('transaksi/penyetoran/data_penyetoran', $data);
	}
	public function store()
	{
		$request = $this->model->insert();
		$this->session->set_flashdata($request['label'], $request['msg']);
		redirect('transaksi/penyetoran');
	}
	public function update()
	{
		$request = $this->model->update();
		$this->session->set_flashdata($request['label'], $request['msg']);
		redirect('transaksi/penyetoran');
	}
}

/* End of file Penyetoran.php */
