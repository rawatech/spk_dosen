<?php

	if(isset($_GET['ap'])){
		$ap = $_GET['ap'];
		
		if ($ap=="peserta"){
			include "aplikasi/peserta/index.php";
		}

		if ($ap=="kriteria"){
			include "aplikasi/kriteria/index.php";
		}

		if ($ap=="hmp_kriteria"){
			include "aplikasi/hmp_kriteria/hmp_kriteria.php";
		}

		if ($ap=="hitung"){
			include "aplikasi/perhitungan/index.php";
		}

		if($ap=="login"){
			include "aplikasi/login.php";
		}

		if($ap=="pengaturan"){
			include "pengaturan.php";
		}

	}else{
		include "home.php";
	}

?>