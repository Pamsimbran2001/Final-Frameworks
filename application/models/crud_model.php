<?php

class Crud_model extends CI_Model{



	public function getAllProducts(){


		$query = $this->db->get('tbl_products');

		if ($query) {
			
			return $query->result();
		}
	}

	public function insertProduct($data){
		$query = $this->db->insert('tbl_products', $data);

		if ($query) {
			return true;
		}else{
			return false;
		}
	}
	public function getSingleProduct($id){

		$this->db->where('id',$id);
		$query = $this->db->get('tbl_products');

		if ($query) {
			return $query->row();
		}
	}

	public function updateProduct($data, $id){

		$this->db->where('id',$id);
		$query = $this->db->update('tbl_products', $data);

		if ($query) {
			return true;
		}else{
			return false;
		}

	}
	public function deleteItem($id){
		$this->db->where('id',$id);
		$query = $this->db->delete('tbl_products');

		if ($query) {
			return true;
		}else{
			return false;
		}
	}
}

?>