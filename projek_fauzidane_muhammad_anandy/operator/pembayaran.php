<?php 
require_once 'view/view.php';
require_once '../Control.php';

if(!isset($_SESSION['user']) ){
	header('Location: ../index.php');
}

$id = $_GET['id'];

$query1 = "SELECT * FROM pasien ORDER BY namapsn ASC";
$dafpasien = data($query1);

$query2 = "SELECT * FROM dokter WHERE id_med = $id";
$tarif = data($query2);

$query3 = "SELECT * FROM medis WHERE id_med = $id ";
$row = mysqli_fetch_assoc(data($query3));
$getmed = $row['med'];

$query4 = "SELECT * FROM pendaftaran WHERE med = $getmed";
$row = mysqli_fetch_assoc(data($query4));
$getidpen = $row['id_pendaftaran'];

$query5 = "SELECT * FROM pemeriksaan WHERE id_pendaftaran = $getidpen";
$row = mysqli_fetch_assoc(data($query5));
$getidpem = $row['id_pemeriksaan'];

$query6 = "SELECT * FROM resep WHERE id_pemeriksaan = $getidpem";
$getresep = data($query6);
$row = mysqli_fetch_assoc($getresep);
$jumlah = $row['jumlah'];
$idobat = $row['id_obat'];

$query7 = "SELECT * FROM obat WHERE id_obat = $idobat";
$row = mysqli_fetch_assoc($query7);
$harga = $row['harga'];
 ?>

<?php head(); ?>
<div class="konten">
	<div class="mainop">
	
	<div class="pendaftaran">
		<div class="form-abu border">
			<h2>Pembayaran Med</h2>
			<form action="" method="post">
				<label for="">Nama Pasien</label>
				<select name="pasien" class="f50">
		<?php while($row = mysqli_fetch_assoc($dafpasien)){ ?>
					<option value=""><?= $row['namapsn'] ?></option>
		<?php } ?>
				</select>
				<label for="">Nama Dokter</label>
				<select name="dokter" class="f50">
				<?php while($row = mysqli_fetch_assoc($tarif)){?>
				<option value=""><?= $row['namadkt']?></option>	
				<?php } ?>
				</select>
				<div class="k2 padding">
		<table>
			<thead>
				<tr>
				
				
					<td>Tarif</td>
					<td>Resep</td>
					<td>Total</td>
				</tr>
			</thead>
			
			<tbody>
			
				<tr>
					<td>Rp <?= $htarif = number_format($row['tarif']) ?></td>
					
					<td>Rp <?= $hresep = number_format($$harga*$jumlah)?> </td>
					<td>Rp <?= $total = number_format($htarif+$hresep) ?> </td>
				</tr>
			</tbody>
		</table>
	</div>
				<label for="">Bayar</label>
				<?= $bayar = $_POST['bayar'];?>
				<input type="number" placeholder="Bayar" class="f50" name="bayar" id="bayar">
				
				<tr>
				
					<td> Kembali</td>
					<td>><?= $bayar - $total?></td>
				</tr>
				
				<label for=""></label>
				<input type="submit" value="Bayar" class="biru" name="tambah">
			</form>
		</div>
	</div>

	</div>
</div>
<?php footer(); ?>
