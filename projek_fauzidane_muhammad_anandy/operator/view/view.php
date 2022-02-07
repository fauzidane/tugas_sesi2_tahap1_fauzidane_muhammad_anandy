<?php function head(){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Med</title>
	<link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="navop">
	<div class="konten">
			<h2 class="kiri">&#9630;Sistem Informasi Poliklinik </h2>
			<a href="logout.php" class="kanan">Logout</a>
	</div>
</div>

<div class="sideop">
	<div class="konten">
		<a href="index.php"> Pendaftaran</a>
		<a href="dafpasien.php"> Lihat Daftar</a>
		<a href="pasien.php"> Registrasi Pasien</a>
		<a href="dokter.php"> Dokter</a>
		<a href="pemeriksaan.php"> Pemeriksaan</a>
		<a> Resep</a>
		<a href="pembayaran.php">Pembayaran</a>
	</div>
</div>

<?php } ?>
	

<?php function footer(){ ?>
<div class="footerop">
	
</div>
</body>
</html>
<?php } ?>
