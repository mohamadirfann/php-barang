<?php

class Barang_model extends CI_model
{
	public function getAllBarang()
	{
		$this->db->order_by("id", "asc");
		return $this->db->get('barang')->result_array();
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
}
