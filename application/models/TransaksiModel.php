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
	public function dt_transaksi_detail($post)
	{
		$from = 'transaksi_detail t';
		// untuk sort
		$columns = array(

			't.id_transaksi',
			't.id_transaksi_detail',
			't.id_menu',
			't.qty',
			't.total',
			// 't.created_at',
			// 't.kode_transaksi',
			// 't.nama_user',
			// 't.tipe_pesan',
			// 't.harga_total',
		);

		// untuk search
		$columnsSearch = array(
			't.id_transaksi',
			't.id_transaksi_detail',
			't.id_menu',
			't.qty',
			't.total',
		);


		// custom SQL
		$sql = "SELECT * from transaksi_detail t 
		join menu m on m.id_menu = t.id_menu
		";


		$where = "";
		if (isset($post['status']) && $post['status'] != 'default') $where .= " (t.status='" . $post['status'] . "')";

		if (isset($post['id']) && $post['id'] != 'default') $where .= " (t.id_transaksi='" . $post['id'] . "')";

		$whereMet = "";
		if (isset($post['metode']) && $post['metode'] != 'default') $whereMet .= " (t.metode_pembayaran='" . $post['metode'] . "')";

		$whereTemp = "";
		if (isset($post['date']) && $post['date'] != '') {
			$date = explode(' / ',
				$post['date']
			);
			$selectDate = 'created_at';
			if (count($date) == 1) {
				$whereTemp .= "(" . $selectDate . "  LIKE '%" . $post['date'] . "%')";
			} else {
				// $whereTemp .= "(created_at BETWEEN '".$date[0]."' AND '".$date[1]."')";
				$whereTemp .= "(date_format($selectDate, \"%Y-%m-%d\") >='$date[0]' AND date_format($selectDate, \"%Y-%m-%d\") <= '$date[1]')";
				// $whereTemp .= "(date_format($selectDate, \"%Y-%m-%d %H:%i:%s\") >='$date[0]' AND date_format($selectDate, \"%Y-%m-%d %H:%i:%s\") <= '$date[1]')
			}
		}
		if (
			$whereTemp != '' && $where != ''
		) $where .= " where (" . $whereTemp . ")";
		else if ($whereTemp != '') $where .= $whereTemp;

		if (
			$whereMet != '' && $where != ''
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
			if (
				$where != ''
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


	public function get_transaksi($status, $date)
	{
		$selectDate = 't.created_at';
		$this->db->select('t.*,k.*');
		$this->db->from('transaksi as t');
		$this->db->join('kasir  as k', 'k.id_kasir = t.id_user');
		$from = 't.';
		if ($date != ''
		) {
			$date = explode('/ ', $date);
			if (count($date) == 1) {
				$whereTemp = array('date_format(' . $selectDate . ', "%Y-%m-%d") =' => $date[0]);
				$this->db->where($whereTemp);

			} else {
				$whereTemp = array('date_format(' . $selectDate . ', "%Y-%m-%d") >=' => $date[0], 'date_format(' . $selectDate . ', "%Y-%m-%d") <=' => $date[1]);
				$this->db->where($whereTemp);
			}
		}
		$data = $this->db->get();
		// echo $this->db->last_query();
		// die;
		
		return $data->result();
	}
                        
                            
                        
}
                        
/* End of file TransaksiModel.php */
    
                        