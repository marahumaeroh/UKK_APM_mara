<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboardmasyarakat extends BaseController
{
	public function index()
	{
		$data['intro'] =
			'</br><div class="card"></br>
		<div class="card-header bg-info">
		<h1><i>Selamat Datang</i></h1>
		</div>
		<div class="card-body">
		<h5 class="card-title">Hai, ' . session()->get('username') . '</h5>
		<p class=card-text">Silahkan gunakan halaman ini untuk menampilkan informasi Pengaduan Masyarakat anda !</p>
		<p>1.pastikan NIK anda benar dan no telepon yang anda gunakan adalah nomer aktif.</p>
		<p>2.klik tombol "ajukan pengaduan".</p>
		<p>3.isilah form pengaduan,lalu cantumkan juga foto untuk menjadi bukti,lalu kirim.</p>
		<p>4.jika pengaduan telah selesai diproses data tanggapan akan tampil dihalaman pengaduan masyarakat.</p>
		<p>5.jika data yang anda kirimkan tidak sesuai,pengaduan anda akan ditolak.</p>
		<a href="/masyarakat/pengaduan" class="btn btn-danger">Ajukan pengaduan</a>
	  </div>';
		return view('Masyarakat/Dashboard', $data);
	}
}
