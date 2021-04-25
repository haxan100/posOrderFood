<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class ProdukModel extends CI_Model {

	public function getProdukByIdTipeProduk($id_kategori)
	{
		$this->db->select("*")
			->from('menu m');
			$this->db->join('kategori', 'kategori.id_kategori = m.id_kategori', 'left');
			
		if ($id_kategori != 0) {
			// die("s");
			// $this->db->order_by($sort);
			$this->db->where('m.id_kategori', $id_kategori);
			
		}
		$query = $this->db->get()->result();
		$output = array(
			'data' => $query,
		);
		return $output;
	}          
                            
                        
}
                        
/* End of file ProdukModel.php */
    
                        