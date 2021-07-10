<?php

namespace App\Controllers;

use App\Models\ModelBanner;
use CodeIgniter\Model;
use App\Models\ModelAdmin;

class Home extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelBanner = new ModelBanner();
		$this->ModelAdmin = new ModelAdmin();
	}
	public function index()
	{
		$data = array(
			'title' => 'Halaman Admin',
			'subtitle' => 'Home',
			'banner' => $this->ModelBanner->AllData(),
			'beranda' => $this->ModelAdmin->detailSetting(),
			'beranda' => $this->ModelAdmin->detailSetting(),
			'jml_pendaftaran' => $this->ModelBanner->jumlahPendaftar(),
			'jml_lakilaki' => $this->ModelBanner->jumlah_lakilaki(),
			'jml_perempuan' => $this->ModelBanner->jumlah_perempuan()


		);
		return view('v_home', $data);
	}
}
