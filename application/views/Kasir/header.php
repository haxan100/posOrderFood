<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php
defined('BASEPATH') or exit('No direct script access allowed');
// $title = array_key_exists('title', $header) ? $header['title'] : $ci->namaAplikasi();
// $page = array_key_exists('page', $header) ? $header['page'] : 'master_admin';
// $js = array_key_exists('js', $header) ? $header['js'] : array();
$bu = base_url();
?>
<style>
	.produkAwal {
		width: 25% !important;
	}

	.img-prod {
		display: block;
		max-width: 180px;
		/* height: auto; */
		max-height: 170px;
	}
</style>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>San Resto's | Digital Restaurant Menu</title>
	<link rel="shortcut icon" href="<?= $bu; ?>assets/kasir/img\logo-icon.png">
	<link rel="stylesheet" type="text/css" href="<?= $bu; ?>assets/kasir/frontend\css\bootstrap.min.css" media="all">
	<link rel="stylesheet" type="text/css" href="<?= $bu; ?>assets/kasir/frontend\css\font-awesome.min.css" media="all">
	<link rel="stylesheet" type="text/css" href="<?= $bu; ?>assets/kasir/frontend\css\animate.min.css" media="all">
	<link rel="stylesheet" type="text/css" href="<?= $bu; ?>assets/kasir/frontend\css\font-pizzaro.css" media="all">
	<link rel="stylesheet" type="text/css" href="<?= $bu; ?>assets/kasir/frontend\css\style.css" media="all">
	<link rel="stylesheet" type="text/css" href="<?= $bu; ?>assets/kasir/frontend\css\colors\red.css" media="all">
	<link rel="stylesheet" type="text/css" href="<?= $bu; ?>assets/kasir/frontend\css\jquery.mCustomScrollbar.min.css" media="all">
	<link href="<?= $bu; ?>assets/kasir/https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CYanone+Kaffeesatz:200,300,400,700" rel="stylesheet">
	<link href="<?= $bu; ?>assets/kasir/backend\js\sweetalert2.css" rel="stylesheet" type="text/css">
	<script src="<?= $bu; ?>assets/kasir/backend\js\sweetalert2.min.js"></script>
	<script type="text/javascript" src="<?= $bu; ?>assets/kasir/frontend\js\jquery.min.js"></script>
</head>

<body class="page-template-template-homepage-v1 home-v1">
<script>
	var bu = '<?= $bu ?>';
</script>