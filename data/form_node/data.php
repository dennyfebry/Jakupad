<div class="row">
	<div class="col-xs-12">
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Results for "Latest Registered Domains"
		</div>
		<div>
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th class="center">
							<label class="pos-rel">
								<input type="checkbox" class="ace" />
								<span class="lbl"></span>
							</label>
						</th>
						<th>Gedung/Titik Lokasi</th>
						<th>Jarak</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<?php
					$ck = mysqli_query($connect, "SELECT * from tabel_node");
					while ($data = mysqli_fetch_array($ck)) {
						$gd = explode("<>", $data['kode_gedung']);

						$ckgdfrom = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_gedung where id_gedung='$gd[0]'"));
						$ckgdto = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_gedung where id_gedung='$gd[1]'"));
						?>
						<tr>
							<td class="center">
								<label class="pos-rel">
									<input type="checkbox" class="ace" />
									<span class="lbl"></span>
								</label>
							</td>
							<td>
								<a href="#">'<?php print($ckgdfrom['nama_gedung']) ?>' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; TO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'<?php print($ckgdto['nama_gedung']) ?>'</a>
							</td>
							<td class="hidden-480"><?php print($data['jarak']) ?></td>
							<td align="center">
								<div class="hidden-sm hidden-xs action-buttons">
									<a class="green" href="?tg=node&amp;aks=edit&amp;kode=<?php print($data['id']) ?>&amp;from=<?php print($gd[0]) ?>&amp;to=<?php print($gd[1]) ?>">
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>

									<a class="red" href="?tg=node&amp;aks=hapus&amp;kode=<?php print($data['id']) ?>" onclick="return confirm('Apakah anda yakin akan menghapus Data ini?');">
										<i class="ace-icon fa fa-trash-o bigger-130"></i>
									</a>
								</div>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>