<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Admin extends CI_Controller {

public function index()
	{
			$obj['ci'] = $this;
			$this->load->view('admin/header', $obj);
			$this->load->view('admin/index', $obj);
	} 
	public function master_admin()
	{
		$data['content'] = 'admin/master_admin';
		$this->load->view('admin/index', $data);
	}
}
        
    /* End of file  Admin.php */
        
                            