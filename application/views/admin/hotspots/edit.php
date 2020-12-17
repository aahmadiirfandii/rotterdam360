			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-default">
							<div class="box-body">
								<?=form_open(admin_url('hotspots/edit/'.$hotspot->id))?>
									<div class="col-md-6">
										<div class="form-group">
											<label>Main Scene</label> <span>(Tidak boleh ada spasi)</span>
											<select name="main_scene" class="form-control">
												<?php foreach ($main_scene as $data) { ?>
												<option value="<?=$data->scene_id?>"<?=set_select('main_scene', $data->scene_id, $data->scene_id === $hotspot->main_scene)?>><?=$data->scene_id?></option>
												<?php } ?>
											</select>
											<?=form_error('main_scene')?>
										</div>
										<div class="form-group">
											<label>Scene ID</label> <span>(Tidak boleh ada spasi)</span>
											<select name="scene_id" class="form-control">
												<?php foreach ($main_scene as $data2) { ?>
												<option value="<?=$data2->scene_id?>"<?=set_select('scene_id', $data2->scene_id, $data2->scene_id === $hotspot->scene_id)?>><?=$data2->scene_id?></option>
												<?php } ?>
											</select>
											<?=form_error('scene_id')?>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Pitch</label> <span>(Angka desimal menggunakan titik. <b>Min = -360</b>, <b>max = 360</b>)</span>
											<input type="text" name="pitch" class="form-control" placeholder="Pitch" value="<?=set_value('pitch', $hotspot->pitch)?>" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 45 || event.charCode == 46" required />
											<?=form_error('pitch')?>
										</div>
										<div class="form-group">
											<label>Yaw</label> <span>(Angka desimal menggunakan titik. <b>Min = -360</b>, <b>max = 360</b>)</span>
											<input type="text" name="yaw" class="form-control" placeholder="Yaw" value="<?=set_value('yaw', $hotspot->yaw)?>" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 45 || event.charCode == 46" required />
											<?=form_error('yaw')?>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Text</label>
											<input type="text" name="text" class="form-control" placeholder="Text" value="<?=set_value('text', $hotspot->text)?>" required />
											<?=form_error('text')?>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="submit" name="submit" class="btn btn-success" value="Submit" />
											<a href="<?=admin_url('hotspots')?>" class="btn btn-default">Batal</a>
										</div>
									</div>
								<?=form_close()?>
							</div>
						</div>
					</div> <!-- /.col -->
				</div> <!-- /.row -->
			</section> <!-- /.content -->
