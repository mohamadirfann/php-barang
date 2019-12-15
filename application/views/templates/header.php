<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">

	<!-- Font Awesome CSS -->
	<link href="<?= base_url(); ?>assets/vendor/fontawesome/css/all.min.css" rel="stylesheet">

	<!-- Data Tables CSS -->
	<link href="<?= base_url(); ?>assets/vendor/datatables/datatables.min.css" rel="stylesheet">

	<!-- My CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">


	<title><?= $judul; ?></title>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container py-2">
			<a class="navbar-brand" href="<?= base_url(); ?>"><i class="fas fa-store fa-lg"></i></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-item nav-link <?php if ($this->uri->segment(1) == "") {
													echo "active";
												} ?>" href="<?= base_url(); ?>">Home</a>
					<a class="nav-item nav-link <?php if ($this->uri->segment(1) == "barang") {
													echo "active";
												} ?>" href="<?= base_url(); ?>barang">Barang</a>
					<a class="nav-item nav-link <?php if ($this->uri->segment(1) == "about") {
													echo "active";
												} ?>" href="<?= base_url(); ?>about">About</a>
				</div>
			</div>
		</div>
	</nav>