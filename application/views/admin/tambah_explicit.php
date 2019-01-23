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
                                    <?= form_open_multipart('admin/tambah_explicit', ['role' => 'form']) ?>
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Judul Explicit</label>
                                                <input type="text" class="form-control" placeholder="masukan judul tacit" name="judul">
                                            </div>
                                            <div class="form-group">
                                                <label>File Pendukung</label>
                                                <input type="file" class="form-control" name="file">
                                            </div>
                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <textarea name="masalah" class="form-control" rows="5"></textarea>
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