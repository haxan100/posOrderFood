<!DOCTYPE html>
<html lang="en">
<?php
defined('BASEPATH') or exit('No direct script access allowed');
// $title = array_key_exists('title', $header) ? $header['title'] : $ci->namaAplikasi();
// $page = array_key_exists('page', $header) ? $header['page'] : 'master_admin';
// $js = array_key_exists('js', $header) ? $header['js'] : array();
$bu = base_url();
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Gentelella Alela! | </title>

	<!-- Bootstrap -->
	<link href="<?= $bu; ?>assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?= $bu; ?>assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="<?= $bu; ?>assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="<?= $bu; ?>assets/admin/build/css/custom.min.css" rel="stylesheet">

	<link rel="stylesheet" href="https://biddingplus.id/assets/css/jquery.ui.css">
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">

			<?php $this->load->view('admin/templates/sidebar') ?>

			<!-- page content -->
			<div class="right_col" role="main">

				<?php $this->load->view($content) ?>
			</div>
			<!-- /page content -->

		</div>
	</div>

	<!-- jQuery -->
	<script src="<?= $bu; ?>assets/admin//vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?= $bu; ?>assets/admin//vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="<?= $bu; ?>assets/admin//vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="<?= $bu; ?>assets/admin//vendors/nprogress/nprogress.js"></script>

	<!-- Custom Theme Scripts -->
	<script src="<?= $bu; ?>assets/admin//build/js/custom.min.js"></script>
	<script src="<?= $bu; ?>assets/admin/vendors/datatables.net/js/jquery.dataTables.js"></script>
	<script src="<?= $bu; ?>assets/admin/vendors/datatables.net-responsive/js/dataTables.responsive.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>

</html>
<script>
	$(document).ready(function() {
		$('body').on('click', '#keluar', function() {
			Swal.fire({
				title: 'Apakah Anda Yakin ?',
				text: "Anda Akan Keluar Dari Aplikasi Ini",
				icon: 'question',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, Keluar!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						type: "POST",
						url: "<?= $bu ?>Admin/logout",
						success: function(e) {
							if (!e.error) {
								console.log(e)
								Swal.fire(
									'Berhasil !',
									'Anda Akan Dialihkan Ke Halaman Login',
									'success'
								)
								setTimeout(() => {
									window.location = '<?= $bu ?>LoginAdmin';
								}, 2000);

							}
						}
					});
				}

			})

		});


		$('body').on('click', '#reload', function() {
			loadSidebar();
		});

	});
</script>
