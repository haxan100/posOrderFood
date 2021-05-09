            <?php
			defined('BASEPATH') or exit('No direct script access allowed');
			// $title = array_key_exists('title', $header) ? $header['title'] : $ci->namaAplikasi();
			// $page = array_key_exists('page', $header) ? $header['page'] : 'master_admin';
			// $js = array_key_exists('js', $header) ? $header['js'] : array();
			$bu = base_url();
			$role = $this->AdminModel->getRoleAll($this->session->userdata('id_admin'))->row();
			// var_dump($role);die;


			?>

            <div class="col-md-3 left_col">
            	<div class="left_col scroll-view">
            		<div class="navbar nav_title" style="border: 0;">
            			<a href="<?= base_url() ?>/admin" class="site_title"><i class="fa fa-paw"></i> <span>Pos Admin</span></a>
            		</div>

            		<div class="clearfix"></div>

            		<!-- menu profile quick info -->
            		<div class="profile clearfix">
            			<div class="profile_info">
            				<span>Welcome,</span>
            				<h2>Admin!</h2>
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
            					<?php
								if ($role->data_admin == 1 || $role->data_kasir == 1 || $role->master_menu == 1 || $role->master_transaksi == 1) {

								?>
            						<li><a><i class="fa fa-home"></i> Master <span class="fa fa-chevron-down"></span></a>
            							<ul class="nav child_menu">
            								<?php
											if ($role->data_admin == 1) {
											?>
            									<li><a href="<?= $bu ?>/Admin/master_admin">Master Admin</a></li>

            								<?php 	}
											if ($role->data_kasir == 1) {
											?>

            									<li><a href="<?= $bu ?>/Admin/master_kasir">Master Kasir</a></li>
            								<?php 	}
											if ($role->master_menu == 1) {
											?>
            									<li><a href="<?= $bu ?>/Admin/master_item">Master Item</a></li>
            								<?php 	}
											if ($role->master_transaksi == 1) {
											?>
            									<li><a href="<?= $bu ?>/Admin/master_transaksi">Master Transaksi</a></li>
            								<?php 	}
											?>
            							</ul>
            						</li>

            					<?php 	}


								if ($role->seeting == 1 || $role->data_admin == 1 || $role->histori == 1) {
								?>
            						<li><a><i class="fa fa-home"></i> Seting <span class="fa fa-chevron-down"></span></a>
            							<ul class="nav child_menu">
            								<?php
											if ($role->seeting == 1) {
											?>
            									<li><a href="<?= $bu ?>/Admin/setting">Setting App</a></li>
            								<?php 	}
											if ($role->data_admin == 1) {
											?>
            									<li><a href="<?= $bu ?>/Admin/master_role">Role</a></li>
            								<?php 	}
											if ($role->histori == 1) {
											?>
            									<li><a href="<?= $bu ?>/Admin/master_histori">Histori</a></li>
            								<?php 	}

											if ($role->data_admin == 1) {
											?>
            									<li><a href="<?= $bu ?>/Admin/master_slider">Slider Menu</a></li>
            								<?php 	}
											?>
            							</ul>
            						</li>

            					<?php 	} ?>
            					<!-- <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
            						<ul class="nav child_menu">
            							<li><a href="form.html">General Form</a></li>
            							<li><a href="form_advanced.html">Advanced Components</a></li>
            							<li><a href="form_validation.html">Form Validation</a></li>
            							<li><a href="form_wizards.html">Form Wizard</a></li>
            							<li><a href="form_upload.html">Form Upload</a></li>
            							<li><a id="keluar">Logout</a></li>
            						</ul>
            					</li> -->
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
