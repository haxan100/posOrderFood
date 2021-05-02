		<?php
		$bu = base_url()
		?>

		<div id="content" class="site-content" tabindex="-1">
			<div class="col-full">
				<div class="pizzaro-breadcrumb">
					<nav class="woocommerce-breadcrumb">
						<a href="http://dansdigitalmedia.com/resto/">Beranda</a>
						<span class="delimiter"><i class="po po-arrow-right-slider"></i></span>
						<a href="#">Konfirmasi</a>
						<span class="delimiter"><i class="po po-arrow-right-slider"></i></span>Order Selesai
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
							<header class="entry-header">
								<h1 class="entry-title">Order Selesai</h1>
							</header>
							<div class="entry-content">
								<div class="woocommerce">
									<p class="woocommerce-thankyou-order-received">Terima Kasih, Order Anda Kami Terima.</p>
									<ul class="woocommerce-thankyou-order-details order_details">
										<li class="order">No. Order #:<strong><?= $Data->kode_transaksi ?></strong></li>
										<li class="date">Tanggal :<strong><?= $Data->created_at ?></strong></li>

										<li class="total">Total :<strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span><?= convert_to_rupiah($Data->harga_total) ?></span></strong></li>
									</ul>
									<div class="clear"></div>
									<p>Silahkan Tunggu Pesananya :)</p>
									<h2>Order Detail</h2>
									<table class="shop_table order_details">
										<thead>
											<tr>
												<th class="product-name">Menu</th>
												<th class="product-total">Total</th>
											</tr>
										</thead>
										<tbody>

											<?php
											foreach ($getData as $k) {
											?>
												<tr class="order_item">
													<td class="product-name">
														<a href="#"><?= $k->nama_menu ?></a> <strong class="product-quantity"> X <?= $k->qty ?></strong>
													</td>
													<td class="product-total"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"> </span> <?= convert_to_rupiah($k->total) ?></span>
													</td>
												</tr>

											<?php
											}
											?>



										</tbody>
										<tfoot>
											<tr>
												<th scope="row">Total :</th>
												<td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span> <?= convert_to_rupiah($Data->harga_total) ?></span></td>
											</tr>
										</tfoot>
									</table>
									<header>
										<h2>Detail Pembeli</h2>
									</header>
									<table class="shop_table customer_details">
										<tbody>
											<tr>
												<th>Nama :</th>
												<td> <?= $Data->nama_user ?></td>
											</tr>
											<tr>
												<th>Tipe Pesan :</th>
												<td> <?= $Data->tipe_pesan ?></td>
											</tr>
											<tr>
												<th>No. Meja :</th>
												<td> <?= $Data->nomor_meja ?></td>
											</tr>
										</tbody>
									</table>
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
		</body>

		</html>
