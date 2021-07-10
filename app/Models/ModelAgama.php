<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAgama extends Model
{
	protected $allowedFields        = ['agama'];

	public function AllData()
	{
		return $this->db->table('tbl_agama')
			->orderBy('id_agama', 'ASC')
			->get()->getResultArray();
	}

	public function tambah($data)
	{
		$this->db->table('tbl_agama')->insert($data);
	}
	public function ubah($data)
	{
		$this->db->table('tbl_agama')
			->where('id_agama', $data['id_agama'])
			->update($data);
	}
	public function hapus($data)
	{
		$this->db->table('tbl_agama')
			->where('id_agama', $data['id_agama'])->delete($data);
	}
}
