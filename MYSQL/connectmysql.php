<?php 
//khai bao thong tin ket noi
	$servername = "localhost";
	$username='root';
	$password = "";
	$dbname = "myshop";
	// Create connection
	//ket noi den co so du lieu
	$connection = mysqli_connect($servername, $username, $password,$dbname) or die("Không Thể Kết Nối Tới Cơ Sở Dữ Liệu");
	mysqli_set_charset($connection,"utf8");
	// Change character set to utf8
	//luon hien thi cho unicode

?>