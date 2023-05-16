
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


function tambahproduk($product){
	global $conn;
	$gambar = upload();
	$nama = htmlspecialchars($product["nama"]); 
	$harga = htmlspecialchars($product["harga"]);
	$kadaluarsa = htmlspecialchars($product["kadaluarsa"]); 

	if( !$gambar ){
		return false;
	}

	$query = "INSERT INTO product 
	VALUES ('', '$nama', '$gambar', '$harga', '$kadaluarsa', '1')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}



function pesan($pesan){
	global $conn;
	// $id = $product["id"];
	$nama = htmlspecialchars($pesan["nama"]); 
	$alamat = htmlspecialchars($pesan["alamat"]); 
	$telepon = htmlspecialchars($pesan["telepon"]);
	$note = htmlspecialchars($pesan["note"]); 
	$nama_produk = htmlspecialchars($pesan["nama_produk"]);
	$harga_produk = htmlspecialchars($pesan["harga_produk"]);

	$query = "INSERT INTO pesan 
	VALUES ('', '6', '$nama', '$alamat', '$telepon', '$note', '$nama_produk', '$harga_produk')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}



function upload(){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek gambar tidak diupload
	if($error === 4){
		echo "<script>
			alert('Gambar belum dipilih');
			</script>";
		return false;
	}

	// cek ekstensi gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
		echo "<script>
			alert('File bukan gambar');
			</script>";
		return false;
	}

	// cek ukuran
	if($ukuranFile > 10000000){
		echo "<script>
			alert('Ukuran gambar terlalu besar');
			</script>";
		return false;
	}

	// Generate nama gambar
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	// upload gambar
	move_uploaded_file($tmpName, 'images/' . $namaFileBaru);
	return $namaFileBaru;
}


function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM product WHERE id = $id");

	return mysqli_affected_rows($conn);
}






function edit($product) {
	global $conn;
	$id = $product["id"];
	$gambar = htmlspecialchars($product["gambar"]);
	$nama = htmlspecialchars($product["nama"]);
	$harga = htmlspecialchars($product["harga"]);
	$kadaluarsa = htmlspecialchars($product["kadaluarsa"]); 
	
	$query = "UPDATE product SET 
	gambar = '$gambar',
	nama = '$nama',
	harga = '$harga',
	kadaluarsa = '$kadaluarsa'
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