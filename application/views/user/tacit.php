<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase"> Data Tacit </span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <a href="<?= base_url('user/tambah-tacit') ?>" class="btn sbold green"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-responsive"> 
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Judul Tacit</th>
                                                <th>Masalah</th>
                                                <th>Solusi</th>
                                                <th>User</th>
                                                <th>Validasi</th>
                                                <th>Date</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i = 1;
                                            foreach ($tacit as $t) {
                                        ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><?=$t->judul_tacit?></td>
                                                <td><?=$t->masalah?></td>
                                                <td><?=$t->solusi?></td>
                                                <td><?=$t->nama?></td>
                                                <td><?=$t->validasi?></td>
                                                <td><?=$t->date?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?= base_url('user/detail-tacit/'.$t->id_tacit) ?>" class="btn btn-info"> <i class="fa fa-eye"></i></a>
                                                        <a href="<?= base_url('user/edit-tacit/'.$t->id_tacit) ?>" class="btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                        <a href="<?= base_url('user/delete_tacit/'.$t->id_tacit)?>"class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
    </div>
</div>