
	<?php
	$bu = base_url();
	?>
<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dans-Resto | Digital Restaurant Menu</title>
	<link rel="shortcut icon"  href="<?= $bu; ?>assets/kasir/img/logo-icon.png">
	<link rel="stylesheet" type="text/css"  href="<?= $bu; ?>assets/kasir/frontend/css/bootstrap.min.css" media="all" />
	<link rel="stylesheet" type="text/css"  href="<?= $bu; ?>assets/kasir/frontend/css/font-awesome.min.css" media="all" />
	<link rel="stylesheet" type="text/css"  href="<?= $bu; ?>assets/kasir/frontend/css/animate.min.css" media="all" />
	<link rel="stylesheet" type="text/css"  href="<?= $bu; ?>assets/kasir/frontend/css/font-pizzaro.css" media="all" />
	<link rel="stylesheet" type="text/css"  href="<?= $bu; ?>assets/kasir/frontend/css/style.css" media="all" />
	<link rel="stylesheet" type="text/css"  href="<?= $bu; ?>assets/kasir/frontend/css/colors/red.css" media="all" />
	<link rel="stylesheet" type="text/css"  href="<?= $bu; ?>assets/kasir/frontend/css/jquery.mCustomScrollbar.min.css" media="all" />
	<!-- <link hressf="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CYanone+Kaffeesatz:200,300,400,700" rel="stylesheet"> -->
	<link  href="<?= $bu; ?>assets/kasir/backend/js/sweetalert2.css" rel="stylesheet" type="text/css" />
	<script src="<?= $bu; ?>assets/kasir/backend/js/sweetalert2.min.js"></script>
	<script type="text/javascript" src="<?= $bu; ?>assets/kasir/frontend/js/jquery.min.js"></script>
</head>

