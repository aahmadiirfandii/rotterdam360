			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-default">
							<div class="box-body">
								<?=($this->session->flashdata('sukses'))? '<div class="alert alert-success fade in"><button data-dismiss="alert" class="close" type="button">×</button>'.$this->session->flashdata('sukses').'</div>': ''?>
								<?=($this->session->flashdata('gagal'))? '<div class="alert alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>'.$this->session->flashdata('gagal').'</div>': ''?>
								<?=form_open(admin_url('settings'))?>
									<div class="col-md-6">
										<div class="form-group">
											<label>First Scene</label> <span>(Tidak boleh ada spasi)</span>
											<select name="first_scene" class="form-control">
												<?php foreach ($first_scene as $data) { ?>
												<option value="<?=$data->scene_id?>"<?=set_select('first_scene', $data->scene_id, $data->scene_id === $setting->first_scene)?>><?=$data->scene_id?></option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<label>Author</label>
											<input type="text" name="author" class="form-control" placeholder="Author" value="<?=set_value('author', $setting->author)?>" required />
											<?=form_error('author')?>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Autoload</label>
											<select name="autoload" class="form-control">
												<option value="1"<?=set_select('autoload', '1', '1' === $setting->autoload)?>>Ya</option>
												<option value="0"<?=set_select('autoload', '0', '0' === $setting->autoload)?>>Tidak</option>
											</select>
										</div>
										<div class="form-group">
											<label>Scene Fade Duration</label> <span>(Dalam detik)</span>
											<input type="text" name="scene_fade_duration" class="form-control" placeholder="Scene Fade Duration" value="<?=set_value('scene_fade_duration', $setting->scene_fade_duration)?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required />
											<?=form_error('scene_fade_duration')?>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="submit" name="submit" class="btn btn-primary" value="Submit" />
											<a href="<?=admin_url('settings')?>" class="btn btn-default">Batal</a>
										</div>
									</div>
								<?=form_close()?>
							</div>
						</div>
					</div> <!-- /.col -->
				</div> <!-- /.row -->
			</section> <!-- /.content -->
