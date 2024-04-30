<?php include 'koneksi.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Website Galeri Foto</title>
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-dak">
   <div class="container">
      <div class="row justify-content-center align-items-center vh-100">
         <div class="col-5">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Halaman Login</h4>
                  <p class="card-title">Login Akun</p>
                  <?php
                        if (isset($_POST['submit'])) {
                            $username = $_POST['username'];
                            $password = md5($_POST['password']);
                            $role = $_POST['role']; // Ambil peran pengguna dari form
                            
                            // Cek apakah username dan password yang dimasukkan ada di database sesuai dengan peran pengguna
                            $sql=mysqli_query($conn, "SELECT * FROM user WHERE Username='$username' AND Password='$password'");
                     $cek=mysqli_num_rows($sql);
                            if ($cek != 0) {
                                // Ambil data dari database untuk membuat session
                                $sesi = mysqli_fetch_array($sql);
                                echo 'Login Berhasil!!!';
                                $_SESSION['username'] = $sesi['Username'];
                                $_SESSION['user_id'] = $sesi['UserID'];
                                $_SESSION['email'] = $sesi['Email'];
                                $_SESSION['nama_lengkap'] = $sesi['NamaLengkap'];
                                $_SESSION['role'] = $sesi['Role']; // Simpan peran pengguna dalam session
                                // Redirect sesuai peran pengguna
                                if ($role == 'admin') {
                                    header('Location: index_admin.php');
                                } else {
                                    header('Location: index.php');
                                }
                                exit;
                            } else {
                                echo 'Login Gagal!!!';
                            }
                        }
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <input type="submit" name="submit" value="Login" class="btn btn-danger my-3">
                            <p>Belum Punya Akun? <a href="daftar.php" class="link-danger">Daftar Sekarang</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
