
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





function tambah($data){
	global $conn;
	$tanggal = htmlspecialchars($data["tanggal"]);
	$st = htmlspecialchars($data["st"]);
	$nama = htmlspecialchars($data["nama"]);
	$sppd = htmlspecialchars($data["sppd"]); 
	$awal = htmlspecialchars($data["awal"]);
	$akhir = htmlspecialchars($data["akhir"]);
	$sumber = htmlspecialchars($data["sumber"]);
	$biaya = htmlspecialchars($data["biaya"]);
	$ket = htmlspecialchars($data["ket"]);

	$query = "INSERT INTO data 
	VALUES ('', '$tanggal', '$st', '$nama', '$sppd', '$awal', '$akhir', '$sumber', '$biaya', '$ket')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}




function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM data WHERE id = $id");

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
	$query = "SELECT * FROM data WHERE 
	tanggal LIKE '%$keyword%' OR
	nama LIKE '%$keyword%' OR
	sppd LIKE '%$keyword%' OR
	st LIKE '%$keyword'
	";
	return query($query);
}

?>