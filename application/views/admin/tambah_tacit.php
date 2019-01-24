    <div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-settings font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase"> Tambah Tacit</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn btn-sm green dropdown-toggle" href="<?= base_url('admin/tacit') ?>" > <i class="fa fa-angle-left"></i> Kembali
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <?= form_open('admin/tambah_tacit', ['role' => 'form']) ?>
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Judul Tacit</label>
                                                <input type="text" class="form-control" placeholder="masukan judul tacit" name="judul">
                                            </div>
                                            <div class="form-group">
                                                <label>Masalah</label>
                                                <textarea name="masalah" class="form-control" rows="5"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Solusi</label>
                                                <textarea name="solusi" class="form-control" rows="5"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>User</label>
                                                <select name="user" class="form-control">
                                                    <?php 
                                                    foreach ($user as $u) {
                                                        echo "<option value='$u->id_user'>$u->nama</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Verifikasi</label>
                                                <select name="verif" class="form-control">
                                                    <option value="menunggu">Menunggu</option>
                                                    <option value="validasi">Validasi</option>
                                                    <option value="ditolak">ditolak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn blue">Submit</button>
                                            <button type="button" class="btn default">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
    </div>
</div>