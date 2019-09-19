<div class="row">
	<div class="col-xs-12">
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Results for "Data User"
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
						<th>Nama User</th>
						<th>Username</th>
						<th class="hidden-480">Password</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$ck = mysqli_query($connect, "SELECT * from tabel_user");
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
								<a href="#"><?php print($data['nama_user']) ?></a>
							</td>
							<td><?php print($data['username']) ?></td>
							<td class="hidden-480"><?php print($data['password']) ?></td>
							<td align="center">
								<div class="hidden-sm hidden-xs action-buttons">
									<a class="green" href="?tg=user&amp;aks=edit&amp;kode=<?php print($data['id']) ?>">
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>

									<a class="red" href="?tg=user&amp;aks=hapus&amp;kode=<?php print($data['id']) ?>" onclick="return confirm('Apakah anda yakin akan menghapus Data ini?');">
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