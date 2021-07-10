<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJalurmasuk;

class JalurMasuk extends BaseController
{
	public function __construct()
	{
		helper('form');
		session();
		$this->ModelJalurmasuk = new ModelJalurmasuk();
	}
	public function index()
	{
		$data = [
			'title' => 'Halaman Admin',
			'subtitle' => 'Jalur Masuk',
			'jalur_masuk' => $this->ModelJalurmasuk->AllData()
		];
		return view('admin/v_jalur', $data);
	}
	public function tambah()
	{
		$data = array(
			'jalur_masuk' => $this->request->getPost('jalur_masuk'),
			'kuota' => $this->request->getPost('kuota'),

		);
		if ($this->validate([
			'jalur_masuk' => [
				'label' => 'Jalur masuk',
				'rules' => 'required|is_unique[tbl_jalur_masuk.jalur_masuk]',
				'errors' => [
					'required' => '{field} Wajib Di isi !!!',
					'is_unique' => '{field} Sudah Ada Coba Nama baru'


				],
			]
		])) {
			$this->ModelJalurmasuk->tambah($data);
			session()->setFlashdata('pesan', 'Agama Berhasil ditambahkan');
			return redirect()->to(base_url('/jalurmasuk'));
		} else {
			//jika Tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('/jalurmasuk'));
		}
	}
	public function ubah($id_jalur_masuk)
	{
		$data = array(
			'id_jalur_masuk' => $id_jalur_masuk,
			'jalur_masuk' => $this->request->getVar('jalur_masuk'),
			'kuota' => $this->request->getPost('kuota'),
		);
		$this->ModelJalurmasuk->ubah($data);
		session()->setFlashdata('pesan', 'Data Berhasil Di ubah');
		return redirect()->to(base_url('/jalurmasuk'));
	}
	public function hapus($id_jalur_masuk)
	{
		$data = array(
			'id_jalur_masuk' => $id_jalur_masuk
		);
		$this->ModelJalurmasuk->hapus($data);
		session()->setFlashdata('pesan', 'data berhasil di Hapus');
		return redirect()->to(base_url('/jalurmasuk'));
	}
}
