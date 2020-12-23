			<!-- Main content -->
			<section class="content">
			    <div class="row">
			        <div class="col-md-12">
			            <div class="box box-default">
			                <div class="box-body">
			                    <?= form_open_multipart(admin_url('scenes/edit/' . $scene->id)) ?>
			                    <div class="col-md-6">
			                        <div class="form-group">
			                            <label>Scene ID</label> <span>(Tidak boleh ada spasi)</span>
			                            <input type="text" name="scene_id" class="form-control" placeholder="Scene ID" value="<?= set_value('scene_id', $scene->scene_id) ?>" required />
			                            <?= form_error('scene_id') ?>
			                        </div>
			                        <div class="form-group">
			                            <label>Title</label>
			                            <input type="text" name="title" class="form-control" placeholder="Title" value="<?= set_value('title', $scene->title) ?>" required />
			                            <?= form_error('title') ?>
			                        </div>
			                        <div class="form-group">
			                            <label>hFov</label> <span>(Angka desimal menggunakan titik. <b>Min = 1</b>, <b>max = 170</b>)</span>
			                            <input type="text" name="hfov" class="form-control" placeholder="hFov" value="<?= set_value('hfov', $scene->hfov) ?>" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 45 || event.charCode == 46" required />
			                            <?= form_error('hfov') ?>
			                        </div>
			                        <div class="form-group">
			                            <label>Pitch</label> <span>(Angka desimal menggunakan titik. <b>Min = -360</b>, <b>max = 360</b>)</span>
			                            <input type="text" name="pitch" class="form-control" placeholder="Pitch" value="<?= set_value('pitch', $scene->pitch) ?>" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 45 || event.charCode == 46" required />
			                            <?= form_error('pitch') ?>
			                        </div>
			                        <div class="form-group">
			                            <label>Yaw</label> <span>(Angka desimal menggunakan titik. <b>Min = -360</b>, <b>max = 360</b>)</span>
			                            <input type="text" name="yaw" class="form-control" placeholder="Yaw" value="<?= set_value('yaw', $scene->yaw) ?>" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 45 || event.charCode == 46" required />
			                            <?= form_error('yaw') ?>
			                        </div>
			                        <div class="form-group">
			                            <label>Type</label>
			                            <select name="type" class="form-control">
			                                <?php $type = array('equirectangular', 'scene', 'none') ?>
			                                <option value="<?= $type[0] ?>" <?= set_select('type', $type[0], $type[0] === $scene->type) ?>><?= $type[0] ?></option>
			                                <option value="<?= $type[1] ?>" <?= set_select('type', $type[1], $type[1] === $scene->type) ?>><?= $type[1] ?></option>
			                                <option value="<?= $type[2] ?>" <?= set_select('type', $type[2], $type[2] === $scene->type) ?>><?= $type[2] ?></option>
			                            </select>
			                            <?= form_error('type') ?>
			                        </div>
			                    </div>
			                    <div class="col-md-6">
			                        <div class="form-group">
			                            <label>Urutan</label>
			                            <select name="urutan" class="form-control">
			                                <?php for ($i = 1; $i <= $max; $i++) { ?>
			                                    <option value="<?= $i ?>" <?= set_select('urutan', $i, $i == $scene->urutan) ?>><?= $i ?></option>
			                                <?php } ?>
			                            </select>
			                            <?= form_error('urutan') ?>
			                        </div>
			                        <div class="form-group">
			                            <label>Upload Gambar</label> <span>(Foto panorama 360)</span>
			                            <input type="file" name="panorama" class="form-control" placeholder="Panorama" value="<?= set_value('panorama') ?>" onchange="readURL(this);" accept="image/jpg" />
			                            <?= (isset($error_upload) ? $error_upload : '') ?>
			                        </div>
			                        <div class="form-group">
			                            <label>Tampilan Gambar</label>
			                            <img class="img-thumbnail img-responsive" id="uploadgambar" src="<?= base_url('templates/assets/img/' . $scene->panorama) ?>" alt="Upload Gambar" />
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                        <div class="form-group">
			                            <input type="submit" name="submit" class="btn btn-success" value="Submit" />
			                            <a href="<?= admin_url('scenes') ?>" class="btn btn-default">Batal</a>
			                        </div>
			                    </div>
			                    <?= form_close() ?>
			                </div>
			            </div>
			        </div> <!-- /.col -->
			    </div> <!-- /.row -->
			</section> <!-- /.content -->