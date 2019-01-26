<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-settings font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase"> Tambah Explicit</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn btn-sm green dropdown-toggle" href="<?= base_url('admin/explicit') ?>" > <i class="fa fa-angle-left"></i> Kembali
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <?= form_open_multipart('admin/edit_explicit/'.$e->id_explicit, ['role' => 'form']) ?>
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Judul Explicit</label>
                                                <input type="text" class="form-control" value="<?=$e->judul?>" placeholder="masukan judul tacit" name="judul">
                                            </div>
                                            <div class="form-group">
                                                <label>File Pendukung</label>
                                                <input type="file" class="form-control" name="file">
                                            </div>
                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <textarea name="masalah" class="form-control" rows="5"><?=$e->keterangan?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>User</label>
                                                <select name="user" class="form-control">
                                                <?php 
                                                    foreach ($user as $u) {
                                                    ?>
                                                        <option value='<?=$u->id_user?>' <?php if($e->id_user == $u->id_user) echo "selected=selected" ?>><?=$u->nama?></option>";
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Validasi</label>
                                                <select name="validasi" class="form-control">
                                                    <option value="menunggu"<?php if($e->validasi == "menunggu") echo "selected=selected"?>>Menunggu</option>
                                                    <option value="validasi" <?php if($e->validasi == "validasi") echo "selected=selected"?>>Validasi</option>
                                                    <option value="ditolak" <?php if($e->validasi == "ditolak") echo "selected=selected"?>>ditolak</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input type="date" class="form-control"  name="date" value="<?=$e->date?>">
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <input type="submit" class="btn blue" name="submit" value="submit">
                                            <button type="button" class="btn default">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
    </div>
</div>