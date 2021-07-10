<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPekerjaan extends Model
{
	protected $allowedFields = ['pekerjaan'];
	public function AllData()
	{
		return $this->db->table('tbl_pekerjaan')
			->orderBy('id_pekerjaan', 'ASC')
			->get()->getResultArray();
	}
	public function tambah($data)
	{
		$this->db->table('tbl_pekerjaan')->insert($data);
	}
	public function ubah($data)
	{
		$this->db->table('tbl_pekerjaan')
			->where('id_pekerjaan', $data['id_pekerjaan'])
			->update($data);
	}
	public function hapus($data)
	{
		$this->db->table('tbl_pekerjaan')
			->where('id_pendidikan', $data['id_pendidikan'])
			->delete($data);
	}
}
