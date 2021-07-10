<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenghasilan extends Model
{

	protected $allowedFields        = ['penghasilan'];

	public function Alldata()
	{
		return $this->db->table('tbl_penghasilan')
			->orderBy('id_penghasilan', 'ASC')
			->get()->getResultArray();
	}
	public function tambah($data)
	{
		return $this->db->table('tbl_penghasilan')->insert($data);
	}
	public function ubah($data)
	{
		return $this->db->table('tbl_penghasilan')
			->where('id_penghasilan', $data['id_penghasilan'])
			->update($data);
	}
	public function hapus($data)
	{
		$this->db->table('tbl_penghasilan')
			->where('id_penghasilan', $data['id_penghasilan'])
			->delete($data);
	}
}
