<?php
$bu = base_url();
?>


<body class="woocommerce-cart">
	<div id="page" class="hfeed site">

		<div id="content" class="site-content" tabindex="-1">
			<div class="col-full">
				<div class="pizzaro-breadcrumb">
					<nav class="woocommerce-breadcrumb">
						<a href="<?= $bu; ?>assets/kasir/">Beranda</a>
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
												<?php foreach ($cart_content as $key => $k) {
												?>

													<tr class="cart_item c20ad4d76fe97759aa27a0c99bff6710">
														<td class="product-remove">
															<a href="#" title="Hapus Item" class="remove cart_remove_item" data-rowid="c20ad4d76fe97759aa27a0c99bff6710" data-id=<?= $k->id_menu ?>>&times;</a>
														</td>
														<td class="product-thumbnail">
															<a href="<?= $bu; ?>assets/kasir/menuorder/es-susu-cokelat">
																<img width="180" height="180" src="<?= $bu; ?>assets/images/foods/<?= $k->foto ?>" alt="" />
															</a>
														</td>
														<td class="product-name" data-title="Menu">
															<a href="<?= $bu; ?>assets/kasir/menuorder/es-susu-cokelat"><?= $k->nama_menu ?></a>
														</td>
														<td class="product-price" data-title="Harga">
															<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span><?= convert_to_rupiah($k->harga) ?></span>
														</td>
														<td class="product-quantity" data-title="Jumlah">
															<div class="qty-btn">
																<div class="quantity">
																	<input type="number" value="<?= $k->qty ?>" data-harga=<?= $k->harga ?> title="Qty" class="input-text qty text" data-rowid="c20ad4d76fe97759aa27a0c99bff6710" data-id=<?= $k->id_menu ?> />
																</div>
															</div>
														</td>
														<td class="product-subtotal" data-title="Sub Total">
															<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>Rp. <span id="TOTAL<?= $k->id_menu ?>"><?= convert_to_rupiah($k->total) ?></span></span>
														</td>
													</tr>

												<?php
												} ?>


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
														<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"><?= $totalcart ?></span>
													</td>
												</tr>
												<tr class="cart-subtotal">
													<th>Total</th>
													<td data-title="Total">
														<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rp. </span><span class="cart_total_format"><?= convert_to_rupiah($totalHarga) ?></span></span>
													</td>
												</tr>
												<tr>
													<td colspan="6" class="actions">
														<input type="button" class="button" id="update_cart" value="CekOut" />
														<div class="wc-proceed-to-checkout">
															<a href="http://dansdigitalmedia.com/resto/checkout" class="checkout-button button alt wc-forward">Konfirmasi</a>
														</div>
													</td>

												</tr>

											</table>
											<div class="wc-proceed-to-checkout">
												<a href="<?= $bu; ?>assets/kasir/checdkout" class="checkout-button button alt wc-forward">Checkout</a>
											</div>
										</div>
									</div>
									<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->

									<script type="text/javascript">
										$('.cart_remove_item').each(function(index, el) {
											$(this).on('click', function(event) {
												cart_remove_item = $(this);
												event.preventDefault();
												var rowid = $(this).data('rowid');
												var id = $(this).data('id');
												// console.log(id)
												// return false
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
																url: '<?= $bu; ?>/Cart/hapusSatuKeranjang',
																type: "POST",
																dataType: 'json',
																data: {
																	id
																},
															})
															.done(function(res) {
																console.log(res)
																console.log(res.status)
																// return false
																if (res.status) {
																	// 	swal({
																	// 	title: 'Anda Yakin ?',
																	// 	text: 'Item ini akan di Hapus !',
																	// 	type: 'warning',
																	// 	showCancelButton: true,
																	// 	confirmButtonColor: '#3085d6',
																	// 	cancelButtonColor: '#d33',
																	// 	confirmButtonText: 'Ya',
																	// 	cancelButtonText: 'Batal',
																	// 	closeOnConfirm: true
																	// });
																	setTimeout(() => {
																		location.reload();
																	}, 1000);
																} else {
																	alert("Gagal!")

																}
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
											console.log(bu)
											var url = bu + 'Cart/checkout';
											window.location = url;
											return false
										});
										///////////////

										$('.qty').each(function(index, el) {
											$(this).on('change keyup', function(event) {
												event.preventDefault();
												rowid = $(this).data('rowid');
												var harga = $(this).data('harga');
												// console.log(harga)
												// return false
												// id = $(this).data('id');
												var id = $(this).data('id');
												qty = $(this).val();
												var SubTotalHarga = qty * harga;
												if (qty > 0) {
													$.ajax({
															url: '<?= $bu; ?>/Cart/updateCart',
															type: "POST",
															dataType: 'json',
															data: {
																id,
																qty
															},
														})
														.done(function(res) {
															console.log(res);
															var totalHarga = res.harga;
															$('#TOTAL' + id).html(convertToRupiah(SubTotalHarga));
															$('.cart_total_format').html(convertToRupiah(totalHarga));
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
						<li><a class="fa fa-facebook" href="https://facebook.com/<?= $konten[3]->isi ?>" target="_blank"></a></li>
						<li><a class="fa fa-instagram" href="https://instagram.com/<?= $konten[4]->isi ?>" target="_blank"></a></li>
						<li><a class="fa fa-twitter" href="https://twitter.com/<?= $konten[5]->isi ?>" target="_blank"></a></li>
						<li><a class="fa fa-youtube" href="https://www.youtube.com/<?= $konten[6]->isi ?>" target="_blank"></a></li>
					</ul>
				</div>
				<div class="footer-logo">
					<a href="<?= $bu; ?>assets/kasir/" class="custom-logo-link" rel="home">
						<img src="<?= $bu; ?>assets/kasir/img/logo-front.png">
					</a>
				</div>
				<div class="site-address">
					<ul class="address">
						<li>Hasan</li>
						<li><?= $konten[1]->isi ?></li>
						<li><?= $konten[2]->isi ?></li>
						<li><a href="<?= $bu; ?>assets/kasir//cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="98fcf9f6ebfcf5fdfcf1f9d8fff5f9f1f4b6fbf7f5">[email&#160;protected]</a></li>
					</ul>
				</div>
				<div class="site-info">
					<p class="copyright">Copyright &copy; <?= date("Y"); ?> <?= $konten[0]->isi ?> | Digital Restaurant Menu</p>
				</div>
				<div class="pizzaro-handheld-footer-bar">
					<ul class="columns-2">
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
								<span class="count cart_count"><?= $totalcart ?></span> </a>
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
	<script type="text/javascript" src="<?= $bu; ?>assets/kasir/frontend/js/rupiah.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	
	<script type="text/javascript">
		var url = '<?= $bu ?>/Kasir/login';
		$('#keluar').click(function(e) {
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Logout'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						type: "post",
						url: "<?= $bu ?>/kasir/logout",
						dataType: "json",
						success: function(r) {
							if (r.error) {
								Swal.fire(
									'gagal!',
									r.pesan,
									'errorr'
								)
							} else {
								Swal.fire(
									'Berhasil!',
									r.pesan,
									'success'
								)
								setTimeout(() => {
									window.location = url;
								}, 2000);

							}

						}
					});


				}
			})
		});
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
