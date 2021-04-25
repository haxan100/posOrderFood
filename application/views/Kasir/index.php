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
	<title>Dans-Resto | Digital Restaurant Menu</title>
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
							<span id="city-phone-number-label" class="phone-number">(0285) 435146</span>
						</div>
						<ul class="site-header-cart-v2 menu">
							<li class="cart-content ">
								<a href="<?= $bu; ?>assets/kasir/cart.html" title="Tampilkan Cart Order Anda">
									<i class="fa fa-cart-plus"></i>
									<span>Cart Order Anda</span>
								</a>
								<ul class="sub-menu cart_dropdown_container">
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


										</div><br>
									</div>
								</div>
							</div>
					</main>
				</div>
			</div>
		</div>
		<footer id="colophon" class="site-footer footer-v1">
			<div class="col-full">
				<div class="footer-social-icons">
					<span class="social-icon-text">Follow us</span>
					<ul class="social-icons list-unstyled">
						<li><a class="fa fa-facebook" href="<?= $bu; ?>assets/kasir/https://facebook.com/dansdigitalmedia" target="_blank"></a></li>
						<li><a class="fa fa-instagram" href="<?= $bu; ?>assets/kasir/https://instagram.com/dansdigitalmedia" target="_blank"></a></li>
						<li><a class="fa fa-twitter" href="<?= $bu; ?>assets/kasir/https://twitter.com/dansdigitalmedia" target="_blank"></a></li>
						<li><a class="fa fa-youtube" href="<?= $bu; ?>assets/kasir/https://www.youtube.com" target="_blank"></a></li>
					</ul>
				</div>
				<div class="footer-logo">
					<a href="<?= $bu; ?>assets/kasir/index.htm" class="custom-logo-link" rel="home">
						<img src="<?= $bu; ?>assets/kasir/img\logo-front.png">
					</a>
				</div>
				<div class="site-address">
					<ul class="address">
						<li>DANSTor</li>
						<li>Jalan Trimargo santoso no.272 Pekalongan</li>
						<li>Telp. (0285) 435146</li>
						<li><a href="<?= $bu; ?>assets/kasir//cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="98fcf9f6ebfcf5fdfcf1f9d8fff5f9f1f4b6fbf7f5">[email&#160;protected]</a></li>
					</ul>
				</div>
				<div class="site-info">
					<p class="copyright">Copyright &copy; 2019 Dans-Resto | Digital Restaurant Menu</p>
				</div>
				<div class="pizzaro-handheld-footer-bar">
					<ul class="columns-3">
						<li class="my-account">
							<a href="<?= $bu; ?>assets/kasir/login-and-register.html">My Account</a>
						</li>
						<li class="search">
							<a href="<?= $bu; ?>assets/kasir/">Search</a>
							<div class="site-search">
								<div class="widget woocommerce widget_product_search">
									<form role="search" method="get" class="woocommerce-product-search">
										<label class="screen-reader-text" for="woocommerce-product-search-field">Search for:</label>
										<input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="Search Products&hellip;" value="" name="s" title="Search for:">
										<input type="submit" value="Search">
										<input type="hidden" name="post_type" value="product">
									</form>
								</div>
							</div>
						</li>
						<li class="cart">
							<a class="footer-cart-contents" href="<?= $bu; ?>assets/kasir/cart.html" title="Tampilkan Cart Order Anda">
							</a>
						</li>
					</ul>
				</div>
			</div>
		</footer>
	</div>
	<script data-cfasync="false" src="<?= $bu; ?>assets/kasir//cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script type="text/javascript" src="<?= $bu; ?>assets/kasir/frontend\js\tether.min.js"></script>
	<script type="text/javascript" src="<?= $bu; ?>assets/kasir/frontend\js\bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= $bu; ?>assets/kasir/frontend\js\owl.carousel.min.js"></script>
	<script type="text/javascript" src="<?= $bu; ?>assets/kasir/frontend\js\social.share.min.js"></script>
	<script type="text/javascript" src="<?= $bu; ?>assets/kasir/frontend\js\jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript" src="<?= $bu; ?>assets/kasir/frontend\js\scripts.min.js"></script>
	<script type="text/javascript">
		$('.addToCart').each(function(index, el) {
			var data = {};
			$(this).on('click', function(event) {
				event.preventDefault();
				data['id'] = $(this).data('id');
				data['qty'] = $(this).attr('data-qty');
				$.ajax({
						url: 'http://dansdigitalmedia.com/resto/cart/additem',
						type: 'POST',
						data: {
							data: data
						},
					})
					.done(function(res) {
						swal({
							title: "Sukses",
							text: "Order Menu Berhasil",
							timer: 2000,
							showConfirmButton: false,
							type: "success"
						});
						$('.cart_count').html(res.cart_count);
						$('.cart_total_format').html(res.cart_total_format);
						$('.cart_dropdown_container').html(res.cart_dropdown_container);
						$('.cart_count_footer').html(res.cart_count_footer);
					})
					.fail(function(error) {
						console.log(error.responseText);
					});
			});
		});
		hiddenKan
		$('#hiddenKan').click(function(e) {
			$('.owl-stage').hide()

		});
		loadProduk(0)
		$('#all').click(function(e) {
			loadProduk(0)

		});
		$('#desert').click(function(e) {
			loadProduk(2)

		});

		$('#drink').click(function(e) {
			loadProduk(3)

		});

		$('#main').click(function(e) {
			loadProduk(4)

		});

		$('#snack').click(function(e) {
			loadProduk(5)

		});

		function loadProduk(fl) {
			console.log(fl)
			$.ajax({
				type: "POST",
				dataType: 'json',
				url: "<?= $bu; ?>Kasir/getProduk",
				data: {
					id_kategori: fl,
				},
			}).done(function(e) {
				$('#prodTampil').html('');
				if (e.status) {

					var berapa = e.data.data.length;
					// console.log(e.data)
					$.each(e.data.data, function(key, val) {
						$('#prodTampil').append(generateProduk(val));
					});

					if (berapa >= 1) {

						// generatePagination(e.data.page);
						// $('#pagination-wrapper').show();

					} else {
						$('#pagination-wrapper').hide();
						var html = '<!-- no produk -->' +
							'	<div class="box-kosong py-2">' +
							'	<div class="text-center">' +
							'		<div class="col biz-bg-w-2 biz-rad-10 p-3 mb-4">' +
							'			<div class="text-center">' +
							'				<span class="biz-text-17 biz-text-w-5 font-weight-bold">Belum Ada Produk Lelang Tersedia</span>' +
							'			</div>' +
							'		</div>' +
							'		</div>' +
							'	</div>';
						$('#prodTampil').html(html);
					}
				} else {
					var html = '<!-- no produk -->' +
						'	<div class="box-kosong py-2">' +
						'	<div class="text-center">' +
						'		<div class="col biz-bg-w-2 biz-rad-10 p-3 mb-4">' +
						'			<div class="text-center">' +
						'				<span class="biz-text-17 biz-text-w-5 font-weight-bold">Belum Ada Produk Lelang Tersedia</span>' +
						'			</div>' +
						'		</div>' +
						'		</div>' +
						'	</div>';
					$('#prodTampil').html(html);
					$('#pagination-wrapper').hide();
				}
			}).fail(function(e) {
				console.log(e);
				alert('Terjadi kendala. silahkan coba beberapa saat lagi.');
			});
		}

		function generateProduk(produk) {
			// console.log(produk)
			return `<div class="col-md-4 produkAwal"> <br>
										<div class="product-outer">
											<div class="product-inner">
												<div class="product-image-wrapper">
													<a href="<?= $bu; ?>assets/kasir/menuorder\es-kopi-cappucino.html" class="woocommerce-LoopProduct-link">
														<img src="<?= $bu; ?>assets/images/foods/${produk.foto}" class="img-responsive img-prod " alt="">
													</a>
												</div>

												<div class="product-content-wrapper">
													<a href="<?= $bu; ?>assets/kasir/menuorder\es-kopi-cappucino.html" class="woocommerce-LoopProduct-link">
														<h3>${produk.nama_menu}</h3>
														<div class="yith_wapo_groups_container">
															<div class="ywapo_group_container ywapo_group_container_radio form-row form-row-wide " data-requested="1" data-type="radio" data-id="1" data-condition="">

																<h3><span>${produk.nama_kategori}</span></h3>
																<div class="ywapo_input_container ywapo_input_container_radio">
																<span class="ywapo_label_price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rp. </span>${produk.harga}</span></span>
																</div>
															</div>
														</div>
													</a>
													<div class="hover-area">
														<a data-id="${produk.id_menu}" data-qty="1"   data-harga="${produk.harga}" data-qty="1"  title="Tambah ke Keranjang" type="button" class="addToCart button product_type_simple add_to_cart_button">Order</a>
													</div>
												</div>
											</div>
										</div>
													</div>
													`;
		}
	</script>
</body>

</html>
