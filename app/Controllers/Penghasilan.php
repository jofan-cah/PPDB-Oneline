<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPenghasilan;

class Penghasilan extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelPenghasilan = new ModelPenghasilan();
	}
	public function index()
	{
		$data = array(
			'title' => 'Halaman Admin',
			'subtitle' => 'Penghasilan',
			'penghasilan' => $this->ModelPenghasilan->AllData(),
			'validation' => \Config\Services::validation()->getErrors(),
		);
		return view('admin/v_penghasilan', $data);
	}
	public function tambah()
	{
		$data = array(
			'penghasilan' => $this->request->getVar('penghasilan')
		);

		$this->ModelPenghasilan->tambah($data);
		session()->setFlashdata('pesan', 'Penghasilan Berhasil ditambahkan');
		return redirect()->to(base_url('Penghasilan'));
	}

	public function ubah($id_penghasilan)
	{
		$data = array(
			'id_penghasilan' => $id_penghasilan,
			'penghasilan' => $this->request->getVar('penghasilan')
		);
		$this->ModelPenghasilan->ubah($data);
		session()->setFlashdata('pesan', 'Penghasilan Berhasil Di ubah');
		return redirect()->to(base_url('Penghasilan'));
	}
	public function hapus($id_penghasilan)
	{
		$data = array(
			'id_penghasilan' => $id_penghasilan
		);
		$this->ModelPenghasilan->hapus($data);
		session()->setFlashdata('pesan', 'Data Penghasilan berhasil Di Hapus');
		return redirect()->to(base_url('Penghasilan'));
	}
}
