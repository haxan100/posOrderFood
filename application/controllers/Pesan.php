<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Pesan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MenuModel');
		$this->load->model('KasirModel');
		$this->load->model('AdminModel');
		$this->load->model('SemuaModel');
		$this->load->model('CartModel');
		$this->load->helper('url');
	}
public function index()
{
                
}
public function setBid()
{
	// var_dump($_POST);die;
	$id_produk = $this->input->post('id_produk', TRUE);
	$harga = $this->input->post('harga', TRUE);
	$qty = $this->input->post('qty', TRUE);
	$now = date('Y-m-d H:i:s');
	$id_user = $this->session->userdata('id_kasir');
	// var_dump($id_user);die;
	// $id_user = 1;
	$tgl = $now;
	$keranjangOld = $this->CartModel->getCartByIdUserAndProduk($id_user, $id_produk);
		$getHargaByIdProd = $this->CartModel->getProdByIdProd($id_produk)->harga;
		// var_dump($getHargaByIdProd);
		// die;
	$getData = $this->CartModel->getAllCartByUser($id_user);
	$TotalgetData = count($this->CartModel->getAllCartByUser($id_user));
	$cart= $this->CartModel->getCart($id_user);
	
	$d = 0 ;
	// var_dump($cart);die;
	
	foreach ($cart as $da ) {
		$d += $da->total;
	}
	
	$totalHarga = $d;

	// var_dump($totalHarga);die;

	$hargaSemua = $totalHarga + $getHargaByIdProd; 
	$totalsemua = $TotalgetData + 1;
	if (count($keranjangOld) >= 1) {  // jika di keranjang ada produk , maka di updte qty nya
		$qtyOld = $keranjangOld[0]->qty;
		$qtyNew = $qtyOld + $qty;
		$upd  = array(
			'qty' => $qtyNew,
		);
		$this->CartModel->updateCart($upd, $id_produk);

		$msg = "Item Berhasil di Tambah Ke Keranjang";
		$status = true;
	} else {
		$data2 = array(
			'id_produk' => $id_produk,
			'id_user' => $id_user,
			'qty' => $qty,
			'created_at' => $tgl,
		);

		if ($this->CartModel->AddCart($data2)) {
			$msg = "Item Berhasil di Tambah Ke Keranjang";
			$status = true;
		} else {
			$msg = "Item Gagal di Tambah Ke Keranjang";
			$status = false;
		}
	}
	$data = array(
		'status' => $status,
		'msg' => $msg,
		'data' => $getData,
		'total' => $totalsemua,
		'harga' => $hargaSemua,
	);
	echo json_encode($data);
}

        
}
                            