<div class="col-md-12">
	<h2 style="text-align:center">Pencarian Jalur Evakuasi Terpendek</h2>
	<form action="">
		<div class="form-group">
			<label for="email">Gedung/Titik Lokasi Asal:</label>
			<select class="form-control" name="gedungfrom" id="gedungfrom">
				<option value=''>--- Pilih Lokasi Anda ---</option>
				<?php
				$ckg = mysqli_query($connect, "SELECT * from tabel_gedung");
				while ($data = mysqli_fetch_array($ckg)) {
					echo "
				<option value='$data[id_gedung]'>$data[nama_gedung]</option>
				";
				}
				?>
			</select>
		</div>
		<button type="button" class="btn btn-default" type="button" onclick="load_data('fungsi/js.php?ua=b&amp;gedungfrom='+gedungfrom.value+'&amp;gedungto=GD-057&amp;kode=s','','detil')" style="background-color:#f4ae00;border-color:#f4ae00">Proses</button>
	</form>
</div>
<br />
<font color="ffffff">.</font>
<br />
<div id="detil"></div>