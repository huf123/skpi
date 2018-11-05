<section class="content" style='margin-left:260px;'>
        <div class="container-fluid">
            <div class="block-header">
                <h2><?= $title ?></h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Daftar <?= $title ?>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table style="width:100%" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Kegiatan</th>
                                            <th>Keterangan Softskill</th>
                                            <th>Aproval</th>
                                            <th>Dokumen Pendukung</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Kegiatan</th>
                                            <th>Keterangan Softskill</th>
                                            <th>Aproval</th>
                                            <th>Dokumen Pendukung</th>
                                        </tr>
                                    </tfoot>
                                    <tbody> 
                                        <?php foreach ($kegiatan as $keg){ ?>
                                        <tr>
                                            <td><?= $keg->mhs_nim ?></td>
                                            <td><?= $keg->mhs_name ?></td>
                                            <td><?= $keg->keg_name ?></td>
                                            <td><?= $keg->mhs_nim ?></td>
                                            <td><?= $keg->mhs_name ?></td>
                                            <td><?= $keg->keg_name ?></td>
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