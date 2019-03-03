<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-settings font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase"> Detail User</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn btn-sm green dropdown-toggle" href="<?= base_url('admin/data_user') ?>" > <i class="fa fa-angle-left"></i> Kembali
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" value="<?=$data->username?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" value="<?=$data->nama?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" value="<?=$data->alamat?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Tempat lahir</label>
                                                <input type="text" class="form-control" value="<?=$data->tempat_lahir?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal lahir</label>
                                                <input type="date" class="form-control" value="<?=$data->tanggal_lahir?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Telepon</label>
                                                <input type="text" class="form-control" value="<?=$data->telepon?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Role</label>
                                                <input type="text" class="form-control" value="<?=$data->role?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Jabatan</label>
                                                <input type="text" class="form-control" value="<?=$data->jabatan?>" readonly>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
    </div>
</div>