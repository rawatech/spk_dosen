<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Data Kriteria</h3>
			</div>
		</div><!--/.row-->

<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					
					<div class="panel-body">
					<form action="?ap=edit" method="POST">
						<table class="table">
						    <thead>
						    <tr>
						        <th>No</th>
								<th>Nama Kriteria</th>
								<th>Kriteria (C)</th>
								<th>Bobot</th>
						    </tr>
						
						    </thead>
						    <tbody>
						    <?php
						    include "../koneksi.php";
						    $no=0;
							$c=0;
							$id;
							$query = "select * from tb_kriteria";
							$hasil = mysql_query($query) or die("");
							while ($data = mysql_fetch_array($hasil)) {
								$no++;
								$c++;
								$id=$data['id_kriteria'];
							?>
							<tr>
								<td><?php echo "".$no; ?></td>
								<td><?php echo $data['nama_kriteria']; ?></td>
								<td><?php echo "C".$c; ?></td>
								<td><?php echo $data['bobot']; ?></td>
							<?php
							}
							mysql_close();
							?>

							</tr>
							</tbody>
						</table>
					</form>
					</div>
				</div>
			</div>
</div>