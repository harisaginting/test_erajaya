<?php 
	$tahun = isset($_POST['tahun']) ? $_POST['tahun'] : null;
	$saldo = 1000000;
	$bunga = 0.12 * $saldo;
?>

<form method="post" action="">
	<div class="col-md-12">
	  <div class="form-group">
	    <label>Masukkan Tahun : </label>
	    <input type="number" class="form-control" placeholder="Masukkan Tahun" name="tahun" value="<?= !empty($tahun) ? $tahun: "" ?>" required />
	  </div>
  	</div>
	<button class="btn btn-info col-md-2 offset-md-5">Submit</button>
</form>	

<?php if(!empty($tahun)) : ?>
	<div class="col-md-12">
		<p>Saldo Pak Ardi selama <?= $tahun ?> tahun adalah : Rp. <strong><?= number_format($saldo + ($bunga*$tahun)); ?></strong>  </p>
	</div>
<?php endif; ?>