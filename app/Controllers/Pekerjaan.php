<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPekerjaan;


class Pekerjaan extends BaseController
{

	public function __construct()
	{
		helper('form');
		$this->ModelPekerjaan = new ModelPekerjaan();
	}
	public function index()
	{
		$data = array(
			'title' => 'Halaman Admin',
			'subtitle' => 'Pekerjaan',
			'pekerjaan' => $this->ModelPekerjaan->AllData()

		);
		return view('Admin/v_pekerjaan', $data);
	}
	public function tambah()
	{
		$data = array(
			'pekerjaan' => $this->request->getPost('pekerjaan')

		);
		$this->ModelPekerjaan->tambah($data);
		session()->setFlashdata('Pesan', 'data berhasil di tambahkan');
		return redirect()->to('index');
	}
	public function ubah($id_pekerjaan)
	{
		$data = array(
			'id_pekerjaan' => $id_pekerjaan,
			'pekerjaan' => $this->request->getVar('pekerjaan')
		);
		$this->ModelPekerjaan->ubah($data);
		session()->setFlashdata("Pesan", 'Data Berhasil Di ubah');
		return redirect()->to(base_url('/pekerjaan'));
	}
	public function hapus($id_pekerjaan)
	{
		$data = array(
			'id_pekerjaan' => $id_pekerjaan

		);
		$this->ModelPekerjaan->hapus($data);
		session()->setFlashdata('Pesan', 'data berhasil di Hapus');
		return redirect()->to(base_url('/pekerjaan'));
	}
}
