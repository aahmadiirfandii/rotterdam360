		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?=(empty($this->session->foto_admin))? admin_assets().'dist/img/avatar.png' : upload_url('userpics/thumbs').$this->session->foto_admin?>" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p><?=$this->session->fullname_admin?></p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<?php $modul = $this->uri->segment(2); $method = $this->uri->segment(3)?>
				<ul class="sidebar-menu">
					<li class="header">NAVIGASI</li>

					<!-- Modul "beranda" -->
					<li class="<?=$modul == '' ? 'active ' : ''?>">
						<a href="<?=admin_url()?>"><i class="fa fa-dashboard"></i> <span>Beranda</span></a>
					</li>

					<!-- Modul "scenes" -->
					<li class="<?=$modul == 'scenes' ? 'active ' : ''?>">
						<a href="<?=admin_url('scenes')?>"><i class="fa fa-table"></i> <span>Scenes</span></a>
					</li>

					<!-- Modul "hotspots" -->
					<li class="<?=$modul == 'hotspots' ? 'active ' : ''?>">
						<a href="<?=admin_url('hotspots')?>"><i class="fa fa-table"></i> <span>Hotspots</span></a>
					</li>

					<!-- Modul "settings" -->
					<li class="<?=$modul == 'settings' ? 'active ' : ''?>">
						<a href="<?=admin_url('settings')?>"><i class="fa fa-gears"></i> <span>Settings</span></a>
					</li>

				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					<?=$title?>
					<small><?=(isset($subtitle))? $subtitle : ''?></small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active"><?=$title?></li>
				</ol>
			</section>
