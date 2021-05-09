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
	.pagination {
		display: flex;
		justify-content: center;
	}


	.produkAwal {
		width: 25% !important;
	}

	.img-prod {
		display: block !important;
		max-width: 180px !important;
		height: auto !important;
		max-height: 97px !important;
		border-radius: 14px;
	}
</style>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $konten[0]->isi ?>| Digital Restaurant Menu</title>
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
<script>
	var bu = '<?= $bu ?>';
</script>


<body class="page-template-template-homepage-v1 home-v1">
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header header-v1" style="background-image: none; ">
			<div class="col-full">
				<a class="skip-link screen-reader-text" href="<?= $bu; ?>assets/kasir/#site-navigation">Skip to navigation</a>
				<a class="skip-link screen-reader-text" href="<?= $bu; ?>assets/kasir/#content">Skip to content</a>
				<div class="header-wrap">
					<div class="site-branding">
						<a href="<?= $bu; ?>" class="custom-logo-link" rel="home">
							<img src="<?= $bu; ?>assets/kasir/img\logo-front.png">
						</a>
					</div>
					<nav id="site-navigation" class="main-navigation" aria-label="Primary Navigation">
						<button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false"><span class="close-icon"><i class="po po-close-delete"></i></span><span class="menu-icon"><i class="po po-menu-icon"></i></span><span class=" screen-reader-text">Menu</span></button>
						<div class="handheld-navigation">
							<span class="phm-close">Tutup</span>
							<ul class="menu">
								<li class="menu-item "><a href="<?= $bu; ?>kasir"><i class="po po-salads"></i>All</a></li>
								<li class="menu-item "><a href="<?= $bu; ?>kasir"><i class="po po-salads"></i>Desssert</a></li>
								<li class="menu-item "><a href="<?= $bu; ?>kasir"><i class="po po-drinks"></i>Drink</a></li>
								<li class="menu-item "><a href="<?= $bu; ?>kasir"><i class="po po-burger"></i>Main Course</a></li>
								<li class="menu-item "><a href="<?= $bu; ?>kasir"><i class="po po-fries"></i>Snack</a></li>
							</ul>
						</div>
					</nav>
					<div class="header-info-wrapper">
						<div class="header-phone-numbers">
							<span class="intro-text">Telp. dan Order ke</span>
							<span id="city-phone-number-label" class="phone-number"><?= $konten[2]->isi ?></span>
						</div>
						<ul class="site-header-cart-v2 menu">
							<li class="cart-content ">
								<a href="<?= $bu; ?>cart" title="Tampilkan Cart Order Anda">
									<i class="fa fa-cart-plus"></i>
									<span>Cart Order Anda</span>
								</a>
								<ul class="sub-menu cart_dropdown_container">
									<li>
										<a href="" title="Tampilkan Cart Order Anda">
											<span class="count cart_counts"><?= $totalcart ?> Item</span> <span class="amount cart_total_formats">Rp.<?= $totalHarga ?></span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<div class="pizzaro-secondary-navigation">
					<nav class="secondary-navigation" aria-label="Secondary Navigation">
						<ul class="menu">
							<li class="menu-item "> <a href="#" id="all"><i class="po po-salads"></i>All</a></li>
							<li class="menu-item "> <a href="#" id="desert"><i class="po po-salads"></i>Dessert</a></li>
							<li class="menu-item "> <a href="#" id="drink"><i class="po po-drinks"></i>Drink</a></li>
							<li class="menu-item "> <a href="#" id="main"><i class="po po-burger"></i>Main Course</a></li>
							<li class="menu-item "> <a href="#" id="snack"><i class="po po-fries"></i>Snack</a></li>

							<button class="btn btn-primary mr-5" id="hiddenKan" type="button" style="
								margin-left: 290px;
							">Hidden</button>

							<button class="btn btn-primary mr-5" id="keluar" type="button" ">Log Out</button>

						</ul>
					</nav>
				</div>
			</div>
		</header>
