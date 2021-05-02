            <?php
            defined('BASEPATH') or exit('No direct script access allowed');
            // $title = array_key_exists('title', $header) ? $header['title'] : $ci->namaAplikasi();
            // $page = array_key_exists('page', $header) ? $header['page'] : 'master_admin';
            // $js = array_key_exists('js', $header) ? $header['js'] : array();
            $bu = base_url();
            ?>		
			
            <div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_info">
							<span>Welcome,</span>
							<h2>John Doe</h2>
						</div>
						<div class="clearfix"></div>
					</div>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>General</h3>
							<ul class="nav side-menu">

								<li><a><i class="fa fa-home"></i> Master <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="<?=$bu ?>/Admin/master_admin">Admin</a></li>
										<li><a href="<?=$bu ?>/Admin/master_kasir">Kasir</a></li>
										<li><a href="<?=$bu ?>/Admin/master_item">Item</a></li>
										<li><a href="<?=$bu ?>/Admin/master_transaksi">Master Transaksi</a></li>
									</ul>
								</li>
                                
								<li><a><i class="fa fa-home"></i> Prop <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="<?=$bu ?>/Admin/setting">Setting</a></li>
										<li><a href="<?= $bu?>/Admin/master_role">Role</a></li>
										<li><a href="index3.html">xx</a></li>
										<li><a href="index3.html">xx</a></li>
									</ul>
								</li>

								<li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="form.html">General Form</a></li>
										<li><a href="form_advanced.html">Advanced Components</a></li>
										<li><a href="form_validation.html">Form Validation</a></li>
										<li><a href="form_wizards.html">Form Wizard</a></li>
										<li><a href="form_upload.html">Form Upload</a></li>
										<li><a  id="keluar" >Logout</a></li>
									</ul>
								</li>
							</ul>
						</div>

					</div>
					<!-- /sidebar menu -->
				</div>
			</div>


			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					</div>
					<nav class="nav navbar-nav">
						<ul class=" navbar-right">
							<li class="nav-item dropdown open" style="padding-left: 15px;">
								<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
									<img src="images/img.jpg" alt="">John Doe
								</a>
								<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="javascript:;"> Profile</a>
									<a class="dropdown-item" href="javascript:;">
										<span class="badge bg-red pull-right">50%</span>
										<span>Settings</span>
									</a>
									<a class="dropdown-item" href="javascript:;">Help</a>
									<a class="dropdown-item" id="keluar"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
								</div>
							</li>

						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->
