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
	public function EditData($NamaTabel,$nama_id,$in, $nisn)
	{
		$this->db->where($nama_id, $nisn);
		return $this->db->update($NamaTabel, $in);
	}
	public function getAllRole()
	{
		$this->db->from('role');
		$sql = $this->db->get();
		return $sql->result();

		# code...
	}         
		public function getSeting()
	{
		$this->db->from('setting');
		$sql = $this->db->get();
		return $sql->result();

		# code...
	}
	public function data_AllSetting($post)
	{
		$columns = array(
			'konten',
			'isi',
			

		);
		$columnsSearch = array(
			'konten',
			'isi',
			

		);
		// gunakan join disini
		$from = 'setting s';
		// custom SQL
		$sql = "SELECT* FROM {$from}   
		";
		$where = "";
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
		$data  = $this->db->query($sql);
		return array(
			'totalData' => $totaldata,
			'data' => $data,
		);
	}
	public function HapusCartSatu($id_user, $id_menu)
	{
		$this->db->where('id_produk', $id_menu);
		$this->db->where('id_user', $id_user);
		 $this->db->delete('keranjang');
		$query = $this->db->get('keranjang');
		return $query->result();
	}     
                     
              
                            
                        
}
                        
/* End of file SemuaModel.php */
    
                        