<body class="woocommerce-cart">
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header header-v1" style="background-image: none; ">
			<div class="col-full">
				<a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
				<a class="skip-link screen-reader-text" href="#content">Skip to content</a>
				<div class="header-wrap">
					<div class="site-branding">
						<a  href="<?= $bu; ?>assets/kasir/" class="custom-logo-link" rel="home">
							<img src="<?= $bu; ?>assets/kasir/img/logo-front.png">
						</a>
					</div>
					<nav id="site-navigation" class="main-navigation" aria-label="Primary Navigation">
						<button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false"><span class="close-icon"><i class="po po-close-delete"></i></span><span class="menu-icon"><i class="po po-menu-icon"></i></span><span class=" screen-reader-text">Menu</span></button>
						<div class="handheld-navigation">
							<span class="phm-close">Tutup</span>
							<ul class="menu">
								<li class="menu-item "><a  href="<?= $bu; ?>assets/kasir/kategori/dessert"><i class="po po-salads"></i>Dessert</a></li>
								<li class="menu-item "><a  href="<?= $bu; ?>assets/kasir/kategori/drink"><i class="po po-drinks"></i>Drink</a></li>
								<li class="menu-item "><a  href="<?= $bu; ?>assets/kasir/kategori/main-course"><i class="po po-burger"></i>Main Course</a></li>
								<li class="menu-item "><a  href="<?= $bu; ?>assets/kasir/kategori/snack"><i class="po po-fries"></i>Snack</a></li>
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
								<a  href="<?= $bu; ?>assets/kasir/cart" title="Tampilkan Cart Order Anda">
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
							<li class="menu-item "><a  href="<?= $bu; ?>assets/kasir/kategori/dessert"><i class="po po-salads"></i>Dessert</a></li>
							<li class="menu-item "><a  href="<?= $bu; ?>assets/kasir/kategori/drink"><i class="po po-drinks"></i>Drink</a></li>
							<li class="menu-item "><a  href="<?= $bu; ?>assets/kasir/kategori/main-course"><i class="po po-burger"></i>Main Course</a></li>
							<li class="menu-item "><a  href="<?= $bu; ?>assets/kasir/kategori/snack"><i class="po po-fries"></i>Snack</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<div id="content" class="site-content" tabindex="-1">
			<div class="col-full">
				<div class="pizzaro-breadcrumb">
					<nav class="woocommerce-breadcrumb">
						<a  href="<?= $bu; ?>assets/kasir/">Beranda</a>
						<span class="delimiter"><i class="po po-arrow-right-slider"></i></span>Cart
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
						<div id="post-8" class="post-8 page type-page status-publish hentry">
							<div class="entry-content">
								<div class="woocommerce">
									<form>
										<table class="shop_table shop_table_responsive cart">
											<thead>
												<tr>
													<th class="product-remove">&nbsp;</th>
													<th class="product-thumbnail">&nbsp;</th>
													<th class="product-name">Menu</th>
													<th class="product-price">Harga</th>
													<th class="product-quantity">Jumlah</th>
													<th class="product-subtotal">Sub Total</th>
												</tr>
											</thead>
											<tbody>
												<tr class="cart_item c20ad4d76fe97759aa27a0c99bff6710">
													<td class="product-remove">
														<a href="#" title="Hapus Item" class="remove cart_remove_item" data-rowid="c20ad4d76fe97759aa27a0c99bff6710">&times;</a>
													</td>
													<td class="product-thumbnail">
														<a  href="<?= $bu; ?>assets/kasir/menuorder/es-susu-cokelat">
															<img width="180" height="180" src="<?= $bu; ?>assets/kasir/img/menu_folder/thumbs/Menu_makanan_es-susu-cokelat_1552202151.jpg" alt="" />
														</a>
													</td>
													<td class="product-name" data-title="Menu">
														<a  href="<?= $bu; ?>assets/kasir/menuorder/es-susu-cokelat">ES SUSU COKELAT</a>
													</td>
													<td class="product-price" data-title="Harga">
														<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>10,000</span>
													</td>
													<td class="product-quantity" data-title="Jumlah">
														<div class="qty-btn">
															<div class="quantity">
																<input type="text" value="1" title="Qty" class="input-text qty text" data-rowid="c20ad4d76fe97759aa27a0c99bff6710" />
															</div>
														</div>
													</td>
													<td class="product-subtotal" data-title="Sub Total">
														<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>Rp. <span id="price_sub_format_c20ad4d76fe97759aa27a0c99bff6710">10,000</span></span>
													</td>
												</tr>
												<tr class="cart_item aab3238922bcc25a6f606eb525ffdc56">
													<td class="product-remove">
														<a href="#" title="Hapus Item" class="remove cart_remove_item" data-rowid="aab3238922bcc25a6f606eb525ffdc56">&times;</a>
													</td>
													<td class="product-thumbnail">
														<a  href="<?= $bu; ?>assets/kasir/menuorder/friench-fries">
															<img width="180" height="180" src="<?= $bu; ?>assets/kasir/img/menu_folder/thumbs/Menu_makanan_friench-fries_1552202378.jpg" alt="" />
														</a>
													</td>
													<td class="product-name" data-title="Menu">
														<a  href="<?= $bu; ?>assets/kasir/menuorder/friench-fries">FRIENCH FRIES</a>
													</td>
													<td class="product-price" data-title="Harga">
														<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>5,000</span>
													</td>
													<td class="product-quantity" data-title="Jumlah">
														<div class="qty-btn">
															<div class="quantity">
																<input type="text" value="1" title="Qty" class="input-text qty text" data-rowid="aab3238922bcc25a6f606eb525ffdc56" />
															</div>
														</div>
													</td>
													<td class="product-subtotal" data-title="Sub Total">
														<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>Rp. <span id="price_sub_format_aab3238922bcc25a6f606eb525ffdc56">5,000</span></span>
													</td>
												</tr>
												<tr class="cart_item 6512bd43d9caa6e02c990b0a82652dca">
													<td class="product-remove">
														<a href="#" title="Hapus Item" class="remove cart_remove_item" data-rowid="6512bd43d9caa6e02c990b0a82652dca">&times;</a>
													</td>
													<td class="product-thumbnail">
														<a  href="<?= $bu; ?>assets/kasir/menuorder/es-teh-lemon">
															<img width="180" height="180" src="<?= $bu; ?>assets/kasir/img/menu_folder/thumbs/Menu_makanan_es-teh-lemon_1552202101.jpg" alt="" />
														</a>
													</td>
													<td class="product-name" data-title="Menu">
														<a  href="<?= $bu; ?>assets/kasir/menuorder/es-teh-lemon">ES TEH LEMON</a>
													</td>
													<td class="product-price" data-title="Harga">
														<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>5,000</span>
													</td>
													<td class="product-quantity" data-title="Jumlah">
														<div class="qty-btn">
															<div class="quantity">
																<input type="text" value="1" title="Qty" class="input-text qty text" data-rowid="6512bd43d9caa6e02c990b0a82652dca" />
															</div>
														</div>
													</td>
													<td class="product-subtotal" data-title="Sub Total">
														<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>Rp. <span id="price_sub_format_6512bd43d9caa6e02c990b0a82652dca">5,000</span></span>
													</td>
												</tr>
												<tr class="cart_item 1679091c5a880faf6fb5e6087eb1b2dc">
													<td class="product-remove">
														<a href="#" title="Hapus Item" class="remove cart_remove_item" data-rowid="1679091c5a880faf6fb5e6087eb1b2dc">&times;</a>
													</td>
													<td class="product-thumbnail">
														<a  href="<?= $bu; ?>assets/kasir/menuorder/masi-goreng-teri-gurih">
															<img width="180" height="180" src="<?= $bu; ?>assets/kasir/img/menu_folder/thumbs/Menu_makanan_masi-goreng-teri-gurih_1552200907.jpg" alt="" />
														</a>
													</td>
													<td class="product-name" data-title="Menu">
														<a  href="<?= $bu; ?>assets/kasir/menuorder/masi-goreng-teri-gurih">MASI GORENG TERI GURIH</a>
													</td>
													<td class="product-price" data-title="Harga">
														<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>17,000</span>
													</td>
													<td class="product-quantity" data-title="Jumlah">
														<div class="qty-btn">
															<div class="quantity">
																<input type="text" value="1" title="Qty" class="input-text qty text" data-rowid="1679091c5a880faf6fb5e6087eb1b2dc" />
															</div>
														</div>
													</td>
													<td class="product-subtotal" data-title="Sub Total">
														<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>Rp. <span id="price_sub_format_1679091c5a880faf6fb5e6087eb1b2dc">17,000</span></span>
													</td>
												</tr>
												<tr class="cart_item c9f0f895fb98ab9159f51fd0297e236d">
													<td class="product-remove">
														<a href="#" title="Hapus Item" class="remove cart_remove_item" data-rowid="c9f0f895fb98ab9159f51fd0297e236d">&times;</a>
													</td>
													<td class="product-thumbnail">
														<a  href="<?= $bu; ?>assets/kasir/menuorder/mie-goreng-seafood">
															<img width="180" height="180" src="<?= $bu; ?>assets/kasir/img/menu_folder/thumbs/Menu_makanan_mie-goreng-seafood_1552201071.jpg" alt="" />
														</a>
													</td>
													<td class="product-name" data-title="Menu">
														<a  href="<?= $bu; ?>assets/kasir/menuorder/mie-goreng-seafood">MIE GORENG SEAFOOD</a>
													</td>
													<td class="product-price" data-title="Harga">
														<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>13,000</span>
													</td>
													<td class="product-quantity" data-title="Jumlah">
														<div class="qty-btn">
															<div class="quantity">
																<input type="text" value="1" title="Qty" class="input-text qty text" data-rowid="c9f0f895fb98ab9159f51fd0297e236d" />
															</div>
														</div>
													</td>
													<td class="product-subtotal" data-title="Sub Total">
														<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>Rp. <span id="price_sub_format_c9f0f895fb98ab9159f51fd0297e236d">13,000</span></span>
													</td>
												</tr>
												<tr>
													<td colspan="6" class="actions">
														<input type="button" class="button" id="update_cart" value="Update Order" />
														<div class="wc-proceed-to-checkout">
															<a  href="<?= $bu; ?>assets/kasir/checkout" class="checkout-button button alt wc-forward">Konfirmasi</a>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</form>
									<div class="cart-collaterals">
										<div class="cart_totals ">
											<h2>Cart Totals</h2>
											<table class="shop_table shop_table_responsive">
												<tr class="cart-subtotal">
													<th>Total Qty</th>
													<td data-title="Total Item">
														<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">5</span>
													</td>
												</tr>
												<tr class="cart-subtotal">
													<th>Total Waktu</th>
													<td data-title="Total Waktu">
														<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">24 Menit</span>
													</td>
												</tr>
												<tr class="cart-subtotal">
													<th>Total</th>
													<td data-title="Total">
														<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rp. </span><span class="cart_total_format">50.000</span></span>
													</td>
												</tr>
											</table>
											<div class="wc-proceed-to-checkout">
												<a  href="<?= $bu; ?>assets/kasir/checkout" class="checkout-button button alt wc-forward">Checkout</a>
											</div>
										</div>
									</div>
									<script type="text/javascript">
										$('.cart_remove_item').each(function(index, el) {
											$(this).on('click', function(event) {
												cart_remove_item = $(this);
												event.preventDefault();
												var rowid = $(this).data('rowid');
												swal({
													title: 'Anda Yakin ?',
													text: 'Item ini akan di Hapus !',
													type: 'warning',
													showCancelButton: true,
													confirmButtonColor: '#3085d6',
													cancelButtonColor: '#d33',
													confirmButtonText: 'Ya',
													cancelButtonText: 'Batal',
													closeOnConfirm: true
												}, function(isConfirm) {
													if (isConfirm) {
														$.ajax({
																url: "http://dansdigitalmedia.com/resto/cart/remove_item/" + rowid,
															})
															.done(function(res) {
																location.reload();
															})
															.fail(function(error) {
																console.log(error.responseText);
															});
													}
												});
											});
										});
										///////////////
										$('#update_cart').on('click', function(event) {
											event.preventDefault();
											location.reload();
										});
										///////////////

										$('.qty').each(function(index, el) {
											$(this).on('change keyup', function(event) {
												event.preventDefault();
												rowid = $(this).data('rowid');
												qty = $(this).val();
												if (qty > 0) {
													$.ajax({
															url: "http://dansdigitalmedia.com/resto/cart/update_item/",
															type: 'POST',
															data: {
																rowid: rowid,
																qty: qty
															}
														})
														.done(function(res) {
															// console.log(res); 
															$('#price_sub_format_' + rowid).html(res.cart_content.price_sub_format);
															$('.cart_total_format').html(res.cart_total_format);
														})
														.fail(function(error) {
															console.log(error.responseText);
														});
												} else {
													swal({
														title: "Info",
														text: "Jumlah harus lebih dari 0",
														showConfirmButton: false,
														type: "warning",
														timer: 2000
													});
													$(this).val(qty).focus();
												}
											});
										});
									</script>
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
						<li><a class="fa fa-facebook" href="https://facebook.com/dansdigitalmedia" target="_blank"></a></li>
						<li><a class="fa fa-instagram" href="https://instagram.com/dansdigitalmedia" target="_blank"></a></li>
						<li><a class="fa fa-twitter" href="https://twitter.com/dansdigitalmedia" target="_blank"></a></li>
						<li><a class="fa fa-youtube" href="https://www.youtube.com" target="_blank"></a></li>
					</ul>
				</div>
				<div class="footer-logo">
					<a  href="<?= $bu; ?>assets/kasir/" class="custom-logo-link" rel="home">
						<img src="<?= $bu; ?>assets/kasir/img/logo-front.png">
					</a>
				</div>
				<div class="site-address">
					<ul class="address">
						<li>DANSTor</li>
						<li>Jalan Trimargo santoso no.272 Pekalongan</li>
						<li>Telp. (0285) 435146</li>
						<li><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="1175707f62757c7475787051767c70787d3f727e7c">[email&#160;protected]</a></li>
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
							<a class="footer-cart-contents"  href="<?= $bu; ?>assets/kasir/cart" title="Tampilkan Cart Order Anda">
								<span class="count cart_count">5</span> </a>
						</li>
					</ul>
				</div>
			</div>
		</footer>
	</div>
	<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script type="text/javascript" src="<?= $bu; ?>assets/kasir/frontend/js/tether.min.js"></script>
	<script type="text/javascript" src="<?= $bu; ?>assets/kasir/frontend/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= $bu; ?>assets/kasir/frontend/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="<?= $bu; ?>assets/kasir/frontend/js/social.share.min.js"></script>
	<script type="text/javascript" src="<?= $bu; ?>assets/kasir/frontend/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript" src="<?= $bu; ?>assets/kasir/frontend/js/scripts.min.js"></script>
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
