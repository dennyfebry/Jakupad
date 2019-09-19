<ul class="nav nav-list">
	<?php
	if ($_GET['tg'] == 'tes_algoritma') {
		?>
		<li class="activelist">
		<?php
		} else {
			?>
		<li class="">
		<?php
		}
		?>
		<a href="?tg=tes_algoritma">
			<i class="menu-icon fa fa-tachometer"></i>
			<span class="menu-text"> Algoritma Floyd-Warshall </span>
		</a>
		<b class="arrow"></b>
		</li>
		<?php
		if ($_GET['tg'] == 'user') {
			?>
			<li class="activelist">
			<?php
			} else {
				?>
			<li class="">
			<?php
			}
			?>
			<a href="?tg=user">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text"> Data User </span>
			</a>
			<b class="arrow"></b>
			</li>
			<?php
			if ($_GET['tg'] == 'gedung') {
				?>
				<li class="activelist">
				<?php
				} else {
					?>
				<li class="">
				<?php
				}
				?>
				<a href="?tg=gedung">
					<i class="menu-icon fa fa-list-alt"></i>
					<span class="menu-text"> Data Gedung/Titik Lokasi </span>
				</a>
				<b class="arrow"></b>
				</li>
				<?php
				if ($_GET['tg'] == 'node') {
					?>
					<li class="activelist">
					<?php
					} else {
						?>
					<li class="">
					<?php
					}
					?>
					<a href="?tg=node">
						<i class="menu-icon fa fa-file-o"></i>
						<span class="menu-text"> Data Node </span>
					</a>
					<b class="arrow"></b>
					</li>
</ul>