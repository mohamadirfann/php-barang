<div class="container">

	<div class="row mt-3">
		<div class="col-lg-6">
			<div class="success" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
			<div class="error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-md-6">
			<button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
				<i class="fas fa-plus"></i> <strong>Tambah Barang</strong>
			</button>
		</div>
	</div>

	<div class="row">
		<div class="col-md">
			<h3 class="mt-3">Daftar Barang</h3>

			<div class="row mt-3">
				<div class="col-md-6">
					<form action="<?= base_url('barang'); ?>" method="post">
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Cari Barang .." name="keyword" autocomplete="off" autofocus>
							<div class="input-group-append">
								<input class="btn btn-primary" type="submit" name="submit" value="Cari">
							</div>
						</div>
					</form>
				</div>
			</div>
			<h5>Results : <?= $total_rows; ?></h5>
			<table class="table table-borderless table-hover">
				<thead class="thead-dark">
					<tr class="text-center">
						<th scope="col">#</th>
						<th scope="col">Foto Barang</th>
						<th scope="col">Nama Barang</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php if (empty($barang)) : ?>
						<tr>
							<td colspan="6">
								<div class="alert alert-danger" role="alert">
									Data barang tidak ditemukan
								</div>
							</td>
						</tr>
					<?php endif; ?>
					<?php foreach ($barang as $brg) : ?>
						<tr class="text-center">
							<th scope="row"><?= ++$start; ?></th>
							<td><img src="<?= base_url(); ?>upload/product/<?= $brg['fotoBarang']; ?>" alt="Photo" width="80"></td>
							<td><?= $brg['namaBarang']; ?></td>
							<td>
								<a href="<?= base_url(); ?>barang/detail/<?= $brg['id']; ?>" class="btn btn-primary"><i class="fas fa-expand" title="Detail"></i></a>
								<a href="<?= base_url(); ?>barang/edit/<?= $brg['id']; ?>" class="btn btn-primary tampilModalEdit" data-toggle="modal" data-target="#formModal" data-id="<?= $brg['id']; ?>"><i class="fas fa-edit" title="Edit"></i></a>
								<a href="<?= base_url(); ?>barang/hapus/<?= $brg['id']; ?>" class="btn btn-danger tombol-hapus"><i class="fas fa-trash-alt" title="Hapus"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?= $this->pagination->create_links(); ?>
		</div>
	</div>

</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="judulModal">Form Tambah Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">

				<form action="<?= base_url(); ?>barang/tambah" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
					<input type="hidden" name="id" id="id">
					<div class="form-group row">
						<label for="namaBarang" class="col-sm-4 col-form-label">Nama Barang</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="namaBarang" name="namaBarang" required>
							<div class="invalid-feedback">
								Field Nama Barang tidak boleh kosong.
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="hargaBeli" class="col-sm-4 col-form-label">Harga Beli</label>
						<div class="col-sm-8">
							<input type="number" class="form-control" id="hargaBeli" name="hargaBeli" required>
							<div class="invalid-feedback">
								Field Harga Beli tidak boleh kosong.
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="hargaJual" class="col-sm-4 col-form-label">Harga Jual</label>
						<div class="col-sm-8">
							<input type="number" class="form-control" id="hargaJual" name="hargaJual" required>
							<div class="invalid-feedback">
								Field Harga Beli tidak boleh kosong.
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="stok" class="col-sm-4 col-form-label">Stok Barang</label>
						<div class="col-sm-8">
							<input type="number" class="form-control" id="stok" name="stok" required>
							<div class="invalid-feedback">
								Field Stok Barang tidak boleh kosong.
							</div>
						</div>
					</div>
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="fotoBarang" name="fotoBarang" accept="image/x-png,image/jpeg" aria-describedby="inputGroupFileAddon03">
						<label class="custom-file-label" for="fotoBarang">Upload Foto</label>
					</div>
					<!-- <div>
						<label for="fotoBarang">Upload Foto</label><br>
						<input type="file" id="fotoBarang" name="fotoBarang">
					</div> -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger tombolCancel" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Tambah Data</button>
				</form>
			</div>
		</div>
	</div>
</div>