<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data album</title>
</head>
<body>
    <h1>Data Album</h1>

            <?php
         include 'koneksi.php';

         // Cek apakah parameter albumid ada dan merupakan bilangan bulat
         if (isset($_GET['hapus']) && isset($_GET['albumid']) && is_numeric($_GET['albumid'])) {
            // Gunakan fungsi mysqli_real_escape_string untuk menghindari SQL injection
            $albumid = mysqli_real_escape_string($conn, $_GET['albumid']);

            // Lakukan query delete
            $result = mysqli_query($conn, "DELETE FROM album WHERE AlbumID = '$albumid'");

            // Periksa jika query berhasil atau tidak
            if ($result) {
               echo "Berhasil menghapus album";
               header("Location: ?url=album");
               exit();
            } else {
               echo "Gagal menghapus album.";
            }
         }
         ?>

                    
    <table class="table table-hovered">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Nama Album</th>
                        <th>Deskripsi</th>
                        <th>Tanggal dibuat</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                        <?php
                        include 'koneksi.php';
                        $no = 1;
                        $data = mysqli_query($conn,"select * from album");
                        while($d = mysqli_fetch_array($data))
                        {
                        ?>
                        <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['NamaAlbum']; ?></td>
                        <td><?php echo $d['Deskripsi']; ?></td>
                        <td><?php echo $d['TanggalDibuat']; ?></td>
                        <td>
                        <a href="?url=album&&hapus&&albumid=<?= $d['AlbumID'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
    </table>
</body>
</html>