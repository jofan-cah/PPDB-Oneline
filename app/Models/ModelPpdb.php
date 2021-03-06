<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPpdb extends Model
{


	public function getPpdbMasuk()
	{
		return $this->db->table('tbl_siswa')
			->join('tbl_jalur_masuk', 'tbl_jalur_masuk.id_jalur_masuk = tbl_siswa.id_jalur_masuk', 'left')
			->join('tbl_agama', 'tbl_agama.id_agama = tbl_siswa.id_agama', 'left')
			->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_siswa.id_provinsi', 'left')
			->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_siswa.id_kabupaten', 'left')
			->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_siswa.id_kecamatan', 'left')
			->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_siswa.id_jurusan', 'left')
			->where('status_ppdb', '0')
			->where('status_pendaftaran', '1')
			->get()
			->getResultArray();
	}
	public function getPpdbDiterima()
	{
		return $this->db->table('tbl_siswa')
			->join('tbl_jalur_masuk', 'tbl_jalur_masuk.id_jalur_masuk = tbl_siswa.id_jalur_masuk', 'left')
			->join('tbl_agama', 'tbl_agama.id_agama = tbl_siswa.id_agama', 'left')
			->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_siswa.id_provinsi', 'left')
			->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_siswa.id_kabupaten', 'left')
			->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_siswa.id_kecamatan', 'left')
			->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_siswa.id_jurusan', 'left')
			->where('status_ppdb', '1')

			->get()
			->getResultArray();
	}
	public function getPpdbDitolak()
	{
		return $this->db->table('tbl_siswa')
			->join('tbl_jalur_masuk', 'tbl_jalur_masuk.id_jalur_masuk = tbl_siswa.id_jalur_masuk', 'left')
			->join('tbl_agama', 'tbl_agama.id_agama = tbl_siswa.id_agama', 'left')
			->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_siswa.id_provinsi', 'left')
			->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_siswa.id_kabupaten', 'left')
			->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_siswa.id_kecamatan', 'left')
			->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_siswa.id_jurusan', 'left')
			->where('status_ppdb', '2')

			->get()
			->getResultArray();
	}
	public function detailSiswa($id_siswa)
	{
		return $this->db->table('tbl_siswa')
			->join('tbl_jalur_masuk', 'tbl_jalur_masuk.id_jalur_masuk = tbl_siswa.id_jalur_masuk', 'left')
			->join('tbl_agama', 'tbl_agama.id_agama = tbl_siswa.id_agama', 'left')
			->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_siswa.id_provinsi', 'left')
			->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_siswa.id_kabupaten', 'left')
			->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_siswa.id_kecamatan', 'left')
			->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_siswa.id_jurusan', 'left')
			->where('id_siswa', $id_siswa)
			->get()
			->getRowArray();
	}
	public function lampiran($id_siswa)
	{
		return $this->db->table('tbl_berkas')
			->join('tbl_lampiran', 'tbl_lampiran.id_lampiran = tbl_berkas.id_lampiran', 'left')
			->where('id_siswa', $id_siswa)
			->get()
			->getResultArray();
	}
	public function ubah($data)
	{
		$this->db->table('tbl_siswa')
			->where('id_siswa', $data['id_siswa'])
			->update($data);
	}
	public function AllDataTa()
	{
		return $this->db->table('tbl_ta')
			->orderBy('ta', 'ASC')
			->get()->getResultArray();
	}
	public function getDataLaporan($tahun)
	{
		return $this->db->table('tbl_siswa')
			->join('tbl_jalur_masuk', 'tbl_jalur_masuk.id_jalur_masuk = tbl_siswa.id_jalur_masuk', 'left')
			->join('tbl_agama', 'tbl_agama.id_agama = tbl_siswa.id_agama', 'left')
			->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_siswa.id_provinsi', 'left')
			->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_siswa.id_kabupaten', 'left')
			->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_siswa.id_kecamatan', 'left')
			->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_siswa.id_jurusan', 'left')
			->where('tbl_siswa.status_ppdb', '1')
			->where('tahun', $tahun)
			->get()
			->getResultArray();
	}
}
