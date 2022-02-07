<?php 
require_once 'view/view.php';
require_once '../Control.php';

if(!isset($_SESSION['user']) ){
	header('Location: ../index.php');
}


$id = $_GET['id'];


$query = "SELECT * FROM medis WHERE id_med = $id ";
$getnama = mysqli_fetch_assoc(data($query));

$query = "SELECT * FROM pasien ORDER BY namapsn ASC ";
$dafpasien = data($query);

$query = "SELECT * FROM dokter WHERE id_med = $id ";
$dafdokter = data($query);



if(isset($_POST['tambah'])){
	$med = $_POST['med'];
	$pasien = $_POST['pasien'];
	$dokter = $_POST['dokter'];

	if( !empty($med) && !empty($pasien) && !empty($dokter) ){
		$query = "INSERT INTO pendaftaran (dokter,pasien,med)
					VALUES ('$dokter','$pasien','$med') ";
		$daftar = data($query);
		if($daftar){
			header('Location: index.php');
		}else{
			echo "gagal";
		}
	}

}


 ?>

<?php head(); ?>
<div class="konten">
	<div class="mainop">
	
	<div class="k2 padding">
	<!-- <div class="pendaftaran"> -->
		<div class="form-abu border">
			<h2>Pendaftaran Polikinik <?= $getnama['med'] ?></h2>
			<form action="" method="post">
				<label for="">Nama Pasien</label>
				<!-- id med -->
				<input type="hidden" value="<?= $getnama['med'] ?>" name="med"> 
				<select name="pasien" class="full">
		<?php while($row = mysqli_fetch_assoc($dafpasien)){ ?>
					<option value="<?= $row['namapsn'] ?>"><?= $row['namapsn'] ?></option>
		<?php } ?>
				</select>
				<label for="">Pilih Dokter</label>
				<select name="dokter" class="full">
		<?php while($row = mysqli_fetch_assoc($dafdokter)){ ?>
					<option value="<?= $row['namadkt'] ?>"><?= $row['namadkt'] ?></option>
		<?php } ?>
				</select>
				<label for=""></label>
				<input type="submit" value="Daftarkan Pasien" class="biru" name="tambah">
			</form>
		</div>
	<!-- </div> -->
	</div>
	</div>
</div>
<?php footer(); ?>
