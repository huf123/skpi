<section class="content" style='margin-left:190px;'>
    <div class="container-fluid">
        <div class="block-header">
            <h2>                
                <ol class="breadcrumb breadcrumb-col-blue" style="padding-left: 0">
                    <li><a href="javascript:void(0);"><i class="material-icons">dashboard</i> Dashboard</a></li>
                    <li class="active"><i class="material-icons"><?php echo $icon ?></i> <?php echo $bread ?></li>
                </ol>
            </h2>
        </div>
        <!-- Tables -->
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
                            <table style="width:100%" class="table table-bordered table-striped table-hover js-basic-example dataTable js-exportable">
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