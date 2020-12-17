		<header class="main-header">
			<!-- Logo -->
			<a href="<?=site_url()?>" target="_blank" title="Klik untuk melihat halaman depan." class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>VT</b></span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Admin</b> VT-360</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?=(empty($this->session->foto_admin))? admin_assets().'dist/img/avatar.png' : upload_url('userpics/thumbs').$this->session->foto_admin?>" class="user-image" alt="User Image" />
								<span class="hidden-xs"><?=$this->session->fullname_admin?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="<?=(empty($this->session->foto_admin))? admin_assets().'dist/img/avatar.png' : upload_url('userpics/thumbs').$this->session->foto_admin?>" class="img-circle" alt="User Image" />
									<p>
										<?=$this->session->fullname_admin?>
										<small><?=$this->session->username_admin?></small>
									</p>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<!-- <a href="<?=admin_url('profil')?>" class="btn btn-default btn-flat">Profil</a> -->
									</div>
									<div class="pull-right">
										<a href="<?=login_url('logout')?>" class="btn btn-default btn-flat">Keluar</a>
									</div>
								</li>
							</ul>
						</li>
						<!-- Control Sidebar Toggle Button -->
						<!-- <li> -->
							<!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
						<!-- </li> -->
					</ul>
				</div>
			</nav>
		</header>
