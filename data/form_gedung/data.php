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
						<th>ID Gedung/Titik Lokasi</th>
						<th>Nama Gedung/Titik Lokasi</th>
						<th>Gambar</th>
						<th class="hidden-480">Keteranga</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<?php
					$ck = mysqli_query($connect, "SELECT * from tabel_gedung");
					while ($data = mysqli_fetch_array($ck)) {
						?>
						<tr>
							<td class="center">
								<label class="pos-rel">
									<input type="checkbox" class="ace" />
									<span class="lbl"></span>
								</label>
							</td>
							<td>
								<a href="#"><?php print($data['id_gedung']) ?></a>
							</td>
							<td><?php print($data['nama_gedung']) ?></td>
							<td class="hidden-480"><img src="<?php print($data['gambar']) ?>"></td>
							<td class="hidden-480"><?php print($data['keterangan']) ?></td>
							<td align="center">
								<div class="hidden-sm hidden-xs action-buttons">
									<a class="green" href="?tg=gedung&amp;aks=edit&amp;kode=<?php print($data['id_gedung']) ?>">
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>

									<a class="red" href="?tg=gedung&amp;aks=hapus&amp;kode=<?php print($data['id_gedung']) ?>" onclick="return confirm('Apakah anda yakin akan menghapus Data ini?');">
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