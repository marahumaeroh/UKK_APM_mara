<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UploadModel;

class Controllermasyarakat extends BaseController
{
	protected $model_upload;

	public function __construct()
	{

		// Memanggil form helper
		helper('form');
		// Menyiapkan variabel untuk menampung upload model
		$this->model_upload = new UploadModel();
	}
	public function laporan()
	{
		$n = session()->get('nama');
		$this->tanggapan->join('pengaduan', 'pengaduan.id_pengaduan=tanggapan.id_pengaduan');
		$this->tanggapan->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
		$this->tanggapan->join('petugas', 'petugas.id_petugas=tanggapan.id_petugas');
		$data['ListPengaduan'] = $this->tanggapan->where('nama', $n)->findAll();

		return view('/Masyarakat/Laporan', $data);
	}
	public function index()
	{
		return view('login');
	}
	public function register()
	{
		$data = [
			'validation' => \Config\Services::validation()
		];

		return view('register', $data);
	}
	public function login()
	{
		helper(['form']);
		$aturan = ['txtUsername' => 'required', 'txtPassword' => 'required'];
		if ($this->validate($aturan)) {
			$syarat = ['username' => $this->request->getPost('txtUsername'), 'password' => md5($this->request->getPost('txtPassword'))];
			$Userpetugas = $this->petugas->where($syarat)->find();
			$Usermasyarakat = $this->masyarakat->where($syarat)->find();

			if (count($Userpetugas) == 1) {
				$session_data = [
					'id_petugas' => $Userpetugas[0]['id_petugas'],
					'username' => $Userpetugas[0]['username'],
					'level'    => $Userpetugas[0]['level'], 'sudahkahLogin' => TRUE
				];
				session()->set($session_data);
				if (session()->get('level') == 'admin') {
					return redirect()->to('/dashboard');
				} else {
					session()->setFlashdata('msg', 'Login Sukses!');
					return redirect()->to('/petugas/dashboard');
				}
			} elseif (count($Usermasyarakat) == 1) {
				$session_data = [
					'nik' => $Usermasyarakat[0]['nik'],
					'username' => $Usermasyarakat[0]['username'],
					'nama'    => $Usermasyarakat[0]['nama'], 'sudahkahLogin' => TRUE
				];
				session()->set($session_data);
				return redirect()->to('/masyarakat/dashboard');
			} else {
				session()->setFlashdata('msg', 'Username & Password Salah');
				return redirect()->to('/');
			}
			session()->setFlashdata('msg', 'Username & Password Salah');
			return redirect()->to('/');
		}
	}
	public function logout()
	{
		session()->destroy();
		return redirect()->to('/');
	}
	public function daftar()
	{
		if (!$this->validate([
			'username' => 'required|is_unique[masyarakat.username]',
			'nik' => 'required|is_unique[masyarakat.nik]',
		])) {
			$validation =  \Config\Services::validation();
			// dd($validation);
			session()->setFlashdata('slh', 'username yang anda pakai sudah terdaftar');
			return redirect()->to('/register')->withInput()->with('validation', $validation);
		}
		$data = [
			'nik' => $this->request->getPost('txtNik'),
			'nama' => $this->request->getPost('txtNama'),
			'username' => $this->request->getPost('txtUsername'),
			'password' => md5($this->request->getPost('txtPassword')),
			'telp' => $this->request->getPost('txtTelp')
		];
		$this->masyarakat->insert($data);
		session()->setFlashdata('msg', 'Registrasi Berhasil, Silahkan Login.!');
		return redirect()->to('/');
	}

	public function pengaduan()
	{
		if (!session()->get('sudahkahLogin')) {
			return redirect()->to('/');
			exit;
		}
		if (!$this->validate([])) {
			$n = session()->get('nama');
			$data['validation'] = $this->validator;
			$data['uploads'] = $this->model_upload->get_uploads();
			$this->pengaduan->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
			$this->pengaduan->join('tanggapan', 'tanggapan.id_pengaduan=pengaduan.id_pengaduan');
			$data['listPengaduan'] = $this->pengaduan->where('nama', $n)->findAll();
			echo view('Masyarakat/v_pengaduan', $data);
		}
	}
	public function process()
	{

		if ($this->request->getMethod() !== 'post') {
			return redirect()->to(base_url('upload'));
		}

		$validated = $this->validate([
			'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]'
		]);

		if ($validated == FALSE) {

			// Kembali ke function index supaya membawa data uploads dan validasi
			return $this->index();
		} else {
			$avatar = $this->request->getFile('file_upload');
			$avatar->move(ROOTPATH . 'public/uploads');

			$data = [
				'nik' => session()->get('nik'),
				'foto' => $avatar->getName(),
				'isi_laporan' => $this->request->getPost('txtInputPengaduan'),
				'tgl_pengaduan' => $this->request->getPost('tanggal')
			];

			$this->model_upload->insert_gambar($data);
			return redirect()->to(base_url('/masyarakat/pengaduan'))->with('success', 'Upload successfully');
		}
	}
	public function tampilrespon($idtanggapan)
	{
		if (!session()->get('sudahkahLogin')) {
			return redirect()->to('/');
			exit;
		}
		$this->tanggapan->join('pengaduan', 'pengaduan.id_pengaduan=tanggapan.id_pengaduan');
		$this->tanggapan->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
		$this->tanggapan->join('petugas', 'petugas.id_petugas=tanggapan.id_petugas');
		$data['detail'] = $this->tanggapan->where('id_tanggapan', $idtanggapan)->findAll();
		return view('Masyarakat/tampilrespon', $data);
	}

