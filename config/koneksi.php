<?php
$koneksi=mysqli_connect('localhost','root','','db_persewaanmusik');

	if(mysqli_connect_error()){
		printf("Connect Failed:", mysqli_connect_error());
		exit();
	}

?>



