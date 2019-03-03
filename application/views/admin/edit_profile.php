<div class="row">
	<div class="col-md-8">
		<div class="portlet light bordered">
			<div class="popover-title">
				Edit Data Profile Perusahaan
			</div>
			<div class="portlet-body">
				<?= form_open('admin/edit_profile/' . $data->id_profile); ?>
				<input type="hidden" name="id" value="<?= $data->id_profile ?>">
				<div class="form-group">
					<label for="">Nama Profile</label>
					<input type="text" name="nama" class="form-control" value="<?= $data->nama ?>">
				</div>
				<div class="form-group">
					<label>Isi</label>
					<textarea name="isi" rows="6" class="form-control" id="isi"><?= $data->isi ?></textarea>
				</div>
				<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>
<script>
        CKEDITOR.replace( 'isi' );
</script>