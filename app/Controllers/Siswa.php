<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSiswa;
use App\Models\ModelJalurmasuk;
use App\Models\ModelAgama;
use App\Models\ModelPekerjaan;
use App\Models\ModelPendidikan;
use App\Models\ModelPenghasilan;
use App\Models\ModelWilayah;
use App\Models\ModelLampiran;
use App\Models\ModelJurusan;
use App\Models\ModelAdmin;

class Siswa extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelSiswa = new ModelSiswa();
		$this->ModelJalurmasuk = new ModelJalurmasuk();
		$this->ModelAgama = new ModelAgama();
		$this->ModelPekerjaan = new ModelPekerjaan();
		$this->ModelPendidikan = new ModelPendidikan();
		$this->ModelPenghasilan = new ModelPenghasilan();
		$this->ModelWilayah = new ModelWilayah();
		$this->ModelLampiran = new ModelLampiran();
		$this->ModelJurusan = new ModelJurusan();
		$this->ModelAdmin = new ModelAdmin();
	}
	public function index()
	{
		$data = array(
			'title' => 'PPDB Online',
			'subtitle' => 'Siswa',
			'siswa' => $this->ModelSiswa->getBiodataSiswa(),
			'jalur' => $this->ModelJalurmasuk->AllData(),
			'agama' => $this->ModelAgama->AllData(),
			'penghasilan' => $this->ModelPenghasilan->AllData(),
			'pekerjaan' => $this->ModelPekerjaan->AllData(),
			'pendidikan' => $this->ModelPendidikan->AllData(),
			'berkas' => $this->ModelSiswa->lampiran(),
			'provinsi' => $this->ModelWilayah->getProvinsi(),
			'lampiran' => $this->ModelLampiran->AllData(),
			'jurusan' => $this->ModelJurusan->AllData(),
			'validation' => \Config\Services::validation()


		);
		return view('siswa/v_formulir', $data);
	}
	public function ubah($id_siswa)
	{

		$data = [
			'id_siswa' => $id_siswa,
			'id_jalur_masuk' => $this->request->getVar('id_jalur_masuk'),
			'id_jurusan' => $this->request->getVar('id_jurusan'),
		];
		$this->ModelSiswa->ubah($data);
		session()->setFlashdata('pesan', 'Data Calon Siswa berhasil di ubah');
		return redirect()->to('/Siswa');
	}
	public function ubahfoto($id_siswa)
	{
		if ($this->validate([
			'foto' => [
				'label' => 'Foto',
				'rules' => 'uploaded[foto]|max_size[foto,9048]',
				'errors' => [
					'max_size' => '{field} Ukuran Foto lebih Dari 9048kb',
					'uploaded' => '{field}   Wajib Di isi',
				]
			],
		])) {
			$nama_foto = $this->request->getFile('foto');
			if ($nama_foto->getError() == 4) {
				$data = array(
					'id_siswa' => $id_siswa,
					'foto' => $nama_foto
					//'foto' => $nama_file,
				);
				//$foto->move('foto', $nama_file); // directori Earsip public Foto
				$this->ModelSiswa->ubah($data);
			} else {

				//Menghapus Foto Lama
				$user = $this->ModelSiswa->detail($id_siswa);
				if ($user['foto'] != "") {
					unlink('img/user' . '/'  . $user['foto']);
				}
				//Merandom nama file
				$file = $nama_foto->getRandomName();
				$data = array(
					'id_siswa' => $id_siswa,
					'foto' => $file,
				);
				$nama_foto->move('img/user', $file); // directori Earsip public Foto
				$this->ModelSiswa->ubah($data);
			}
			//ambil foto yang akn di upload
			//$foto = $this->request->getFile('foto');
			//Merandom nama file foto
			//$nama_file = $foto->getRandomName();

			//jika falid

			session()->setFlashdata("pesan", 'Data Berhasil Di ubah');
			return redirect()->to(base_url('/user'));
			//jika tidak valid
		} else {
			$validation = \Config\Services::validdation();
			// dd($validation);
			return redirect()->to('/Siswa')->withInput()->with('validation', $validation);
		}
	}

	public function ubahidentitas($id_siswa)
	{

		$data = [
			'id_siswa' => $id_siswa,
			'nama_lengkap' => $this->request->getVar('nama_lengkap'),
			'nama_panggilan' => $this->request->getVar('nama_panggilan'),
			'jk' => $this->request->getVar('jk'),
			'id_agama' => $this->request->getVar('id_agama'),
			'nik' => $this->request->getVar('nik'),
			'tinggi' => $this->request->getVar('tinggi'),
			'berat' => $this->request->getVar('berat'),
			'jml_saudara' => $this->request->getVar('jml_saudara'),
			'anak_ke' => $this->request->getVar('anak_ke'),
			'no_telpon' => $this->request->getVar('no_telpon'),
		];
		$this->ModelSiswa->ubah($data);
		session()->setFlashdata('pesan', 'Data Calon Siswa berhasil di ubah');
		return redirect()->to('/Siswa');
	}

	public function identitasAyah($id_siswa)
	{

		$data = [
			'id_siswa' => $id_siswa,
			'nama_ayah' => $this->request->getVar('nama_ayah'),
			'nik_ayah' => $this->request->getVar('nik_ayah'),
			'pekerjaan_ayah' => $this->request->getVar('pekerjaan_ayah'),
			'penghasilan_ayah' => $this->request->getVar('penghasilan_ayah'),
			'pendidikan_ayah' => $this->request->getVar('pendidikan_ayah'),
			'nohp_ayah' => $this->request->getVar('nohp_ayah'),

		];
		$this->ModelSiswa->ubah($data);
		session()->setFlashdata('pesan', 'Data Calon Siswa berhasil di ubah');
		return redirect()->to('/Siswa');
	}
	public function identitasIbu($id_siswa)
	{

		$data = [
			'id_siswa' => $id_siswa,
			'nama_ibu' => $this->request->getVar('nama_ibu'),
			'nik_ibu' => $this->request->getVar('nik_ibu'),
			'pekerjaan_ibu' => $this->request->getVar('pekerjaan_ibu'),
			'penghasilan_ibu' => $this->request->getVar('penghasilan_ibu'),
			'pendidikan_ibu' => $this->request->getVar('pendidikan_ibu'),
			'nohp_ibu' => $this->request->getVar('nohp_ibu'),

		];
		$this->ModelSiswa->ubah($data);
		session()->setFlashdata('pesan', 'Data Calon Siswa berhasil di ubah');
		return redirect()->to('/Siswa');
	}
	public function alamat($id_siswa)
	{

		$data = [
			'id_siswa' => $id_siswa,
			'id_kecamatan' => $this->request->getVar('id_kecamatan'),
			'id_kabupaten' => $this->request->getVar('id_kabupaten'),
			'id_provinsi' => $this->request->getVar('id_provinsi'),
			'alamat' => $this->request->getVar('alamat'),

		];
		$this->ModelSiswa->ubah($data);
		session()->setFlashdata('pesan', 'Data Calon Siswa berhasil di ubah');
		return redirect()->to('/Siswa');
	}
	public function asalSekolah($id_siswa)
	{

		$data = [
			'id_siswa' => $id_siswa,
			'nama_sekolah' => $this->request->getVar('nama_sekolah'),
			'tahun_lulus' => $this->request->getVar('tahun_lulus'),
			'no_ijazah' => $this->request->getVar('no_ijazah'),
			'no_skhun' => $this->request->getVar('no_skhun'),

		];
		$this->ModelSiswa->ubah($data);
		session()->setFlashdata('pesan', 'Data Calon Siswa berhasil di ubah');
		return redirect()->to('/Siswa');
	}
	public function tambahFile($id_siswa)
	{
		if ($this->validate([
			'id_lampiran' => [
				'label' => 'Lampiran',
				'rules' => 'required',
				'errors' => [

					'required' => '{field}   Wajib Di isi',
				]
			],
			'berkas' => [
				'label' => 'Berkas',
				'rules' => 'ext_in[berkas,pdf]|max_size[berkas,9048]',
				'errors' => [
					'max_size' => '{field} Ukuran Foto lebih Dari 9048kb',
					'ext_in' => '{field}   Berkas Harus PDF',
				]
			],
		])) {
			//Merandom nama file
			$berkas = $this->request->getFile('berkas');
			$nama_file = $berkas->getRandomName();
			$data = array(
				'id_siswa' => $id_siswa,
				'berkas' => $nama_file,
				'id_lampiran' => $this->request->getVar('id_lampiran'),
				'keterangan' => $this->request->getVar('keterangan'),
			);
			$berkas->move('berkas', $nama_file); // directori PPDB public berkas
			$this->ModelSiswa->tambahBerkas($data);
			session()->setFlashdata("pesan", 'Berkas Berhasil Di Upload');
			return redirect()->to(base_url('/Siswa'));
			//jika tidak valid		
		} else {

			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to('/Siswa');
		}
	}
	public function hapusBerkas($id_berkas)
	{

		//Menghapus Foto Lama
		$berkas = $this->ModelSiswa->detailBerkas($id_berkas);
		if ($berkas['berkas'] != "") {
			unlink('berkas' . '/'  . $berkas['berkas']);
		}
		$data = array(
			'id_berkas' => $id_berkas

		);
		$this->ModelSiswa->hapusBerkas($data);
		session()->setFlashdata('pesan', 'data berhasil di Hapus');
		return redirect()->to(base_url('/Siswa'));
	}
	public function apply($id_siswa)
	{
		$data = array(
			'id_siswa' => $id_siswa,
			'status_pendaftaran' => '1'

		);
		$this->ModelSiswa->ubah($data);
		session()->setFlashdata('pesan', 'Pendaftaran Berhasil di kirim');
		return redirect()->to(base_url('/Siswa'));
	}
	public function bukti_lulus()
	{
		$data = array(
			'title' => 'PPDB Online',
			'subtitle' => 'Siswa',
			'siswa' => $this->ModelSiswa->getBiodataSiswa(),
			'setting' => $this->ModelAdmin->detailSetting()


		);
		return view('siswa/v_buktiLulus', $data);
	}
}
