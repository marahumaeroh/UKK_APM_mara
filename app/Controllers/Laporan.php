<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends BaseController
{
	protected $helpers = ['custom'];
	public function index()
	{
		return view('/petugas/laporan');
	}

	public function pengaduanTampil()
	{
		$this->tanggapan->join('pengaduan', 'pengaduan.id_pengaduan=tanggapan.id_pengaduan');
		$this->tanggapan->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
		$this->tanggapan->join('petugas', 'petugas.id_petugas=tanggapan.id_petugas');
		$data['listPengaduan'] =
			$this->tanggapan->where('tanggapan.tgl_tanggapan', $this->request->getPost('txtTglPengaduan'))->findAll();
		$arrBulan = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember'];

		$htmlData = null;
		$no = null;
		$htmlData .= '<p>Berikut adalah laporan Pengaduan yang sudah selesai tanggal ' . $this->request->getPost('txtTglPengaduan') . ' :</p>';

		$htmlData .= '<table class="table table-sm table-bordered">';
		$htmlData .= '<thead class="bg-light">
						<tr class="bg-secondary text-center">
						<th>No</th>
						<th>Nik</th>
						<th>Nama</th>
						<th>Petugas</th>
						<th>Tanggal Masuk</th>
						<th>Tanggal Ditanggapi</th>
						<th>Status</th>
						</tr>
					</thead>
					<tbody>';

		foreach ($data['listPengaduan'] as $row) {
			$no++;
			$htmlData .= '<tr class="text-center">';
			$htmlData .= '<td>' . $no . '</td>';
			$htmlData .= '<td>' . $row['nik'] . '</td>';
			$htmlData .= '<td>' . $row['nama'] . '</td>';
			$htmlData .= '<td>' . $row['nama_petugas'] . '</td>';
			$htmlData .= '<td>' . $row['tgl_pengaduan'] . '</td>';
			$htmlData .= '<td>' . $row['tgl_tanggapan'] . '</td>';
			$htmlData .= '<td>' . $row['status'] . '</td>';
			$htmlData .= '</tr>';
		}
		$htmlData .= '
					</tbody>
					</table>';

		$htmlData .= '<p>
		
		<button href"/print" onclick="window.print()" class="btn btn-danger btn-sm mr-2"<i class="fa-sharp fa-regular fa-print"></i>Print</button>
		</p>';
		echo $htmlData;
	}
	public function excel($tanggal)
	{
		$this->tanggapan->join('pengaduan', 'pengaduan.id_pengaduan=tanggapan.id_pengaduan');
		$this->tanggapan->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
		$this->tanggapan->join('petugas', 'petugas.id_petugas=tanggapan.id_petugas');
		$listPengaduan =
			$this->tanggapan->where('tanggapan.tgl_tanggapan', $tanggal)->findAll();
		$arrBulan = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

		$spreadsheet = new Spreadsheet();

		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'Nik')
			->setCellValue('B1', 'Nama')
			->setCellValue('C1', 'Petugas')
			->setCellValue('D1', 'Tanggal Masuk')
			->setCellValue('E1', 'Tanggal Ditanggapi')
			->setCellValue('F1', 'Status');

		$column = 2;

		foreach ($listPengaduan as $row) {
			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $column, $row['nik'])
				->setCellValue('B' . $column, $row['nama'])
				->setCellValue('C' . $column, $row['nama_petugas'])
				->setCellValue('D' . $column, $row['tgl_pengaduan'])
				->setCellValue('E' . $column, $row['tgl_tanggapan'])
				->setCellValue('F' . $column, $row['status']);

			$coulumn++;
		}

		$writer = new Xlsx($spreadsheet);
		$filename = 'Laporan-' . $tanggal;

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attchment;filename=' . $filename . '.xlsx');

		$writer->save('php://output');
	}
}// <a href="/laporan/download-excel/' . $this->request->getPost('txtTglPengaduan') . '" class="btn btn-success btn-sm mr-2">Export Ke Excel</a>
