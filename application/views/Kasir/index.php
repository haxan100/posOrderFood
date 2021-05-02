<?php
$bu = base_url();
// var_dump($konten[2]); 
// echo  $totalHarga; die;
?>


		<div id="content" class="site-content" tabindex="-1">
			<div class="col-full">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">
						<div class="home-v1-slider">
							<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
							<?php 
							foreach ($slider as $key ) {	
								// var_dump($key);die;
							?>
								<div class="item slider-1">
									<img src="<?= $bu; ?>assets/images/slider/<?= $key->foto; ?> " class="img-responsive" alt="">
								</div>

								<?php 
									}
								?>

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
