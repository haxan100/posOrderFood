<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Kasir extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MenuModel');
		$this->load->model('SemuaModel');
		$this->load->model('ProdukModel');
		// $this->load->model('GuruModel');
		// $this->load->model('SekolahModel');
		$this->load->helper('url');
	}

public function index()
{
                $this->load->view('Kasir/index');
				
}
	public function getProduk()
	{
		$sort = $this->input->post('sort', true);
		$hasil = "";
		switch ($sort) {
			case '0':
				$hasil = $this->ProdukModel->getProdukByIdTipeProduk("p.harga_awal ASC");
				break;
			case '1':
				$hasil = $this->ProdukModel->getProdukByIdTipeProduk("p.qty ASC");
				break;
			case '2':
				$hasil = $this->ProdukModel->getProdukByIdTipeProduk("p.nama_produk ASC");
				break;
			case '3':
				$hasil = $this->ProdukModel->getProdukByIdTipeProduk("p.nama_produk DESC");
				break;
			case '4':
				$hasil = $this->ProdukModel->getProdukByIdTipeProduk("p.harga ASC");
				break;
			case '5':
				$hasil = $this->ProdukModel->getProdukByIdTipeProduk("p.harga DESC");
				break;
			default:
				$hasil = $this->ProdukModel->getProdukByIdTipeProduk($sort);
				break;
		}
		$status = false;
		// var_dump($hasil);die;
		if (count($hasil) > 0) {
			$status = true;
			$data = $hasil;
		}
		echo json_encode(array(
			'status' => $status,
			'data' => $data
		));
	}
        
}
        
    /* End of file  Kasir.php */
        
                            