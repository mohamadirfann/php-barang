<div class="container">
	<div class="row mt-4">
		<div class="col-lg-4 col-md-6">

			<div class="card mb-5 shadow-lg border-0">
				<div class="card-header text-center font-weight-bold">Detail Barang</div>
				<img class="img-fluid" src="<?= base_url(); ?>upload/product/<?= $barang['fotoBarang']; ?>" class="img-thumbnail" alt="Photo" />
				<div class="card-body">
					<div class="d-flex justify-content-between">
						<h4 class="card-title font-weight-bold"><?= $barang['namaBarang']; ?></h4>
						<label class="_addtoFav">
							<input type="checkbox" name="favorite" class="d-none">
							<i class="fas fa-heart fa-lg _active d-none _textPink"></i>
							<i class="far fa-heart fa-lg _inactive _textPink"></i>
						</label>
					</div>
					<div class="card-subtitle text-truncate text-muted my-2">
						Barang ini dijual. Berminat hubungi 08921xxxx.
					</div>
					<div class="card-text d-flex justify-content-between mt-5 mb-3">
						<span>Stok <?= $barang['stok']; ?></span>
						<span class="_priceSection position-relative">
							<div class="_now h5 _textBlue">Rp<?= number_format($barang['hargaJual'], NULL, ",", "."); ?></div>
							<del class="position-absolute _before h6 text-muted">Rp<?= number_format($barang['hargaBeli'], NULL, ",", "."); ?></del>
						</span>
					</div>
					<a href="<?= base_url(); ?>barang" class="btn btn-primary d-inline-flex p-3 _cartBtn position-absolute rounded-0 text-uppercase"><span>Kembali</span></a>
				</div>
			</div>

		</div>
	</div>
</div>