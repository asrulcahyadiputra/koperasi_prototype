<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pengajuan extends CI_Model
{
	public function GetAnggotaAktif()
	{
		return $this->db->get_where('anggota', ['status' => 1])->result_array();
	}
	public function GetTransaksi()
	{
		$this->db->select('a.id_transaksi,a.tanggal,a.id_anggota,a.total,a.status,b.nama_anggota')
			->from('transaksi as a')
			->join('anggota as b', 'a.id_anggota=b.id_anggota')
			->where('trans_type', 'pinjaman');
		return $this->db->get()->result_array();
	}
	public function SelectTransaksi($id)
	{
		$this->db->select('a.id_transaksi,a.tanggal,a.id_anggota,a.total,a.status,b.nama_anggota,a.lama_angsuran,a.bunga_pinjaman')
			->from('transaksi as a')
			->join('anggota as b', 'a.id_anggota=b.id_anggota')
			->where('trans_type', 'pinjaman')
			->where('id_transaksi', $id);
		return $this->db->get()->row_array();
	}
	public function SelectPinjaman($id)
	{
		return $this->db->get_where('detail_pinjaman', ['id_transaksi' => $id])->result_array();
	}
	private function id_transaksi()
	{
		$this->db->select('RIGHT(id_transaksi,9) as id_transaksi', FALSE);
		$this->db->where('trans_type', 'pinjaman');
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
		$id_transaksi = "TRX-PNJ-" . $code;
		return $id_transaksi;
	}
	public function insert()
	{
		$id_transaksi 		= $this->id_transaksi();
		$id_anggota 		= $this->input->post('id_anggota');
		$limit_pinjaman	= intval(preg_replace("/[^0-9]/", "", $this->input->post('limit_pinjaman')));
		$total_pinjaman	= $this->input->post('total_pinjaman');
		$angsuran			= $this->input->post('angsuran');
		$bungan_tahun		= 24 / 100;
		$total 			= ($total_pinjaman / 100) * $limit_pinjaman;
		$angsuran_pokok 	= $total / $angsuran;
		$data = [
			'id_anggota'			=> $id_anggota,
			'id_transaksi'			=> $id_transaksi,
			'lama_angsuran'		=> $angsuran,
			'bunga_pinjaman'		=> 0.02,
			'total'				=> $total,
			'status'				=> 0,
			'trans_type'			=> 'pinjaman'
		];
		for ($i = 1; $i <= $angsuran; $i++) {
			$detail[] = [
				'id_transaksi'		=> $id_transaksi,
				'bulan_ke'		=> $i,
				'angsuran_pokok'	=> $angsuran_pokok,
				'angsuran_bunga'	=> ($total - (($i - 1) * $angsuran_pokok)) * ($bungan_tahun / 12),
				'angsuran'		=> $angsuran_pokok  + ($total - (($i - 1) * $angsuran_pokok)) * ($bungan_tahun / 12)
			];
		}
		$this->db->trans_start();
		$this->db->insert('transaksi', $data, ['id_transaksi' => $id_transaksi]);
		$this->db->insert_batch('detail_pinjaman', $detail);
		$this->db->trans_complete();
		$response = [
			'status'			=> 'OK',
			'label'			=> 'success',
			'msg'			=> 'Penarikan Simpanan Berhasil Ditambahkan !'
		];

		return $response;
	}
}

/* End of file M_pengajuan.php */
