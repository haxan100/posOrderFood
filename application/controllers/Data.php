<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Data extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MenuModel');
		// $this->load->model('WaliModel');
		// $this->load->model('GuruModel');
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
			$fields[] = $row->id_kategori . '<br>';
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

        
}
        
    /* End of file  Data.php */
        
                            