<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAgama;

class Agama extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelAgama = new ModelAgama();
	}
	public function index()
	{
		$data = array(
			'title' => 'Halaman Admin',
			'subtitle' => 'Agama',
			'agama' => $this->ModelAgama->AllData(),
			'validation' => \Config\Services::validation()->getErrors(),
		);
		return view('admin/v_agama', $data);
	}
	public function tambah()
	{
		$data = array(
			'agama' => $this->request->getPost('agama')

		);
		if ($this->validate([
			'agama' => [
				'label' => 'Agama',
				'rules' => 'required|is_unique[tbl_agama.agama]',
				'errors' => [
					'required' => '{field} Wajib Di isi !!!',
					'is_unique' => '{field} Sudah Ada Coba Nama baru'


				],
			]
		])) {
			$this->ModelAgama->tambah($data);
			session()->setFlashdata('pesan', 'Agama Berhasil ditambahkan');
			return redirect()->to(base_url('Agama'));
		} else {
			//jika Tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('Agama'));
		}
	}
	public function ubah($id_agama)
	{
		$data = array(
			'id_agama' => $id_agama,
			'agama' => $this->request->getVar('agama')
		);
		$this->ModelAgama->ubah($data);
		session()->setFlashdata("Pesan", 'Data Berhasil Di ubah');
		return redirect()->to(base_url('/agama'));
	}
	public function hapus($id_agama)
	{
		$data = array(
			'id_agama' => $id_agama

		);
		$this->ModelAgama->hapus($data);
		session()->setFlashdata('Pesan', 'data berhasil di Hapus');
		return redirect()->to(base_url('/agama'));
	}
}
