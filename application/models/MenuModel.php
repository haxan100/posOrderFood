<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class MenuModel extends CI_Model {

	public function data_AllMenu($post)
	{
		$columns = array(
			'nama_menu',
			'k.id_kategori',		
			'harga',
			'foto'
		);		
		$columnsSearch = array(
			'nama_menu',
			'k.id_kategori',			
			'harga',
			'foto'
		);
		// gunakan join disini
		$from = 'menu m';
		// custom SQL
		$sql = "SELECT* FROM {$from}   join kategori k on k.id_kategori=m.id_kategori
		";
		$where = "";
		// var_dump(
		// 		$post['kategori'],
		// 		isset($post['ketegori']) ,  
		// 		$post['ketegori'] != 'default'
		// );die;

		if (isset($post['kategori']) && $post['kategori'] != 'default') {
			if ($where != "") $where .= "AND";
			// die("t");
			$where .= " (k.id_kategori='" . $post['kategori'] . "')";
		}
		$whereTemp = "";
		if ($whereTemp != '' && $where != '') $where .= " AND (" . $whereTemp . ")";
		else if ($whereTemp != '') $where .= $whereTemp;
		// search
		if (isset($post['search']['value']) && $post['search']['value'] != '') {
			$search = $post['search']['value'];
			// create parameter pencarian kesemua kolom yang tertulis
			// di $columns
			$whereTemp = "";
			for ($i = 0; $i < count($columnsSearch); $i++) {
				$whereTemp .= $columnsSearch[$i] . ' LIKE "%' . $search . '%"';
				// agar tidak menambahkan 'OR' diakhir Looping
				if ($i < count($columnsSearch) - 1) {
					$whereTemp .= ' OR ';
				}
			}
			if ($where != '') $where .= " AND (" . $whereTemp . ")";
			else $where .= $whereTemp;
		}
		if ($where != '') $sql .= ' WHERE (' . $where . ')';
		//SORT Kolom
		$sortColumn = isset($post['order'][0]['column']) ? $post['order'][0]['column'] : 1;
		$sortDir    = isset($post['order'][0]['dir']) ? $post['order'][0]['dir'] : 'asc';
		$sortColumn = $columns[$sortColumn - 1];
		$sql .= " ORDER BY {$sortColumn} {$sortDir}";
		$count = $this->db->query($sql);
		$totaldata = $count->num_rows();
		$start  = isset($post['start']) ? $post['start'] : 0;
		$length = isset($post['length']) ? $post['length'] : 10;
		$sql .= " LIMIT {$start}, {$length}";
		// echo $this->db->last_query();die;
		$data  = $this->db->query($sql);

		return array(
			'totalData' => $totaldata,
			'data' => $data,
		);
	}  
	public function getKategori()
	{
		$this->db->from('kategori');
		$sql = $this->db->get();
		return $sql->result();
		
		# code...
	}                      
                            
                        
}
                        
/* End of file MenuModel.php */
    
                        