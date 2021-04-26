<?php
$bu = base_url();
// var_dump($konten[2]); 
// echo  $totalHarga; die;
?>



<body class="page-template-template-homepage-v1 home-v1">
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header header-v1" style="background-image: none; ">
			<div class="col-full">
				<a class="skip-link screen-reader-text" href="<?= $bu; ?>assets/kasir/#site-navigation">Skip to navigation</a>
				<a class="skip-link screen-reader-text" href="<?= $bu; ?>assets/kasir/#content">Skip to content</a>
				<div class="header-wrap">
					<div class="site-branding">
						<a href="<?= $bu; ?>assets/kasir/index.htm" class="custom-logo-link" rel="home">
							<img src="<?= $bu; ?>assets/kasir/img\logo-front.png">
						</a>
					</div>
					<nav id="site-navigation" class="main-navigation" aria-label="Primary Navigation">
						<button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false"><span class="close-icon"><i class="po po-close-delete"></i></span><span class="menu-icon"><i class="po po-menu-icon"></i></span><span class=" screen-reader-text">Menu</span></button>
						<div class="handheld-navigation">
							<span class="phm-close">Tutup</span>
							<ul class="menu">
								<li class="menu-item "><a href="<?= $bu; ?>assets/kasir/kategori\dessert.html"><i class="po po-salads"></i>All</a></li>
								<li class="menu-item "><a href="<?= $bu; ?>assets/kasir/kategori\dessert.html"><i class="po po-salads"></i>Desssert</a></li>
								<li class="menu-item "><a href="<?= $bu; ?>assets/kasir/kategori\drink.html"><i class="po po-drinks"></i>Drink</a></li>
								<li class="menu-item "><a href="<?= $bu; ?>assets/kasir/kategori\main-course.html"><i class="po po-burger"></i>Main Course</a></li>
								<li class="menu-item "><a href="<?= $bu; ?>assets/kasir/kategori\snack.html"><i class="po po-fries"></i>Snack</a></li>
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
								<a href="<?= $bu; ?>assets/kasir/cart" title="Tampilkan Cart Order Anda">
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
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<div id="content" class="site-content" tabindex="-1">
			<div class="col-full">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">
						<div class="home-v1-slider">
							<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
								<div class="item slider-1">
									<img src="<?= $bu; ?>assets/kasir/img\slider_folder\Slider_1552233220.jpg" class="img-responsive" alt="">
								</div>

								<div class="item slider-2">
									<img src="<?= $bu; ?>assets/kasir/img\slider_folder\Slider_1552233651.jpg" class="img-responsive" alt="">

								</div>
							</div>
						</div>
						<div class="section-products">
							<h2 class="section-title">Menu Kami</h2>
							<div id="produkWrapper" class="row">
								<div class="py-5">
									<div class="container">
										<div class="row hidden-md-up">
											<div id="prodTampil">

											</div>

										</div>

										<br>
									</div>


								</div>
							</div>

					</main>
				</div>
			</div>
		</div>
		<nav aria-label="Page navigation example" class="example">
			<input type="hidden" id="_page" value=1></input>
			<ul class="pagination" id="pagination-wrapper">

			</ul>
		</nav>
