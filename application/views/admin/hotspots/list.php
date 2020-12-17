			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-default">
							<div class="box-header with-border">
								<a href="<?=admin_url('hotspots/tambah')?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
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
												<th>Main Scene</th>
												<th>Scene ID</th>
												<th>Text</th>
												<th>Tindakan</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; foreach ($hotspots as $data): ?>
											<tr class="odd gradeX">
												<td class="text-center"><?=$i?></td>
												<td><?=$data->main_scene?></td>
												<td><?=$data->scene_id?></td>
												<td><?=$data->text?></td>
												<td class="text-center">
													<a href="<?=site_url()?>?scene=<?=$data->scene_id?>" target="_blank" class="btn btn-success btn-xs" title="Lihat"><i class="fa fa-eye"></i></a>
													<a href="<?=admin_url('hotspots/edit/'.$data->id)?>" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
													<a href="javascript:;" onclick="hapus_data('hotspots', '<?=$data->id?>')" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash-o"></i></a>
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
