			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-default">
							<div class="box-header with-border">
								<a href="<?php echo admin_url('user/tambah'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
								<div class="pull-right">
									<form method="GET" class="form-inline">
										<div class="input-group">
											<input class="form-control" name="q" value="<?php echo $this->input->get('q', TRUE) ? $this->input->get('q', TRUE) : ''; ?>" placeholder="Cari User..." />
											<span class="input-group-btn">
												<button type="submit" class="btn btn-success">
													<i class="fa fa-search"></i>
												</button>
											</span>
										</div>
									</form>
								</div>
							</div>
							<div class="box-body">
								<?php echo ($this->session->flashdata('sukses'))? '<div class="alert alert-success fade in"><button data-dismiss="alert" class="close" type="button">×</button>'.$this->session->flashdata('sukses').'</div>': ''; ?>
								<?php echo ($this->session->flashdata('gagal'))? '<div class="alert alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>'.$this->session->flashdata('gagal').'</div>': ''; ?>
								<!-- Advanced Tables -->
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover table-vamiddle" id="dataTables-example">
										<thead>
											<tr>
												<th>No.</th>
												<th>Nama/Site</th>
												<th>Username</th>
												<th>E-mail</th>
												<th>Level</th>
												<th>Tindakan</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = $offset + 1; foreach ($user as $data): ?>
											<tr class="odd gradeX">
												<td class="text-center"><?php echo $i; ?></td>
												<td>
													<?php echo $data->nama; ?><br/>
													<small>Site: <?php echo $data->nama_site; ?></small>
												</td>
												<td><?php echo $data->username; ?></td>
												<td><?php echo $data->email; ?></td>
												<td><?php echo $data->akses_level; ?></td>
												<td>
													<a href="<?php echo admin_url('user/edit/'.$data->id_user); ?>" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
													<a href="javascript:;" onclick="hapus_data('user', '<?php echo $data->id_user; ?>')" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash-o"></i></a>
												</td>
											</tr>
											<?php $i++; endforeach; ?>
										</tbody>
									</table>
									<?php echo (isset($pagination))? $pagination : ''; ?>
								</div>
							</div>
						</div>
					</div> <!-- /.col -->
				</div> <!-- /.row -->
			</section> <!-- /.content -->
