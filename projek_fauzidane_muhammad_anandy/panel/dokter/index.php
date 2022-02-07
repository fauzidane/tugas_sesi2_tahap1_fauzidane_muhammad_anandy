<?php 
require_once '../../Control.php';

if(!isset($_SESSION['user']) ){
	header('Location: ../index.php');
}

$query = "SELECT * FROM dokter,medis WHERE dokter.id_med = medis.id_med ";
$read = data($query);

if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	$query = "SELECT * FROM dokter,medis WHERE dokter.id_med = medis.id_med AND namadkt LIKE '%$cari%' ";
	$read = data($query);
}


 ?>

<?php require_once 'view/view.php'; head(); ?>
<div class="bungkus">

	<?php side(); ?>

	<div class="main">
		<div class="isimain">
				
					<center style="padding: 10px;"><h2>DAFTAR DOKTER</h2></center>
				<div class="datatampil">
					<div class="add">
						<a href="add.php" class="tmbl biru kiri">+ Tambah Data</a>
						<a href="cetak.php" class="tmbl lime kiri">Print Data</a>
						<form action="index.php" method="get" class="kanan">
							<input type="text" name="cari" placeholder="Cari data...">
							<button class="biru">Go</button>
						</form>
					</div>
					<label for="" class="clear"></label>
					<table class="full">
						<thead>
							<tr>
								<td>No</td>
								<td>Nama</td>
								<td>Kode Dokter</td>
								<td>Spesialis</td>
								<td>Telepon</td>
								<td>Tarif</td>
								<td>Opsi</td>
							</tr>
						</thead>
						<tbody>
<?php 
$no = 0;
while($row = mysqli_fetch_assoc($read) ){ 
$no++;
?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $row['namadkt'] ?></td>
								<td><?= $row['kodedkt'] ?></td>
								<td><?= $row['med'] ?></td>
								<td><?= $row['telepon'] ?></td>
								<td>Rp.<?= number_format($row['tarif']) ?></td>
								<td>
									<a href="edit.php?id=<?= $row['id_dokter'] ?>" class="tmbl biru">&#9998;</a>
									<a href="delete.php?id=<?= $row['id_dokter'] ?>" class="tmbl merah">&#10005;</a>
								</td>
							</tr>
<?php } ?>
						</tbody>
					</table>
				</div>

		</div>
	</div>
<?php footer(); ?>

</div>