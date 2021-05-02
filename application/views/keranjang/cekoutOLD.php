<?php
$bu = base_url();
?>
<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dans-Resto | Digital Restaurant Menu</title>
	<link rel="shortcut icon" href="<?= $bu; ?>assets/kasir/img/logo-icon.png">
	<link rel="stylesheet" type="text/css" href="<?= $bu; ?>assets/kasir/frontend/css/bootstrap.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?= $bu; ?>assets/kasir/frontend/css/font-awesome.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?= $bu; ?>assets/kasir/frontend/css/animate.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?= $bu; ?>assets/kasir/frontend/css/font-pizzaro.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?= $bu; ?>assets/kasir/frontend/css/style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?= $bu; ?>assets/kasir/frontend/css/colors/red.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?= $bu; ?>assets/kasir/frontend/css/jquery.mCustomScrollbar.min.css" media="all" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CYanone+Kaffeesatz:200,300,400,700" rel="stylesheet">
	<link href="<?= $bu; ?>assets/kasir/backend/js/sweetalert2.css" rel="stylesheet" type="text/css" />
	<script src="http://dansdigitalmedia.com/resto/backend/js/sweetalert2.min.js"></script>
	<script type="text/javascript" src="http://dansdigitalmedia.com/resto/frontend/js/jquery.min.js"></script>
</head>

