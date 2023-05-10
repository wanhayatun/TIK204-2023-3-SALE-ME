
<?php 
$conn = mysqli_connect("localhost", "root", "", "db_saleme");


//Query
function query ($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ){
		$rows[] = $row;
	}
	return $rows;
}


// function daftar($account){
// 	global $conn;
// 	$email = htmlspecialchars($account["email"]);
// 	$password = htmlspecialchars($account["password"]);

// 	$query = "INSERT INTO account 
// 	VALUES ('', '$email', '$password')";
// 	mysqli_query($conn, $query);

// 	return mysqli_affected_rows($conn);
// }
function daftar($account){
	global $conn;
	$email = htmlspecialchars($account["email"]); 
	$password = htmlspecialchars($account["password"]);

	$query = "INSERT INTO account 
	VALUES ('', '$email', '$password')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambah($seller){
	global $conn;
	$nama = htmlspecialchars($seller["nama"]);
	$email = htmlspecialchars($seller["email"]); 
	$password = htmlspecialchars($seller["password"]);

	$query = "INSERT INTO seller 
	VALUES ('', '$nama', '$email', '$password')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}




function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM product WHERE id = $id");

	return mysqli_affected_rows($conn);
}






function edit($data) {
	global $conn;
	$id = $data["id"];
	$tanggal = htmlspecialchars($data["tanggal"]);
	$st = htmlspecialchars($data["st"]);
	$nama = htmlspecialchars($data["nama"]);
	$sppd = htmlspecialchars($data["sppd"]); 
	$awal = htmlspecialchars($data["awal"]);
	$akhir = htmlspecialchars($data["akhir"]);
	$sumber = htmlspecialchars($data["sumber"]);
	$biaya = htmlspecialchars($data["biaya"]);
	$ket = htmlspecialchars($data["ket"]);

	$query = "UPDATE data SET 
	tanggal = '$tanggal',
	st = '$st',
	nama = '$nama',
	sppd = '$sppd',
	awal = '$awal',
	akhir = '$akhir',
	sumber = '$sumber',
	biaya = '$biaya',
	ket = '$ket'
	WHERE id = '$id'";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}



function search($keyword){
	$query = "SELECT * FROM product WHERE 
	nama LIKE '%$keyword%'
	";
	return query($query);
}

?>