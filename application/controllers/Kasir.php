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
		$this->load->library('session');
	}

public function index()
{	
	$sess =  $this->session->userdata('user_session');
	if($sess==null){
		
		redirect('Kasir/Login','refresh');
		
	}
	$id_user =  $this->session->userdata('id_kasir') ;
	// var_dump($id_user);die;
	$data['konten'] = $this->SemuaModel->getSeting();
	$data['slider'] = $this->SemuaModel->getSlider();

	$cart= $this->CartModel->getCart($id_user);
	$data['totalcart'] = count($cart);
	$d = 0 ;
	foreach ($cart as $da ) {
			$d += $da->total;
	}
	$totalHarga = $d;
	$data['totalHarga'] = $d;
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
	public function login()
	{
		// var_dump($_SESSION);die;
                $this->load->view('Kasir/Login');

	}
	public function LoginAct()
	{
		$now  =  date("Y-m-d h:m:s");
		// var_dump($now);die;
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);
		$data = $this->SemuaModel->getKasirByUNandPW($username,$password);
		if($data==null){
			$data = null;
			$pesan = "Username Dan Password salah!";
			$error =  true;
		}else{
			$data = $data;
			$pesan = "Selamat Datang Kasir";
			$error = false;

			$session = array(
				'user_session' => true, 
				'id_kasir' => $data->id_kasir,
				'nama_kasir' => $data->nama_kasir,
			);
			$upd = array('last_login' => $now );
			$this->SemuaModel->EditData('kasir','id_kasir',$upd,$data->id_kasir);
			$this->session->set_userdata($session); 

		}
		echo json_encode(array(
			'error' => $error,
			'data' => $data,
			'pesan' => $pesan
		));

		# code...
	}
	public function logout()
	{

		$this->session->sess_destroy();
	
			$error = false;
			$pesan =" berhasil kerluar";

		echo json_encode(array(
			'error' => $error,
			'pesan' => $pesan
		));
	}
        
}
        
    /* End of file  Kasir.php */
        
                            