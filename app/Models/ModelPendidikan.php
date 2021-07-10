<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPendidikan extends Model
{
	protected $allowedFields        = ['pendidikan'];
	public function AllData()
	{
		return $this->db->table('tbl_pendidikan')
			->orderBy('id_pendidikan', 'ASC')
			->get()->getResultArray();
	}
	public function tambah($data)
	{
		return $this->db->table('tbl_pendidikan')->insert($data);
	}
	public function ubah($data)
	{
		return $this->db->table('tbl_pendidikan')
			->where('id_pendidikan', $data['id_pendidikan'])
			->update($data);
	}
	public function hapus($data)
	{
		$this->db->table('tbl_pendidikan')
			->where('id_pendidikan', $data['id_pendidikan'])
			->delete($data);
	}
}
