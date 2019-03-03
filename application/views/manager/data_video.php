<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<i class="icon-settings font-dark"></i>
					<span class="caption-subject bold uppercase"> Tambah Data Video </span>
				</div>
			</div>
			<div class="portlet-body">
				<div class="row">
					<div class="col-md-6">
					<?= form_open('manager/data-video') ?>
						<div class="form-group">
							<label>Judul Video</label>
							<input type="text" name="judul" class="form-control">
						</div>
						<div class="form-group">
							<label>Url Video Streaming</label>
							<input type="text" name="url" class="form-control">
						</div>
						<div class="form-group">
							<label>Tanggal Mulai Video</label>
							<input type="date" name="date" class="form-control">
						</div>
						<div class="form-group">
							<label>Deskripsi Video</label>
							<textarea name="deskripsi" class="form-control" rows="6"></textarea>
						</div>
						<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
					<?= form_close(); ?>
					</div>
					<div class="col-md-6">
						<h4>Video Saya</h4>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Judul Video</th>
									<th>Link Url</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=0; foreach ($video as $v): ?>
								<tr>
									<td><?= ++$i ?></td>
									<td><?= $v->judul_video ?></td>
									<td><?= $v->url ?></td>
									<td><?= $v->id_video ?></td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<i class="icon-settings font-dark"></i>
					<span class="caption-subject bold uppercase"> Data Video </span>
				</div>
			</div>
			<div class="portlet-body">
				<div class="row">
					<?php foreach ($berlangsung as $value): ?>
					<div class="col-md-3">
						<div class="portlet light bordered">
							<div class="portlet-title">
								<div class="caption font-dark">
									<i class="icon-settings font-dark"></i>
									<span class="caption-subject bold uppercase"> <?= $value->judul_video ?> </span>
								</div>
								<div class="actions">
									<a href="<?= base_url('admin/detail-video/' . $value->id_video) ?>" class="btn btn-circle red-sunglo btn-sm">
										<i class="fa fa-eye"></i> Lihat 
									</a>
								</div>
							</div>
							<div class="portlet-body">
								<p>
									<?= $value->deskripsi ?>
								</p>
							</div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</div>

