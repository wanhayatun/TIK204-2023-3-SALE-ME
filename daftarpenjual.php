<?php 
session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: loginpenjual.php");
// 	exit;
// }
require 'functions.php';
if (isset($_POST["submit"])) {

	if(tambah($_POST) > 0 ) {
		echo "
		<script>
			alert('Data Berhasil Ditambahkan');
			document.location.href = 'loginpenjual.php';
		</script>
		";
	} 
    // else {
	// 	echo "
	// 	<script>
	// 		alert('Data Gagal Ditambahkan');
	// 		document.location.href = 'daftarpenjual.php';
	// 	</script>
	// 	";
	// }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <title>SALE ME</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="login">
            <form action="" method="POST">
                <h1>Daftar</h1>
                <hr>
                <p>SALE ME</p>
                <label for="">Username</label>
                <input type="text" name="nama" id="nama" required autocomplete="off" placeholder="Nama Toko">
                <label for="">Email</label>
                <input type="email" name="email" id="email" required autocomplete="off" placeholder="example@gmail.com">
                <label for="">Password</label>
                <input type="password" name="password" id="password" required autocomplete="off" placeholder="Password">
                <button type="submit" name="submit" class="btn btn-primary">Daftar</button>
                <p>
                    <a href="daftarpembeli.php">SignUp as Buyer</a>
                </p>
                <p>
                    <a href="loginpenjual.php">Already has Account? Login Here</a>
                </p>
            </form>
        </div>
        <div class="right">
            <img src="image.png" alt="">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>