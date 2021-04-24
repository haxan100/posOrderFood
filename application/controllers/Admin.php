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
	public function hapusMenu()
	{
		$id_menu = $this->input->post('id_menu', TRUE);
		$data = $this->SemuaModel->getDataById('menu','id_menu',$id_menu);
		$status = false;

		$message = 'Gagal menghapus Data!';
		if (count($data) == 0) {
			$message .= '<br>Tidak terdapat Data yang dimaksud.';
		} else {
			$this->SemuaModel->HapusData('menu','id_menu',$id_menu);

			$status = true;
			$message = 'Berhasil menghapus Data: <b>' . $data[0]->nama_menu . '</b>';
		}
		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));
	}
	public function ubah_menu_proses()
	{
		$id_menu = $this->input->post('id_menu', TRUE);
		$nama = $this->input->post('nama', TRUE);
		$id_kategori = $this->input->post('id_kategori', TRUE);
		$harga = $this->input->post('harga', TRUE);


		$message = 'Gagal mengedit data !<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;

		$in = array(
			'nama_menu' => $nama,
			'id_kategori' => $id_kategori,
			'harga' => $harga,
		);
		// var_dump($in);die();

		$maxFoto = 5;
		$getNamaFotoOld = $this->SemuaModel->getDataById('menu','id_menu',$id_menu)[0]->foto;
		// var_dump($getNamaFotoOld);die;
		if (empty($nama)) {
			$status = false;
			$errorInputs[] = array('#nama', 'Silahkan Isi Nama');
		}
		if (empty($harga)) {
			$status = false;
			$errorInputs[] = array('#harga', 'Silahkan pilih Kelas');
		}
		// var_dump($_FILES['foto']['name']);die();tunggu

		if ($status) {

			if ($this->SemuaModel->EditData('menu','id_menu',$in, $id_menu)) {

				$message = "Berhasil Mengubah Data #1";
				$cekFoto = empty($_FILES['foto']['name'][0]) || $_FILES['foto']['name'][0] == '';
				// var_dump(!$cekFoto);die;
				if (!$cekFoto) {

					$_FILES['f']['name']     = $_FILES['foto']['name'];
					$_FILES['f']['type']     = $_FILES['foto']['type'];
					$_FILES['f']['tmp_name'] = $_FILES['foto']['tmp_name'];
					$_FILES['f']['error']     = $_FILES['foto']['error'];
					$_FILES['f']['size']     = $_FILES['foto']['size'];

					$config['upload_path']          = './assets/images/foods/';
					$config['allowed_types']        = 'jpg|jpeg|png|gif';
					$config['max_size']             = 3 * 1024; // kByte
					$config['max_width']            = 10 * 1024;
					$config['max_height']           = 10 * 1024;
					$config['file_name'] = $id_menu . "-" . date("Y-m-d-H-i-s") . ".jpg";
					$this->load->library('image_lib');
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->image_lib->resize();
					// var_dump(!$this->upload->do_upload('f'));die;
					// Upload file to server

					if (!$this->upload->do_upload('f')) {
						$errorUpload = $this->upload->display_errors() . '<br>';
					} else {
						// Uploaded file data
						$fileName = $this->upload->data()["file_name"];
						$foto = array(
							'foto' => $fileName,
						);
						$this->SemuaModel->EditData('menu','id_menu',$foto, $id_menu);

						$message = "Berhasil Mengubah Data #1";
					}
				}
			}
		} else {
			$message = "Gagal Mengubah  #1";
		}



		echo json_encode(array(
			'status' => $status,
			'message' => $message,
			'errorInputs' => $errorInputs
		));
	}
	public function master_kasir()
	{
		$obj['ci'] = $this;
		$obj['content'] = 'admin/master_kasir';
		$this->load->view('admin/templates/index', $obj);
	}
	public function ubah_kasir_proses()
	{
		$id_kasir = $this->input->post('id_kasir', TRUE);
		$nama = $this->input->post('nama', TRUE);
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);

		$message = 'Gagal mengedit data !<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;

		$in = array(
			'nama_kasir' => $nama,
			'username' => $username,
			'password' => $password,
		);
		if (empty($nama)) {
			$status = false;
			$errorInputs[] = array('#nama', 'Silahkan Isi Nama');
		}
		if (empty($username)) {
			$status = false;
			$errorInputs[] = array('#username', 'Silahkan pilih Kelas');
		}
		// var_dump($status);die;

		if ($status) {

			if ($this->SemuaModel->EditData('kasir', 'id_kasir', $in, $id_kasir)) {
				$status = true;

				$message = "Berhasil Mengubah Data #1";
			}
		} else {
			$status = false;
			$message = "Gagal Mengubah Data #1";
		}



		echo json_encode(array(
			'status' => $status,
			'message' => $message,
			'errorInputs' => $errorInputs
		));
	}
}
        
    /* End of file  Admin.php */
        
                            