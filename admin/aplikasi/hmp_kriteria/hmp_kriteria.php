<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Himpunan Kriteria</h3>
			</div>
		</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
				
					<div class="row mt">
				<form action="" method="POST">
						<div class="col-lg-8 col-lg-offset-2">
							<form role="form">
						<div class="form-group">
							<select class="form-control" id="exampleInputEmail1" name="pilih">
							<option value = ""> -- Pilih Kriteria -- </option>
									<?php
											include "../koneksi.php";
											$sql = "select * from tb_kriteria";
											$query = mysql_query($sql);
											while($row = mysql_fetch_array($query)){
											echo "<option value = '$row[nama_kriteria]'>$row[nama_kriteria]</option>";
											}
									?>
							</select>
				  </div>
				  <input type="submit" name="submit" class="btn btn-primary" value="Pilih">
				</form>    			
			</div>
			</form>
		</div><!-- /row -->
	
						
						
					</div>
				</div>
			</div>
</div>

<?php
	if(isset($_POST['submit'])){
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Himpunan Kriteria <?php $nm=$_POST['pilih']; echo "".$nm;  ?></div>
					<div class="panel-body">
					<table class="table">
						    <thead>
						    <tr>
						        <th>No</th>
								<th>Himpunan</th>
								<th>Keterangan</th>
								<th>Nilai</th>
						    </tr>
						    </thead>
						    <tbody>
						    <?php
							include "../koneksi.php";
							$no=0;
							$nama=$_POST['pilih'];
							$query = "select * from tb_hmp_kriteria where nama_kriteria='$nama'";
							$hasil = mysql_query($query) or die("");
							while ($data = mysql_fetch_array($hasil)) {
								$no++;
							?>
							<tr>
								<td><?php echo "".$no; ?></td>
								<td><?php echo $data['himpunan']; ?></td>
								<td><?php echo $data['keterangan']; ?></td>
								<td><?php echo $data['nilai']; ?></td>
							<?php
							}
							mysql_close();
			
							?>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
</div>
<?php
	}
?>