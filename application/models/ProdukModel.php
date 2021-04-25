<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class ProdukModel extends CI_Model {

	public function getProdukByIdTipeProduk($id_kategori,$page)
	{
		// var_dump($page);die;
		$perHal = 8;
		$start = ($page - 1) * $perHal;
		$length =  $start + $perHal;
		$total  = $this->getProdukByIdTipeProdukCount($id_kategori);
		$pages = ceil($total / $perHal);
		// var_dump($page,$pages,$start,$length,$total);die;

		$this->db->select("*")
			->from('menu m');
			$this->db->join('kategori', 'kategori.id_kategori = m.id_kategori', 'left');
			
		if ($id_kategori != 0) {
			$this->db->where('m.id_kategori', $id_kategori);
		}
		$this->db->limit($perHal, $start);
		$query = $this->db->get()->result();
		$pagination = array(
			'total_halaman' => $pages,
			'halaman' => $page,
			'total_data' => $total, 
			'jumlah' => count($query)
		);
		// echo $this->db->last_query(); die;
		$output = array(
			'data' => $query,
            'page' => $pagination,
		);
		return $output;
	}
	public function getProdukByIdTipeProdukCount($id_kategori)
	{

		$this->db->select("*")
			->from('menu m');
		$this->db->join('kategori', 'kategori.id_kategori = m.id_kategori', 'left');

		if ($id_kategori != 0) {
			$this->db->where('m.id_kategori', $id_kategori);
		}
		$query = $this->db->get()->result();
		return count($query);
	}        
                            
                        
}
                        
/* End of file ProdukModel.php */
    
                        