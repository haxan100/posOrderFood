<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MenuModel');
		$this->load->model('SemuaModel');
		// $this->load->model('WaliModel');
		// $this->load->model('GuruModel');
		// $this->load->model('SekolahModel');
		$this->load->helper('url');
	}

public function index()
	{
			$obj['ci'] = $this;
			$obj['content'] =  "admin/blank";

			$this->load->view('admin/templates/index', $obj);
	} 
	public function master_admin()
	{
		$obj['ci'] = $this;
		$obj['content'] = 'admin/master_admin';
		$this->load->view('admin/templates/index', $obj);
	}
	public function master_item()
	{
		$obj['listKategori'] = $this->MenuModel->getKategori();
		$obj['ci'] = $this;
		$obj['content'] = 'admin/master_item';
		$this->load->view('admin/templates/index', $obj);
	}
	public function tambah_menu_proses()
	{
		$nama = $this->input->post('nama', TRUE);
		$id_kategori = $this->input->post('id_kategori', TRUE);
		$harga = $this->input->post('harga', TRUE);

		$status = true;

		if ($nama == null) {
			$status = false;
			$message = "Harap Masukan Nama!";
			// die("sss");
		}
		if ($id_kategori == null) {
			$status = false;
			$message = "Harap Pilih Kategori!";
			// die("sss");
		}
		if ($harga == null) {
			$status = false;
			$message = "Harap Masukan Harga!";
			// die("sss");
		}		

		$cekFoto = empty($_FILES['foto']['name'][0]) || $_FILES['foto']['name'][0] == '';
		if (!$cekFoto) {

			$_FILES['f']['name']     = $_FILES['foto']['name'];
			$_FILES['f']['type']     = $_FILES['foto']['type'];
			$_FILES['f']['tmp_name'] = $_FILES['foto']['tmp_name'];
			$_FILES['f']['error']     = $_FILES['foto']['error'];
			$_FILES['f']['size']     = $_FILES['foto']['size'];
			$config['upload_path']          = './assets/images/foods';
			$config['allowed_types']        = 'jpg|jpeg|png|gif';
			$config['max_size']             = 3 * 1024;
			$config['max_width']            = 10 * 1024;
			$config['max_height']           = 10 * 1024;
			$config['file_name'] = $nama . "-" . date("Y-m-d-H-i-s") . ".jpg";
			$this->load->library('image_lib');
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->image_lib->resize();

			if (!$this->upload->do_upload('f')) {
				$errorUpload = $this->upload->display_errors() . '<br>';
				$status = false;
				$errorInputs[] = array('#foto', $errorUpload);
			} else {
				// var_dump($status);die;
				if ($status) {
					// Uploaded file data
					$fileName = $this->upload->data()["file_name"];
					$foto = array(
						'foto' => $fileName,
					);
					$in = array(
						'foto' => $fileName,
						'nama_menu' => $nama,
						'id_kategori' => $id_kategori,
						'harga' => $harga,
						'created_at' => date("Y-m-d H:i:s"),
					);
					$this->SemuaModel->Tambah('menu',$in);
					
					$message = "Berhasil Menambah  #1";
				}else{

					$message = "Gagal!  #1";
				}
			}
		} else {
			$message = "Harap Upload Foto!";
			$status = false;
		}

		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));



		# code...
	}
}
        
    /* End of file  Admin.php */
        
                            