<?php  
class lima{	
	function index($t_baris,$baris){	
		$baris 		= $_POST['baris'];
		$c_baris 	= array();
		$c_baris_b 	= array();
		$arrBaris 	= array();
		foreach ($baris as $key => $value) {
			$value = preg_replace('/\s+/', ' ', strtoupper($value));
			$c_baris = explode(',', $value);
			echo "baris ".($key+1) ." = ";
			foreach ($c_baris as $key1 => $value1) {
				array_push($c_baris_b, intval($value1));
				echo $value1.",";
			}
			echo "<br>";
			array_push($arrBaris, $c_baris_b);
			$c_baris_b = array();
		}

		$c_baris = array();
		$key = 0;
		$key_m = array();
		$keys = array(0,1);
		foreach ($arrBaris as $key => $value) {
			// Belum Selesai baru menemukan angka terkecil tanpa membatasi pencarian disetiap indexnya
			if($key<=1){
				array_push($key_m, array_keys($value, min($value)));
			}else{
				array_push($key_m, array_keys($value, min($value)));
				//array_push($key_m, array_keys($value,  min( array_slice($value,$key_m[$key-1]-1,$key_m[$key-1]+1) )));
			}

		}
		echo "<br><br>Nilai Minimal Tiap Baris = <br>";
		foreach ($key_m as $key => $value) {
			echo "index ke ".($value[0]+1)." bernilai ";
			echo json_encode($arrBaris[$key][$value[0]])."<br>";
		}
		

	}
}

$t_baris 	= isset($_POST['t_baris']) ? $_POST['t_baris'] : null;
$baris 		= isset($_POST['baris']) ? $_POST['baris'] : null;
$object  	= new lima();
$shortest	= array();
if(isset($_POST['t_baris'])&&isset($_POST['baris'])){
	$shortest   = $object->index($t_baris,$baris);	
}

?>
<form method="post" action="">
	<div class="col-md-12">
	  <div class="form-group">
	    <label>Masukkan Jumlah Baris : </label>
	    <input type="number" class="form-control" placeholder="Jumlah Baris" name="t_baris"  id="t_baris" value="<?= !empty($t_baris) ? $t_baris: "" ?>" required />
	  </div>
  	</div>
	<div class="col-md-11 offset-md-1">
		<div class="form-group">
	    	<div id="c_baris"></div>
	  </div>
	</div>
	<button class="btn btn-info col-md-2 offset-md-5">Submit</button>
</form>	

<script type="text/javascript">
var total_baris = <?= !empty($t_baris) ? $t_baris: 0 ?>;
var tambah_baris = function(t_baris){
		let baris;
	  	$('#c_baris').empty();
	  	 for (var i = 1 ;  i <= t_baris; i++) {
	  	 	diskon = $('<input/>', { 'type': "text", 'class' : 'form-control','placeholder':'Masukkan Nilai Ke Baris '+i+' Dispisahkan dengan koma', 'name':'baris[]','id':'baris'+i})
	  	 	$('#c_baris').append(diskon);
	  	 }
	} 
var Mulai = function () {
	$(document).on('keyup','#t_baris', function (e) {
	  	let t_baris = this.value;
	 	tambah_baris(t_baris);
	 });

};

$(document).ready(function() {
      Mulai();
      //tambah_baris(total_baris);
}); 
</script>