<?php
defined('BASEPATH') or exit('No direct script access allowed');

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// require 'vendor/autoload.php';
require APPPATH . '/third_party/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MenuModel');
		$this->load->model('KasirModel');
		$this->load->model('AdminModel');
		$this->load->model('SemuaModel');
		$this->load->model('TransaksiModel');
		$this->load->helper('url');
	}

	public function master_list_transaksi_export()
	{
		$status = $this->input->get('status', TRUE);
		$selectDate = $this->input->get('selectDate', TRUE);
		$date = $this->input->get('date', TRUE);
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$lisUser = $this->TransaksiModel->get_transaksi($status, $date);
		// $lisUser = $this->ProdukModel->get_transaksi_laptop();
		// var_dump($lisUser);
		// die;
		// looping list 
		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'Id Transaksi')
			->setCellValue('B1', 'Tanggal Transaksi')
			->setCellValue('C1', 'Kode Transaksi')
			->setCellValue('D1', 'Nama Kasir')
			->setCellValue('E1', 'Harga Total')
			->setCellValue('F1', 'Tipe Pesanan');
		$i = 1;
		foreach ($lisUser as $row) {
			$i++;
			// var_dump($row);die;

			$sheet->setCellValue('A' . $i, $row->id_transaksi);
			$sheet->setCellValue('B' . $i, $row->created_at);
			$sheet->setCellValue('C' . $i, $row->kode_transaksi);
			$sheet->setCellValue('D' . $i, $row->nama_kasir);
			$sheet->setCellValue('E' . $i, $row->harga_total);
			$sheet->setCellValue('F' . $i, $row->tipe_pesan);
		}

		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(11);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(17);
	
		$writer = new Xlsx($spreadsheet);
		$filename = 'List_Transaksi';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '' . $date . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output'); // download file 


	}
}
