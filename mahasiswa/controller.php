<?php

	if(isset($_GET['ap'])){
		$ap = $_GET['ap'];
		
		if ($ap=="data_dosen"){
			include "konten/data_dosen.php";
		}

		if($ap=="login"){
			include "konten/login.php";
		}

	}else{
		include "input_nilai.php";
	}

?>