<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;


class Auth extends BaseController
{
	public function __construct()
	{
		Helper('form');
		$this->ModelAuth = new ModelAuth();
	}
	public function index()
	{
		session();
		$data = array(
			'title' => 'Halaman Login',
			'validation' => \Config\Services::validation()->getErrors(),


		);

		return view('v_login-admin', $data);
	}
	public function login()
	{
		if ($this->validate([
			'email' => [
				'label' => 'E-mail',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di isi !!!',

				]
			],
			'password' =>
			[
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di isi !!!',

				]

			]
		])) {
			//jika Valid
			$email = $this->request->getVar('email');
			$password = $this->request->getVar('password');
			$cek = $this->ModelAuth->login_admin($email, $password);
			if ($cek) {
				//Jika Data COCOK
				session()->set('log', true);
				session()->set('id_user', $cek['id_user']);
				session()->set('nama_user', $cek['nama_user']);
				session()->set('email', $cek['email']);
				session()->set('password', $cek['password']);
				session()->set('foto', $cek['foto']);
				session()->set('level', $cek['level']);
				return redirect()->to(base_url('/Admin'));
			} else {

				session()->setFlashdata('Pesan', 'Gagal Login ! ,NISN / Password Salah');
				return redirect()->to(base_url('Auth/index'));
			}
		} else {
			//jika Tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('Auth/index'));
		}
	}
	public function logout()
	{
		session()->remove('id_user');
		session()->remove('nama_user');
		session()->remove('email');
		session()->remove('password');
		session()->remove('foto');
		session()->remove('level');
		session()->setFlashdata('Pesan', 'Anda Berhasil Keluar');
		return redirect()->to(base_url('Auth/index'));
	}

	// Login Siswa

	public function loginSiswa()
	{
		$data = array(
			'title' => 'PPDB Online',
			'subtitle' => 'Login Siswa',
			'validation' => \Config\Services::validation(),

		);
		return view('v_login_siswa', $data);
	}

	public function cek_loginSiswa(Type $var = null)
	{
		if ($this->validate([
			'nisn' => [
				'label' => 'NISN',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di isi !!!',

				]
			],
			'password' =>
			[
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di isi !!!',

				]

			]
		])) {
			//jika Valid
			$nisn = $this->request->getVar('nisn');
			$password = $this->request->getVar('password');
			$cek = $this->ModelAuth->login_siswa($nisn, $password);
			if ($cek) {
				//Jika Data COCOK
				session()->set('log', true);
				session()->set('id_siswa', $cek['id_siswa']);
				session()->set('nisn', $cek['nisn']);
				session()->set('no_pendaftaran', $cek['no_pendaftaran']);
				session()->set('nama_lengkap', $cek['nama_lengkap']);
				session()->set('nama_pangilan', $cek['nama_panggilan']);
				session()->set('level', $cek['level']);
				return redirect()->to(base_url('/Siswa'));
			} else {

				session()->setFlashdata('pesan', 'Gagal Login ! ,Email / Password Salah');
				return redirect()->to('loginSiswa');
			}
		} else {
			//jika Tidak valid
			$validation = \Config\Services::validation();
			return redirect()->to('loginSiswa')->withInput()->with('validation', $validation);
		}
	}
	public function logoutSiswa()
	{
		session()->remove('id_siswa');
		session()->remove('nama_lengkap');
		session()->remove('nama_panggilan');
		session()->remove('level');
		session()->remove('nisn');

		session()->setFlashdata('pesan', 'Anda Berhasil Keluar');
		return redirect()->to('loginSiswa');
	}
}
