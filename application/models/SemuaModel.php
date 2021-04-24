<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class SemuaModel extends CI_Model {
                        
public function login(){
                        
                                
}
public function Tambah($nama,$data)
{
		return $this->db->insert($nama, $data);
}
public function getDataById($namaTable,$nama_id,$id_Dicari)
	{
		$this->db->select('*');
		$this->db->where($nama_id, $id_Dicari);
		$query = $this->db->get($namaTable);
		return $query->result();
	}
	public function HapusData($NamaTabel,$nama_id,$IdNya)
	{
		$this->db->where($nama_id, $IdNya);
		$this->db->delete($NamaTabel);
		$query = $this->db->get($NamaTabel);
		return $query->result();
	}      
                            
                        
}
                        
/* End of file SemuaModel.php */
    
                        