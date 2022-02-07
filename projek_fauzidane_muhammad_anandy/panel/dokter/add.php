<?php 
require_once '../../Control.php';

$query = "SELECT * FROM medis";
$medis = data($query);

if(isset($_POST['tambah'])){
	$kode 			= "DKT-".date('his');
	$nama 			= $_POST['nama'];
	$alamat 			= $_POST['alamat'];
	$telepon 		= $_POST['telepon'];
	$tarif 			= $_POST['tarif'];
	$med 			= $_POST['med'];

	if( !empty($kode) && !empty($nama) && !empty($alamat) && !empty($telepon) && !empty($tarif) && !empty($med) ){
		$query = "INSERT INTO dokter (kodedkt,namadkt,alamat,telepon,tarif,id_med) VALUES 
					('$kode','$nama','$alamat','$telepon','$tarif','$med') ";
		$insert = data($query);
		if($insert){
			header('Location:index.php');
		}
	}

}

 ?>
<?php require_once 'view/view.php'; head(); ?>

<div class="bungkus">

	<?php side(); ?>

	<div class="main">
		<div class="isimain">

				<!-- <div class="datatampil"> -->
						<div class="back">
							<a href="index.php" class="tmbl biru">Kembali</a>
						</div>

					<div class="dokter">
						<div class="form-abu">
								<div class="head-form">
									<h2>Tambah Data Dokter</h2>
								</div>
							<form action="" method="post">
								<label for="">Nama Dokter</label>
								<input type="text" name="nama" class="full" placeholder="Nama Dokter">
								<label for="">Spesialis Medis</label>
								<select name="med" class="f50">
						<?php while($row = mysqli_fetch_assoc($medis)){ ?>
									<option value="<?= $row['id_med']; ?>"><?= $row['med']; ?></option>
						<?php } ?>
								</select>
								<label for="">Alamat</label>
								<textarea name="alamat" class="full"></textarea>
								<label for="">Telepon</label>
								<input type="number" class="f50" name="telepon">
								<label for="">Tarif</label>
								<input type="number" class="f50" name="tarif">
								<label for=""></label>
								<input type="submit" value="Tambah Data" class="hijau" name="tambah">
							</form>
						</div>
					</div>
					
				<!-- </div> -->

		</div>
	</div>
<?php footer(); ?>

</div>
