<?php 
function romawiKeArab($encode){
	$result = 0;
	$rumus= array(
	    'M' => 1000,
	    'CM' => 900,
	    'D' => 500,
	    'CD' => 400,
	    'C' => 100,
	    'XC' => 90,
	    'L' => 50,
	    'XL' => 40,
	    'X' => 10,
	    'IX' => 9,
	    'V' => 5,
	    'IV' => 4,
	    'I' => 1,
	);

	foreach ($rumus as $key => $value) {
	    while (strpos($encode, $key) === 0) {
	        	$result += $value;
	        	$encode = substr($encode, strlen($key));
	    	}
		}

	return $result;
}

if(isset($_POST['encode'])){
	$encode = preg_replace('/\s+/', ' ', strtoupper($_POST['encode']));
	$romawi = romawiKeArab($encode);
}


?>

<form method="post" action="">
	<div class="col-md-12">
	  <div class="form-group">
	    <label>Masukan Angka Romawi : </label>
	    <input type="text" class="form-control" placeholder="Masukkan Teks" name="encode" value="<?= !empty($encode) ? $encode: "" ?>"/>
	  </div>


	  <?php if(!empty($romawi)) : ?>
	  	<div class="form-group">
		    <label>Hasil Konversi Ke Angka Arab : </label>
		    <input type="text" class="form-control" value="<?= $romawi ?>" readonly/>
		  </div>
	  <?php endif; ?>
  	</div>
	<button class="btn btn-info col-md-2 offset-md-5">Encode</button>
</form>	