<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTa;
use App\Models\ModelSiswa;
use App\Models\ModelJalurmasuk;
use App\Models\ModelJurusan;


class Pendaftaran extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelSiswa = new ModelSiswa();
		$this->ModelTa = new ModelTa();
		$this->ModelJalurmasuk = new ModelJalurmasuk();
		$this->ModelJurusan = new ModelJurusan();
	}
	public function index()
	{
		session();

		$data = array(
			'title' => 'Halaman Admin',
			'subtitle' => 'Pendaftaran',
			'validation' => \Config\Services::validation(),
			'ta' => $this->ModelTa->statusTA(),
			'jalur' => $this->ModelJalurmasuk->AllData(),
			'jurusan' => $this->ModelJurusan->AllData(),
		);
		return view('v_pendaftaran', $data);
	}

	public function simpanPendaftaran()
	{

		if ($this->validate([
			'nisn' => [
				'label' => 'NISN',
				'rules' => 'required|is_unique[tbl_siswa.nisn]|min_length[10]|max_length[10]',
				'errors' => [
					'required' => '{field} Wajib Di isi',
					'is_unique' => '{field} Sudah Terdaftar',
					'min_length' => '{field} Minimal 10 Karakter',
					'max_length' => '{field} Maximal 10 Karakter',

				]
			],
			'nama_lengkap' => [
				'label' => 'Nama Lengkap',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di isi'
				]
			],
			'nama_panggilan' => [
				'label' => 'Nama Panggilan',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di isi'
				]
			],
			'jk' => [
				'label' => 'Jenis Kelamin',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di isi'
				]
			],

			'id_jalur_masuk' => [
				'label' => 'Jalur Masuk',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di isi'
				]
			],
			'id_jurusan' => [
				'label' => 'Jurusan',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di isi'
				]
			],
			'tempat_lahir' => [
				'label' => 'Tempat Lahir',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di isi'
				]
			],
			'tanggal' => [
				'label' => 'Tanggal',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di isi'
				]
			],
			'bulan' => [
				'label' => 'Bulan ',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di isi'
				]
			],
			'tahun' => [
				'label' => 'Tahun',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di isi'
				]
			],
		])) {
			//jika Succes
			$setting = $this->ModelTa->statusTA();
			$no_pendaftaran = $this->ModelSiswa->noPendaftaran();
			$tahun = $this->request->getPost('tahun');
			$bulan =  $this->request->getPost('bulan');
			$tanggal = $this->request->getPost('tanggal');

			$data = array(
				'no_pendaftaran' => $no_pendaftaran,
				'tahun' => $setting['tahun'],
				'tgl_pendaftaran' => date('Y-m-d'),
				'nisn' => $this->request->getPost('nisn'),
				'nama_lengkap' => $this->request->getPost('nama_lengkap'),
				'nama_panggilan' => $this->request->getPost('nama_panggilan'),
				'id_jalur_masuk' => $this->request->getPost('id_jalur_masuk'),
				'id_jurusan' => $this->request->getPost('id_jurusan'),
				'jk' => $this->request->getPost('jk'),
				'tempat_lahir' => $this->request->getPost('tempat_lahir'),
				'tgl_lahir' => $tahun . '-' . $bulan . '-' . $tanggal,
				'password' =>   $this->request->getPost('nisn'),

			);

			$this->ModelSiswa->tambah($data);
			session()->setFlashdata('pesan', 'Pendaftaran Berhasil silahkan Login Melengkapi Data !!!!');
			return redirect()->to(base_url('/pendaftaran'));
		} else {
			//    Jika Salah
			$validation = \Config\Services::validation();
			// dd($validation);
			return redirect()->to('/pendaftaran')->withInput()->with('validation', $validation);
		}
	}
}
