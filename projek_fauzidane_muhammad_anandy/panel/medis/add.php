<?php 
require_once '../../Control.php';


if(isset($_POST['tambah'])){
	$nama 			= $_POST['nama'];
	$kode 			= "MED-00".date('is');

	if( !empty($nama) ){
		$query = "INSERT INTO medis (med,kodemed) VALUES ('$nama','$kode') ";
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
									<h2>Tambah Medis</h2>
								</div>
							<form action="" method="post">
								<label for="">Nama Medis</label>
								<input type="text" name="nama" class="full" placeholder="Nama Med">
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