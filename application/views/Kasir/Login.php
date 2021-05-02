<!DOCTYPE html>
<html>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
// $title = array_key_exists('title', $header) ? $header['title'] : $ci->namaAplikasi();
// $page = array_key_exists('page', $header) ? $header['page'] : 'master_admin';
// $js = array_key_exists('js', $header) ? $header['js'] : array();
$bu = base_url();
?>

<head>
	<title> Login Kasir</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap">
	<link rel="stylesheet" type="text/css" href="<?= $bu ?>assets/kasir/loginForm/style.css">
	<link href="<?= $bu; ?>assets/kasir/backend\js\sweetalert2.css" rel="stylesheet" type="text/css">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	<script type="text/javascript" src="<?= $bu; ?>assets/kasir/frontend\js\jquery.min.js"></script>
</head>

<body>
	<div class="login">
		<div class="logo"></div>
		<div class="title">Kasir </div>
		<div class="sub-title">Login</div>
		<div class="fields">
			<div class="username">
				<input type="username" id="username" name="user-input" placeholder="username" />
			</div>
			<div class="password">
				<input type="password" id="password" name="pass-input" placeholder="password" />
			</div>
		</div>
		<button class="signin-btn" id="login">LOGIN</button>

	</div>
</body>

</html>

<script type="text/javascript">
	$('#login').click(function(e) {
		var username = $('#username').val();
		var password = $('#password').val();
		var url = '<?= $bu ?>/Kasir';
		$.ajax({
			type: "post",
			url: "<?= $bu ?>/Kasir/LoginAct",
			data: {
				username,
				password
			},
			dataType: "json",
			success: function(r) {
				if (r.error) {

					Swal.fire({
						icon: 'error',
						title: 'Kesalahan...',
						text: r.pesan,
					})

				} else {
					Swal.fire({
						icon: 'success',
						title: 'berhasil...',
						text: r.pesan,
					})
					setTimeout(() => {
						window.location = url;
					}, 2000);
				}
			}
		});
	});
</script>
