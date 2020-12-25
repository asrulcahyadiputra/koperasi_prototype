<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
	public function get_user()
	{
		return $this->db->get_where('users', ['status' => 1])->result_array();
	}

	public function get_pegawai()
	{
		return $this->db->get_where('pegawai', ['status' => 1])->result_array();
	}
	public function find_pegawai($id_pegawai)
	{
		return $this->db->get_where('pegawai', ['status' => 1, 'id_pegawai' => $id_pegawai])->row_array();
	}
	private function find_user($id_pegawai)
	{
		return $this->db->get_where('users', ['status' => 1, 'id_pegawai' => $id_pegawai])->row_array();
	}
	private function id_user()
	{
		$this->db->select('RIGHT(users.id_user,6) as id_user', FALSE);
		$this->db->order_by('id_user', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('users');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->id_user) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}

		$batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
		$kodetampil = "USR-" . $batas;  //format kode
		return $kodetampil;
	}
	public function insert()
	{
		$id_pegawai 	= $this->input->post('id_pegawai');
		$id_user 		= $this->id_user();
		$pegawai 		= $this->find_pegawai($id_pegawai);
		$validate 	= $this->find_user($id_pegawai);

		if ($pegawai) {
			if ($pegawai['email'] != '') {
				if ($validate) {
					$response = [
						'status' 	=> 'DUPLICATE ENTRY',
						'label'	=> 'error',
						'msg'	=> 'User Telah terdaftar sebelumnya !'
					];
				} else {
					$data = [
						'id_user'		=> $id_user,
						'id_pegawai'	=> $id_pegawai,
						'username'	=> $pegawai['email'],
						'password'	=> password_hash('123456', PASSWORD_DEFAULT)
					];
					if ($this->db->insert('users', $data)) {
						$response = [
							'status' 	=> 'OK',
							'label'	=> 'success',
							'msg'	=> 'User Berhasil ditambahkan !'
						];
					} else {
						$response = [
							'status' 	=> 'BAD REQUEST',
							'label'	=> 'error',
							'msg'	=> 'User GAGAL  ditambahkan !'
						];
					}
				}
			} else {
				$response = [
					'status' 	=> 'WARNING',
					'label'	=> 'warning',
					'msg'	=> 'Email pegawai tidak ditemukan, pastikan pegawai telah memiliki email !'
				];
			}
		} else {
			$response = [
				'status' 	=> 'WARNING',
				'label'	=> 'warning',
				'msg'	=> 'Data pegawai Tidak ditemukan, pastikan data pegawai telah ditambahkan !'
			];
		}

		return $response;
	}
}

/* End of file M_user.php */
