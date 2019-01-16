<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase"> Data Explicit </span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <a href="<?= base_url('admin/tambah-explicit') ?>" class="btn sbold green"> Add New
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
                                                <th>Judul Explicit</th>
                                                <th>Keterangan</th>
                                                <th>File</th>
                                                <th>User</th>
                                                <th>Validasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>data</td>
                                                <td>data</td>
                                                <td><a href="<?= base_url('assets/file/explicit/')?>" download class="btn btn-link"><i class="fa fa-download"></i></a></td>
                                                <td>data</td>
                                                <td>data</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?= base_url('admin/detail-explicit/') ?>" class="btn btn-info"> <i class="fa fa-eye"></i></a>
                                                        <a href="<?= base_url('admin/edit-explicit/') ?>" class="btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
    </div>
</div>