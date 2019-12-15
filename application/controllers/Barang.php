<?php

class Barang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = 'Daftar Barang';
		$data['barang'] = $this->Barang_model->getAllBarang();

		$this->load->view('templates/header', $data);
		$this->load->view('barang/index', $data);
		$this->load->view('templates/footer');
	}

	public function cekData($data, $list)
	{
		$split = explode(',', preg_replace("/ /", "", $list));
		foreach ($split as $spl => $value) {
			$val = $data[$value];
			if ($val === "" || $val ===  0) {
				return false;
			}
		}
		return true;
	}

	public function tambah()
	{
		if ($this->cekData($_POST, "namaBarang, hargaBeli, hargaJual, stok") && $_FILES['fotoBarang']['name'] != '') {
			$fileName =  uniqid();
			$_POST['fotoBarang'] = $fileName . "." . explode('.', $_FILES['fotoBarang']['name'])[1];
			array_shift($_POST);
			if ($this->Barang_model->tambahDataBarang($_POST) > 0) {
				$this->load->library('upload');
				$config['upload_path'] = './upload/product';
				$config['allowed_types'] = 'jpg|png';
				$config['file_name'] = $fileName;
				$config['overwrite'] = true;
				$config['max_size']     = '100';

				$this->upload->initialize($config);

				if (!$this->upload->do_upload('fotoBarang')) {
					$this->session->set_flashdata('error', 'Ditambahkan');
					redirect('barang');
				} else {
					$this->session->set_flashdata('success', 'Ditambahkan');
					redirect('barang');
				}
			} else {
				$this->session->set_flashdata('error', 'Ditambahkan');
				redirect('barang');
			}
		} else {
			$this->session->set_flashdata('error', 'Ditambahkan');
			redirect('barang');
		}
	}

	public function hapus($id)
	{
		if ($this->Barang_model->hapusDataBarang($id) > 0) {
			$this->session->set_flashdata('success', 'Dihapus');
			redirect('barang');
		} else {
			$this->session->set_flashdata('error', 'Dihapus');
			redirect('barang');
		}
	}

	public function detail($id)
	{
		$data['judul'] = 'Detail Barang';
		$data['barang'] = $this->Barang_model->getBarangById($id);
		$this->load->view('templates/header', $data);
		$this->load->view('barang/detail', $data);
		$this->load->view('templates/footer');
	}

	public function getedit()
	{
		echo json_encode($this->Barang_model->getBarangById($_POST['id']));
	}

	public function editWithoutUpload()
	{
		if ($this->Barang_model->editDataBarang($_POST) > 0) {
			$this->session->set_flashdata('success', 'Diperbarui');
			redirect('barang');
		} else {
			$this->session->set_flashdata('error', 'Diperbarui');
			redirect('barang');
		}
	}

	public function editWithUpload()
	{
		$fileName =  uniqid();
		$_POST['fotoBarang'] = $fileName . "." . explode('.', $_FILES['fotoBarang']['name'])[1];
		if ($this->Barang_model->editDataBarang($_POST) > 0) {
			$this->load->library('upload');
			$config['upload_path'] = './upload/product';
			$config['allowed_types'] = 'jpg|png';
			$config['file_name'] =  $fileName;
			$config['max_size']     = '100';

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('fotoBarang')) {
				$this->session->set_flashdata('error', 'Diperbarui');
				redirect('barang');
			} else {
				$this->session->set_flashdata('success', 'Diperbarui');
				redirect('barang');
			}
		} else {
			$this->session->set_flashdata('error', 'Diperbarui');
			redirect('barang');
		}
	}

	public function edit()
	{
		if ($_FILES['fotoBarang']['name'] == '') {
			$this->editWithoutUpload();
		} else {
			$this->editWithUpload();
		}
	}
}
