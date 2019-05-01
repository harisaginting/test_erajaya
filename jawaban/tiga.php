<?php 
	$ascii = array();
	$ascii[0] = array('@','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O');
	$ascii[1] = array('P','Q','R','S','T','U','V','W','X','Y','Z','[','\\',']','^','_');


	$encode = isset($_POST['encode']) ? $_POST['encode'] : null;
	if(!empty($encode)){
		$encode = preg_replace('/\s+/', ' ', strtoupper($encode));
		$arr_encode = str_split($encode);
		$arr_decode = array();

		foreach ($arr_encode as $key => $value) {
			$l = in_array($value, $ascii[1]) ? 1 : 0;
			$m = ($l != 1)? 1 : 0;
			$key = array_search($value, $ascii[$l]);
			array_push($arr_decode, $ascii[$m][$key]);			 
		}

		$decode = implode('', $arr_decode);
	}

?>

<form method="post" action="">
	<div class="col-md-12">
	  <div class="form-group">
	    <label>Encode : </label>
	    <input type="text" class="form-control" placeholder="Masukkan Teks" name="encode" value="<?= !empty($encode) ? $encode: "" ?>"/>
	  </div>


	  <?php if(!empty($decode)) : ?>
	  	<div class="form-group">
		    <label>Hasil Decode : </label>
		    <input type="text" class="form-control" value="<?= $decode ?>" readonly/>
		  </div>
	  <?php endif; ?>
  	</div>
	<button class="btn btn-info col-md-2 offset-md-5">Encode</button>
</form>	