<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> Data User </span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a href="<?= base_url('admin/tambah-karyawan') ?>" class="btn sbold green"> Add New
                                <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_2">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th> Nama </th>
                            <th> Jabatan </th>
                            <th> Bidang </th>
                            <th> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($data as $value): ?>
                        <tr class="odd gradeX">
                            <td>
                                <?= ++$i ?>
                            </td>
                            <td> <?= $value->nama ?> </td>
                            <td> <?= $value->jabatan ?>
                            </td>
                            <td>
                                 <?= $value->role ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?= base_url('admin/detail_user/'.$value->id_user) ?>" class="btn btn-success">Detail</a>
                                    <a href="<?= base_url('admin/edit_user/'.$value->id_user) ?>" class="btn btn-primary">Edit</a>
                                    <a href="<?= base_url('admin/data_user?action=delete&id=' . $value->id_user) ?>" class="btn btn-danger">Hapus</a>
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