<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-settings font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase"> Search</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <!-- <a class="btn btn-sm green dropdown-toggle" href="<?= base_url('staff/explicit') ?>" > <i class="fa fa-angle-left"></i> Kembali
                                            </a> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <?= form_open_multipart('staff/search', ['role' => 'form']) ?>
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Search</label>
                                                <input type="text" class="form-control" placeholder="masukan pencarian" name="cari">
                                            </div>
                                            <input type="submit" class="btn blue" name="submit" value="submit">
                                        </div>
                                            
                                    </form>
                                </div>
                            </div>
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase"> Data Tacit </span>
                                    </div>
                                </div>
                                <div class="portlet-body">
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
                                                        <a href="<?= base_url('staff/detail-tacit/'.$t->id_tacit) ?>" class="btn btn-info"> <i class="fa fa-eye"></i></a>
                                                        <a href="<?= base_url('staff/edit-tacit/'.$t->id_tacit) ?>" class="btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                        <a href="<?= base_url('staff/delete_tacit/'.$t->id_tacit)?>"class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase"> Data Explicit </span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-responsive"> 
                                        <thead>
                                        
                                            <tr>
                                                <th>#</th>
                                                <th>Judul Explicit</th>
                                                <th>Keterangan</th>
                                                <th>File</th>
                                                <th>User</th>
                                                <th>Validasi</th>
                                                <th>Date</th>
                                                <th>Aksi</th>
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i = 1;
                                            foreach ($explicit as $e) {
                                        ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><?=$e->judul?></td>
                                                <td><?=$e->keterangan?></td>
                                                <td><a href="<?= base_url('assets/file/explicit/'.$e->id_explicit.".pdf")?>" download class="btn btn-link"><i class="fa fa-download"></i></a></td>
                                                <td><?=$e->nama?></td>
                                                <td><?=$e->validasi?></td>
                                                <td><?=$e->date?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?= base_url('staff/detail-explicit/'.$e->id_explicit) ?>" class="btn btn-info"> <i class="fa fa-eye"></i></a>
                                                        <a href="<?= base_url('staff/edit-explicit/'.$e->id_explicit) ?>" class="btn btn-primary"> <i class="fa fa-edit"></i></a>
                                                        <a href="<?= base_url('staff/delete_explicit/'.$e->id_explicit) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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