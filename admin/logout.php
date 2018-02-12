<?php
	session_start();
	unset($_SESSION['admin']);	
	echo "<script>alert('Logout berhasil ');document.location='index.php' </script> ";	
?>