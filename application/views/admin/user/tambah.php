			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-default">
							<div class="box-body">
								<?php
								// Pesan muncul jika data tidak valid
								echo validation_errors('<div class="alert alert-danger">', '</div>');

								// Pesan Error validasi gambar
								echo (isset($error_upload))? $error_upload : '';

								// Open form
								echo form_open_multipart(admin_url('user/tambah'));
								?>
									<div class="col-md-6">
										<div class="form-group form-group-lg">
											<label>User Untuk Site?</label>
											<select name="id_site" class="form-control">
												<?php foreach ($site as $select): ?>
												<option value="<?php echo $select->id_site; ?>"<?php echo set_select('id_site', $select->id_site); ?>><?php echo $select->nama_site.' - '.$select->kota; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="form-group">
											<label>Nama Lengkap</label>
											<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value('nama'); ?>" />
										</div>
										<div class="form-group">
											<label>E-mail</label>
											<input type="text" name="email" class="form-control" placeholder="Alamat E-mail" value="<?php echo set_value('email'); ?>" />
										</div>
										<div class="form-group">
											<label>Username</label>
											<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>" />
										</div>
										<div class="form-group">
											<label>Password</label>
											<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" />
										</div>
										<div class="form-group">
											<label>Konfirmasi Password</label>
											<input type="password" name="passconf" class="form-control" placeholder="Konfirmasi Password" value="<?php echo set_value('passconf'); ?>" />
										</div>
										<div class="form-group">
											<label>Level Hak Akses</label>
											<select name="akses_level" class="form-control">
												<?php $level = array('Admin', 'User', 'Blocked'); ?>
												<option value="<?php echo $level[0]; ?>"<?php echo set_select('akses_level', $level[0]); ?>>Administrator</option>
												<option value="<?php echo $level[1]; ?>"<?php echo set_select('akses_level', $level[1]); ?>>User Site/Staff</option>
												<option value="<?php echo $level[2]; ?>"<?php echo set_select('akses_level', $level[2]); ?>>Blocked</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group form-group-lg">
											<label>Upload Foto</label>
											<input type="file" name="foto" class="form-control" placeholder="Foto User" value="<?php echo set_value('foto'); ?>" onchange="readURL(this);" accept="image/*" />
										</div>
										<div class="form-group">
											<label>Tampilan Foto</label>
											<img class="img-thumbnail img-responsive" id="uploadgambar" src="<?php echo upload_url('images'); ?>no_image.jpg" alt="Upload Foto" />
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Submit" />
											<input type="reset" name="reset" class="btn btn-warning btn-lg" value="Reset" />
											<a href="<?php echo admin_url('user'); ?>" class="btn btn-default btn-lg">Batal</a>
										</div>
									</div>
								<?php echo form_close(); ?>
							</div>
						</div>
					</div> <!-- /.col -->
				</div> <!-- /.row -->
			</section> <!-- /.content -->
