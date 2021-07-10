<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelUser = new ModelUser();
	}
	public function index()
	{
		$data = array(
			'title' => 'Halaman Admin',
			'subtitle' => 'User',
			'user' => $this->ModelUser->AllData(),
			'validation' => \Config\Services::validation()->getErrors()
		);
		return view('admin/v_user', $data);
	}
	public function tambah()
	{
		$file = $this->request->getFile('foto');
		$nama_file = $file->getRandomName();
		$data = array(
			'nama_user' => $this->request->getPost('nama_user'),
			'email' => $this->request->getPost('email'),
			'password' => $this->request->getPost('password'),
			'foto' => $nama_file

		);
		//Upload File Foto
		$file->move('img/user', $nama_file);
		$this->ModelUser->tambah($data);
		session()->setFlashdata('pesan', 'data berhasil di tambahkan');
		return redirect()->to('/User');
	}
	public function ubah($id_user)
	{
		if (!$this->validate([
			'nama_user' => [

				'rules ' => 'required',
				'errors' => [
					'required' => 'User Wajib Di isi'
				]
			],
			'password' => [
				'label' => 'password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field}   Wajib Di isi',

				]
			],
			'email' => [
				'label' => 'Email',
				'rules' => 'required',
				'errors' => [
					'required' => '{field}   Wajib Di isi'
				]
			],
			'foto' => [
				'label' => 'foto',
				'rules' => 'is_image[foto]|mime_in[foto,image/png,image/jpg,image/gif]',
				'errors' => [

					'max_size' => 'Ukuran {field} max 4000',
					'is_image' => ' yang Anda masukan Bukan {field}',
					'mime_in' => 'Format{field} wajib PNG,JPEG,GIV'

				]
			],

		])) {
			$foto = $this->request->getFile('foto');
			if ($foto->getError() == 4) {
				$data = array(
					'id_user' => $id_user,
					'nama_user' => $this->request->getPost('nama_user'),
					'password' => $this->request->getPost('password'),
					'email' => $this->request->getPost('email'),
					//'foto' => $nama_file,
				);
				//$foto->move('foto', $nama_file); // directori Earsip public Foto
				$this->ModelUser->ubah($data);
			} else {

				//Menghapus Foto Lama
				$user = $this->ModelUser->detail($id_user);
				if ($user['foto'] != "") {
					unlink('img/user' . '/'  . $user['foto']);
				}
				//Merandom nama file
				$file = $foto->getRandomName();
				$data = array(
					'id_user' => $id_user,
					'nama_user' => $this->request->getPost('nama_user'),
					'password' => $this->request->getPost('password'),
					'email' => $this->request->getPost('email'),
					'foto' => $file,
				);
				$foto->move('img/user', $file); // directori Earsip public Foto
				$this->ModelUser->ubah($data);
			}
			//ambil foto yang akn di upload
			//$foto = $this->request->getFile('foto');
			//Merandom nama file foto
			//$nama_file = $foto->getRandomName();

			//jika falid

			session()->setFlashdata("pesan", 'Data Berhasil Di ubah');
			return redirect()->to(base_url('/user')); {
				//jika tidak valid
			}
		} else {
			//jika tidak VAalid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('/user'));
		}
	}
	public function hapus($id_user)
	{
		//Menghapus Foto Lama
		$user = $this->ModelUser->detail($id_user);
		if ($user['foto'] != "") {
			unlink('img/user' . '/'  . $user['foto']);
		}
		$data = array(
			'id_user' => $id_user

		);
		$this->ModelUser->hapus($data);
		session()->setFlashdata('pesan', 'data berhasil di Hapus');
		return redirect()->to(base_url('/user'));
	}
}
