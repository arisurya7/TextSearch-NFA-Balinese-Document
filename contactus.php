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
    <title>Kontak Kami - Creative Technology</title>
  </head>
  <body>

    <!-- awal navbar -->
    <?php include "navbar.php";?>
    <!-- akhir navbar -->

    <section class="jumbotron text-center">
        <div class="container">
            <h1 style="margin-top:30px;" class="jumbotron-heading">Kontak Kami</h1>
            <p class="lead text-muted mb-0">Kontak Admin Creative Technology dengan mengirimkannya pesan atau mengisi form dibawah ini.</p>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kontak Kami</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Isi Form
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Masukkan nama" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Alamat Email</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Masukkan email" required>
                                <small id="emailHelp" class="form-text text-muted">Kami tidak akan membagikan email anda kepada siapapun.</small>
                            </div>
                            <div class="form-group">
                                <label for="message">Pesan</label>
                                <textarea class="form-control" id="message" rows="6" required></textarea>
                            </div>
                            <div class="mx-auto">
                            <button type="submit" class="btn btn-primary text-right">Kirim</button></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="card bg-light mb-3">
                    <div class="card-header bg-success text-white "><i class="fa fa-home"></i> Kontak Kami </div>
                    <div class="card-body">
                        <p>Our Team : </p>
                        <p>Ari Surya</p>
                        <p>Santhi</p>
                        <p>Rahgung</p>
                        <p>Udayana</p>
                        <p>Yoga Mahendra</p>
                        <p>-</p>
                        <p>Email : admin-ctech@gmail.com</p>
                        <p>Telp Kantor : 0361 8471317</p>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" data-auto-replace-svg="nest"></script>
  </body>
</html>