<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;
use App\Models\ModelPpdb;
use App\Models\ModelSiswa;


class Ppdb extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelPpdb = new ModelPpdb();
        $this->ModelSiswa = new ModelSiswa();
    }
    public function masuk()
    {
        $data = array(
            'title' => 'Halaman Admin',
            'subtitle' => 'Peserta Masuk',
            'ppdb' => $this->ModelPpdb->getPpdbMasuk(),

        );
        return view('Admin/Ppdb/v_masuk', $data);
    }
    public function detail($id_siswa)
    {
        $data = array(
            'title' => 'Halaman Admin',
            'subtitle' => 'Detail Data Siswa',
            'siswa' => $this->ModelPpdb->detailSiswa($id_siswa),
            'validation' => \Config\Services::validation(),
            'berkas' => $this->ModelPpdb->lampiran($id_siswa),

        );
        return view('Admin/Ppdb/v_detail', $data);
    }
    public function diterima($id_siswa)
    {
        $data = array(
            'id_siswa' => $id_siswa,
            'status_ppdb' => '1'
        );
        $this->ModelPpdb->ubah($data);
        session()->setFlashdata("diterima", 'Siswa Berhasil Di terima');
        return redirect()->to(base_url('/Ppdb/masuk'));
    }
    public function ditolak($id_siswa)
    {
        $data = array(
            'id_siswa' => $id_siswa,
            'status_ppdb' => '2'
        );
        $this->ModelPpdb->ubah($data);
        session()->setFlashdata("ditolak", 'Siswa Di tolak');
        return redirect()->to(base_url('/Ppdb/masuk'));
    }

    public function listDiterima()
    {
        $data = array(
            'title' => 'Halaman Admin',
            'subtitle' => 'Peserta Diterima',
            'ppdb' => $this->ModelPpdb->getPpdbDiterima(),
        );
        return view('Admin/Ppdb/v_listDiterima', $data);
    }
    public function listDitolak()
    {
        $data = array(
            'title' => 'Halaman Admin',
            'subtitle' => 'Peserta Ditolak',
            'ppdb' => $this->ModelPpdb->getPpdbDitolak(),
        );
        return view('Admin/Ppdb/v_listDitolak', $data);
    }
    public function laporan()
    {
        $data = array(
            'title' => 'Halaman Admin',
            'subtitle' => 'Laporan Kelulusan',
            'ta' => $this->ModelPpdb->AllDataTa(),

        );
        return view('Admin/Ppdb/v_laporan', $data);
    }
    public function Cetaklaporan($tahun)
    {
        $data = array(
            'title' => 'Halaman Admin',
            'tahun' => $tahun,
            'subtitle' => 'Laporan Kelulusan',
            'siswa' => $this->ModelPpdb->getDataLaporan($tahun),
            'setting' => $this->ModelAdmin->detailSetting(),



        );
        return view('Admin/Ppdb/v_cetaklaporan', $data);
    }
}
