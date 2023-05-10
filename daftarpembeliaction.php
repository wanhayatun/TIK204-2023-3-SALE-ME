<?php 
include "connect.php";
$email = $_POST['email'];
$password = $_POST['password'];

$insert = "INSERT INTO account(id, email, password) VALUES ('', '$email', '$password')";

// if (mysqli_query($connect, $insert)) {
// 	include "tambah.php";
// }

// else{
// 	echo "gagal memasukkan data";
// }
	if(!empty($email) && !empty($password)){
		// $sql = mysqli_query($connect, "SELECT * FROM sppd WHERE user = '$user' AND pwd = '$pwd'");
		// $result = mysqli_num_rows($sql);
	// 	if ($result){
	// 		header("location: indexloggedin.php");
	// 	}
	// 	else{
	// 		header("location: login.php");
	// 	}
	// }	else{
		echo "Email atau Password tidak boleh kosong";
	}
?>