<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;


class Admin extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelAdmin = new ModelAdmin();
	}
	public function index()
	{
		$data = array(
			'title' => 'Halaman Admin',
			'subtitle' => 'Dashboard',
			'total_jurusan' => $this->ModelAdmin->totalJurusan(),
			'total_pekerjaan' => $this->ModelAdmin->totalPekerjaan(),
			'total_pendidikan' => $this->ModelAdmin->totalPenghasilan(),
			'total_penghasilan' => $this->ModelAdmin->totalPendidikan(),
			'total_agama' => $this->ModelAdmin->totalAgama(),
			'total_user ' => $this->ModelAdmin->totalUser(),
			'total_pendaftaranMasuk' => $this->ModelAdmin->totalPendaftaranMasuk(),
			'total_pendaftaranDiterima' => $this->ModelAdmin->totalPendaftaranDiterima(),
			'total_pendaftaranDitolak' => $this->ModelAdmin->totalPendaftaranDitolak(),

		);
		return view('Admin/v_dashboard', $data);
	}
	public function setting()
	{
		$data = array(
			'title' => 'Halaman Admin',
			'subtitle' => 'Setting',
			'setting' => $this->ModelAdmin->detailSetting()
		);
		return view('Admin/v_setting', $data);
	}
	public function ubah()
	{
		$file = $this->request->getFile('logo');
		//Gambar Tidak Di ubah
		if ($file->getError() == 4) {
			$data = array(
				'nama_sekolah' => $this->request->getVar('nama_sekolah'),
				'alamat' => $this->request->getVar('alamat'),
				'kabupaten' => $this->request->getVar('kabupaten'),
				'kecamatan' => $this->request->getVar('kecamatan'),
				'Provinsi' => $this->request->getVar('Provinsi'),
				'no_telpon' => $this->request->getVar('no_telpon'),
				'email' => $this->request->getVar('email'),
				'web' => $this->request->getVar('web'),
				'deskripsi' => $this->request->getVar('deskripsi'),
			);
			$this->ModelAdmin->ubah($data);
		} else {
			//menghapus Foto lama
			$setting = $this->ModelAdmin->detail();
			if ($setting['logo'] != "") {
				unlink('img/logo' . '/'  . $setting['logo']);
			}
			$nama_file = $file->getRandomName();
			$data = array(
				'nama_sekolah' => $this->request->getVar('nama_sekolah'),
				'alamat' => $this->request->getVar('alamat'),
				'kabupaten' => $this->request->getVar('kabupaten'),
				'kecamatan' => $this->request->getVar('kecamatan'),
				'Provinsi' => $this->request->getVar('Provinsi'),
				'no_telpon' => $this->request->getVar('no_telpon'),
				'email' => $this->request->getVar('email'),
				'web' => $this->request->getVar('web'),
				'deskripsi' => $this->request->getVar('deskripsi'),
				'logo' => $nama_file
			);
			$file->move('img/logo', $nama_file);
			$this->ModelAdmin->ubah($data);
		}
		session()->setFlashdata('pesan', 'Seting Berhasil Di ubah');
		return redirect()->to(base_url('/admin/setting'));
	}
	public function Beranda()
	{
		$data = [
			'title' => 'Halaman Admin',
			'subtitle' => 'Beranda  ',
			'beranda' => $this->ModelAdmin->detailSetting()
		];
		return view('admin/v_beranda', $data);
	}
	public function saveBeranda()
	{
		$data = [
			'beranda' => $this->request->getVar('beranda'),
		];
		$this->ModelAdmin->ubah($data);
		session()->setFlashdata('pesan', 'Beranda Berhasil Di ubah');
		return redirect()->to(base_url('/admin/Beranda'));
	}
}
