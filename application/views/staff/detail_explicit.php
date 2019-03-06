<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<h4><?= $data->judul ?></h4>
			</div>
			<div class="portlet-body">
				<h4>Keterangan</h4><hr>
				<p>
					<?= $data->keterangan ?>
				</p>
			</div>
			<div class="portlet-footer">
				
				<a href="<?= base_url('assets/file/explicit/'.$data->id_explicit.".pdf")?>" download class="btn btn-link"><i class="fa fa-download"></i> Download Files</a>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6 col-xs-12 col-sm-12">
		<div class="portlet light bordered">
			<div class="portlet-title tabbable-line">
				<div class="caption">
					<i class="icon-bubbles font-dark hide"></i>
					<span class="caption-subject font-dark bold uppercase">Comments</span>
				</div>
			</div>
			<div class="portlet-body">
				<?= form_open('staff/komentar') ?>
				<div class="form-group">
					<input type="hidden" name="id_jenis" value="<?= $data->id_explicit ?>">
					<input type="hidden" name="jenis" value="explicit">
					<textarea name="komentar" class="form-control" rows="4"></textarea>
				</div>
				<input type="submit" name="simpan" value="Komentari" class="btn btn-primary">
				<?= form_close(); ?>
				<hr>
				<div class="mt-comments">
					<?php foreach ($komentar as $value): ?>
					<div class="mt-comment">
						<div class="mt-comment-body">
							<div class="mt-comment-info">
								<span class="mt-comment-author"><?= $this->User_m->get_row(['id_user' => $value->id_pegawai])->nama ?></span>
								<span class="mt-comment-date"><?= $this->tanggal->convert_date($value->date) ?></span>
							</div>
							<div class="mt-comment-text">
								<?= $value->komentar ?>
							</div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</div>