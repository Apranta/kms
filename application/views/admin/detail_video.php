<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption font-dark">
					<i class="icon-settings font-dark"></i>
					<span class="caption-subject bold uppercase"> <?= $data->judul_video ?> </span>
					<span class="caption-helper"><?= $this->User_m->get_row(['id_user' => $data->id_user])->nama ?></span>
				</div>
			</div>
			<div class="portlet-body">
				<iframe width="727" height="409" src="https://www.youtube.com/embed/<?= $data->url ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<hr>
				<p>
					<?= $data->deskripsi ?>
				</p>
			</div>
		</div>
	</div>
</div>