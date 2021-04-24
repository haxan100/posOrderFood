<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class KasirModel extends CI_Model {

	public function data_All($post)
	{
		$columns = array(
			'nama_kasir',
			'username',
			'password',
			
		);
		$columnsSearch = array(
			'nama_kasir',
			'username',
			'password',
			
		);
		// gunakan join disini
		$from = 'kasir k';
		// custom SQL
		$sql = "SELECT* FROM {$from}   
		";
		$where = "";

		// if (isset($post['id_tipe_produk']) && $post['id_tipe_produk'] != 'default') {

		// 	if ($where != "") $where .= "AND";

		// 	$where .= " (p.id_tipe_produk='" . $post['id_tipe_produk'] . "')";
		// }

		$whereTemp = "";
		// if (isset($post['date']) && $post['date'] != '') {

		//     $date = explode(' / ', $post['date']);

		//     if (count($date) == 1) {

		//         $whereTemp .= "(created_at LIKE '%" . $post['date'] . "%')";

		//     } else {

		//         // $whereTemp .= "(created_at BETWEEN '".$date[0]."' AND '".$date[1]."')";

		//         $whereTemp .= "(date_format(created_at, \"%Y-%m-%d\") >='$date[0]' AND date_format(created_at, \"%Y-%m-%d\") <= '$date[1]')";
		//     }
		// }
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
		$data  = $this->db->query($sql);
		return array(
			'totalData' => $totaldata,
			'data' => $data,
		);
	}  
                        
                            
                        
}
                        
/* End of file KasirModel.php */
    
                        