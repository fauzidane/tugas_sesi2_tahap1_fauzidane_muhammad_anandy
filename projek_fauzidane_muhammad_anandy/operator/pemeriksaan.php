<?php
require_once 'view/view.php';
require_once '../Control.php';

if(!isset($_SESSION['user']) ){
	header('Location: ../index.php');
}
$query = "SELECT * FROM pemeriksaan";
$pemeriksaan = data($query))

$querydaftar = "SELECT * FROM pendaftaran  ";
$tanggaldaftar = data($querydaftar);

$queryobat = "SELECT * FROM obat ";
$namaobat = data($queryobat);
		
		if(isset($_POST['tambah'])){
			$keluhan =$_POST['keluhan'];
			$diagnosa =$_POST['diagnosa'];
			$tanggaldaftar= $_POST['tanggal_daftar']
			if(isset($_SESSION['id_pemeriksaan'])){
				$_SESSION['id_pemeriksaan']++;
			}
			else{
				$_SESSION['id_pemeriksaan']=1;
			}
			$_SESSION['id_pemeriksaan'] = $idpemeriksaan;
			$namaobat = $_POST['namaobat'];
			$dosis = $_POST['dosis'];
			$jumlah = $_POST['jumlah'];
			
			if( !empty($keluhan) && !empty($diagnosa) && !empty($tanggaldaftar) && !empty($namaobat) && !empty($dosis) && !empty($jumlah)){
		$query1 = "INSERT INTO pemeriksaan (id_pemeriksaan,keluhan,diagnosa,id_pendaftaran) values('$idpemeriksaan','$keluhan','$diagnosa','$tanggaldaftar')";
		$periksa = data($query1);
		$query2 = "INSERT INTO resep (dosis,jumlah,id_pemeriksaan,id_obat) values ('$dosis','$jumlah','$idpemeriksaan','$idobat')"
		
		if($periksa){
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
		<div class="form-abu border">
			<h2>Pemeriksaan Poliklinik </h2>
			<form action="" method="post">
				<label for="">Tangal Pendaftaran</label>
				<select name="tanggal_daftar" class="full">
		<?php while($row = mysqli_fetch_assoc($tanggaldaftar)){ ?>
					<option value="<?= $row['id_pendaftaran'] ?>"><?= $row['tanggal_daftar'] ?></option>
		<?php } ?>
				</select>
				<label for="">Nama Pasien</label>
				<label><?= $row['pasien'] ?> </label>
				<label for="">Keluhan</label>
				<input type="text" class="full" name="keluhan">
				<label for="">Diagnosa</label>
				<input type="text" class="full" name="diagnosa">
				<label for=""></label>
				<input type="submit" value="Tambahkan Pemeriksaan" class="biru" name="tambah">
			</form>
		</div>
	<!-- </div> -->
	</div>

	</div>
</div>
<?php footer(); ?>