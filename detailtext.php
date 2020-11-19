<?php

// Menghubungkan dengan functions.php
require 'functions.php';

//Mengambil id dari superglobal $_GET
$id=$_GET["id"];
//Melakukan query
$query=mysqli_query($conn,"select * from docbali where id=$id");
while ($data=mysqli_fetch_assoc($query)){
    $judul=$data["judul"];
    $isi=$data["isi"];
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
    <!-- CSS style.css -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Title -->
    <title>Text Search NFA - Creative Technology</title>
  </head>
  <body style="background-color:#2c4666">
    
    <!-- awal navbar -->
    <?php include "navbar.php";?>
    <!-- akhir navbar -->
    
    <!-- content detail  -->
    <div class="container bg-light" style="margin-top:35px;width:1080px;padding:50px">
      <div class="warna">
        <br><br>
        <h5>Detail Document</h5>
        <!-- tombol kembali -->
        <a href="textsearch.php" style="text-decoration:none;"><button type="button" class="btn btn-primary" style="margin-top:10px;">Back</button></a>
        <!-- tampilan -->
        <div class="container bg-white p-5">
            <!-- judul -->
            <h4 style="color:blue;"><?php echo $judul; ?> </h4><br><br>
            <!-- isi -->
            <p><?php echo $isi; ?></p>
        </div>
        <br>
    </div>
    <!-- akhir content detail -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Font awesome JQuery script -->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" data-auto-replace-svg="nest"></script>

  </body>
</html>