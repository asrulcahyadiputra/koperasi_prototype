<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pegawai extends CI_Model
{
	public function all()
	{
		return $this->db->get_where('pegawai', ['status' => 1])->result_array();
	}
	public function id_pegawai()
	{
		$this->db->select('RIGHT(pegawai.id_pegawai,6) as id_pegawai', FALSE);
		$this->db->order_by('id_pegawai', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('pegawai');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->id_pegawai) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}

		$batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
		$kodetampil = "PGW-" . $batas;  //format kode
		return $kodetampil;
	}
	public function insert()
	{
		$id_pegawai = $this->id_pegawai();
		$nama_pegawai = $this->input->post('nama_pegawai');
		$jabatan = $this->input->post('jabatan');
		$alamat_pegawai = $this->input->post('alamat_pegawai');
		$no_hp = $this->input->post('no_hp');
		$email_post = $this->input->post('email');
		if ($email_post === null) {
			$email = null;
		} else {
			$email = $email_post;
		}

		$data = [
			'id_pegawai'		=> $id_pegawai,
			'nama_pegawai'		=> $nama_pegawai,
			'jabatan'			=> $jabatan,
			'alamat_pegawai'	=> $alamat_pegawai,
			'no_hp'			=> $no_hp,
			'email'			=> $email
		];

		if ($this->db->insert('pegawai', $data)) {
			$response = [
				'status' 	=> 'OK',
				'label'	=> 'success',
				'msg'	=> 'Data Pegawai Berhasil Ditambahkan !'
			];
		} else {
			$response = [
				'status' 	=> 'BAD REQUEST',
				'label'	=> 'error',
				'msg'	=> 'Data Pegawai Gagal Ditambahkan !'
			];
		}
		return $response;
	}
	public function update()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$nama_pegawai = $this->input->post('nama_pegawai');
		$jabatan = $this->input->post('jabatan');
		$alamat_pegawai = $this->input->post('alamat_pegawai');
		$no_hp = $this->input->post('no_hp');
		$email_post = $this->input->post('email');
		if ($email_post === null) {
			$email = null;
		} else {
			$email = $email_post;
		}

		$data = [
			'nama_pegawai'		=> $nama_pegawai,
			'jabatan'			=> $jabatan,
			'alamat_pegawai'	=> $alamat_pegawai,
			'no_hp'			=> $no_hp,
			'email'			=> $email
		];

		if ($this->db->update('pegawai', $data, ['id_pegawai' => $id_pegawai])) {
			$response = [
				'status' 	=> 'OK',
				'label'	=> 'success',
				'msg'	=> 'Data Pegawai Berhasil Diedit !'
			];
		} else {
			$response = [
				'status' 	=> 'BAD REQUEST',
				'label'	=> 'error',
				'msg'	=> 'Data Pegawai Gagal Diedit !'
			];
		}
		return $response;
	}
	public function delete($id)
	{
		$status = 0;
		$date_deleted = date('Y-m-d H:i:s');
		$data = [
			'status'			=> $status,
			'date_deleted'		=> $date_deleted
		];

		if ($this->db->update('pegawai', $data, ['id_pegawai' => $id])) {
			$response = [
				'status' 	=> 'OK',
				'label'	=> 'success',
				'msg'	=> 'Data pegawai Berhasil Dihapus !'
			];
		} else {
			$response = [
				'status' 	=> 'BAD REQUEST',
				'label'	=> 'error',
				'msg'	=> 'Data pegawai Gagal Dihapus !'
			];
		}
		return $response;
	}
}

/* End of file M_pegawai.php */
