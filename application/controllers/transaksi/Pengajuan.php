<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi/M_pengajuan', 'model');
	}


	public function index()
	{
		$data = [
			'title'		=> 'Pengajuan Pinjaman',
			'transaksi'	=> $this->model->GetTransaksi()
		];
		$this->load->view('transaksi/pengajuan/data_pengajuan', $data);
	}
	public function create()
	{
		$data = [
			'title'		=> 'Buat Pengajuan Baru',
			'anggota'		=> $this->model->GetAnggotaAktif(),
		];
		$this->load->view('transaksi/pengajuan/create_pengajuan', $data);
	}
	public function store()
	{
		$request = $this->model->insert();
		$this->session->set_flashdata($request['label'], $request['msg']);
		redirect('transaksi/pengajuan');
	}
	public function show($id)
	{
		$data = [
			'title'		=> 'Detail Pengajuan',
			'pinjaman'	=> $this->model->SelectPinjaman($id),
			'transaksi'	=> $this->model->SelectTransaksi($id)

		];
		$this->load->view('transaksi/pengajuan/detail_pengajuan', $data);
	}
}

/* End of file Pengajuan.php */
