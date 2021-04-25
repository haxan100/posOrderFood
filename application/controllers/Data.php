<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Data extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MenuModel');
		$this->load->model('KasirModel');
		$this->load->model('AdminModel');
		$this->load->model('SemuaModel');
		// $this->load->model('SekolahModel');
		$this->load->helper('url');
	}


	public function getAllMenuItem()
	{
		$bu = base_url();
		$dt = $this->MenuModel->data_AllMenu($_POST);
		$datatable['draw']      = isset($_POST['draw']) ? $_POST['draw'] : 1;
		$datatable['recordsTotal']    = $dt['totalData'];
		$datatable['recordsFiltered'] = $dt['totalData'];
		$datatable['data']            = array();
		$start  = isset($_POST['start']) ? $_POST['start'] : 0;
		// var_dump($dt['data']->result());die();
		$no = $start + 1;
		foreach ($dt['data']->result() as $row) {
			$fields = array($no++);
			// $fields[] = $row->id_menu . '<br>';
			$fields[] = $row->nama_menu . '<br>';
			$fields[] = $row->nama_kategori . '<br>';
			$fields[] = $row->harga . '<br>';
			$fields[] = '<img src="../assets/images/foods/'.$row->foto . '" id="image" alt="image"><br>';
			$fields[] = '

			<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target=".bs-example-modal-lg"
			 data-id_menu="' . $row->id_menu . '" data-nama_menu="' . $row->nama_menu . '" 
			data-id_kategori="' . $row->id_kategori . '" 
			data-harga="' . $row->harga . '" 
			data-foto="' . $row->foto . '" 
			></i> Ubah</button>

        <button class="btn btn-round btn-danger hapus" data-id_menu="' . $row->id_menu . '" nama_menu="' . $row->nama_menu . '"
        >Hapus</button>               

        ';
			$datatable['data'][] = $fields;
		}



		echo json_encode($datatable);

		exit();
	}
	public function getAllKasir()
	{
		$bu = base_url();
		$dt = $this->KasirModel->data_All($_POST);
		$datatable['draw']      = isset($_POST['draw']) ? $_POST['draw'] : 1;
		$datatable['recordsTotal']    = $dt['totalData'];
		$datatable['recordsFiltered'] = $dt['totalData'];
		$datatable['data']            = array();
		$start  = isset($_POST['start']) ? $_POST['start'] : 0;
		// var_dump($dt['data']->result());die();
		$no = $start + 1;
		foreach ($dt['data']->result() as $row) {
			$fields = array($no++);
			// $fields[] = $row->id_menu . '<br>';
			$fields[] = $row->nama_kasir . '<br>';
			$fields[] = $row->username . '<br>';
			$fields[] = 'Kapan Login<br>';
			$fields[] = '

			<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target=".bs-example-modal-lg"
			 data-id_kasir="' . $row->id_kasir . '" data-nama_kasir="' . $row->nama_kasir . '" 
			data-username="' . $row->username . '" 
			data-password="' . $row->password . '" 
			></i> Ubah</button>

        <button class="btn btn-round btn-danger hapus" data-id_kasir="' . $row->id_kasir . '" data-nama_kasir="' . $row->nama_kasir . '"
        >Hapus</button>               

        ';
			$datatable['data'][] = $fields;
		}



		echo json_encode($datatable);

		exit();
	}
	public function getAllAdmin()
	{
		$bu = base_url();
		$dt = $this->AdminModel->data_All($_POST);
		$datatable['draw']      = isset($_POST['draw']) ? $_POST['draw'] : 1;
		$datatable['recordsTotal']    = $dt['totalData'];
		$datatable['recordsFiltered'] = $dt['totalData'];
		$datatable['data']            = array();
		$start  = isset($_POST['start']) ? $_POST['start'] : 0;
		// var_dump($dt['data']->result());die();
		$no = $start + 1;
		foreach ($dt['data']->result() as $row) {
			$fields = array($no++);
			// $fields[] = $row->id_menu . '<br>';
			$fields[] = $row->nama_admin . '<br>';
			$fields[] = $row->username . '<br>';
			$fields[] = $row->nama_role . '<br>';
			$fields[] = '

			<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target=".bs-example-modal-lg"
			 data-id_admin="' . $row->id_admin . '" data-nama_admin="' . $row->nama_admin . '" 
			data-username="' . $row->username . '" 
			data-password="' . $row->password . '" 
			data-id_role="' . $row->id_role . '" 
			></i> Ubah</button>

        <button class="btn btn-round btn-danger hapus" data-id_admin="' . $row->id_admin . '" data-nama_admin="' . $row->nama_admin . '"
        >Hapus</button>               

        ';
			$datatable['data'][] = $fields;
		}



		echo json_encode($datatable);

		exit();
	}
	public function getAllSetting()
	{
		$bu = base_url();
		$dt = $this->SemuaModel->data_AllSetting($_POST);
		$datatable['draw']      = isset($_POST['draw']) ? $_POST['draw'] : 1;
		$datatable['recordsTotal']    = $dt['totalData'];
		$datatable['recordsFiltered'] = $dt['totalData'];
		$datatable['data']            = array();
		$start  = isset($_POST['start']) ? $_POST['start'] : 0;
		// var_dump($dt['data']->result());die();
		$no = $start + 1;
		foreach ($dt['data']->result() as $row) {
			$fields = array($no++);
			$fields[] = $row->konten . '<br>';
			$fields[] = $row->isi . '<br>';
			$fields[] = '
			<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target=".bs-example-modal-lg"
			 data-id_setting="' . $row->id_setting . '" data-konten="' . $row->konten . '" 
			data-isi="' . $row->isi . '" 
			></i> Ubah</button>


        ';
			$datatable['data'][] = $fields;
		}
		echo json_encode($datatable);
		exit();
	}

        
}
        
    /* End of file  Data.php */
        
                            