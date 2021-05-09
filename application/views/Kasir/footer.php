	<?php
	$bu = base_url();
	?>
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
				<a href="<?= $bu; ?>" class="custom-logo-link" rel="home">
					<img src="<?= $bu; ?>assets/kasir/img\logo-front.png">
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
						<a class="footer-cart-contents" href="<?= $bu; ?>cart" title="Tampilkan Csssart Order Anda">
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
	<script type="text/javascript" src="<?= $bu; ?>assets/kasir/frontend\js\rupiah.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	<script type="text/javascript">
		$('#pagination-wrapper').show();

		$('.owl-stage').hide()
		$('body').on('click', '.page-link', function() {
			var hal = $(this).attr('data-page');
			$('#_page').val(hal);
			loadProduk(0)
		});



		$('#hiddenKan').click(function(e) {
			$('.owl-stage').hide()
		});
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
			$.ajax({
				type: "POST",
				dataType: 'json',
				url: "<?= $bu; ?>Kasir/getProduk",
				data: {
					id_kategori: fl,
					page: $('#_page').val(),
				},
			}).done(function(e) {
				$('#prodTampil').html('');
				if (e.status) {

					// $('.cart_counts').html(e.total + " Item");
					// $('.cart_total_formats').html("Rp " + e.total);

					var berapa = e.data.data.length;
					// console.log(e.data)
					$.each(e.data.data, function(key, val) {
						$('#prodTampil').append(generateProduk(val));
					});

					if (berapa >= 1) {
						console.log(e.data.page)
						generatePagination(e.data.page);
						$('#pagination-wrapper').show();

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

		function generatePagination(e) {
			console.log(e)
			var pag = '';
			// var pag = '';
			var max_page = 5;

			if (e.halaman <= 1) {
				pag += '<button disabled data-page="1" class="page-link button btn-outline-secondary px-2 rounded mr-2 pg border-0"><i class="fa fa-step-backward"></i></button> ';
			} else {
				pag += '<button data-page="' + (e.halaman - 1) + '" class="page-link button btn-primary px-2 rounded mr-2 pg border-0"><i class="fa fa-arrow-left"></i></button> ';
			}
			// console.log(p.total_halaman <= max_page);
			if (e.total_halaman <= max_page) {
				for (var i = 1; i <= e.total_halaman; i++) {
					if (i == e.halaman) {
						pag += '<button disabled data-page="' + i + '" class="page-link button btn-secondary px-2 rounded mr-2 text-center pg border-primary" disabled> ' + i + ' </button> ';
					} else {
						pag += '<button data-page="' + i + '" class="page-link button btn-primary px-2 rounded mr-2 text-center pg border-0"> ' + i + ' </button> ';
					}
				}
			} else {
				if (e.halaman - 2 > 1) {
					pag += '.. ';
				}
				for (var i = e.halaman - 2; i <= e.halaman + 2; i++) {
					// console.log(i);
					if (i == e.halaman) {
						pag += '<button disabled data-page="' + i + '" class="page-link button btn-secondary px-2 rounded mr-2 text-center pg border-primary" disabled> ' + i + ' </button> ';
					} else if (i >= 1 && i <= e.total_halaman) {
						pag += '<button data-page="' + i + '" class="page-link button btn-primary px-2 rounded mr-2 text-center pg border-0"> ' + i + ' </button> ';
					}
				}
				if (e.halaman + 2 < e.total_halaman) {
					pag += '.. ';
				}
			}

			// if (e.halaman >= e.total_halaman) {
			// 	pag += ' <button disabled data-page="' +  (e.halaman + 1)  + '" class="page-link button btn-outline-secondary px-2 rounded mr-2 pg border-0"><i class="fas fa-arrow-right"></i></button>';
			// } else {
			// 	pag += ' <button data-page="' + (e.halaman + 1) + '" class="page-link button btn-primary px-2 rounded mr-2 pg border-0"><i class="fas fa-arrow-right"></i></button>';
			// }
			$('#pagination-wrapper').html(pag);
		}
		// var total = 5;

		// $('.cart_dropdown_container').html(total)
		// $('.cart_count_footer').html(total);


		function generateProduk(produk) {
			// console.log(produk)
			return `<div class="col-md-4 produkAwal"> <br>
										<div class="product-outer">
											<div class="product-inner">
												<div class="product-image-wrapper">
													<img src="<?= $bu; ?>assets/images/foods/${produk.foto}" class="img-responsive img-prod " alt="">
													</a>
												</div>

												<div class="product-content-wrapper">
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
														<a data-id="${produk.id_menu}"  data-harga="${convertToRupiah(produk.harga)}" data-qty="1"  title="Tambah ke Keranjang" type="button" class="btn-tawar button product_type_simple add_to_cart_button">Order</a>
													</div></div>
											</div>
										</div>
													</div>
													`;
		}
		$('body').on('click', '.add_to_cart_button', function() {

			var id_produk = $(this).data('id');
			var harga = $(this).data('harga');
			// console.log(id_produk,harga)
			// return false
			var qty = 1;
			$('.btn-tawar').html('<i class="fas fa-spinner fa-spin"></i>');
			$('.btn-tawar').prop('disabled', true);
			$.ajax({
				type: "POST",
				dataType: 'json',
				url: "<?= $bu; ?>Pesan/setBid",
				data: {
					id_produk,
					harga,
					qty
				},
			}).done(function(e) {
				if (e.status) {
					console.log(e);
					Swal.fire(
						':)',
						e.msg,
						'success'
					);
					$('.cart_counts').html(e.total + " Item");
					$('.cart_total_formats').html("Rp " + e.harga);
					// setTimeout(function() {
					// 	location.reload();
					// }, 2000);

				} else {
					// alert(e.msg);

					// console.log("gagal");
					Swal.fire(
						'error',
						e.msg,
						'error'
					);
				}
			}).fail(function(e) {
				Swal.fire(
					'error',
					e.msg,
					'error'
				);

			}).always(function(e) {
				setTimeout(() => {
					$('.btn-tawar').html('Tambah Ke Keranjang');
					$('.btn-tawar').prop('disabled', false);
				}, 100);
			});
		})
	</script>
	</body>

	</html>