	public function profile()
	{

		$nik = session()->get('nik');
		$data = [
			'masyarakat' => $this->masyarakat->where(['nik' => $nik])->get()->getRowArray()
		];
		return view('Masyarakat/akun', $data);
	}

	public function proses_edit_pass()
	{

		$nik = session()->get('nik');
		// dd($nip);
		$pass_old = md5($this->request->getPost('pass_old'));
		$pass_old2 = $this->request->getPost('pass_old2');
		$pass_new = $this->request->getPost('pass_new');
		$pass_new2 = $this->request->getPost('pass_new2');
		$username = $this->request->getPost('username');

		$input_update = [
			'password' => md5($pass_new2),
			'username' => $username
		];
		// dd($input_update);

		if ($pass_old == $pass_old2) {
			if ($pass_new == $pass_new2) {
				$kondisi_nik = ['nik' => $nik];
				$this->masyarakat->where($kondisi_nik)->set($input_update)->update();

				//jika berhasil tampilkan pesan ini
				session()->setFlashdata('success', 'Akun berhasil diupdate');

				//setelah berhasil update alihkan halaman ke ...
				return redirect()->to('/masyarakat/dashboard'); //yg ttik sesuaiin sm routes
			} else {
				//jika password baru yang diinputkan tdak sama, maka

				//1. tamplkan pesan gagal
				session()->setFlashdata('warning', 'Password baru yang diinputkan tidak sama');

				//2. tetap alihkan ke halaman  trsebut karna password gagal terupdate
				return redirect()->to(base_url('/Akun'));
			}
		} else {
			//jika password lama yang diinputkan tidak sama, maka

			// 1. tamplan pesan gagal
			session()->setFlashdata('warning', 'Password lama yang diinputkan tidak sama');

			//2. tetap alihkan ke halaman tersebut karena password gagal terupdate
			return redirect()->to(base_url('/Akun'));
		}
	}
}

	// 	'nama' => 'require|is_unique[]'
		// 		// 'rule' => 'max_lenght[200]',
		// 		// 'errors' => [
		// 		// 	'max_length' => 'Nama terlalu panjang'
		// 		]
		// 	],

		// 	'username' => 'require|is_unique[masyarakat.username]',
		// 		'rules' => 'require|is_unique[masyarakat.username]|max_lenght[200]',
		// 		'errors' => [
		// 			'require' => 'Username harus diisi',
		// 			'is_unique' => 'Username yag anda masukkan sudah terdaftar',
		// 			'max_length' => 'username terlalu panjang'
		// 		]
		// 	],

		// 	'password' => [
		// 		'rules' => 'max_lenght[200]',
		// 		'errors' => [
		// 			'max_length' => 'password terlalu panjang'
		// 		]
		// 	],

		// 	'nik' => [
		// 		'rules' => 'require|is_unique[masyarakat.nik]|max_lenght[200]',
		// 		'errors' => [
		// 			'require' => 'nik harus diisi',
		// 			'is_unique' => 'nik yag anda masukkan sudah terdaftar',
		// 			'max_length' => 'nik terlalu panjang'
		// 		]
		// 	],

		// 	'telp' => [
		// 		'rules' => 'require|is_unique[masyarakat.telp]|max_lenght[200]',
		// 		'errors' => [
		// 			'require' => 'telp Harus diisi.',
		// 			'is_unique' => 'telp yag anda masukkan sudah terdaftar',
		// 			'max_length' => 'telp terlalu panjang'
		// 		]
		// 	]
		// ])) {
		// 	$validasi =  \Config\Services::validation();
		// 	session()->setFlashdata('list_errors', $this->validasi->listErrors('template_validasi'));
		// 	return redirect()->to('register')->with('validation', $validasi);
		// } else {
		// 	$input = [
		// 		$nama = $this->request->getPost('txtNama'),
		// 		$username =  $this->request->getPost('txtUsername'),
		// 		$password = md5($this->request->getPost('txtPassword')),
		// 		$nik = $this->request->getPost('txtNik'),
		// 		$telp = $this->request->getPost('txtTelp')
		// 	];
		// $data = [
			// 	'nik' => $nik,
			// 	'nama' => $nama,
			// 	'username' => $usernam,
			// 	'password' => $password,
			// 	'telp' => $telp
			// ];

			// // $this->masyarakat->update($this->request->getPost('txtNik'), $data);
			// $cekNik = $this->masyarakat->where($data['nik'])->find();