<?php 
require_once '../../Control.php';

$id = $_GET['id'];
$query = "SELECT * FROM medis,dokter WHERE medis.id_med,dokter.id_med = $id ";
$read = data($query);


 ?>

<?php require_once 'view/view.php'; head(); ?>
<div class="bungkus">

	<?php side(); ?>

	<div class="main">
		<div class="isimain">
				
				<div class="datatampil">
					<center style="padding: 10px;"><h2>DETAIL DOKTER MEDIS</h2></center>
					<div class="add">
						<a href="index.php" class="tmbl biru kiri">Kembali</a>
					</div>
					<label for="" class="clear"></label>
					<table class="full">
						<thead>
							<tr>
								<td>No</td>
								<td>Nama Dokter</td>
								<td>Spesialis Medis</td>
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
								<td><?= $row['med'] ?></td>
							</tr>
<?php } ?>
						</tbody>
					</table>
				</div>

		</div>
	</div>
<?php footer(); ?>

</div>