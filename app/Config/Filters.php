<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'FilterUser' => \App\Filters\FilterUser::class,
		'FilterSiswa' => \App\Filters\FilterSiswa::class,
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			'FilterUser' => [
				'except' => [
					'auth', 'auth/*',
					'home', 'home/*',
					'ppdb', 'ppdb/*',
					'pendaftaran', 'pendaftaran/*',
					'petunjuk', 'petunjuk/*',
					'/'
				]
			],
			'FilterSiswa' => [
				'except' => [
					'auth', 'auth/*',
					'home', 'home/*',
					'ppdb', 'ppdb/*',
					'pendaftaran', 'pendaftaran/*',
					'petunjuk', 'petunjuk/*',
					'/'
				]
			]
		],
		'after'  => [
			'FilterUser' => [
				'except' => [
					'toolbar',
					'admin', 'admin/*',
					'pekerjaan', 'pekerjaan/*',
					'pendidikan', 'pendidikan/*',
					'Agama', 'Agama/*',
					'User', 'User/*',
					'Penghasilan', 'Penghasilan/*',
					'ta', 'ta/*',
					'jurusan', 'jurusan/*',
					'ppdb', 'ppdb/*',
					'banner', 'banner/*',
					'pendaftaran', 'pendaftaran/*',
					'JalurMasuk', 'JalurMasuk/*',
					'beranda', 'beranda/*',
					'lampiran', 'lampiran/*',
					'wilayah', 'wilayah/*',
					'Ppdb', 'Ppdb/*',
					// 'honeypot',
				]
			],
			'FilterSiswa' => [
				'except' => [
					'toolbar',
					'/',
					'auth', 'auth/*',
					'ppdb', 'ppdb/*',
					'pendaftaran', 'pendaftaran/*',
					'siswa', 'siswa/*',
					'Wilayah', 'Wilayah/*',
					// 'honeypot',
				]
			],

		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [];
}
