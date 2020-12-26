<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penarikan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi/M_penarikan', 'model');
	}


	public function index()
	{
		$data = [
			'title'		=> 'Penarikan Simpanan Anggota',
			'transaksi'	=> $this->model->GetTransaksi(),
			'anggota'		=> $this->model->GetAnggotaAktif(),
		];
		$this->load->view('transaksi/penarikan/data_penarikan', $data);
	}
	public  function find_saldo()
	{
		$id = $this->input->post('id_anggota');

		$request = $this->model->find_saldo($id);

		echo json_encode($request);
	}

	public function store()
	{
		$request = $this->model->insert();
		$this->session->set_flashdata($request['label'], $request['msg']);
		redirect('transaksi/penarikan');
	}
}

/* End of file Penarikan.php */
