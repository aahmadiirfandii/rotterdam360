			<!-- Main content -->
			<section class="content">
				<!-- Info boxes -->
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-aqua"><i class="fa fa-table"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Scenes</span>
								<span class="info-box-number"><?=$this->crud->ca('scenes')?></span>
							</div> <!-- /.info-box-content -->
						</div> <!-- /.info-box -->
					</div> <!-- /.col -->
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-red"><i class="fa fa-table"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Hotspots</span>
								<span class="info-box-number"><?=$this->crud->ca('hotspots')?></span>
							</div> <!-- /.info-box-content -->
						</div> <!-- /.info-box -->
					</div> <!-- /.col -->
				</div> <!-- /.row -->
			</section> <!-- /.content -->
