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
                                <form action="<?=site_url("admin/edit_user/".$data->id_user)?>" method='post'>
                                <div class="portlet-body form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control"  value="<?=$data->username?>" name='username'>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" value="<?=$data->nama?>" name='nama'>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" value="<?=$data->alamat?>" name='alamat'>
                                            </div>
                                            <div class="form-group">
                                                <label>Tempat lahir</label>
                                                <input type="text" class="form-control" value="<?=$data->tempat_lahir?>" name='tempat_lahir'>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal lahir</label>
                                                <input type="date" class="form-control" value="<?=$data->tanggal_lahir?>" name='tanggal_lahir'>
                                            </div>
                                            <div class="form-group">
                                                <label>Telepon</label>
                                                <input type="text" class="form-control" value="<?=$data->telepon?>" name='telepon'>
                                            </div>
                                            <div class="form-group">
                                                <label>Role</label>
                                                <select name="role" class='form-control'>
                                                    <option value="manager" <?php if($data->role == 'manager') echo "selected=selected" ?>>manager</option>
                                                    <option value="staff" <?php if($data->role == 'staff') echo "selected=selected" ?>>staff</option>
                                                    <option value="admin" <?php if($data->role == 'admin') echo "selected=selected" ?>>admin</option>
                                                </select>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label>Jabatan</label>
                                                <input type="text" class="form-control" value="<?=$data->jabatan?>" name='jabatan'>
                                            </div>
                                            <div class="form-group">
                                                <label>Ganti Password?</label>
                                                <input type="password" class="form-control" placeholder="password baru" name='password_baru'>
                                                <input type="password" class="form-control" placeholder="konfirmasi password baru" name='konfirm_baru'>
                                                <input type="hidden" name='password' value='<?=$data->password?>'>
                                            </div>
                                            <div class='form-group'>
                                                <input type="submit" name='submit' value='edit' class='btn btn-success'>
                                                <input type="reset" value='cancel' class='btn btn-danger'>
                                            </div>
                                        </div>
                                        </div>
                                    
                                </div>
                                </form>
                            </div>
    </div>
</div>