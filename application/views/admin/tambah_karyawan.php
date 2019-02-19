<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> Tambah Karyawan </span>
                </div>
            </div>
            <div class="portlet-body">
                <?= form_open('admin/tambah-karyawan'); ?>
                <div class="form-group">
                    <label>Nama Karyawan</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control">
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control">
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telepon" class="form-control">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control">
                        <option value="">- Silahkan Pilih -</option>
                        <option value="manager">Manager</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control">
                </div>
                <div class="form-group">
                    <label>Bagian</label>
                    <select name="bagian" class="form-control">
                        <option value="">- Silahkan Pilih -</option>
                        <option value="HSE">HSE</option>
                        <option value="HR">HR</option>
                        <option value="HUMAS">HUMAS</option>
                        <option value="ICT">ICT</option>
                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>