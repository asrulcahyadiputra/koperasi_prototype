<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_akun extends CI_Model
{
	public function GetAkun()
	{
		$this->db->select('a.kode_akun,a.nama_akun,a.saldo_normal,a.kode_sub_akun,b.nama_sub_akun')
			->from('akun as a')
			->join('sub_akun as b', 'a.kode_sub_akun=b.kode_sub_akun');
		return $this->db->get()->result_array();
	}
	public function GetSubAkun()
	{
		return $this->db->get('sub_akun')->result_array();
	}

	public function kode_akun($kode_sub_akun)
	{
		$this->db->select('RIGHT(akun.kode_akun,4) as kode_akun', FALSE);
		$this->db->where('kode_sub_akun', $kode_sub_akun);
		$this->db->order_by('kode_akun', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('akun');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->kode_akun) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}

		$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodetampil = $kode_sub_akun . $batas;  //format kode
		return $kodetampil;
	}
	public function insert()
	{
		$kode_sub_akun = $this->input->post('kode_sub_akun');
		$kode_akun = $this->kode_akun($kode_sub_akun);
		$nama_akun = $this->input->post('nama_akun');
		$saldo_normal = $this->input->post('saldo_normal');
		$data = [
			'kode_akun'		=> $kode_akun,
			'nama_akun'		=> $nama_akun,
			'saldo_normal'		=> $saldo_normal,
			'kode_sub_akun'	=> $kode_sub_akun
		];

		if ($this->db->insert('akun', $data)) {
			$response = [
				'sataus'	=> 'OK',
				'label'	=> 'success',
				'msg'	=> 'Akun Berhasil Ditambahkan !'
			];
		} else {
			$response = [
				'status'	=> 'BAD REQUEST',
				'label'	=> 'error',
				'msg'	=> 'Akun Gagal Ditambahkan !'
			];
		}
		return $response;
	}
	public function update()
	{
		$kode_sub_akun = $this->input->post('kode_sub_akun');
		$kode_akun = $this->input->post('kode_akun');
		$nama_akun = $this->input->post('nama_akun');
		$saldo_normal = $this->input->post('saldo_normal');
		$data = [
			'nama_akun'		=> $nama_akun,
			'saldo_normal'		=> $saldo_normal,
			'kode_sub_akun'	=> $kode_sub_akun
		];

		if ($this->db->update('akun', $data, ['kode_akun' => $kode_akun])) {
			$response = [
				'sataus'	=> 'OK',
				'label'	=> 'success',
				'msg'	=> 'Akun Berhasil Diedit !'
			];
		} else {
			$response = [
				'status'	=> 'BAD REQUEST',
				'label'	=> 'error',
				'msg'	=> 'Akun Gagal Diedit !'
			];
		}
		return $response;
	}
}

/* End of file M_akun.php */
