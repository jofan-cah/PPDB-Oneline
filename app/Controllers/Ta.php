<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTa;

class Ta extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelTa = new ModelTa();
	}
	public function index()
	{

		$data = array(
			'title' => 'Halaman Admin',
			'subtitle' => 'Tahun Ajaran',
			'ta' => $this->ModelTa->AllData(),
			'validation' => \Config\Services::validation()->getErrors(),
		);

		return view('Admin/v_ta', $data);
	}
	public function tambah()
	{
		$data = array(
			'ta' => $this->request->getVar('ta'),
			'tahun' => $this->request->getVar('tahun'),
		);

		$this->ModelTa->tambah($data);
		session()->setFlashdata('pesan', 'Tahun Ajaran Berhasil ditambahkan');
		return redirect()->to(base_url('ta'));
	}
	public function ubah($id_ta)
	{
		$data = array(
			'id_ta' => $id_ta,
			'ta' => $this->request->getVar('ta'),
			'tahun' => $this->request->getVar('tahun'),
		);
		$this->ModelTa->ubah($data);
		session()->setFlashdata('pesan', 'Tahun Ajaran Berhasil Di ubah');
		return redirect()->to(base_url('/ta'));
	}
	public function hapus($id_ta)
	{
		$data = array(
			'id_ta' => $id_ta,
		);
		$this->ModelTa->hapus($data);
		session()->setFlashdata('pesan', 'Data Tahun Ajaran berhasil Di Hapus');
		return redirect()->to(base_url('/ta'));
	}
	public function statusAktif($id_ta)
	{
		$data = array(
			'id_ta' => $id_ta,
			'status' => 1
		);
		$this->ModelTa->resetStatus();
		$this->ModelTa->ubah($data);
		session()->setFlashdata('pesan', 'Tahun Ajaran Berhasil Di ubah');
		return redirect()->to(base_url('/ta'));
	}
	public function statusNonAktif($id_ta)
	{
		$data = array(
			'id_ta' => $id_ta,
			'status' => 0
		);
		$this->ModelTa->ubah($data);
		session()->setFlashdata('pesan', 'Tahun Ajaran Berhasil Di ubah');
		return redirect()->to(base_url('/ta'));
	}
}
