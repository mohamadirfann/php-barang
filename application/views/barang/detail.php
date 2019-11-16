<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			
			<div class="card mb-3" style="max-width: 540px;">
				<div class="row no-gutters">
					<div class="col-md-4">
						<img src="<?= base_url(); ?>upload/product/<?= $barang['fotoBarang']; ?>" class="card-img" alt="Photo">
					</div>
					<div class="card col-md-8">
						<div class="card-header text-justify">
							<h3><?= $barang['namaBarang']; ?></h3>
						</div>
						<div class="card-body">
							<p class="card-text text-primary font-weight-bold">Harga Beli Rp <?= number_format($barang['hargaBeli'], 2, ",", "."); ?></p>
							<p class="card-text text-primary font-weight-bold">Harga Jual Rp <?= number_format($barang['hargaJual'], 2, ",", "."); ?></p>
							<p class="card-text"><small>Stok Sisa <?= $barang['stok']; ?></small></p>
							<a href="<?= base_url(); ?>barang" class="btn btn-primary mt-2">Kembali</a>
						</div>
					</div>
				</div>
			</div>

			<!-- <div class="card">
				<div class="card-header">
					Detail Barang
				</div>
				<div class="card-body">
					<h5 class="card-title">Nama Barang: <?= $barang['namaBarang']; ?></h5>
					<p class="card-text">Harga Beli: Rp. <?= $barang['hargaBeli']; ?></p>
					<p class="card-text">Harga Jual: Rp. <?= $barang['hargaJual']; ?></p>
					<h6 class="card-subtitle mb-2 text-muted">Stok Barang: <?= $barang['stok']; ?></h6>
					<img src="" alt="default.jpg">
					<div>
					<a href="<?= base_url(); ?>barang" class="btn btn-primary mt-2">Kembali</a>
					</div>
				</div>
			</div> -->

		</div>
	</div>
</div>