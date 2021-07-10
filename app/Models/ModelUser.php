<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{

	protected $allowedFields        = ['nama_user', 'email', 'passwod', 'foto', 'level'];
	public function AllData()
	{
		return $this->db->table('tbl_user')
			->orderBy('id_user', 'ASC')
			->get()->getResultArray();
	}
	public function tambah($data)
	{
		$this->db->table('tbl_user')->insert($data);
	}
	public function ubah($data)
	{
		$this->db->table('tbl_user')
			->where('id_user', $data['id_user'])
			->update($data);
	}
	public function hapus($data)
	{
		$this->db->table('tbl_user')
			->where('id_user', $data['id_user'])
			->delete($data);
	}
	public function detail($id_user)
	{
		return $this->db->table('tbl_user')
			->orderBy('foto', $id_user)
			->get()
			->getRowArray();
	}
}
