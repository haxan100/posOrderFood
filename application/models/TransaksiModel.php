<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class TransaksiModel extends CI_Model {
                        
public function login(){
                        
                                
}
	public function dt_transaksi($post)
	{
		$from = 'transaksi t';
		// untuk sort
		$columns = array(
			't.created_at',
			't.kode_transaksi',
			't.nama_user',
			't.tipe_pesan',
			't.harga_total',
		);

		// untuk search
		$columnsSearch = array(
			't.created_at',
			't.kode_transaksi',
			't.nama_user',
			't.tipe_pesan',
			't.harga_total',
		);


		// custom SQL
		$sql = "SELECT * from transaksi t";


		$where = "";
		if (isset($post['status']) && $post['status'] != 'default') $where .= " (t.status='" . $post['status'] . "')";

		$whereMet = "";
		if (isset($post['metode']) && $post['metode'] != 'default') $whereMet .= " (t.metode_pembayaran='" . $post['metode'] . "')";

		$whereTemp = "";
		if (isset($post['date']) && $post['date'] != '') {
			$date = explode(' / ', $post['date']);
			$selectDate = 'created_at';
			if (count($date) == 1) {
				$whereTemp .= "(" . $selectDate . "  LIKE '%" . $post['date'] . "%')";
			} else {
				// $whereTemp .= "(created_at BETWEEN '".$date[0]."' AND '".$date[1]."')";
				$whereTemp .= "(date_format($selectDate, \"%Y-%m-%d\") >='$date[0]' AND date_format($selectDate, \"%Y-%m-%d\") <= '$date[1]')";
				// $whereTemp .= "(date_format($selectDate, \"%Y-%m-%d %H:%i:%s\") >='$date[0]' AND date_format($selectDate, \"%Y-%m-%d %H:%i:%s\") <= '$date[1]')
			}
		}
		if ($whereTemp != '' && $where != ''
		) $where .= " where (" . $whereTemp . ")";
		else if ($whereTemp != '') $where .= $whereTemp;

		if ($whereMet != '' && $where != ''
		) $where .= " where (" . $whereMet . ")";
		else if ($whereMet != '') $where .= $whereMet;

		// search
		$status_search = isset($post['search']['value']) && $post['search']['value'] != '';
		if ($status_search) {
			$search = $post['search']['value'];
			$whereTemp = "";
			for ($i = 0; $i < count($columnsSearch); $i++) {
				$whereTemp .= $columnsSearch[$i] . ' LIKE "%' . $search . '%"';

				// agar tidak menambahkan 'OR' diakhir Looping
				if ($i < count($columnsSearch) - 1) {
					$whereTemp .= ' OR ';
				}
			}
			if ($where != ''
			) $where .= " AND (" . $whereTemp . ")";
			else $where .= $whereTemp;
		}
		//filter
		// if($status_search)

		// if($where == '') $sql .= ' WHERE ('.$where.')';
		if ($where != '') $sql .= " where (" . $where . ")";
		else $sql .= $where;


		//SORT Kolom
		$sortColumn = isset($post['order'][0]['column']) ? $post['order'][0]['column'] : 1;
		$sortDir    = isset($post['order'][0]['dir']) ? $post['order'][0]['dir'] : 'asc';

		$sortColumn = $columns[$sortColumn - 1];

		$sql .= " ORDER BY {$sortColumn} {$sortDir}";

		$count = $this->db->query($sql);
		// hitung semua data
		$totaldata = $count->num_rows();

		// memberi Limit
		$start  = isset($post['start']) ? $post['start'] : 0;
		$length = isset($post['length']) ? $post['length'] : 10;


		$sql .= " LIMIT {$start}, {$length}";


		$data  = $this->db->query($sql);
		// var_dump(json_encode($this->db->last_query()));die();

		return array(
			'totalData' => $totaldata,
			'data' => $data,
		);
	}
                        
                            
                        
}
                        
/* End of file TransaksiModel.php */
    
                        