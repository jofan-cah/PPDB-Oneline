<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelWilayah;

class Wilayah extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelWilayah = new ModelWilayah();
    }
    public function dataKabupaten($id_provinsi)
    {
        $data = $this->ModelWilayah->getKabupaten($id_provinsi);
        echo '<option value=""> ----PilihKabupaten----</option>';
        foreach ($data as $key => $value) {
            echo  '<option value="' . $value['id_kabupaten'] . '">' . $value['nama_kabupaten'] . '</option>';
        }
    }
    public function dataKecamatan($id_kabupaten)
    {
        $data = $this->ModelWilayah->getKecamatan($id_kabupaten);
        echo '<option value=""> ----Pilih Kecamatan----</option>';
        foreach ($data as $key => $value) {
            echo  '<option value="' . $value['id_kecamatan'] . '">' . $value['nama_kecamatan'] . '</option>';
        }
    }
}
