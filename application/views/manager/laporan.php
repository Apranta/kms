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
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Pegawai</th>
							<th>Files</th>
							<th>Deskripsi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; foreach ($data as $value): ?>
						<tr>
							<td><?= ++$i  ?></td>
							<td><?= $this->User_m->get_row(['id_user' => $value->id_pegawai])->nama ?></td>
                            <td style="width: 15% !important;"> <a href="<?= base_url('assets/file/laporan/'.$value->id_laporan.".pdf")?>" download class="btn btn-link"><i class="fa fa-download"></i> Download File</a> </td>
                            <td style="width: 50% !important;"> <?= $value->deskripsi ?></td>
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