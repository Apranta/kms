<div class="row">
	<div class="col-md-8">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-puzzle font-grey-gallery"></i>
					<span class="caption-subject bold font-grey-gallery uppercase">Tambah Profile Perusahaan </span>
				</div>
				<div class="tools">
					<a href="" class="collapse"> </a>
				</div>
			</div>
			<div class="portlet-body">
				<?= form_open('admin/profile_perusahaan'); ?>
				<div class="form-group">
					<label for="">Nama Profile</label>
					<input type="text" name="nama" class="form-control">
				</div>
				<div class="form-group">
					<label>Isi</label>
					<textarea name="isi" rows="6" class="form-control" id="isi"></textarea>
				</div>
				<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				Data Profile Perusahaan
			</div>
			<div class="portlet-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama</th>
							<th style="width: 45%;">Isi</th>
							<th style="width: 20%;">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; foreach ($data as $profile): ?>
						<tr>
							<td><?= ++$i ?></td>
							<td><?= $profile->nama ?></td>
							<td><p><?= $profile->isi ?></p></td>
							<td>
								<div class="btn-group-sm">
									<!-- <a href="<?= base_url('admin/profile_perusahaan/' . $profile->id_profile ) ?>" class="btn btn-primary">Detail</a> -->
									<a href="<?= base_url('admin/edit-profile/' . $profile->id_profile ) ?>" class="btn btn-success">Edit</a>
									<a href="<?= base_url('admin/profile_perusahaan?aksi=delete&id=' . $profile->id_profile ) ?>" class="btn btn-danger">Hapus</a>
								</div>
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