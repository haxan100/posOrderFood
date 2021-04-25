<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class ProdukModel extends CI_Model {

	public function getProdukByIdTipeProduk($sort = 'default')
	{
		$this->db->select("*")
			->from('menu m');
			$this->db->join('kategori', 'kategori.id_kategori = m.id_kategori', 'left');
			
		if ($sort != 'default') {
			$this->db->order_by($sort);
		}
		$query = $this->db->get()->result();
		$output = array(
			'data' => $query,
		);
		return $output;
	}          
                            
                        
}
                        
/* End of file ProdukModel.php */
    
                        