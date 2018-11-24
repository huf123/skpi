        <!-- Tables -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header bg-blue">
                        <h2>
                            Daftar <?= $title ?>&nbsp;
                            <a href="<?php echo base_url() ?>dashboard/kegiatan/add" class="btn btn-default waves-effect waves-float" style="font-weight: bold;">
                                <i class="material-icons" style="color: #000!important">add</i>
                                <span>TAMBAH</span>
                            </a>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table style="width:100%" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Bidang</th>
                                        <th>Bentuk</th>
                                        <th>Level</th>
                                        <th>Kepesertaan</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan Softskill</th>
                                        <th>Aproval</th>
                                        <th width="10%">Dokumen</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Bidang</th>
                                        <th>Bentuk</th>
                                        <th>Level</th>
                                        <th>Kepesertaan</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan Softskill</th>
                                        <th>Aproval</th>
                                        <th>Dokumen</th>
                                    </tr>
                                </tfoot>
                                <tbody> 
                                    <?php foreach ($kegiatan as $keg){ ?>
                                    <tr>
                                        <td><?= $keg->keg_name ?></td>
                                        <td><?= $keg->keg_bidang ?></td>
                                        <td><?= $keg->keg_bentuk ?></td>
                                        <td><?= $keg->keg_level ?></td>
                                        <td><?= $keg->keg_kepesertaan ?></td>
                                        <td><?= $keg->keg_start.' - '.$keg->keg_finish ?></td>
                                        <td></td>
                                        <td><?= $keg->keg_status ?></td>
                                        <td><?= $keg->keg_file ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- #END# Basic Examples -->
    </div>
</section>