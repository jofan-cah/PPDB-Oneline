<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLampiran;

class Lampiran extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelLampiran = new ModelLampiran();
    }
    public function index()
    {
        $data = array(
            'title' => 'Halaman Admin',
            'subtitle' => 'Lampiran',
            'lampiran' => $this->ModelLampiran->AllData(),
            'validation' => \Config\Services::validation()->getErrors(),
        );
        return view('admin/v_lampiran', $data);
    }
    public function tambah()
    {
        $data = array(
            'lampiran' => $this->request->getPost('lampiran')

        );
        if ($this->validate([
            'lampiran' => [
                'label' => 'Lampiran',
                'rules' => 'required|is_unique[tbl_lampiran.lampiran]',
                'errors' => [
                    'required' => '{field} Wajib Di isi !!!',
                    'is_unique' => '{field} Sudah Ada Coba Nama baru'


                ],
            ]
        ])) {
            $this->ModelLampiran->tambah($data);
            session()->setFlashdata('pesan', 'Lampiran Berhasil ditambahkan');
            return redirect()->to(base_url('Lampiran'));
        } else {
            //jika Tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Lampiran'));
        }
    }
    public function ubah($id_lampiran)
    {
        $data = array(
            'id_lampiran' => $id_lampiran,
            'lampiran' => $this->request->getVar('lampiran')
        );
        $this->ModelLampiran->ubah($data);
        session()->setFlashdata("pesan", 'Data Berhasil Di ubah');
        return redirect()->to(base_url('/lampiran'));
    }
    public function hapus($id_lampiran)
    {
        $data = array(
            'id_lampiran' => $id_lampiran

        );
        $this->ModelLampiran->hapus($data);
        session()->setFlashdata('pesan', 'data berhasil di Hapus');
        return redirect()->to(base_url('/lampiran'));
    }
}
