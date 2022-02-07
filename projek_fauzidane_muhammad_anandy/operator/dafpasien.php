<?php 
require_once 'view/view.php';
require_once '../Control.php';

if(!isset($_SESSION['user']) ){
	header('Location: ../index.php');
}

$query = "SELECT * FROM pendaftaran";
$dafmed = data($query);

 ?>

<?php head(); ?>
<div class="konten">
	<div class="mainop">

		<div class="pilih">
			<h1>LIHAT DAFTAR PASIEN</h1>
		</div>
		<div class=" padding">
		<?php while($row = mysqli_fetch_assoc($dafmed)){ ?>
			<a href="list.php?med=<?= $row['med'] ?>">
				<div class="dafmed border">
					Pasien Med <?= $row['med'] ?>
				</div>
			</a>
		<?php } ?>
		</div>


	</div>
</div>
<?php footer(); ?>
