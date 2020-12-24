<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_anggota extends CI_Model
{
	public function all()
	{
		return $this->db->get_where('anggota', ['status' => 1])->result_array();
	}
	public function id_anggota()
	{
		$this->db->select('RIGHT(anggota.id_anggota,6) as id_anggota', FALSE);
		$this->db->order_by('id_anggota', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('anggota');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->id_anggota) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}

		$batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
		$kodetampil = "AGT-" . $batas;  //format kode
		return $kodetampil;
	}
	public function insert()
	{
		$id_anggota = $this->id_anggota();
		$nama_anggota = $this->input->post('nama_anggota');
		$alamat_anggota = $this->input->post('alamat_anggota');
		$no_hp = $this->input->post('no_hp');
		$email_post = $this->input->post('email');
		if ($email_post === null) {
			$email = null;
		} else {
			$email = $email_post;
		}

		$data = [
			'id_anggota'		=> $id_anggota,
			'nama_anggota'		=> $nama_anggota,
			'alamat_anggota'	=> $alamat_anggota,
			'no_hp'			=> $no_hp,
			'email'			=> $email
		];

		if ($this->db->insert('anggota', $data)) {
			$response = [
				'status' 	=> 'OK',
				'label'	=> 'success',
				'msg'	=> 'Data Anggota Berhasil Ditambahkan !'
			];
		} else {
			$response = [
				'status' 	=> 'BAD REQUEST',
				'label'	=> 'error',
				'msg'	=> 'Data Anggota Gagal Ditambahkan !'
			];
		}
		return $response;
	}
	public function update()
	{
		$id_anggota = $this->input->post('id_anggota');
		$nama_anggota = $this->input->post('nama_anggota');
		$alamat_anggota = $this->input->post('alamat_anggota');
		$no_hp = $this->input->post('no_hp');
		$email_post = $this->input->post('email');
		if ($email_post === null) {
			$email = null;
		} else {
			$email = $email_post;
		}

		$data = [
			'nama_anggota'		=> $nama_anggota,
			'alamat_anggota'	=> $alamat_anggota,
			'no_hp'			=> $no_hp,
			'email'			=> $email
		];

		if ($this->db->update('anggota', $data, ['id_anggota' => $id_anggota])) {
			$response = [
				'status' 	=> 'OK',
				'label'	=> 'success',
				'msg'	=> 'Data Anggota Berhasil Diedit !'
			];
		} else {
			$response = [
				'status' 	=> 'BAD REQUEST',
				'label'	=> 'error',
				'msg'	=> 'Data Anggota Gagal Diedit !'
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

		if ($this->db->update('anggota', $data, ['id_anggota' => $id])) {
			$response = [
				'status' 	=> 'OK',
				'label'	=> 'success',
				'msg'	=> 'Data Anggota Berhasil Dihapus !'
			];
		} else {
			$response = [
				'status' 	=> 'BAD REQUEST',
				'label'	=> 'error',
				'msg'	=> 'Data Anggota Gagal Dihapus !'
			];
		}
		return $response;
	}
}

/* End of file M_anggota.php */
