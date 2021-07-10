<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJalurmasuk extends Model
{


	protected $allowedFields        = ['jalur_masuk', 'kuota'];

	public function AllData()
	{
		return $this->db->table('tbl_jalur_masuk')
			->orderBy('id_jalur_masuk', 'ASC')
			->get()->getResultArray();
	}
	public function tambah($data)
	{
		$this->db->table('tbl_jalur_masuk')->insert($data);
	}
	public function ubah($data)
	{
		$this->db->table('tbl_jalur_masuk')
			->where('id_jalur_masuk', $data['id_jalur_masuk'])
			->update($data);
	}
	public function hapus($data)
	{
		$this->db->table('tbl_jalur_masuk')
			->where('id_jalur_masuk', $data['id_jalur_masuk'])->delete($data);
	}
}
