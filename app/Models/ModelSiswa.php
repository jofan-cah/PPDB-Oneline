<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSiswa extends Model
{

	public function AllData()
	{
		return $this->db->table('tbl_siswa')
			->orderBy('id_siswa', 'ASC')
			->get()->getResultArray();
	}
	public function getBiodataSiswa()
	{
		return $this->db->table('tbl_siswa')
			->join('tbl_jalur_masuk', 'tbl_jalur_masuk.id_jalur_masuk = tbl_siswa.id_jalur_masuk', 'left')
			->join('tbl_agama', 'tbl_agama.id_agama = tbl_siswa.id_agama', 'left')
			->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_siswa.id_provinsi', 'left')
			->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_siswa.id_kabupaten', 'left')
			->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_siswa.id_kecamatan', 'left')
			->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_siswa.id_jurusan', 'left')
			->where('id_siswa', session()->get('id_siswa'))
			->get()
			->getRowArray();
	}
	public function tambah($data)
	{
		$this->db->table('tbl_siswa')->insert($data);
	}
	public function ubah($data)
	{
		$this->db->table('tbl_siswa')
			->where('id_siswa', $data['id_siswa'])
			->update($data);
	}
	public function hapus($data)
	{
		$this->db->table('tbl_siswa')
			->where('id_siswa', $data['id_siswa'])->delete($data);
	}
	public function noPendaftaran()
	{
		$kode = $this->db->table('tbl_siswa')
			->select('RIGHT(no_pendaftaran,4) as no_pendaftaran', false)
			->select('LEFT(no_pendaftaran,8) as tgl_pendaftaran', false)
			->orderBy('no_pendaftaran', 'DESC')
			->limit(1)
			->get()
			->getRowArray();

		if ($kode['no_pendaftaran'] == null) {
			$no = 1;
		} else {

			$no = intval($kode['no_pendaftaran']) + 1;
		}


		$tgl = date('Ymd');
		$batas = str_pad($no, 4, "0", STR_PAD_LEFT);
		$no_pendaftaran = $tgl . $batas;
		return $no_pendaftaran;
	}
	public function detail($id_siswa)
	{
		return $this->db->table('tbl_siswa')
			->where('id_siswa', $id_siswa)
			->get()->getRowArray();
	}
	public function lampiran()
	{
		return $this->db->table('tbl_berkas')
			->join('tbl_lampiran', 'tbl_lampiran.id_lampiran = tbl_berkas.id_lampiran', 'left')
			->where('id_siswa', session()->get('id_siswa'))
			->get()
			->getResultArray();
	}
	public function tambahBerkas($data)
	{
		$this->db->table('tbl_berkas')->insert($data);
	}
	public function detailBerkas($id_berkas)
	{
		return $this->db->table('tbl_berkas')
			->where('id_berkas', $id_berkas)
			->get()
			->getRowArray();
	}

	public function hapusBerkas($data)
	{
		$this->db->table('tbl_berkas')
			->where('id_berkas', $data['id_berkas'])
			->delete($data);
	}
}
