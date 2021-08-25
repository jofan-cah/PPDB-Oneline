<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBanner extends Model
{
	protected $allowedFields        = ['banner', 'ket'];

	public function AllData()
	{
		return $this->db->table('tbl_banner')
			->orderBy('id_banner', 'ASC')
			->get()->getResultArray();
	}
	public function tambah($data)
	{
		$this->db->table('tbl_banner')->insert($data);
	}
	public function ubah($data)
	{
		return $this->db->table('tbl_banner')
			->where('id_banner', $data['id_banner'])
			->update($data);
	}
	public function hapus($data)
	{
		$this->db->table('tbl_banner')
			->where('id_banner', $data['id_banner'])->delete($data);
	}
	public function detail($id_banner)
	{
		return $this->db->table('tbl_banner')
			->where('id_banner', $id_banner)
			->get()->getRowArray();
	}


	public function jumlahPendaftar()
	{
		return $this->db->table('tbl_siswa')
			->where('tahun', date('Y'))
			->where('status_pendaftaran', '1')
			->countAllResults();
	}
	public function jumlah_lakilaki()
	{
		return $this->db->table('tbl_siswa')
			->where('tahun', date('Y'))
			->where('status_pendaftaran', '1')
			->where('jk', 'L')
			->countAllResults();
	}
	public function jumlah_perempuan()
	{
		return $this->db->table('tbl_siswa')
			->where('tahun', date('Y'))
			->where('status_pendaftaran', '1')
			->where('jk', 'P')
			->countAllResults();
	}
}
