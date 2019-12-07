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

		//Load library pagination
		$this->load->library('pagination');

		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		// $config['total_rows'] = $this->Barang_model->pageDataBarang();
		$this->db->like('namaBarang', $data['keyword']);
		$this->db->from('barang');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 4;

		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['barang'] = $this->Barang_model->getAllBarang($config['per_page'], $data['start'], $data['keyword']);

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
				// $config['max_width'] = '1024';
				// $config['max_height'] = '768';

				$this->upload->initialize($config);

				if (!$this->upload->do_upload('fotoBarang')) {
					Flasher::setFlash('gagal', 'ditambahkan', 'danger');
					header('Location: ' .  base_url() . 'barang');
					exit;
				} else {
					Flasher::setFlash('berhasil', 'ditambahkan', 'success');
					header('Location: ' .  base_url() . 'barang');
					exit;
				}
			} else {
				Flasher::setFlash('gagal', 'ditambahkan', 'danger');
				header('Location: ' .  base_url() . 'barang');
				exit;
			}
		} else {
			Flasher::setFlash('gagal', 'ditambahkan', 'danger');
			header('Location: ' .  base_url() . 'barang');
			exit;
		}
	}

	public function hapus($id)
	{
		if ($this->Barang_model->hapusDataBarang($id) > 0) {
			Flasher::setFlash('berhasil', 'dihapus', 'success');
			header('Location: ' .  base_url() . 'barang');
			exit;
		} else {
			Flasher::setFlash('gagal', 'dihapus', 'danger');
			header('Location: ' .  base_url() . 'barang');
			exit;
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
			Flasher::setFlash('berhasil', 'diperbarui', 'success');
			header('Location: ' . base_url() . 'barang');
			exit;
		} else {
			Flasher::setFlash('gagal', 'diperbarui', 'danger');
			header('Location: ' . base_url() . 'barang');
			exit;
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
			// $config['max_width'] = '1024';
			// $config['max_height'] = '768';

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('fotoBarang')) {
				Flasher::setFlash('gagal', 'diperbarui', 'danger');
				header('Location: ' .  base_url() . 'barang');
				exit;
			} else {
				Flasher::setFlash('berhasil', 'diperbarui', 'success');
				header('Location: ' .  base_url() . 'barang');
				exit;
			}
		} else {
			Flasher::setFlash('gagal', 'diperbarui', 'danger');
			header('Location: ' .  base_url() . 'barang');
			exit;
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
