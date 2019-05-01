<?php 
class dua{	
	function index($harga_awal){	
		if(isset($_POST['t_diskon'])&&isset($_POST['diskon'])){
			$harga_barang 	= $harga_awal;
			$t_diskon 	  	= $_POST['t_diskon'];
			$setelah_diskon = array();

			$diskon 		= $_POST['diskon'];
			foreach ($diskon as $key => $value) {
				$harga_barang = $this->hitungDiskon($harga_barang,$value);
				array_push($setelah_diskon, $harga_barang);
			}
			return end($setelah_diskon);
		}else{
			return 0;
		}

	}

	function hitungDiskon($harga,$diskon){
			$result = $harga;
			if($diskon != 0){
				$diskon 	= ($harga * $diskon)/ 100;
				$result  	= $result - $diskon; 
			}
			return $result;
		}
}
$t_diskon 	= isset($_POST['t_diskon']) ? $_POST['t_diskon'] : null;
$diskon 	= isset($_POST['diskon']) ? $_POST['diskon'] : null;
$object  	= new dua();
$harga 		= $object->index(100000);
?>

<form method="post" action="">
	<div class="col-md-12">
	  <div class="form-group">
	    <label>Harga Awal Barang : </label>
	    <input type="text" class="form-control" value="Rp. <?= number_format(100000) ?>" disabled />
	  </div>
	  <div class="form-group">
	    <label>Masukkan Jumlah Tingkat Diskon : </label>
	    <input type="number" class="form-control" placeholder="Jumlah Diskon" name="t_diskon"  id="t_diskon" value="<?= !empty($t_diskon) ? $t_diskon: "" ?>" required />
	  </div>
  	</div>
	<div class="col-md-11 offset-md-1" id="container_diskon">
		<div class="form-group">
	    	<div id="c_diskon"></div>
	  </div>
	</div>
	<div class="form-group hidden" id="set_diskon">
	    <label>Harga Setelah Diskon </label>
	    <input type="text" class="form-control" value="Rp. <?= number_format($harga) ?>" disabled />
	 </div>
	<button class="btn btn-info col-md-2 offset-md-5">Submit</button>
</form>	


<script type="text/javascript">
var total_diskon = <?= !empty($t_diskon) ? $t_diskon: 0 ?>;
var diskonz = <?= !empty($diskon) ? json_encode($diskon): '[undefined]' ?>;
var hasil = <?= !empty($t_diskon) ? $harga : 'undefined' ?>;
var tambah_diskon = function(t_diskon){
		let diskon;
	  	$('#c_diskon').empty();
	  	 for (var i = 1 ;  i <= t_diskon; i++) {
	  	 	diskon = $('<input/>', { 'type': "number", 'class' : 'form-control','placeholder':'Masukkan Diskon(%) ke '+i, 'name':'diskon[]','max':'100','id':'diskon'+i})
	  	 	$('#c_diskon').append(diskon);
	  	 }

	  	 if(diskonz[0] != undefined){
	  	 	diskonz.forEach(function(element,i) {
	  	 		console.log('#diskon'+(i+1));
	  	 		$('#diskon'+(i+1)).val(element);
			});
			diskonz = [];
	  	 }
	  	 if(hasil== undefined){
	  	 	$("#set_diskon").addClass('hidden');
	  	 }else{
	  	 	$("#set_diskon").removeClass('hidden');
	  	 }
	} 
var Mulai = function () {
	$(document).on('keyup','#t_diskon', function (e) {
	  	let t_diskon = this.value;
	 	tambah_diskon(t_diskon);
	 });

};

$(document).ready(function() {
      Mulai();
      tambah_diskon(total_diskon);
}); 
</script>