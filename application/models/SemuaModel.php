<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class SemuaModel extends CI_Model {
                        
public function login(){
                        
                                
}
public function Tambah($nama,$data)
{
		return $this->db->insert($nama, $data);
}
                        
                            
                        
}
                        
/* End of file SemuaModel.php */
    
                        