<body class="woocommerce-checkout">
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header header-v1" style="background-image: none; ">
			<div class="col-full">
				<a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
				<a class="skip-link screen-reader-text" href="#content">Skip to content</a>
				<div class="header-wrap">
					<div class="site-branding">
						<a href="<?= $bu; ?>assets/kasir/" class="custom-logo-link" rel="home">
							<img src="http://dansdigitalmedia.com/resto/img/logo-front.png">
						</a>
					</div>
					<nav id="site-navigation" class="main-navigation" aria-label="Primary Navigation">
						<button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false"><span class="close-icon"><i class="po po-close-delete"></i></span><span class="menu-icon"><i class="po po-menu-icon"></i></span><span class=" screen-reader-text">Menu</span></button>
						<div class="handheld-navigation">
							<span class="phm-close">Tutup</span>
							<ul class="menu">
								<li class="menu-item "><a href="<?= $bu; ?>assets/kasir/kategori/dessert"><i class="po po-salads"></i>Dessert</a></li>
								<li class="menu-item "><a href="<?= $bu; ?>assets/kasir/kategori/drink"><i class="po po-drinks"></i>Drink</a></li>
								<li class="menu-item "><a href="<?= $bu; ?>assets/kasir/kategori/main-course"><i class="po po-burger"></i>Main Course</a></li>
								<li class="menu-item "><a href="<?= $bu; ?>assets/kasir/kategori/snack"><i class="po po-fries"></i>Snack</a></li>
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
								<a href="<?= $bu; ?>cart" title="Tampilkan Cart Order Anda">
									<i class="fa fa-cart-plus"></i>
									<span>Cart Order Anda</span>
								</a>
								<ul class="sub-menu cart_dropdown_container">
									<li>
										<a href="" title="Tampilkan Cart Order Anda">
											<span class="count cart_count">5 Item</span> <span class="amount cart_total_format">50,000</span>
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
							<li class="menu-item "><a href="<?= $bu; ?>assets/kasir/kategori/dessert"><i class="po po-salads"></i>Dessert</a></li>
							<li class="menu-item "><a href="<?= $bu; ?>assets/kasir/kategori/drink"><i class="po po-drinks"></i>Drink</a></li>
							<li class="menu-item "><a href="<?= $bu; ?>assets/kasir/kategori/main-course"><i class="po po-burger"></i>Main Course</a></li>
							<li class="menu-item "><a href="<?= $bu; ?>assets/kasir/kategori/snack"><i class="po po-fries"></i>Snack</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<div id="content" class="site-content" tabindex="-1">
			<div class="col-full">
				<div class="pizzaro-breadcrumb">
					<nav class="woocommerce-breadcrumb">
						<a href="<?= $bu; ?>assets/kasir/">Beranda</a>
						<span class="delimiter"><i class="po po-arrow-right-slider"></i></span>Konfirmasi
					</nav>
				</div>
				<div id="primary" class="content-area">
					<main id="main" class="site-main">
						<div class="pizzaro-order-steps">
							<ul>
								<li class="cart">
									<span class="step">1</span>Order Cart
								</li>
								<li class="checkout">
									<span class="step">2</span>Konfirmasi
								</li>
								<li class="complete">
									<span class="step">3</span>Order Selesai
								</li>
							</ul>
						</div>
						<div id="post-9" class="post-9 page type-page status-publish hentry">
							<div class="entry-content">
								<div class="woocommerce">
									<form id="form-bayar" class="checkout woocommerce-checkout">
										<div class="col2-set" id="customer_details">
											<div class="col-1">
												<div class="woocommerce-billing-fields">
													<h3>Detail Pemesan</h3>
													<p class="form-row form-row form-row-first" id="nama">
														<label for="nama" class="">Nama Anda</label>
														<input type="text" class="input-text " name="resto_order[nama]" placeholder="Input Nama Anda" autocomplete="off" required autofocus />
													</p>
													<p class="form-row form-row form-row-last" id="meja">
														<label for="meja" class="">No. Meja</label>
														<select class="input-text" id="meja_id" name="resto_order[meja_id]" required>
															<option value="">- Pilih No. Meja -</option>
															<option>1</option>
															<option>2</option>
															<option>3</option>
															<option>4</option>
															<option>5</option>
															<option>6</option>
															<option>7</option>

															<option>8</option>
															<option>9</option>
															<option>10</option>
														</select>
													</p>
												</div>
											</div>
											<div class="col-2">
												<div class="woocommerce-shipping-fields">
													<h3>Informasi Tambahan</h3>
													<p class="form-row form-row notes" id="order_comments_field">
														<label for="order_comments" class="">Catatan</label>
														<textarea name="resto_order[catatan]" class="input-text " id="catatan" placeholder="Tuliskan Catatan untuk Order Anda" rows="4" cols="5"></textarea>
													</p>
												</div>
											</div>
										</div>
										<h3 id="order_review_heading">Order Anda</h3>
										<div id="order_review" class="woocommerce-checkout-review-order">
											<table class="shop_table woocommerce-checkout-review-order-table">
												<thead>
													<tr>
														<th class="product-name">Menu</th>
														<th class="product-total">Total</th>
													</tr>
												</thead>
												<tbody>
													<tr class="cart_item">
														<td class="product-name">
															ES SUSU COKELAT&nbsp;<strong class="product-quantity">&times; 1</strong>
														</td>
														<td class="product-total">
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">Rp. </span>10,000</span>
														</td>
													</tr>
													<tr class="cart_item">
														<td class="product-name">
															FRIENCH FRIES&nbsp;<strong class="product-quantity">&times; 1</strong>
														</td>
														<td class="product-total">
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">Rp. </span>5,000</span>
														</td>
													</tr>
													<tr class="cart_item">
														<td class="product-name">
															ES TEH LEMON&nbsp;<strong class="product-quantity">&times; 1</strong>
														</td>
														<td class="product-total">
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">Rp. </span>5,000</span>
														</td>
													</tr>
													<tr class="cart_item">
														<td class="product-name">
															MASI GORENG TERI GURIH&nbsp;<strong class="product-quantity">&times; 1</strong>
														</td>
														<td class="product-total">
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">Rp. </span>17,000</span>
														</td>
													</tr>
													<tr class="cart_item">
														<td class="product-name">
															MIE GORENG SEAFOOD&nbsp;<strong class="product-quantity">&times; 1</strong>
														</td>
														<td class="product-total">
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">Rp. </span>13,000</span>
														</td>
													</tr>
												</tbody>
												<tfoot>
													<input type="hidden" name="resto_order[total_waktu]" value="24">
													<input type="hidden" name="resto_order[total_qty]" value="5">
													<input type="hidden" name="resto_order[total]" value="50000">
													<tr class="cart-subtotal">
														<th>Total Qty</th>
														<td>
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol"></span>5</span>
														</td>
													</tr>
													<tr class="cart-subtotal">
														<th>Total Waktu</th>
														<td>
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol"></span>24 Menit</span>
														</td>
													</tr>
													<tr class="order-total">
														<th>Total Bayar</th>
														<td>
															<strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rp. </span>50.000</span></strong>
														</td>
													</tr>
												</tfoot>
											</table>
											<div id="payment" class="woocommerce-checkout-payment">
												<div class="form-row place-order">
													<button type="submit" id="btn_submit" class="button alt" style="text-align: center;">Konfirmasi Order</button>
												</div>
											</div>
										</div>
									</form>
								</div>
								<script type="text/javascript">
									$(document).ready(function() {
										$('#meja_id').on('change', function(event) {
											event.preventDefault();
											var meja_id = $(this).val();
											$('.row_total').attr('data-meja_id', meja_id);
										});

										$('#form-bayar').on('submit', function(event) {
											event.preventDefault();
											// var resto_order = [];
											// var row_total = $('.row_total');
											// var data_total = {};
											// data_total['meja_id']       = row_total.data('meja_id');
											// data_total['order_nama']    = row_total.data('order_nama');
											// data_total['order_tanggal'] = new Date().toISOString().split('T')[0];
											// data_total['order_qty']     = row_total.data('order_qty');
											// data_total['order_waktu']   = row_total.data('order_waktu');
											// data_total['order_total']   = row_total.data('order_total');
											// data_total['order_bayar']   = row_total.data('order_bayar');
											// data_total['order_kembali'] = row_total.data('order_kembali');
											// data_total['order_status']  = 2; 
											// data_total['order_update']  = new Date().toISOString().split('T')[0] + ' ' + new Date().toLocaleTimeString( 'en-US', { hour12: false }); 

											// resto_order.push(data_total);
											// var resto_order = JSON.stringify(data_total);

											// var resto_order_detail = [];
											// $('.row_line').each(function(index, el) { 
											//     var data = {}; 
											//     data['menu_id']               = $(this).attr('data-menu_id'); 
											//     data['order_detail_harga']    = $(this).attr('data-order_detail_harga'); 
											//     data['order_detail_qty']      = $(this).attr('data-order_detail_qty'); 
											//     data['order_detail_subtotal'] = $(this).attr('data-order_detail_subtotal'); 
											//     resto_order_detail.push(data);
											// });
											// var resto_order_detail = JSON.stringify(resto_order_detail);
											dataString = $("#form-bayar").serialize();
											$.ajax({
													url: 'http://dansdigitalmedia.com/resto/checkout/konfirmasi',
													type: 'POST',
													data: dataString,
													// data: {
													//     resto_order : resto_order
													// },
												})
												.done(function(res) {
													location.href = 'http://dansdigitalmedia.com/resto/checkout/selesai/' + res.order_id;
												})
												.fail(function(error) {
													console.log(error.responseText);
												});
										});
									});
								</script>
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
						<li><a class="fa fa-facebook" href="https://facebook.com/<?= $konten[3]->isi ?>" target="_blank"></a></li>
						<li><a class="fa fa-instagram" href="https://instagram.com/<?= $konten[4]->isi ?>" target="_blank"></a></li>
						<li><a class="fa fa-twitter" href="https://twitter.com/<?= $konten[5]->isi ?>" target="_blank"></a></li>
						<li><a class="fa fa-youtube" href="https://www.youtube.com/<?= $konten[6]->isi ?>" target="_blank"></a></li>
					</ul>
				</div>
				<div class="footer-logo">
					<a href="<?= $bu; ?>assets/kasir/" class="custom-logo-link" rel="home">
						<img src="http://dansdigitalmedia.com/resto/img/logo-front.png">
					</a>
				</div>
				<div class="site-address">
					<ul class="address">
						<li>DANSTor</li>
						<li>Jalan Trimargo santoso no.272 Pekalongan</li>
						<li>Telp. (0285) 435146</li>
						<li><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ceaaafa0bdaaa3abaaa7af8ea9a3afa7a2e0ada1a3">[email&#160;protected]</a></li>
					</ul>
				</div>
				<div class="site-info">
					<p class="copyright">Copyright &copy; 2019 Dans-Resto | Digital Restaurant Menu</p>
				</div>
				<div class="pizzaro-handheld-footer-bar">
					<ul class="columns-3">
						<li class="my-account">
							<a href="login-and-register.html">My Account</a>
						</li>
						<li class="search">
							<a href="">Search</a>
							<div class="site-search">
								<div class="widget woocommerce widget_product_search">
									<form role="search" method="get" class="woocommerce-product-search">
										<label class="screen-reader-text" for="woocommerce-product-search-field">Search for:</label>
										<input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="Search Products&hellip;" value="" name="s" title="Search for:" />
										<input type="submit" value="Search" />
										<input type="hidden" name="post_type" value="product" />
									</form>
								</div>
							</div>
						</li>
						<li class="cart">
							<a class="footer-cart-contents" href="<?= $bu; ?>cart" title="Tampilkan Cart Order Anda">
								<span class="count cart_count">5</span> </a>
						</li>
					</ul>
				</div>
			</div>
		</footer>
	</div>
	<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script type="text/javascript" src="http://dansdigitalmedia.com/resto/frontend/js/tether.min.js"></script>
	<script type="text/javascript" src="http://dansdigitalmedia.com/resto/frontend/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://dansdigitalmedia.com/resto/frontend/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="http://dansdigitalmedia.com/resto/frontend/js/social.share.min.js"></script>
	<script type="text/javascript" src="http://dansdigitalmedia.com/resto/frontend/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript" src="http://dansdigitalmedia.com/resto/frontend/js/scripts.min.js"></script>
	<script type="text/javascript">
		// function qty_change() {
		//     var qty = 1;
		//     qty = parseInt($(this).parent().find('.product_quantity_value').val());
		//     $(this).parent().parent().parent().find('.addToCart').attr('data-qty', qty);
		//     console.log(qty);
		// var qty = 1;
		// $('.product_quantity_up').each(function(index, el) {
		//     $(this).on('click', function(event) {
		//         qty = parseInt($(this).parent().find('.product_quantity_value').val())+1;
		//         if (qty > 0) {
		//             $(this).parent().parent().parent().find('.addToCart').attr('data-qty', qty);
		//         }else{
		//             $(this).parent().parent().parent().find('.addToCart').attr('data-qty', 1);
		//         }
		//     });
		// });

		// $('.product_quantity_down').each(function(index, el) {
		//     $(this).on('click', function(event) {
		//         qty = parseInt($(this).parent().find('.product_quantity_value').val())-1;
		//         if (qty > 0) {
		//             $(this).parent().parent().parent().find('.addToCart').attr('data-qty', qty);
		//         }else{
		//             $(this).parent().parent().parent().find('.addToCart').attr('data-qty', 1);
		//         }
		//     });
		// });
		// }

		// qty_change();

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
	</script>
</body>

</html>
