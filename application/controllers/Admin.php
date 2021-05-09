<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MenuModel');
		$this->load->model('SemuaModel');
		$this->load->model('TransaksiModel');
		$this->load->model('AdminModel');
		// $this->load->model('SekolahModel');
		$this->load->helper('url');
	}
	
    function cekLogin()
	{
		if (!$this->isLoggedInAdmin()) {
		$this->session->set_flashdata(
			'notifikasi',
			array(
			'alert' => 'alert-danger',
			'message' => 'Silahkan Login terlebih dahulu.',
			)
		);
		redirect('LoginAdmin');
		}
	}
	public function index()
	{
			$this->cekLogin();

			$obj['ci'] = $this;
			$obj['content'] =  "admin/blank";

			$this->load->view('admin/templates/index', $obj);
	} 
	public function master_admin()
	{
		$id_admin = $this->session->userdata('id_admin');
		$role = $this->AdminModel->getRole($id_admin, 'data_admin')->r;
		if ($role == 1) {
			$obj['listKategori'] = $this->SemuaModel->getAllRole();
			$obj['content'] = 'admin/master_admin';
			$this->load->view('admin/templates/index', $obj);
		} elseif ($role == 0) {
			$obj['ci'] = $this;
			$obj['content'] =  "admin/blank";

			$this->load->view('admin/templates/index', $obj);
		}
	}
	public function master_item()
	{
		$this->cekLogin();
		$id_admin = $this->session->userdata('id_admin');
		$role = $this->AdminModel->getRole($id_admin, 'master_menu')->r;
		if ($role == 1) {
			
		$obj['listKategori'] = $this->MenuModel->getKategori();
		$obj['ci'] = $this;
		$obj['content'] = 'admin/master_item';
		$this->load->view('admin/templates/index', $obj);

		} elseif ($role == 0) {
			$obj['ci'] = $this;
			$obj['content'] =  "admin/blank";
			$this->load->view('admin/templates/index', $obj);
		}

	}
	public function tambah_menu_proses()
	{
		$nama = $this->input->post('nama', TRUE);
		$id_kategori = $this->input->post('id_kategori', TRUE);
		$harga = $this->input->post('harga', TRUE);
		// var_dump($_FILES);die;
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
			// $config['allowed_types']        = 'jpg|jpeg|png|gif|JPG|jpg|JPEG|PNG';
			$config["allowed_types"] = "*";
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
				$message = $errorUpload;
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
					$id_admin = $this->session->userdata('id_admin');
					$aksi = 'Tambah menu ' . $nama;
					$id_kategori = 7;
					$this->AdminModel->log($id_admin, $id_kategori, $aksi);

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

			$id_admin = $this->session->userdata('id_admin');
			$aksi = 'Hapus menu ' . $data[0]->nama_menu;
			$id_kategori = 9;
			$this->AdminModel->log($id_admin, $id_kategori, $aksi);
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

						$id_admin = $this->session->userdata('id_admin');
						$aksi = 'Edit menu ' . $nama;
						$id_kategori = 8;
						$this->AdminModel->log($id_admin, $id_kategori, $aksi);
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
		$this->cekLogin();
		$id_admin = $this->session->userdata('id_admin');
		$role = $this->AdminModel->getRole($id_admin, 'data_kasir')->r;
		if ($role == 1) {
			$obj['ci'] = $this;
			$obj['content'] = 'admin/master_kasir';
			$this->load->view('admin/templates/index', $obj);
		} elseif ($role == 0) {
			$obj['ci'] = $this;
			$obj['content'] =  "admin/blank";
			$this->load->view('admin/templates/index', $obj);
		}

		
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

				$id_admin = $this->session->userdata('id_admin');
				$aksi = 'Edit Kasir ' . $nama;
				$id_kategori = 5;
				$this->AdminModel->log($id_admin, $id_kategori, $aksi);
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
	public function tambah_kasir_proses()
	{
		$nama = $this->input->post('nama', TRUE);
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);

		$status = true;

		if ($nama == null) {
			$status = false;
			$message = "Harap Masukan Nama!";
			// die("sss");
		}
		if ($username == null) {
			$status = false;
			$message = "Harap Isi username!";
			// die("sss");
		}
		if ($password == null) {
			$status = false;
			$message = "Harap Masukan Password!";
			// die("sss");
		}
		if($status){
			$status = true;

			$in = array(
				'nama_kasir' => $nama,
				'username' => $username,
				'password' => $password,
				'created_at' => date("Y-m-d H:i:s"),
			);
			$this->SemuaModel->Tambah('kasir', $in);


			$id_admin = $this->session->userdata('id_admin');
			$aksi = 'Tambah Kasir ' . $nama;
			$id_kategori = 4;
			$this->AdminModel->log($id_admin, $id_kategori, $aksi);

			$message = "Berhasil Menambah  #1";
		}else{
			$status = false;
			$message = "Gagal Menambah Data";


		}



		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));



		# code...
	}
	public function hapusKasir()
	{
		$id_kasir = $this->input->post('id_kasir', TRUE);
		$data = $this->SemuaModel->getDataById('kasir', 'id_kasir', $id_kasir);

		$status = false;

		$message = 'Gagal menghapus Data!';
		if (count($data) == 0) {
			$message .= '<br>Tidak terdapat Data yang dimaksud.';
		} else {
			$this->SemuaModel->HapusData('kasir', 'id_kasir', $id_kasir);

			$id_admin = $this->session->userdata('id_admin');
			$aksi = 'Hapus Kasir ' . $data[0]->nama_kasir;
			$id_kategori = 6;
			$this->AdminModel->log($id_admin, $id_kategori, $aksi);
			$status = true;
			$message = 'Berhasil menghapus Data: <b>' . $data[0]->nama_kasir . '</b>';
		}
		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));
	}
	public function tambah_admin_proses()
	{
		$nama = $this->input->post('nama', TRUE);
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);
		$role = $this->input->post('role', TRUE);
		$status = true;

		if ($nama == null) {
			$status = false;
			$message = "Harap Masukan Nama!";
			// die("sss");
		}
		if ($username == null) {
			$status = false;
			$message = "Harap Isi username!";
			// die("sss");
		}
		if ($password == null) {
			$status = false;
			$message = "Harap Masukan Password!";
			// die("sss");
		}
		if ($role == null) {
			$status = false;
			$message = "Harap Masukan Role!";
			// die("sss");
		}
		if ($status) {
			$status = true;

			$in = array(
				'nama_admin' => $nama,
				'username' => $username,
				'password' => $password,
				'id_role' => $role,
				'created_at' => date("Y-m-d H:i:s"),
			);
			$this->SemuaModel->Tambah('admin', $in);

			$message = "Berhasil Menambah  #1";

			$id_admin = $this->session->userdata('id_admin');
			$aksi = 'Tambah Admin ' . $nama;
			$id_kategori = 1;
			$this->AdminModel->log($id_admin, $id_kategori, $aksi);

		} else {
			$status = false;
			$message = "Gagal Menambah Data";
		}



		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));



		# code...
	}
	public function ubah_admin_proses()
	{
		// var_dump($_POST);die;
		$id_admin = $this->input->post('id_admin', TRUE);
		$nama = $this->input->post('nama', TRUE);
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);
		$role = $this->input->post('role', TRUE);

		$message = 'Gagal mengedit data !<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;

		$in = array(
			'nama_admin' => $nama,
			'username' => $username,
			'password' => $password,
			'id_role' => $role,
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

			if ($this->SemuaModel->EditData('admin', 'id_admin', $in, $id_admin)) {
				$status = true;

				$message = "Berhasil Mengubah Data #1";

				$id_admin = $this->session->userdata('id_admin');
				$aksi = 'Edit Admin ' . $nama;
				$id_kategori = 2;
				$this->AdminModel->log($id_admin, $id_kategori, $aksi);

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
	public function hapusAdmin()
	{
		$id_admin = $this->input->post('id_admin', TRUE);
		$data = $this->SemuaModel->getDataById('admin', 'id_admin', $id_admin);

		$status = false;

		$message = 'Gagal menghapus Data!';
		if (count($data) == 0) {
			$message .= '<br>Tidak terdapat Data yang dimaksud.';
		} else {
			$this->SemuaModel->HapusData('admin', 'id_admin', $id_admin);

			$id_admin = $this->session->userdata('id_admin');
			$aksi = 'Hapus Admin ' .  $data[0]->nama_admin ;
			$id_kategori = 3;
			$this->AdminModel->log($id_admin, $id_kategori, $aksi);

			$status = true;
			$message = 'Berhasil menghapus Data: <b>' . $data[0]->nama_admin . '</b>';
		}
		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));
	}
	public function setting()
	{
		$this->cekLogin();
		$id_admin = $this->session->userdata('id_admin');
		$role = $this->AdminModel->getRole($id_admin, 'seeting')->r;
		if ($role == 1) {
			$obj['ci'] = $this;
			$obj['content'] = 'admin/setting';
			$this->load->view('admin/templates/index', $obj);
		} elseif ($role == 0) {
			$obj['ci'] = $this;
			$obj['content'] =  "admin/blank";
			$this->load->view('admin/templates/index', $obj);
		}

		
	}
	public function ubah_setting_proses()
	{
		$id_setting = $this->input->post('id_setting', TRUE);
		$isi = $this->input->post('isi', TRUE);
		$konten = $this->input->post('konten', TRUE);

		$message = 'Gagal mengedit data !<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;

		$in = array(
			'isi' => $isi,
		);
		if (empty($isi)) {
			$status = false;
			$errorInputs[] = array('#isi', 'Silahkan Isi ');
		}

		if ($status) {

			if ($this->SemuaModel->EditData('setting', 'id_setting', $in, $id_setting)) {
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
	public function isLoggedInAdmin()
    {	
		// var_dump($_SESSION);die;
		   // Cek apakah terdapat session "admin_session"
        if ($this->session->userdata('admin_session'))
            return true; // sudah login
        else
            return false; // belum login
    }
	public function logout()
	{
		$id_admin = $_SESSION['id_admin'];
		$CI = &get_instance();
		$CI->load->library('session');
		$CI->session->sess_destroy();		
		$pesan = "Berhasil Keluar";
		$eror = false;
		// $aksi = 'Log Out';
        // $id_kategori = 82;
        // $this->AdminModel->log($id_admin, $id_kategori, $aksi);
		redirect('LoginAdmin');
		// return $this->login;
		echo json_encode(array(
			'pesan' => $pesan,
			'error' => $eror,
		));
	}
	public function master_transaksi()
	{
		$this->cekLogin();

		$id_admin = $this->session->userdata('id_admin');
		$role = $this->AdminModel->getRole($id_admin, 'master_transaksi')->r;
		if ($role == 1) {
			$obj['ci'] = $this;
			$obj['listKategori'] = $this->SemuaModel->getAllRole();
			$obj['content'] = 'admin/master_transaksi';
			$this->load->view('admin/templates/index', $obj);
		} elseif ($role == 0) {
			$obj['ci'] = $this;
			$obj['content'] =  "admin/blank";
			$this->load->view('admin/templates/index', $obj);
		}

		
	}
	public function master_role()
	{

		$this->cekLogin();
		$id_admin = $this->session->userdata('id_admin');
		$role = $this->AdminModel->getRole($id_admin, 'data_admin')->r;
		if ($role == 1) {
			$obj['ci'] = $this;
			$obj['content'] = 'admin/master_role';
			$this->load->view('admin/templates/index', $obj);
		} elseif ($role == 0) {
			$obj['ci'] = $this;
			$obj['content'] =  "admin/blank";
			$this->load->view('admin/templates/index', $obj);
		}
		
		
		# code...
	}
	public function tambah_role()
	{
		$nama = $this->input->post('nama', TRUE);
		$master_admin = ($this->input->post('master_admin', TRUE) == "true") ? 1 : 0;
		$master_kasir = ($this->input->post('master_kasir', TRUE) == "true") ? 1 : 0;
		$master_menu = ($this->input->post('master_menu', TRUE) == "true") ? 1 : 0;
		$master_transaksi = ($this->input->post('master_transaksi', TRUE) == "true") ? 1 : 0;
		$histori = ($this->input->post('histori', TRUE) == "true") ? 1 : 0;
		$setting = ($this->input->post('setting', TRUE) == "true") ? 1 : 0;

		$message = 'Gagal menambahkan Role Baru!<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;
		$in = array(
			'role_name' => $nama,
		);
		// var_dump($in);die();
		$noRoleSelected = true;
		if (
			$master_admin == 1 ||  $master_kasir ==1 || $master_menu==1 || $master_transaksi == 1 || $histori ==1 || $setting 
		) $noRoleSelected = false;
		else if ($noRoleSelected) {
			$status = false;
			$errorInputs[] = ('Silahkan pilih Role minimal 1 Role!');
		}
		// var_dump($noRoleSelected);die;
		if ($status) {
			// $id_admin = $this->AdminModel->get_last_id()->last_id;
			$admin_role = array(
				'nama_role' => $nama,
				'data_admin' => $master_admin,
				'data_kasir' => $master_kasir,
				'master_menu' => $master_menu,
				'master_transaksi' => $master_transaksi,
				'histori' => $histori,
				'seeting' => $setting,

			);
			if ($this->AdminModel->tambah_new_admin_role($admin_role)) {
				$status = true ;
				$message = 'Berhasil Menambah Role ';
				$id_admin = $this->session->userdata('id_admin');
				$aksi = 'Tambah Role ' . $nama;
				$id_kategori = 10;
				$this->AdminModel->log($id_admin, $id_kategori, $aksi);
			} else {
				$message = 'Gagal ';
			}
		} else {
			$message = 'Username Sudah Ada! ';
		}
		echo json_encode(array(
			'status' => $status,
			'message' => $message,
			'errorInputs' => $errorInputs
		));
	}
	public function edit_role()
	{
		$id_role = $this->input->post('id_role', TRUE);
		$nama = $this->input->post('nama', TRUE);

		$data_admin = ($this->input->post('data_admin', TRUE) == "true") ? 1 : 0;
		$data_kasir = ($this->input->post('data_kasir', TRUE) == "true") ? 1 : 0;
		$master_menu = ($this->input->post('master_menu', TRUE) == "true") ? 1 : 0;
		$master_transaksi = ($this->input->post('master_transaksi', TRUE) == "true") ? 1 : 0;

		$Histori = ($this->input->post('Histori', TRUE) == "true") ? 1 : 0;
		$Setting = ($this->input->post('Setting', TRUE) == "true") ? 1 : 0;

		$message = 'Gagal menambahkan Produk Baru!<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;
		$noRoleSelected = true;
		if (
			$data_admin == 1 || $data_kasir == 1 || $master_menu == 1
			|| $master_transaksi  == 1 || $Setting==1 || $Histori == 1 
		) $noRoleSelected = false;
		else if ($noRoleSelected) {
			$status = false;
			$errorInputs[] = ('Silahkan pilih id_role');
		}

		if (empty($nama)) {
			$status = false;
			$errorInputs[] = array('#nama', 'Silahkan Masukan Nama');
		}

		if ($status) {
			$admin_role = array(
				'nama_role' => $nama,
				'data_admin' => $data_admin,
				'data_kasir' => $data_kasir,
				'master_menu' => $master_menu,
				'master_transaksi' => $master_transaksi,
				'histori' => $Histori,
				'seeting' => $Setting,
			);

			if ($this->AdminModel->edit_new_admin_role($admin_role, $id_role)) {
				$message = 'Berhasil Mengubah Data Role ';
				$status = true;

				$id_admin = $this->session->userdata('id_admin');
				$aksi = 'Edit Role ' . $nama;
				$id_kategori = 11;
				$this->AdminModel->log($id_admin, $id_kategori, $aksi);
			} else {
				$message = 'Gagal ';
				$status = false;

			}
		} else {
			$message = 'Username Sudah Ada! ';
		}
		echo json_encode(array(
			'status' => $status,
			'message' => $message,
			'errorInputs' => $errorInputs
		));
	}
	public function hapusRole()
	{
		if (!$this->isLoggedInAdmin()) {
			echo '403 Forbidden!';
			exit();
		}
		$id_admin = $this->input->post('id_role', true);
		$data = $this->AdminModel->getRoleById($id_admin);
		$status = false;
		$message = 'Gagal menghapus Role!';
		if (count($data) == 0) {
			$message .= '<br>Tidak terdapat Role yang dimaksud.';
		} else {
			$hasil = $this->AdminModel->hapusRole($id_admin);
			if ($hasil) {
				$status = true;
				$message = 'Berhasil menghapus Role: <b>' . $data[0]->nama_role . '</b>';
				$id_admin = $this->session->userdata('id_admin');
				$aksi = 'hapus Role ' . $data[0]->nama_role;
				$id_kategori = 12;
				$this->AdminModel->log($id_admin, $id_kategori, $aksi);
			} else {
				$message .= 'Terjadi kesalahan. #ADM0028';
			}
		}

		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));
	}
	public function master_histori()
	{

		$this->cekLogin();
		$id_admin = $this->session->userdata('id_admin');
		$role = $this->AdminModel->getRole($id_admin, 'histori')->r;
		if ($role == 1) {
			$obj['ci'] = $this;

			$obj['listkategorilog'] = $this->AdminModel->getAllKategorilogadmin();
			$obj['content'] = 'admin/histori_admin';
			$this->load->view('admin/templates/index', $obj);
		} elseif ($role == 0) {
			$obj['ci'] = $this;
			$obj['content'] =  "admin/blank";
			$this->load->view('admin/templates/index', $obj);
		}
	
		
		# code...
	}
	public function master_slider()
	{
		$id_admin = $this->session->userdata('id_admin');
		$role = $this->AdminModel->getRole($id_admin, 'data_admin')->r;
		if ($role == 1) {
			$obj['listKategori'] = $this->SemuaModel->getAllRole();
			$obj['content'] = 'admin/master_slider';
			$this->load->view('admin/templates/index', $obj);
		} elseif ($role == 0) {
			$obj['ci'] = $this;
			$obj['content'] =  "admin/blank";

			$this->load->view('admin/templates/index', $obj);
		}
	}
	public function getFotoSlider()
	{
		$id= $this->input->post('id');
		$data = $this->SemuaModel->getFotoSliderById($id);

		echo json_encode(array(
			'data' => $data,
		));
		
	}
	public function ubah_slider_proses()
	{
		// var_dump($_POST,$_FILES);die;
		$id_setting = $this->input->post('id_setting', TRUE);
		$message = 'Gagal mengedit data !<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;
	
		$_FILES['f']['name']     = $_FILES['isi']['name'];
		$_FILES['f']['type']     = $_FILES['isi']['type'];
		$_FILES['f']['tmp_name'] = $_FILES['isi']['tmp_name'];
		$_FILES['f']['error']     = $_FILES['isi']['error'];
		$_FILES['f']['size']     = $_FILES['isi']['size'];
		$config['upload_path']          = './assets/images/slider';
		$config['allowed_types']        = 'jpg|jpeg|png|gif';
		$config['max_size']             = 3 * 1024;
		$config['max_width']            = 10 * 1024;
		$config['max_height']           = 10 * 1024;
		$config['file_name'] = $id_setting . "-" . date("Y-m-d-H-i-s") . ".jpg";
		$this->load->library('image_lib');
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->image_lib->resize();

		if (!$this->upload->do_upload('f')) {
			$errorUpload = $this->upload->display_errors() . '<br>';
			$status = false;
			$errorInputs[] = array('#foto', $errorUpload);
		}else{
			$fileName = $this->upload->data()["file_name"];
			$foto = array(
				'foto' => $fileName,
			);
			if ($this->SemuaModel->EditData('slider', 'id_slider', $foto, $id_setting)) {
				$status = true;
				$message = "Berhasil Mengubah Data #1";
			} else {
				$status = false;
				$message = "Gagal Mengubah Data #1";
			}

		}
			



		echo json_encode(array(
			'status' => $status,
			'message' => $message,
			'errorInputs' => $errorInputs
		));
	}

}
        
    /* End of file  Admin.php */
        
                            