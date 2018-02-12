<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Kriteria</h1>
			</div>
		</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Edit Kriteria</div>
					<div class="panel-body">
								<?
								include "../koneksi.php";
								//$id=$_POST['id_kriteria'];
								$query = "select * from tb_kriteria where id_kriteria='1'";
								$hasil = mysql_query($query) or die("");
								while ($data = mysql_fetch_array($hasil)) {
								?>
								<table border="0" align="center" width="30%">
								<tr>
									<td>
									<div class="form-group">
										<label>Nama Kriteria</label>
										<input class="form-control" placeholder="Nama Kriteria" value="<?php echo $data['nama_kriteria']; ?>">
									</div>
									</td>
								</tr>
								<tr>
									<td>
									<div class="form-group">
										<label>Bobot</label>
										<input class="form-control" placeholder="Bobot" value="<?php echo $data['bobot']; ?>">
									</div>
									</td>
								</tr>
								<?}?>
								<tr>
									<td>
									<?php if (isset($_GET['ap']) && $_GET['ap']=="prosesedit") echo "class='active'";?><a href="?ap=prosesedit" class="btn btn-success">Simpan</a>
									</td>
								</tr>
					</div>
				</div>
			</div>
</div>