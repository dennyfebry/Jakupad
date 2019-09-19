<?php
error_reporting(0);
session_start();
if (empty($_SESSION['user'])) {
	echo "  <script languange='JavaScript' type='text/javascript'>
                        window.location=('index.php');
                    </script>";
}
include "fungsi/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Jakupad</title>

	<meta name="description" content="Static &amp; Dynamic Tables" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<link href="css/bootstrap.css" rel="stylesheet" />
	<link href="css/font-awesome.css" rel="stylesheet" />
	<link href="css/custom-styles.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<link href="js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	<style>
		.activelist {
			font-weight: bold;
			color: #fff !important;
			background: #242424;
		}
	</style>
	<script type="text/javascript">
		function load_data(f, t, l) {
			var req55 = [];
			var arr;
			arr++;
			var lokasi = l.split(",");
			if (window.XMLHttpRequest) {
				req55[arr] = new XMLHttpRequest();
			} else {
				req55[arr] = new ActiveXObject("Microsoft.XMLHTTP");
			}
			req55[arr].onreadystatechange = function() {
				if (req55[arr].readyState == 1) {
					document.getElementById(l).innerHTML = "<center><label>Memuat...</label></center>";
					//document.getElementById("tombol").disabled = true;}
				} else if (req55[arr].readyState == 4) {
					if (t == "v") {
						var respom = req55[arr].responseText.split("<>");
						for (var i = 0; i < lokasi.length; i++) {
							document.getElementById(lokasi[i]).value = respom[i];
						}
					} else {
						document.getElementById(l).innerHTML = req55[arr].responseText;
						console.log(req55[arr].responseText);
					}
				}
			}

			req55[arr].open("GET", f, true);
			req55[arr].send();
		}
	</script>
	<script type="text/javascript">
		function view(e, lk, i, l) {
			var input = i;
			var lebar = l;
			var lks = lk;
			var fr = new FileReader();
			fr.onload = function(e) {
				var img = new Image();
				img.onload = function() {
					var MAXWidthHeight = l;
					var r = MAXWidthHeight / Math.max(this.width, this.height),
						w = Math.round(this.width * r),
						h = Math.round(this.height * r),
						c = document.createElement("canvas");
					c.width = w;
					c.height = h;
					c.getContext("2d").drawImage(this, 0, 0, w, h);
					var url = c.toDataURL();
					document.getElementById(lks).src = url;
					document.getElementById(input).value = url;
				}
				img.src = e.target.result;
			}
			fr.readAsDataURL(e.target.files[0]);
		}
	</script>
</head>

