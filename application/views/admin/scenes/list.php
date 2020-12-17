			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-default">
							<div class="box-header with-border">
								<a href="<?=admin_url('scenes/tambah')?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
							</div>
							<div class="box-body">
								<?=($this->session->flashdata('sukses'))? '<div class="alert alert-success fade in"><button data-dismiss="alert" class="close" type="button">×</button>'.$this->session->flashdata('sukses').'</div>': ''?>
								<?=($this->session->flashdata('gagal'))? '<div class="alert alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>'.$this->session->flashdata('gagal').'</div>': ''?>
								<!-- Advanced Tables -->
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover table-vamiddle" id="dataTables-example">
										<thead>
											<tr>
												<th>No.</th>
												<th>Scene ID</th>
												<th>Title</th>
												<th>Type</th>
												<th>Tindakan</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; foreach ($scenes as $data): ?>
											<tr class="odd gradeX">
												<td class="text-center"><?=$i?></td>
												<td><?=$data->scene_id?></td>
												<td><?=$data->title?></td>
												<td><?=$data->type?></td>
												<td class="text-center">
													<a href="<?=site_url()?>?scene=<?=$data->scene_id?>" target="_blank" class="btn btn-success btn-xs" title="Lihat"><i class="fa fa-eye"></i></a>
													<a href="<?=admin_url('scenes/edit/'.$data->id)?>" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>
													<a href="javascript:;" onclick="hapus_data('scenes', '<?=$data->id?>')" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash-o"></i></a>
												</td>
											</tr>
											<?php $i++; endforeach?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div> <!-- /.col -->
				</div> <!-- /.row -->
			</section> <!-- /.content -->
