<?php
$bu = base_url();

?>


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
											<p class="form-row form-row form-row-first" id="namas">
												<label for="nama" class="">Nama Anda</label>
												<input type="text" class="input-text " id="nama" name="resto_order[nama]" placeholder="Input Nama Anda" required autofocus />
											</p>

											<p class="form-row form-row form-row-last" id="pilihtempatkan">
												<label for="meja" class="">Pilih Tempat</label>
												<select name="pilihtempat" id="pilihtempat" class="form-control">
													<option value="default">Pilih Tempat</option>
													<option value="1">Makan Di Tempat</option>
													<option value="2">Di Bawa Pulang</option>
												</select>
											</p>

											<p class="form-row form-row form-row-last" id="meja">
												<label for="meja" class="">No. Meja</label>
												<select class="input-text" id="meja_id" name="resto_order[meja_id]">
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

											<?php foreach ($cart_content as $key => $k) {
											?>
												<tr class="cart_item">
													<td class="product-name">
														<?= $k->nama_menu ?> &nbsp;<strong class="product-quantity">&times; <?= $k->qty ?> </strong>
													</td>
													<td class="product-total">
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">Rp. </span> <?= convert_to_rupiah($k->total) ?> </span>
													</td>
												</tr>
											<?php
											} ?>






										</tbody>
										<tfoot>
											<input type="hidden" name="resto_order[total_qty]" value="<?= $totalcart ?>">
											<input type="hidden" name="resto_order[total]" value="<?= $totalHarga ?>">
											<tr class="cart-subtotal">
												<th>Total Qty</th>
												<td>
													<span class="woocommerce-Price-amount amount">
														<span class="woocommerce-Price-currencySymbol"></span><?= $totalcart ?></span>
												</td>
											</tr>

											<tr class="order-total">
												<th>Total Bayar</th>
												<input type="hidden" name="totalharga" id="totalharga" value="<?= $totalHarga ?>">
												<td>
													<strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rp. </span><?= convert_to_rupiah($totalHarga) ?></span></strong>
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
								$('#meja').hide()

								$('#pilihtempat').on('change', function() {
									var kec = $('#pilihtempat').val();
									if (kec == 1) {
										$('#meja').show()
									} else {
										$('#meja').hide()
									}

								});

								$('#meja_id').on('change', function(event) {
									event.preventDefault();
									var meja_id = $(this).val();
									$('.row_total').attr('data-meja_id', meja_id);
								});
								$('#form-bayar').on('submit', function(event) {
									event.preventDefault();

									// dataString = $("#form-bayar").serialize();
									var nama = $('#nama').val();
									var pilihtempat = $('#pilihtempat').val();
									var meja_id = $('#meja_id').val();
									var totalharga = $('#totalharga').val();

									// console.log(dataString)
									// return false
									$.ajax({
											url: "<?= $bu; ?>Cart/konfirmasi",
											type: 'POST',
											dataType: 'json',

											data: {
												nama,
												pilihtempat,
												meja_id,
												totalharga,
											},
										})
										.done(function(res) {

											location.href = "<?= $bu; ?>Cart/Selesai/?id=" + res.id;
											window.location = url;
										})
										.fail(function(error) {
											alert("eror!")
											console.log(error.responseText);
										});
								});

								// $('#form-bayar').on('submit', function(event) {
								// 	event.preventDefault();
								// 	// var resto_order = [];
								// 	// var row_total = $('.row_total');
								// 	// var data_total = {};
								// 	// data_total['meja_id']       = row_total.data('meja_id');
								// 	// data_total['order_nama']    = row_total.data('order_nama');
								// 	// data_total['order_tanggal'] = new Date().toISOString().split('T')[0];
								// 	// data_total['order_qty']     = row_total.data('order_qty');
								// 	// data_total['order_waktu']   = row_total.data('order_waktu');
								// 	// data_total['order_total']   = row_total.data('order_total');
								// 	// data_total['order_bayar']   = row_total.data('order_bayar');
								// 	// data_total['order_kembali'] = row_total.data('order_kembali');
								// 	// data_total['order_status']  = 2; 
								// 	// data_total['order_update']  = new Date().toISOString().split('T')[0] + ' ' + new Date().toLocaleTimeString( 'en-US', { hour12: false }); 

								// 	// resto_order.push(data_total);
								// 	// var resto_order = JSON.stringify(data_total);

								// 	// var resto_order_detail = [];
								// 	// $('.row_line').each(function(index, el) { 
								// 	//     var data = {}; 
								// 	//     data['menu_id']               = $(this).attr('data-menu_id'); 
								// 	//     data['order_detail_harga']    = $(this).attr('data-order_detail_harga'); 
								// 	//     data['order_detail_qty']      = $(this).attr('data-order_detail_qty'); 
								// 	//     data['order_detail_subtotal'] = $(this).attr('data-order_detail_subtotal'); 
								// 	//     resto_order_detail.push(data);
								// 	// });
								// 	// var resto_order_detail = JSON.stringify(resto_order_detail);
								// 	dataString = $("#form-bayar").serialize();
								// 	$.ajax({
								// 			url: 'http://dansdigitalmedia.com/resto/checkout/konfirmasi',
								// 			type: 'POST',
								// 			data: dataString,
								// 			// data: {
								// 			//     resto_order : resto_order
								// 			// },
								// 		})
								// 		.done(function(res) {
								// 			location.href = 'http://dansdigitalmedia.com/resto/checkout/selesai/' + res.order_id;
								// 		})
								// 		.fail(function(error) {
								// 			console.log(error.responseText);
								// 		});
								// });
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
				<li><a class="fa fa-facebook" href="https://facebook.com/dansdigitalmedia" target="_blank"></a></li>
				<li><a class="fa fa-instagram" href="https://instagram.com/dansdigitalmedia" target="_blank"></a></li>
				<li><a class="fa fa-twitter" href="https://twitter.com/dansdigitalmedia" target="_blank"></a></li>
				<li><a class="fa fa-youtube" href="https://www.youtube.com" target="_blank"></a></li>
			</ul>
		</div>
		<div class="footer-logo">
			<a href="<?= $bu; ?>assets/kasir/" class="custom-logo-link" rel="home">
				<img src="http://dansdigitalmedia.com/resto/img/logo-front.png">
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
