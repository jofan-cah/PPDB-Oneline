<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJurusan extends Model
{
	protected $allowedFields        = ['jurusan'];
	public function AllData()
	{
		return $this->db->table('tbl_jurusan')
			->orderBy('id_jurusan', 'ASC')
			->get()->getResultArray();
	}
	public function tambah($data)
	{
		return $this->db->table('tbl_jurusan')->insert($data);
	}
	public function ubah($data)
	{
		return $this->db->table('tbl_jurusan')
			->where('id_jurusan', $data['id_jurusan'])
			->update($data);
	}
	public function hapus($data)
	{
		$this->db->table('tbl_jurusan')
			->where('id_jurusan', $data['id_jurusan'])
			->delete($data);
	}
}
