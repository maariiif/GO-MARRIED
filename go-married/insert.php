<?php  
	 $connect = mysqli_connect("localhost", "root", "", "go_married");  
	 $sql = "
	 INSERT INTO
	 	biodata(nama, tempat_lahir, tgl_lahir, umur, agama, alamat, status_wn, status_kawin, nama_cw, tempat_lahir_cw, tgl_lahir_cw, umur_cw, agama_cw, alamat_cw, status_wn_cw, status_kawin_cw, nama_ay, tgl_lahir_ay, agama_ay, alamat_ay, nama_ay_cw, tgl_lahir_ay_cw, agama_ay_cw, alamat_ay_cw, nama_ibu, tgl_lahir_ibu, agama_ibu, alamat_ibu, nama_ibu_cw, tgl_lahir_ibu_cw, agama_ibu_cw, alamat_ibu_cw, nama_s, tgl_lahir_s, alamat_s, nama_scw, tgl_lahir_scw, alamat_scw)
	 VALUES(
	 	'".$_POST["nama"]."',
	 	'".$_POST["tempat_lahir"]."',
	 	'".$_POST["tgl_lahir"]."',
	 	'".$_POST["umur"]."',
	 	'".$_POST["agama"]."',
	 	'".$_POST["alamat"]."',
	 	'".$_POST["status_wn"]."',
	 	'".$_POST["status_kawin"]."',
	 	
	 	'".$_POST["nama_cw"]."',
	 	'".$_POST["tempat_lahir_cw"]."',
	 	'".$_POST["tgl_lahir_cw"]."',
	 	'".$_POST["umur_cw"]."',
	 	'".$_POST["agama_cw"]."',
	 	'".$_POST["alamat_cw"]."',
	 	'".$_POST["status_wn_cw"]."',
	 	'".$_POST["status_kawin_cw"]."',

	 	'".$_POST["nama_ay"]."',
	 	'".$_POST["tgl_lahir_ay"]."',
	 	'".$_POST["agama_ay"]."',
	 	'".$_POST["alamat_ay"]."',

	 	'".$_POST["nama_ay_cw"]."',
	 	'".$_POST["tgl_lahir_ay_cw"]."',
	 	'".$_POST["agama_ay_cw"]."',
	 	'".$_POST["alamat_ay_cw"]."',

	 	'".$_POST["nama_ibu"]."',
	 	'".$_POST["tgl_lahir_ibu"]."',
	 	'".$_POST["agama_ibu"]."',
	 	'".$_POST["alamat_ibu"]."',

	 	'".$_POST["nama_ibu_cw"]."',
	 	'".$_POST["tgl_lahir_ibu_cw"]."',
	 	'".$_POST["agama_ibu_cw"]."',
	 	'".$_POST["alamat_ibu_cw"]."',

	 	'".$_POST["nama_s"]."',
	 	'".$_POST["tgl_lahir_s"]."',
	 	'".$_POST["alamat_s"]."',

	 	'".$_POST["nama_scw"]."',
	 	'".$_POST["tgl_lahir_scw"]."',
	 	'".$_POST["alamat_scw"]."'

	 	)";  
	 if(mysqli_query($connect, $sql))  
	 {  
	      header("Location: cetak.php");
	 }  
	 
 ?>  