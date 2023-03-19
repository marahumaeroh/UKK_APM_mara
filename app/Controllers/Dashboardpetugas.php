<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengaduanModel;
use App\Models\Masyarakat;
use App\Models\PetugasModel;

class Dashboardpetugas extends BaseController
{
	// protected $helpers = ['custom'];
	public function dashboard()
	{
		$data['intro'] =
			'</br><div class="card"></br>
				<div style="background-color:#add8e6;">
				<h1><i>Selamat Datang</i></h1>
				</div>
				<div class="card-body">
				<h5 class="card-title">Hai, ' . session()->get('username') . '</h5>
				<p class="card-text">Silahkan gunakan halaman ini untuk menampilkan informasi Pengaduan Masyarakat anda !</p>
				<a href="/verifikasi" class="btn btn-danger">Beri Tanggapan</a>
			  </div>';
		return view('dashboard_p', $data);
	}
	public function index()
	{
		$data['intro'] =
			'</br>
	<div class="header-body">
		<div class="row">

			<div class="col-lg-3 col-xs-6">
				<div class="card bg-info">
					<div class="col-xs-3">
						<div class="card-header bg-info">
							<i class="fa fa-solid fa-user-plus fa-3x text-white"></i>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="card-body">
							<h5 class="card-title text-white">Data Masyarakat</h5>
							<h2 class="text-white"> ' . countdata('masyarakat') . '</h2>
							<p class="card-text"></p>
							<hr>
							<a href="/petugas/masyarakat" class="text-white">Lihat Rincian<i class="fa fa-arrow-right text-end"></i></a>
						</div>
					</div>
				</div>
			</div>
			</br>
			<div class="col-lg-3 col-xs-6">
				<div class="card bg-info">
					<div class="col-xs-3">
						<div class="card-header bg-info">
							<i class="fa fa-solid fa-user-plus fa-3x text-white"></i>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="card-body">
							<h5 class="card-title text-white">Data Petugas</h5>
							<h2 class="text-white">' . countdata('petugas') . '</h2>
							</h2>
							<p class="card-text"></p>
							<hr>
							<a href="/petugas/user" class="text-white">Lihat Rincian<i class="fa fa-arrow-right text-end"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<div class="card bg-info">
					<div class="col-xs-3">
						<div class="card-header bg-info">
							<i class="fa fa-book fa-3x text-white"></i>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="card-body">
							<h5 class="card-title text-white">Data pengaduan</h5>
							<h2 class="text-white">' . countdata('pengaduan') . '</h2>
							<p class="card-text"></p>
							<hr>
							<a href="/verifikasi" class="text-white">Lihat Rincian<i class="fa fa-arrow-right text-end"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<div class="card bg-info">
					<div class="col-xs-3">
						<div class="card-header bg-info">
							<i class="fa fa-check-circle fa-3x text-white"></i>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="card-body">
							<h5 class="card-title text-white">Data Tanggapan</h5>
							<h2 class="text-white">' . countdata('tanggapan') . '</h2>
							</h2>
							<p class="card-text"></p>
							<hr>
							<a href="/respon" class="text-white">Lihat Rincian<i class="fa fa-arrow-right text-end"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>';
		return view('dashboard', $data);
	}
}
