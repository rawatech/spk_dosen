<div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3 centered">
					<h4>Data Dosen Peserta</h4>
					<hr>
					<p>Berikut adalah data-data dosen peserta pemilihan dosen terbaik. </p>
				</div>

				<div class="row mt">	
					<div class="col-lg-8 col-lg-offset-2">
						<table class="table" border='1'>
							<tr>
								<th>No. </th>
								<th>Nip </th>
								<th>Nama </th>
								<th>Jabatan </th>
							</tr>

							<?php
								$sql = mysql_query("select * from dosen_peserta");
								$i = 1;
								while ($row = mysql_fetch_array($sql)){
									echo "<tr>
											<td> $i </td>
											<td> $row[nip] </td>
											<td> $row[nama] </td>
											<td> $row[jabatan]</td>
											</tr>";
									$i++;
								}
							?>
						</table>
					</div>
				</div>	
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /ww -->