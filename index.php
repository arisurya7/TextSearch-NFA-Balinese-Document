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
    <title>Creative Technology</title>
  </head>
  <body>

    <!-- awal navbar -->
    <?php include "navbar.php";?>
    <!-- akhir navbar -->

    <!-- Isi halaman slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <!--Slider Pertama -->
        <div class="carousel-item active">
          <img src="img/slider 1.jpg" style="margin-top:30px" class="d-block w-100" alt="Fist slide">
          <div class="carousel-caption d-none d-md-block">
            <p class="display-4" style=" color:white;
                                        text-align:center;
                                        margin-top:-500px;
                                        font-size:60px;">Selamat datang di<br><b>Creative Technology,</b></p>
            <hr class="my-4" style="border-color:#515db2;width:70px;border-width:4px">
            <p class="lead"style="color:white;font-size:20px;">Creative Technology merupakan situs website teknologi untuk anak milenial yang tidak mau ribet dan instant dengan sekali klik. Kami baru saja menyelesaikan fitur baru yaitu Pengaplikasian dari NFA dalam pencarian text. Klik tombol dibawah ini untuk mencoba. </p>
            <a class="btn btn-dark btn-lg" style="background-color:#515db2; color:white;"href="textsearch.php" role="button">Coba Fitur</a>
          </div>
        </div>
        <!--Slider Kedua -->
        <div class="carousel-item">
          <img src="img/slider 2.jpg" style="margin-top:50px"class="d-block w-100" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <h1 style="margin-top:-420px;">Mudah dan Gratis.</h1>
            <p>Website ini dibangun dengan kemudahan akses dan tentunya gratis bagi semua kalangan yang ingin menggunakan fitur yang telah kami buat. Aplikasi berbasis web tidak membutuhkan instalasi di komputer atau gadget sehingga proses pengaksesannya lebih mudah dan dapat berjalan dengan lebih cepat, bersifat multiplatform atau dapat digunakan dari semua gadget. Mulai dari komputer, tablet, hingga smartphone.</p>
          </div>
        </div>
        <!--Slider Ketiga -->
        <div class="carousel-item">
          <img src="img/slider 3.jpg" style="margin-top:80px" class="d-block w-100" alt="Third Slide">
          <div class="carousel-caption d-none d-md-block">
            <h1 style="margin-top:-400px;">Efisien dan minimalis.</h1>
            <p>selain mudah dan cepat, pada website ini kami membuat tampilan yang efisien dan minimalis, sehingga semua kalangan dapat dengan mudah memahaminya dan mengaksesnya.</p>
          </div>
        </div>
      </div>
      <!--Control next dan prevnya -->
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
     
    <!-- JS buat slider bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>