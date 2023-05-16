<?php 
session_start();

if (isset($_SESSION["login"])) {
	header("Location: indexp.php");
	exit;
}

require 'functions.php';

if (isset($_POST["login"])) {
	$nama = $_POST["nama"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM seller WHERE nama = '$nama' AND password = '$password'");

	if(mysqli_num_rows($result) === 1){
		// $row = mysqli_fetch_assoc($result);
		// if (password_verify($password, $row["password"])){
		// 	header("Location: index.php");
		// 	exit;
		$_SESSION["login"] = true;
 		header("Location: indexp.php");
	}

	$error = true;

}
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>SaleMe</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="login">
            <form method="POST" action="">
                <h1>Login as Seller</h1>
                <hr>
                <p>SALE ME</p>
                <label for="">Username</label>
                <input type="text" name="nama" id="nama" required autocomplete="off" placeholder="saleme@gmail.com">
                <label for="">Password</label>
                <input type="password" name="password" id="password" required placeholder="Password">

                <?php  if(isset($error)) : ?>
                <p>Username Atau Password salah</p>
                <?php endif; ?>

                <button type="submit" name="login" value="Login">Login</button>
                <p>
                    <a href="#">Forgot Password?</a>
                </p>
                <p>
                    <a href="loginpembeli.php">or Login as Buyer</a>
                </p>
                <p>
                    <a href="daftarpenjual.php">New? SignUp Here</a>
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