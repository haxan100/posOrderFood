<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Kasir extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MenuModel');
		$this->load->model('SemuaModel');
		$this->load->model('ProdukModel');
		$this->load->model('CartModel');
		// $this->load->model('SekolahModel');
		$this->load->helper('url');
	}

public function index()
{	
	$data['konten'] = $this->SemuaModel->getSeting();
	$cart= $this->CartModel->getCart();
	$data['totalcart'] = count($cart);
	$d = 0 ;
	// var_dump($cart);die;
	foreach ($cart as $da ) {
			$d += $da->total;
	}
	$totalHarga = $d;
	$data['totalHarga'] = $d;


	// for ($i=0; $i < $totalcart; $i++) { 
	// 	$d += $cart['id_produk'] ;
	// }
	// var_dump($d);die;

                $this->load->view('Kasir/headers',$data);
                $this->load->view('Kasir/index', $data);
                $this->load->view('Kasir/footer', $data);
				
}
	public function getProduk()
	{
		$id_kategori = $this->input->post('id_kategori', true);
		$page = $this->input->post('page', true);
		
		$hasil = "";
		$hasil = $this->ProdukModel->getProdukByIdTipeProduk($id_kategori, $page);
		$data = array();

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
        
                            