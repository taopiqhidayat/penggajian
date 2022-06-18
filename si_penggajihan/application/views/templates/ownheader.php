<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<!-- Online -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!-- Offline -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">

	<!-- My Style -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">

	<title><?= $judul; ?></title>
</head>

<body>

	<nav class="navbar fixed-top navbar-expand-lg navbar-light">
		<a class="navbar-brand" href="<?= base_url('owner'); ?>">SI Penggajihan</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="<?= base_url('owner'); ?>">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Profile
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?= base_url('owner/myprofil'); ?>">My Profile</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?= base_url('owner/profil_perusahaan'); ?>">Perusahaan</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('owner/data_karyawan'); ?>">Karyawan</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('owner/laporan'); ?>">Laporan</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="#">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Help</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('owner/logout'); ?>" class="badge badge-pill badge-danger" onclick="return confirm('Apakah Anda yakin akan keluar?');">Logout</a>
				</li>
			</ul>
		</div>
	</nav>