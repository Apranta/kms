<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> Laporan Manager </span>
                </div>
			</div>
			<div class="portlet-body">
				<?= form_open_multipart('admin/laporan'); ?>
				<div class="form-group">
					<label>Manager</label>
					<select name="pegawai" class="form-control">
						<?php foreach ($this->User_m->get(['role' => 'manager']) as $value) :?>
						<option value="<?= $value->id_user ?>"><?= $value->nama ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label>Files</label>
					<input type="file" name="file" class="form-control">
				</div>
				<div class="form-group">
					<label>Keterangan Laporan</label>
					<textarea name="deskripsi" class="form-control" rows="4" id="isi"></textarea>
				</div>
				<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
				<?= form_close(); ?>
				<hr>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Pegawai</th>
							<th>Files</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; foreach ($data as $value): ?>
						<tr>
							<td><?= ++$i  ?></td>
							<td><?= $this->User_m->get_row(['id_user' => $value->id_pegawai])->nama ?></td>
                            <td><a href="<?= base_url('assets/file/laporan/'.$value->id_laporan.".pdf")?>" download class="btn btn-link"><i class="fa fa-download"></i></a></td>
							<td>
								<a href="<?= base_url('admin/laporan?aksi=delete&id=' . $value->id_laporan) ?>" class="btn btn-danger">Hapus</a>
							</td>
						</tr>
							
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<script>
CKEDITOR.replace( 'isi' );
</script>