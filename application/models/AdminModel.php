<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class AdminModel extends CI_Model {

	public function data_All($post)
	{
		$columns = array(
			'nama_admin',
			'username',
			'r.id_role',
			'password',

		);
		$columnsSearch = array(
			'nama_admin',
			'username',
			'r.id_role',
			'password',

		);
		// gunakan join disini
		$from = 'admin a';
		// custom SQL
		$sql = "SELECT* FROM {$from}   join role r on r.id_role = a.id_role
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
	public function loginAdminAct($pw,$un)
	{
		$this->db->from('admin');
		$this->db->where('username', $un);
		$this->db->where('password', $pw);
		$sql = $this->db->get();
		return $sql->row();
		
		
		
		# code...
	}
	public function dt_admin_role($post)
	{
		$from = 'role a';
		// untuk sort
		$columns = array(
			'nama_role',
		);

		// untuk search
		$columnsSearch = array(
			'nama_role',

		);


		// custom SQL
		$sql = "SELECT * FROM {$from} ";


		$where = "";

		$whereTemp = "";
		if (isset($post['date']) && $post['date'] != '') {
			$date = explode(' / ', $post['date']);
			if (count($date) == 1) {
				$whereTemp .= "(created_at LIKE '%" . $post['date'] . "%')";
			} else {
				// $whereTemp .= "(created_at BETWEEN '".$date[0]."' AND '".$date[1]."')";
				$whereTemp .= "(date_format(created_at, \"%Y-%m-%d\") >='$date[0]' AND date_format(created_at, \"%Y-%m-%d\") <= '$date[1]')";
			}
		}
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
		// hitung semua data
		$totaldata = $count->num_rows();

		// memberi Limit
		$start  = isset($post['start']) ? $post['start'] : 0;
		$length = isset($post['length']) ? $post['length'] : 10;


		if ($start == 0 && $length == -1) {
		} else {
			$sql .= " LIMIT {$start}, {$length}";
		}


		$data  = $this->db->query($sql);

		return array(
			'totalData' => $totaldata,
			'data' => $data,
		);
	}
	public function tambah_new_admin_role($in)
	{

		if ($this->db->insert('role', $in)) {
			$status =  true;
		} else {
			var_dump($this->db->error());
			die();
			$status = false;
		}
		return $status;
	}
	public function edit_new_admin_role($in, $id_admin)
	{
		$this->db->where('id_role', $id_admin);

		return $this->db->update('role', $in);
	}
	public function getRoleById($id_admin)
	{
		$this->db->where('id_role', $id_admin);
		return $this->db->get('role')->result();
	}
	public function hapusRole($id_admin)
	{
		$this->db->where('id_role', $id_admin);
		return $this->db->delete('role');
	}
	public function getAllKategorilogadmin()
	{
		return $this->db->get('kategori_histori')->result();
	}
	public function history_admin($post)
	{
		$from = 'histori_admin la';
		// untuk sort
		$columns = array(
			'la.created_at',
			'a.nama_admin',
			'la.aksi',
		);
		$columnsSearch = array(
			'la.created_at',
			'a.nama_admin',
			'la.aksi',
		);


		// custom SQL
		$sql = "SELECT la.*, a.nama_admin, lka.nama_kategori from histori_admin la 
		left join admin a on a.id_admin=la.id_admin 
		left join kategori_histori lka on lka.id_kategori=la.id_kategori";

		$where = "";
		if (isset($post['kategori']) && $post['kategori'] != 'default') $where .= "(la.id_kategori='" . $post['kategori'] . "')";

		$whereTemp = "";
		if (isset($_POST['date']) && $_POST['date'] != '') {
			$date = explode(' / ', $_POST['date']);
			if (count($date) == 1) {
				$whereTemp .= "(la.created_at LIKE '%" . $_POST['date'] . "%')";
			} else {
				// $whereTemp .= "(created_at BETWEEN '".$date[0]."' AND '".$date[1]."')";
				$whereTemp .= "(date_format(la.created_at, \"%Y-%m-%d\") >='$date[0]' AND date_format(la.created_at, \"%Y-%m-%d\") <= '$date[1]')";
			}
			if ($where == '') {
				$where .= "($whereTemp)";
			} else {

				$where .= "and ($whereTemp)";
			}
		}
		// var_dump($where);
		// die;
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

		if ($start == 0 && $length == -1) {
		} else {
			$sql .= " LIMIT {$start}, {$length}";
		}


		// var_dump($sql);
		// die;
		$data  = $this->db->query($sql);
		// var_dump(json_encode($this->db->last_query()));die();

		return array(
			'totalData' => $totaldata,
			'data' => $data,
		);
	}
	public function getRoleAll($id_admin)
	{
		// var_dump($id_admin);die;
		$this->db->where('id_admin', $id_admin);
		$this->db->join('admin a', 'a.id_role = role.id_role', 'left');
		// $this->db->where('password', $password);
		return $this->db->get('role');
		//  var_dump($this->db->last_query());die;

	}
	public function getRole($id_admin, $spesifik)
	{
		// var_dump($id_admin,$spesifik);die;
		$this->db->select($spesifik . ' as r');
		$this->db->where('id_admin', $id_admin);
		$this->db->join('admin a', 'a.id_role = role.id_role', 'left');
		// $this->db->where('password', $password);
		return $this->db->get('role')->result()[0];
		var_dump($this->db->last_query());
		die;
		//  return

	}
	public function log($id_user, $id_kategori, $aksi)
	{
		$data = array(
			'id_admin' => $id_user,
			'id_kategori' => $id_kategori,
			'aksi' => $aksi,
		);
		// var_dump($data);die;
		$this->db->set('created_at', 'NOW()', false);
		if ($this->db->insert('histori_admin', $data)) {
			$data['sukses'] = true;
		} else {
			$data['sukses'] = false;
		}

		return $data;
	}

	                 
                            
                        
}
                        
/* End of file AdminModel.php */
    
                        