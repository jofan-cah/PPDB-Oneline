<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPendidikan;

class Pendidikan extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelPendidikan = new ModelPendidikan();
	}
	public function index()
	{

		$data = array(
			'title' => 'Halaman Admin',
			'subtitle' => 'Pendidikan',
			'pendidikan' => $this->ModelPendidikan->AllData(),
			'validation' => \Config\Services::validation()->getErrors(),
		);

		return view('Admin/v_pendidikan', $data);
	}
	public function tambah()
	{
		$data = array(
			'pendidikan' => $this->request->getVar('pendidikan')
		);
		if ($this->validate([
			'pendidikan' => [
				'label' => 'Pendidikan',
				'rules' => 'required|is_unique[tbl_pendidikan.pendidikan]',
				'errors' => [
					'required' => '{field} Wajib Di isi !!!',
					'is_unique' => '{field} Sudah Ada Coba Nama baru'


				],
			]
		])) {
			$this->ModelPendidikan->tambah($data);
			session()->setFlashdata('pesan', 'Pendidikan Berhasil ditambahkan');
			return redirect()->to(base_url('Pendidikan'));
		} else {
			//jika Tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('Pendidikan'));
		}
	}
	public function ubah($id_pendidikan)
	{
		$data = array(
			'id_pendidikan' => $id_pendidikan,
			'pendidikan' => $this->request->getVar('pendidikan')
		);
		$this->ModelPendidikan->ubah($data);
		session()->setFlashdata('pesan', 'Pendidikan Berhasil Di ubah');
		return redirect()->to(base_url('Pendidikan'));
	}
	public function hapus($id_pendidikan)
	{
		$data = array(
			'id_pendidikan' => $id_pendidikan
		);
		$this->ModelPendidikan->hapus($data);
		session()->setFlashdata('pesan', 'Data Pendidikan berhasil Di Hapus');
		return redirect()->to(base_url('Pendidikan'));
	}
}
