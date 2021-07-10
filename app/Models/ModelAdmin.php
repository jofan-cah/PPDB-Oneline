<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeladmin extends Model
{
	protected $allowedFields        = ['beranda', 'nama_sekolah', 'alamat', 'kecamatan', 'kabupaten', 'Provinsi', 'no_telpone', 'email', 'web'];
	public function detailSetting()
	{
		return $this->db->table('tbl_setting')
			->orderBy('id', '1')
			->get()->getRowArray();
	}
	public function ubah($data)
	{
		$this->db->table('tbl_setting')
			->where('id', '1')
			->update($data);
	}
	public function detail()
	{
		return $this->db->table('tbl_setting')
			->orderBy('logo', '1')
			->get()
			->getRowArray();
	}
	public function totalJurusan()
	{
		return $this->db->table('tbl_jurusan')->countAllResults();
	}
	public function totalPekerjaan()
	{
		return $this->db->table('tbl_pekerjaan')->countAllResults();
	}
	public function totalPendidikan()
	{
		return $this->db->table('tbl_pendidikan')->countAllResults();
	}
	public function totalPenghasilan()
	{
		return $this->db->table('tbl_penghasilan')->countAllResults();
	}
	public function totalAgama()
	{
		return $this->db->table('tbl_agama')->countAllResults();
	}
	public function totalUser()
	{
		return $this->db->table('tbl_user')->countAllResults();
	}
	public function totalPendaftaranMasuk()
	{
		return $this->db->table('tbl_siswa')
			->where('status_pendaftaran', '1')
			->where('status_ppdb', '0')
			->countAllResults();
	}
	public function totalPendaftaranDiterima()
	{
		return $this->db->table('tbl_siswa')

			->where('status_ppdb', '1')
			->countAllResults();
	}
	public function totalPendaftaranDitolak()
	{
		return $this->db->table('tbl_siswa')
			->where('status_ppdb', '2')
			->countAllResults();
	}
}
