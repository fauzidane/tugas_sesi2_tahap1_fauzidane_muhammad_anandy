<?php 
require_once 'view/view.php';
require_once '../Control.php';

if(!isset($_SESSION['user']) ){
	header('Location: ../index.php');
}

$query = "SELECT * FROM medis";
$dafmed = data($query);

 ?>

<?php head(); ?>
<div class="konten">
	<div class="mainop">

		<div class="pilih">
			<h1>Pilih Med</h1>
		</div>
		<div class="k2 padding">
		<?php while($row = mysqli_fetch_assoc($dafmed)){ ?>
			<a href="daftar.php?id=<?= $row['id_med'] ?>">
				<div class="dafmed border">
					Med <?= $row['med'] ?>
				</div>
			</a>
		<?php } ?>
		</div>
	
		<div class="k2 padding">
			<div class="pilimg">
				<img src="../asset/medik.png" alt="">
			</div>
		</div>


	</div>
</div>
<?php footer(); ?>
