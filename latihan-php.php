<?php
$data = file_get_contents('data/pizza.json');
$menu = json_decode($data, true);

$menu = $menu["menu"];
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WPU Hut</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" width="120" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="#">All Menu</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container">

    <div class="row mt-3">
      <div class="col">
        <h1>All Menu</h1>
      </div>
    </div>

    <div class="row">
      <?php foreach ($menu as $row) : ?>
        <div class="col-md-4">
          <div class="card mb-3">
            <img src="img/menu/<?= $row["gambar"] ?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?= $row["nama"] ?></h5>
              <p class="card-text"><?= $row["deskripsi"] ?></p>
              <!-- number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)-->
              <h5 class="card-title">Rp. <?= number_format($row["harga"], 0, ',', '.') ?></h5>
              <a href="#" class="btn btn-primary">Pesan sekarang</a>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>