<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Cart extends CI_Controller {
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
			$id_user = 1 ;
			$cart = $this->CartModel->getCart($id_user);
			$data['totalcart'] = count($cart);
			$d = 0;
			// echo json_encode($cart);die;
			// var_dump($cart);die;
			foreach ($cart as $da) {
				$d += $da->total;
			}
			$totalHarga = $d;
			$data['totalHarga'] = $d;
		$data['cart_content']      = $cart;
		$this->load->view('Kasir/headers',$data);
		  $this->load->view('keranjang/all');
		// $cart_content = $this->cart->contents();

		// if ($cart_content) {
		// 	$total_qty   = 0;
		// 	$total_waktu = 0;
		// 	foreach ($cart_content as $key => $value) {
		// 		// var_dump($value['wak']);die;
		// 		$waktu                          =1;
		// 		$qty                            = 1;
		// 		$cart_content[$key]['waktu']    = $waktu;
		// 		$cart_content[$key]['qty']      = $qty;
		// 		$cart_content[$key]['subtotal'] = number_format($value['price'] * $value['qty'], 0, '', ',');
		// 		$total_qty += $qty;
		// 		$total_waktu += $waktu;
		// 	}

		// 	$data['total_waktu']             = $total_waktu;
		// 	$data['total_qty']               = $total_qty;
		// 	$this->data['cart_count']        = count($cart_content);
		// 	$this->data['total_waktu']       = $total_waktu;
		// 	$this->data['total_qty']         = $total_qty;
		// 	$this->data['cart_content']      = $cart_content;
		// 	$this->data['cart_total']        = $this->cart->total();
		// 	$this->data['cart_total_format'] = number_format($this->cart->total(), 0, '', '.');
		// 	$this->data['resto_meja']        = $this->db->get('resto_meja')->result();
		// 	$this->data['cart_total']        = $this->cart->total();
		// 	$data['review_content']          = $this->parser->parse('keranjang/review_content.html', $this->data, true);
		// 	// $this->template_front->display('front/checkout/review', $data);
		// }
	            
}
public function checkout()
{
	
		$id_user = 1 ;
		$cart = $this->CartModel->getCart($id_user);
		$data['cart_content']      = $cart;
		$data['totalcart'] = count($cart);
		$d = 0;
		// echo json_encode($cart);die;
		// var_dump($cart);die;
		foreach ($cart as $da) {
			$d += $da->total;
		}
		$totalHarga = $d;
		$data['totalHarga'] = $d;
		

		$this->load->view('Kasir/headers',$data);
	  	// $this->load->view('keranjang/all');
		// $this->load->view('keranjang/cekoutOLD');
		$this->load->view('keranjang/cekout');
	
}
public function hapusSatuKeranjang()
{
	$id_user = 1;
	// var_dump($_POST);die;
	$id_produk = $this->input->post('id', TRUE);
	$msg = "Gagal Hapus";
	$status = false;
	if($this->SemuaModel->HapusCartSatu($id_user, $id_produk)){

		$msg = "Item Berhasil di Tambah Ke Keranjang";
		$status = true;

	}

		$data = array(
			'status' => $status,
			'msg' => $msg,
		);
		echo json_encode($data);


	# code...
}
public function updateCart()
{
	$id_user = 1;
	// var_dump($_POST);die;
	$id_produk = $this->input->post('id', TRUE);
	$qty = $this->input->post('qty', TRUE);
	$in = array('qty' => $qty );
	$id_user = 1 ;

	$msg = "Gagal Update";
	$status = false;
	$getData = $this->CartModel->getAllCartByUser($id_user);
	$TotalgetData = count($this->CartModel->getAllCartByUser($id_user));
	$cart= $this->CartModel->getCart();
	$totalHarga =	" ";

	if($this->CartModel->updateCartByIDprodAndUser($in,$id_produk,$id_user)){
		$status = true;
		$msg = " berhasil merubah";
		

		$cart = $this->CartModel->getCart($id_user);
			$data['totalcart'] = count($cart);
			$d = 0;
			foreach ($cart as $da) {
				$d += $da->total;
			}
			$totalHarga 			= $d;
			$data['totalHarga'] 	= $d;
			$data['cart_content'] 	= $cart;
			$totalHarga				= $d;
	}

		$data = array(
			'status' => $status,
			'msg' => $msg,
			'data' => $getData,
			'harga' => $totalHarga,
		);
		echo json_encode($data);


	# code...
}
        
}
        
    /* End of file  Cart.php */
        
                            