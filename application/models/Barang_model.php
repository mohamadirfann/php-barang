<?php

class Barang_model extends CI_model {
	public function getAllBarang($limit, $start, $keyword = null)
	{
		if($keyword){
			$this->db->like('namaBarang', $keyword);
		}
		// $this->db->form('')
		// $this->db->order_by("id", "asc");
		// $this->db->get('barang', $limit, $start)->result_array();
		$this->db->from('barang');
		$this->db->order_by("id", "asc");
		$this->db->limit($limit, $start);
		$query = $this->db->get(); 
		// $query = $this->db->select('*')->from('barang')->group_start()->get();
		return $query->result_array();
	}

	public function getBarangById($id)
	{
		return $this->db->get_where('barang', ['id' => $id])->row_array();
	}

	public function pageDataBarang()
	{
		return $this->db->get('barang')->num_rows();
	}

	public function tambahDataBarang($data)
	{
		$this->db->insert('barang', $data);
		return $this->db->affected_rows();
	}

	public function hapusDataBarang($id) 
	{
		$this->db->delete('barang', ['id' => $id]);
		return $this->db->affected_rows();
	}

	public function editDataBarang($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('barang', $data);
		return $this->db->affected_rows();
	}

	public function cariDataBarang()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('namaBarang', $keyword);
		return $this->db->get('barang')->result_array();
	}
}