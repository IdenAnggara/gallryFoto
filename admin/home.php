<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <title>Website Galeri Foto</title>
</head>
<body>

    <div class="container mt-4">
        <form action="" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari gambar..." name="search">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>
    </div>
    </div>

    <div class="container">
        <div class="row">
            <?php 
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $tampil=mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.UserID=user.UserID WHERE JudulFoto LIKE '%$search%'");
            foreach($tampil as $tampils):
            ?>
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="card">
                <img src="uploads/<?= $tampils['NamaFile'] ?>" class="object-fit-cover" style="aspect-ratio: 16/9;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $tampils['JudulFoto'] ?></h5>
                        <p class="card-text text-muted">by: <?= $tampils['Username'] ?></p>
                        <a href="?url=detail&&id=<?= $tampils['FotoID'] ?>" class="btn btn-primary">Detail</a>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
