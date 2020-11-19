<?php

require 'functions.php';

//Variabel boolean tombol search
$search=false;
//Jumlah limit Doc yang digunakan
$limit=225;

// Mengecek tombol search sudah ditekan apa belum
if( isset($_POST["search"])){
   
   $search=true;
  //START EXECUTE TIME
  $startTime= microtime(true);
  //BACA INPUT USER
  $input=$_POST["keywords"];
  //MEMBERSIHKAN DATA DARI SPECIAL KARAKTER
  $input =preg_replace('/[^A-Za-z0-9\  ]/','', explode(' ',strtolower($input)));
  $input=join(' ',$input);
  //MENGHITUNG BANYAK STATE
  $nState=strlen(str_replace(" ","",$input))+3;

  //QUINTUPLE
  //SIMBOL
  $sig=array_unique(str_split(str_replace(" ","",$input)));
  $sig[]=" ";
  sort($sig);
  $sig[]="Σ";
  //START STATE
  $startState="A";
  //FINAL STATE
  $f=explode(" ",$input);
  sort($f);
  $finalState=chr(65+strlen($f[0])+2);
  //DELTA
  $deltaN=array(); 
  $deltaN=Transition($input,$nState,$sig,$f,$finalState);
  //STATE
  $state=array_keys($deltaN);
  //CHECK VALIDATE DOC
  $validDoc=array();
  $validDoc=NFA($limit,$sig,$deltaN,$finalState);

  //END EXECUTE TIME
  $endTime = microtime(true);
  $executeTime = $endTime - $startTime;

}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- CSS style.css-->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Title -->
    <title>Text Search NFA - Creative Technology</title>
  </head>
  
  <body style="background-color:#2c4666">
    <!-- awal navbar -->
    <?php include "navbar.php";?>
    <!-- akhir navbar -->

    <div class="container bg-light" style="margin-top:35px;width:1080px;padding:50px">
      <div class="warna">
        <h4 class="alert alert-primary text-center">Pengaplikasian dari NFA dalam Pencarian text</h4>
        <br><br>
        <h5>Cari Kata atau kalimat</h5>
        <ul class="navbar-nav">
        <form class="form-inline" action="" method="POST">
            <input class="form-control mr-sm-2" name="keywords"type="search" placeholder="Ketik kata atau kalimat disini" style="width:900px;" required>
            <button class="btn btn-outline-primary" type="submit" name="search"><i class="fas fa-search"></i></button>
        </form>
        </ul><br>
        
        <?php if($search==true): ?>
            <!-- PILIH MODE -->
            <h5>Pilih Mode</h5>
            <div class="row">
            <div class="mt-3">
                <!-- NAV TABS -->
                <ul class="nav nav-pills nav-justified shadow-sm p-3 bg-white rounded" id="myTab" role="tablist">
                <li class="nav-item mr-5" role="presentation">
                    <a class="nav-link text-dark active" id="umum-tab" data-toggle="tab" href="#umum" role="tab" aria-controls="umum" aria-selected="true"><b>Mode Umum</b> </a>
                </li>
                <li class="nav-item mr-5" role="presentation">
                    <a class="nav-link text-dark" id="develop-tab" data-toggle="tab" href="#develop" role="tab" aria-controls="develop" aria-selected="false"><b>Mode Develop</b></a>
                </li>
                </ul>
                <!-- AKHIR NAV TABS -->

                <!-- TAB PANES -->
                <div class="tab-content mt-3 shadow-sm p-3 mb-5 bg-white rounded">
                <!--MODE UMUM-->
                <div class="tab-pane p-3 fade show active" id="umum" role="tabpanel" aria-labelledby="umum-tab">
                    <!-- MENAMPILKAN HASIL PENCARIAN -->
                    <h5>Hasil Pencarian</h5>
                    <?php if(count($validDoc)==0){?>
                        <p>Hasil Tidak Ditemukan</p>
                    <?php } else {?>
                        <p> Keywords : <?php echo $input; ?></p>
                        <p>Ditemukan <?php echo count($validDoc).' dari '.$limit.' dokumen ('.round($executeTime,3).' second )'; ?></p>
                        <?php for($k=0; $k<count($validDoc); $k++): ?>
                            <div class="container bg-white" style="padding:15px;">
                                <a href="detailtext.php?id=<?php echo $validDoc[$k][0];?>"><h4 style="color:blue;"><?php echo $validDoc[$k][1]; ?> </h4></a>
                                <p><?php echo $validDoc[$k][2].' . . . '; ?></p>
                            </div>
                            <br><br>
                        <?php endfor;?>
                    <?php }?>
                    <!-- AKHIR PENCARIAN -->
                </div>
                <!--AKHIR MODE UMUM-->

                <!--MODE DEVELOVER-->
                <div class="tab-pane fade p-3" id="develop" role="tabpanel" aria-labelledby="develop-tab">
                    <!-- MENCETAK QUINTUPLE -->
                        <p> Keywords : <?php echo $input; ?></p>
                        <!-- MENCETAK QUINTUPLE -->
                        <h5>Quintuple</h5>
                        <p>M=(Q, Σ, δ, S, F)</p>
                        <p> Q = <?php echo '{'. join(" ,",$state).' }'?></p>
                        <p> Σ = <?php echo '{'. join(" ,",$sig).' }'?></p>
                        <p> S = <?php echo $startState ?></p>
                        <p> F = <?php echo '{ '.$finalState.' }' ?></p>
                        <p> δ = </p>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                <?php for($i=0; $i<count($state)+1; $i++){ ?>
                                    <tr>
                                        
                                        <?php for($j=0; $j<count($sig)+1; $j++){ ?>
                                            <?php if(($i==0) && ($j==0)) { ?>
                                            <td> </td>
                                            <?php } else if ($i==0) { ?>
                                                <th><p><?php echo $sig[$j-1]; ?></p> </th>
                                            <?php } else if($j==0){ ?>
                                                <th><p><?php echo $state[$i-1]; ?></p> </th>
                                            <?php } else{?>
                                                    <?php if(join(',',$deltaN[$state[$i-1]][$sig[$j-1]])=="") { ?>
                                                        <td><?php echo 'ø'; ?> </td>
                                                    <?php } else{?>
                                                        <td><?php echo '{'.join(',',$deltaN[$state[$i-1]][$sig[$j-1]]).'}'; ?> </td>
                                                    <?php }?>
                                            <?php } ?>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                                </table>
                            </div>
                        </div>
                    <!-- AKHIR QUINTUPLE -->
                    <br>

                    <!-- MENAMPILKAN HASIL PENCARIAN -->
                    <h5>Hasil Pencarian</h5>
                    <?php if(count($validDoc)==0){?>
                        <p>Hasil Tidak Ditemukan</p>
                    <?php } else {?>
                        <p>Ditemukan <?php echo count($validDoc).' dari '.$limit.' dokumen ('.round($executeTime,3).' second )'; ?></p>
                        <?php for($k=0; $k<count($validDoc); $k++): ?>
                            <div class="container bg-white" style="padding:15px;">
                            <a href="detailtext.php?id=<?php echo $validDoc[$k][0];?>"><h4 style="color:blue;"><?php echo $validDoc[$k][1]; ?> </h4></a>
                            <p><?php echo $validDoc[$k][2].' . . . '; ?></p>
                            <p class="text-success"><?php echo 'doc'.$validDoc[$k][0].'.txt'; ?></p>
                            </div>
                            <br>
                        <?php endfor;?>
                    <?php }?>
                    <!-- AKHIR PENCARIAN -->
                        
                <!--AKHIR MODE DEVELOVER-->
                </div>
                <!-- AKHIR TAB PANES -->

                <script>
                $('#myTab a').on('click', function (e) {
                    e.preventDefault()
                    $(this).tab('show')
                })
                </script>

            </div>
            </div>
            <!-- AKHIR PILIH MODE -->
        <?php endif; ?>


      </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Font awesome JQuery script -->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" data-auto-replace-svg="nest"></script>
  </body>
</html>