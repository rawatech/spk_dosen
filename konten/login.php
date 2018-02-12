<?php
	session_start();
	unset($_SESSION['nim']);
?>
<div class="container pt">
		<div class="row mt">
		<form action="konten/login_proses.php" method="POST">
			<div class="col-lg-6 col-lg-offset-3 centered">
				<h3>LOGIN</h3>
				<hr>
			</div>
		</div>
		<div class="row mt">	
			<div class="col-lg-8 col-lg-offset-2">
				<form role="form">
				  <div class="form-group">
				    <input type="name" class="form-control" id="NameInputEmail1" placeholder="Username" name="username">
				  </div>
				  <div class="form-group">
				    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password" name="password">
				  </div>
				  <div class="form-group">
				    <select class="form-control" id="exampleInputEmail1" name="jenis">
				    	<option value=''>-- Login Sebagai --</option>
				    	<option value='mahasiswa'>Mahasiswa</option>
						<option value='dosen'>Dosen</option>
						<option value='pimpinan'>Pimpinan</option>
						<option value='lppm'>LPPM</option>
				    </select>
				  </div>
				    <br>
				  <input type="submit" class="btn btn-success" value="Login">
				</form>    			
			</div>
			</form>
		</div><!-- /row -->
	</div><!-- /container -->