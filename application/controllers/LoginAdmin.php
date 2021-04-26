<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class LoginAdmin extends CI_Controller {
    public function __construct()
	{		
		ini_set('max_execution_time', 0);
		ini_set('memory_limit', '2048M');
		parent::__construct();
		$this->load->library(array('form_validation')); 
		//memanggil recapca
		$this->load->model('AdminModel');
	}


public function index()
{
    // var_dump($_SESSION);die;
    // if(isset($_SESSION['admin_session'])){
    //     redirect('/admin');
    // }else if(isset($_SESSION['mitra_session'])){
    //     redirect('/mitra');
    // }
    $obj['ci'] = $this;
    $this->load->view('admin/login', $obj);
}
public function loginAct()
{
    var_dump($_POST);die;
    # code...
}
public function login_proses()
{ 
    
  $this->load->library('form_validation');
  $username = $this->input->post('username', true);
  $password = $this->input->post('password', true);
  
    $data = $this->AdminModel->loginAdminAct($password,$username);
    if($data =='null'){
        $status = false;
        $message = 'Username & password tidak cocok!';
    }else{
        $session = array(
            'admin_session' => true, // Buat session authenticated dengan value true
            'id_admin' => $data->id_admin, // Buat session authenticated
            'nama' => $data->nama_admin, // Buat session authenticated
          );
          $this->session->set_userdata($session);          
        $status = true;
        $message = 'Selamat datang <span class="font-weight-bold">' . $data->nama_admin . '</span>, sedang mengalihkan..';
    }

    // var_dump($data);die;
  
  echo json_encode(array(
    'status' => $status,
    'message' => $message,
  ));
}
        
}
        
    /* End of file  Login.php */
        
                            