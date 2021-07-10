<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{

	public function login_admin($email, $password)
	{
		return $this->db->table('tbl_user')->where(
			[
				'email' => $email,
				'password' => $password,
			]
		)->get()->getRowArray();
	}
	public function login_siswa($nisn, $password)
	{
		return $this->db->table('tbl_siswa')->where(
			[
				'nisn' => $nisn,
				'password' => $password,
			]
		)->get()->getRowArray();
	}
}