<body>
	<div id="wrapper">
		<!--  Navbar Top  -->
		<nav class="navbar navbar-default top-navbar" role="navigation">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php?tg=user"><strong><i class="icon fa fa-home"></i>
						JAKUPAD</strong></a>
			</div>
			<ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
						<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
		<!--/. Navbar Top  -->

		<!--   Navbar Side  -->
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
					<?php
					include "fungsi/menu.php";
					?>
				</div>
		</nav>
		<!-- /. Navbar Side  -->

		<!--   Konten  -->
		<div id="page-wrapper">

			<?php
			if ($_GET['tg'] == 'gedung') {
				include "data/form_gedung/form.php";
			} elseif ($_GET['tg'] == 'node') {
				include "data/form_node/form.php";
			} elseif ($_GET['tg'] == 'tes_algoritma') {
				include "data/test_algoritma/form.php";
			} elseif ($_GET['tg'] == 'user') {
				include "data/form_user/form.php";
			}
			?>
			<center>
				<footer>
					<p>M. Fikri Nur Zaman &copy; 2019</p>
				</footer>
			</center>
		</div>
	</div>
	<!--/.  Konten  -->






	<!-- basic scripts -->

	<!--[if !IE]> -->
	<script src="assets/js/jquery-2.1.4.min.js"></script>

	<!-- <![endif]-->

	<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
	<script type="text/javascript">
		if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
	</script>
	<script src="js/jquery-1.10.2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.metisMenu.js"></script>
	<script src="js/dataTables/jquery.dataTables.js"></script>
	<script src="js/dataTables/dataTables.bootstrap.js"></script>
	<script>
		$(document).ready(function() {
			$('#dataTables-example').dataTable();
		});
	</script>
	<script src="js/custom-scripts.js"></script>

	<!-- inline scripts related to this page -->
	<script type="text/javascript">
		jQuery(function($) {
			//initiate dataTables plugin
			var myTable =
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable({
					bAutoWidth: false,
					"aoColumns": [{
							"bSortable": false
						},
						null, null, null, null, null,
						{
							"bSortable": false
						}
					],
					"aaSorting": [],

					select: {
						style: 'multi'
					}
				});


			$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

			new $.fn.dataTable.Buttons(myTable, {
				buttons: [{
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					},
					{
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					},
					{
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					},
					{
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					},
					{
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					},
					{
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					}
				]
			});
			myTable.buttons().container().appendTo($('.tableTools-container'));

			//style the message box
			var defaultCopyAction = myTable.button(1).action();
			myTable.button(1).action(function(e, dt, button, config) {
				defaultCopyAction(e, dt, button, config);
				$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
			});


			var defaultColvisAction = myTable.button(0).action();
			myTable.button(0).action(function(e, dt, button, config) {

				defaultColvisAction(e, dt, button, config);


				if ($('.dt-button-collection > .dropdown-menu').length == 0) {
					$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
				}
				$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
			});

			////

			setTimeout(function() {
				$($('.tableTools-container')).find('a.dt-button').each(function() {
					var div = $(this).find(' > div').first();
					if (div.length == 1) div.tooltip({
						container: 'body',
						title: div.parent().text()
					});
					else $(this).tooltip({
						container: 'body',
						title: $(this).text()
					});
				});
			}, 500);


			myTable.on('select', function(e, dt, type, index) {
				if (type === 'row') {
					$(myTable.row(index).node()).find('input:checkbox').prop('checked', true);
				}
			});
			myTable.on('deselect', function(e, dt, type, index) {
				if (type === 'row') {
					$(myTable.row(index).node()).find('input:checkbox').prop('checked', false);
				}
			});


			/////////////////////////////////
			//table checkboxes
			$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

			//select/deselect all rows according to table header checkbox
			$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function() {
				var th_checked = this.checked; //checkbox inside "TH" table header

				$('#dynamic-table').find('tbody > tr').each(function() {
					var row = this;
					if (th_checked) myTable.row(row).select();
					else myTable.row(row).deselect();
				});
			});

			//select/deselect a row when the checkbox is checked/unchecked
			$('#dynamic-table').on('click', 'td input[type=checkbox]', function() {
				var row = $(this).closest('tr').get(0);
				if (this.checked) myTable.row(row).deselect();
				else myTable.row(row).select();
			});



			$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
				e.stopImmediatePropagation();
				e.stopPropagation();
				e.preventDefault();
			});



			//And for the first simple table, which doesn't have TableTools or dataTables
			//select/deselect all rows according to table header checkbox
			var active_class = 'active';
			$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function() {
				var th_checked = this.checked; //checkbox inside "TH" table header

				$(this).closest('table').find('tbody > tr').each(function() {
					var row = this;
					if (th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
					else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
				});
			});

			//select/deselect a row when the checkbox is checked/unchecked
			$('#simple-table').on('click', 'td input[type=checkbox]', function() {
				var $row = $(this).closest('tr');
				if ($row.is('.detail-row ')) return;
				if (this.checked) $row.addClass(active_class);
				else $row.removeClass(active_class);
			});



			/********************************/
			//add tooltip for small view action buttons in dropdown menu
			$('[data-rel="tooltip"]').tooltip({
				placement: tooltip_placement
			});

			//tooltip placement on right or left
			function tooltip_placement(context, source) {
				var $source = $(source);
				var $parent = $source.closest('table')
				var off1 = $parent.offset();
				var w1 = $parent.width();

				var off2 = $source.offset();
				//var w2 = $source.width();

				if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
				return 'left';
			}




			/***************/
			$('.show-details-btn').on('click', function(e) {
				e.preventDefault();
				$(this).closest('tr').next().toggleClass('open');
				$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
			});
			/***************/


		})
	</script>
</body>

</html>