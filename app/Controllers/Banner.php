<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBanner;

class Banner extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelBanner = new ModelBanner();
	}
	public function index()
	{
		$data = array(
			'title' => 'Halaman Admin',
			'subtitle' => 'Banner',
			'banner' => $this->ModelBanner->AllData(),
			'validation' => \Config\Services::validation()->getErrors(),
		);
		return view('admin/v_banner', $data);
	}
	public function tambah()
	{
		$file = $this->request->getFile('banner');

		$nama_file = $file->getRandomName();
		$data = array(
			'banner' => $nama_file,
			'ket' => $this->request->getVar('ket'),
		);

		$file->move('img/banner', $nama_file);
		$this->ModelBanner->tambah($data);
		session()->setFlashdata('pesan', 'Banner Berhasil ditambahkan');
		return redirect()->to(base_url('Banner'));
	}
	public function ubah($id_banner)
	{
		$file = $this->request->getFile('banner');

		//Gambar Tidak Di ubah
		if ($file->getError() == 4) {
			$data = array(
				'id_banner' => $id_banner,
				'ket' => $this->request->getVar('ket'),
			);
			$this->ModelBanner->ubah($data);
		} else {
			//menghapus Foto lama
			$setting = $this->ModelBanner->detail($id_banner);
			if ($setting['banner'] != "") {
				unlink('img/banner' . '/'  . $setting['banner']);
			}
			$nama_file = $file->getRandomName();
			$data = array(
				'id_banner' => $id_banner,
				'banner' => $nama_file,
				'ket' => $this->request->getVar('ket'),
			);
			$file->move('img/banner', $nama_file);
			$this->ModelBanner->ubah($data);
		}
		session()->setFlashdata('pesan', 'Seting Berhasil Di ubah');
		return redirect()->to(base_url('/banner'));
	}
	public function hapus($id_banner)
	{
		$data = array(
			'id_banner' => $id_banner

		);
		$this->ModelBanner->hapus($data);
		session()->setFlashdata('Pesan', 'data berhasil di Hapus');
		return redirect()->to(base_url('/banner'));
	}
}
