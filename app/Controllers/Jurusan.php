<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJurusan;

class Jurusan extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelJurusan = new ModelJurusan();
	}
	public function index()
	{

		$data = array(
			'title' => 'Halaman Admin',
			'subtitle' => 'Jurusan',
			'jurusan' => $this->ModelJurusan->AllData(),
			'validation' => \Config\Services::validation()->getErrors(),
		);

		return view('Admin/v_jurusan', $data);
	}
	public function tambah()
	{
		$data = array(
			'jurusan' => $this->request->getVar('jurusan')
		);
		if ($this->validate([
			'jurusan' => [
				'label' => 'Jurusan',
				'rules' => 'required|is_unique[tbl_jurusan.jurusan]',
				'errors' => [
					'required' => '{field} Wajib Di isi !!!',
					'is_unique' => '{field} Sudah Ada Coba Nama baru'


				],
			]
		])) {
			$this->ModelJurusan->tambah($data);
			session()->setFlashdata('pesan', 'Jurusan Berhasil ditambahkan');
			return redirect()->to(base_url('Jurusan'));
		} else {
			//jika Tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('Jurusan'));
		}
	}
	public function ubah($id_jurusan)
	{
		$data = array(
			'id_jurusan' => $id_jurusan,
			'jurusan' => $this->request->getVar('jurusan')
		);
		$this->ModelJurusan->ubah($data);
		session()->setFlashdata('pesan', 'Jurusan Berhasil Di ubah');
		return redirect()->to(base_url('Jurusan'));
	}
	public function hapus($id_jurusan)
	{
		$data = array(
			'id_jurusan' => $id_jurusan
		);
		$this->ModelJurusan->hapus($data);
		session()->setFlashdata('pesan', 'Data Jurusan berhasil Di Hapus');
		return redirect()->to(base_url('jurusan'));
	}
}
