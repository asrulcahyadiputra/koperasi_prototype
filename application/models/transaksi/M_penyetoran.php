<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_penyetoran extends CI_Model
{
	public function GetAnggotaAktif()
	{
		return $this->db->get_where('anggota', ['status' => 1])->result_array();
	}

	public function GetTransaksi()
	{
		$this->db->select('a.id_transaksi,a.tanggal,a.id_anggota,a.total,b.nama_anggota')
			->from('transaksi as a')
			->join('anggota as b', 'a.id_anggota=b.id_anggota')
			->where('trans_type', 'penyetoran_anggota');
		return $this->db->get()->result_array();
	}

	private function id_transaksi()
	{
		$this->db->select('RIGHT(id_transaksi,9) as id_transaksi', FALSE);
		$this->db->where('trans_type', 'penyetoran_anggota');
		$this->db->order_by('id_transaksi', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('transaksi');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$id = intval($data->id_transaksi) + 1;
		} else {
			$id = 1;
		}
		$code = str_pad($id, 9, "0", STR_PAD_LEFT);
		$id_transaksi = "TRX-STR-" . $code;
		return $id_transaksi;
	}
	public function insert()
	{
		$id_transaksi 		= $this->id_transaksi();
		$id_anggota 		= $this->input->post('id_anggota');
		$total			= intval(preg_replace("/[^0-9]/", "", $this->input->post('total')));

		if ($total > 0) {
			$data = [
				'id_transaksi'			=> $id_transaksi,
				'id_anggota'			=> $id_anggota,
				'total'				=> $total,
				'trans_type'			=> 'penyetoran_anggota'
			];
			$gl = [
				[
					'kode_akun'		=> '110001',
					'id_transaksi'		=> $id_transaksi,
					'nominal'			=> $total,
					'posisi'			=> 'd'
				],
				[
					'kode_akun'		=> '310001',
					'id_transaksi'		=> $id_transaksi,
					'nominal'			=> $total,
					'posisi'			=> 'k'
				]
			];
			$this->db->trans_start();
			$this->db->insert('transaksi', $data);
			$this->db->insert_batch('jurnal_umum', $gl);
			$this->db->trans_complete();

			$response = [
				'status'			=> 'OK',
				'label'			=> 'success',
				'msg'			=> 'Penyetoran Simpanan Berhasil Ditambahkan !'
			];
		} else {
			$response = [
				'status'			=> 'BAD REQUEST',
				'label'			=> 'error',
				'msg'			=> 'Penyetoran Simpanan Gagal Ditambahkan !'
			];
		}
		return $response;
	}
}

/* End of file M_penyetoran.php */
