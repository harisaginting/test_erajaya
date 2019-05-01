<!DOCTYPE html>
<html>
<head>
	<title>Test Erajaya 02 Mei 2019</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        .row{
            margin: 10px 0px;
        }
        .hidden{
            display: none;
        }
    </style>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<?php 
    $soal =  isset($_GET['soal']) ? $_GET['soal'] : null;    
?>

<body>
    <div class="col-md-10 offset-md-1">    
            <div class="row">
                <div class="col-md-12">
                    <div class="card row">
                        <div class="card-header">
                            <h4>Test Erajaya 02 Mei 2019</h4>
                            <h6><strong>Harisa Ginting</strong> <small>harisaginting@gmail.com</small></h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <a class="list-group-item list-group-item-action <?= $soal == '1'  ? 'active' : ''  ?>" 
                                    href="index.php?soal=1">Soal 1 [Bunga Bank]</a> 
                                <a class="list-group-item list-group-item-action <?= $soal == '2'  ? 'active' : ''  ?>" 
                                    href="index.php?soal=2">Soal 2 [Perkalian]</a> 
                                <a class="list-group-item list-group-item-action <?= $soal == '3'  ? 'active' : ''  ?>" 
                                    href="index.php?soal=3">Soal 3 [Encoding Decoding]</a> 
                                <a class="list-group-item list-group-item-action <?= $soal == '4'  ? 'active' : ''  ?>" 
                                    href="index.php?soal=4">Soal 4 [Konvesi Angka Romawi Ke Angka Arab]</a> 
                                <a class="list-group-item list-group-item-action <?= $soal == '5'  ? 'active' : ''  ?>" 
                                    href="index.php?soal=5">Soal 5 [Shortest Part Problem] <div class="badge badge-danger">Belum Selesai</div> </a> 
                            </ul>
                        </div>
                    </div>
                </div>
        
                
                <div class="col-md-12">
                    <?php if(!empty($soal)) :  ?>
                    <div class="card row">
                        <div class="card-header">
                            <h6>Jawaban Soal No. <?= $soal ?> </h6>
                        </div>
                        <div class="card-body">
                            <?php 
                                switch ($soal) {
                                    case '1':
                                        include "jawaban/satu.php";
                                        break;
                                    case '2':
                                        include "jawaban/dua.php";
                                        break;
                                    case '3':
                                        include "jawaban/tiga.php";
                                        break;
                                    case '4':
                                        include "jawaban/empat.php";
                                        break;
                                    case '5':
                                        include "jawaban/lima.php";
                                        break;         
                                    default:
                                        echo "<center><h3>Maaf. Halaman tidak ditemukan !</h3></center>";
                                        break;
                                }
                            ?>
                        </div>
                    </div>
                    <?php else: ?>
                        <label>Silahkan Klik salah satu soal</label>
                    <?php endif; ?>
                </div>
                
            </div>
    </div>
</body>
</html>