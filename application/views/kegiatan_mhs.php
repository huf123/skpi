        <script>
            $(document).ready(function() {
                $("li[class='active']").removeAttr("class");
                $("#kegiatan").attr("class","active");
            });
        </script>
        <!-- Tables -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header bg-blue">
                        <h2>
                            Daftar <?= $title ?>&nbsp;
                            <?php if ($locked == 0): ?>                            
                            <a href="<?php echo base_url() ?>dashboard/kegiatan/add" class="btn btn-default waves-effect waves-float" style="font-weight: bold;">
                                <i class="material-icons" style="color: #000!important">add</i>
                                <span>TAMBAH KEGIATAN</span>
                            </a>
                            <a href="<?php echo base_url() ?>dashboard/kegiatan_lock" class="btn btn-success waves-effect waves-float" style="font-weight: bold;float: right">
                                <i class="material-icons">lock</i>
                                <span>KUNCI KEGIATAN</span>
                            </a>
                            <?php else: ?>
                                <span style="float:right">
                                    Kegiatan Sudah Dikunci. Silahkan cetak/PDF transkrip di menu <a style="color: white; font-weight: bold" href="<?= base_url()?>dashboard/transkrip">Transkrip</a>
                                </span>
                            <?php endif ?>
                        </h2>
                    </div>
                    <div class="header bg-cyan softcase">
                        <div class="row clearfix">
                            <div class="softbig">
                                <i class="fas fa-users fa-3x" title="Bekerja dalam tim"></i>
                                <h4><?= round($softskill->softskill1,2) ?></h4>
                            </div>
                            <div class="softbig">
                                <i class="fas fa-comments fa-3x" title="Komunikasi efektif"></i>
                                <h4><?= round($softskill->softskill2,2) ?></h4>
                            </div>
                            <div class="softbig">
                                <i class="fas fa-user-clock fa-3x" title="Manajemen diri dan waktu"></i>
                                <h4><?= round($softskill->softskill3,2) ?></h4>
                            </div>
                            <div class="softbig">
                                <i class="fas fa-3x fa-brain fa-3x" title="Berpikir kritis dan analitis"></i><br>
                                <h4><?= round($softskill->softskill4,2) ?></h4>
                            </div>
                            <div class="softbig">
                                <i class="fas fa-user-shield fa-3x" title="Tangguh"></i>
                                <br>
                                <h4><?= round($softskill->softskill5,2) ?></h4>
                            </div>
                            <div class="softbig">
                                <i class="fas fa-sync-alt fa-3x" title="Fleksibel"></i>
                                <br>
                                <h4><?= round($softskill->softskill6,2) ?></h4>
                            </div>
                            <div class="softbig">
                                <i class="fas fa-user-check fa-3x" title="Integritas"></i>
                                <br>
                                <h4><?= round($softskill->softskill7,2) ?></h4>
                            </div>
                            <div class="softbig">
                                <i class="fas fa-paint-brush fa-3x" title="Kreatif"></i>
                                <br>
                                <h4><?= round($softskill->softskill8,2) ?></h4>
                            </div>
                            <div class="softbig">
                                <i class="fas fa-user-tie fa-3x" title="Mandiri"></i>
                                <br>
                                <h4><?= round($softskill->softskill9,2) ?></h4>
                            </div>
                            <div class="softbig">
                                <i class="fas fa-thumbs-up fa-3x" title="Dapat Diandalkan"></i>
                                <br>
                                <h4><?= round($softskill->softskill10,2) ?></h4>
                            </div>
                            <div class="softbig">
                                <i class="fas fa-chart-line fa-3x" title="Produktif"></i>
                                <br>
                                <h4><?= round($softskill->softskill11,2) ?></h4>
                            </div>
                            <div class="softbig">
                                <i class="fas fa-fist-raised fa-3x" title="Motivasi"></i>
                                <br>
                                <h4><?= round($softskill->softskill12,2) ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table style="width:100%;" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th width="40%">Nama</th>
                                        <th>Bidang</th>
                                        <th>Bentuk</th>
                                        <th>Level</th>
                                        <th>Kepesertaan</th>
                                        <th width="12%">Tanggal</th>
                                        <th width="40%">Keterangan Softskill</th>
                                        <th>Aproval</th>
                                        <th width="1%">Dokumen</th>
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
                                    <tr <?php if ($keg->locked == 1) echo 'style="background-color:#DCDCDC"'; ?>>
                                        <td>
                                          <?= $keg->nama_kg.'<br>('.$keg->nama_kg_eng.')<br>';if ($keg->locked == 0){
                                            echo anchor(base_url("dashboard/kegiatan_edit/".$keg->id_transaksi), 'Edit','style="color:green"');
                                            echo ' | ';
                                            echo anchor(base_url("dashboard/kegiatan_delete/".$keg->id_transaksi), 'Delete','style="color:red"');}?>
                                        </td>
                                        <td><?= $keg->info ?></td>
                                        <td><?= $keg->bentuk ?></td>
                                        <td><?= $keg->tingkatan ?></td>
                                        <td><?= $keg->peranan ?></td>
                                        <td style="text-align: center">
                                          <?php if (strtotime($keg->tgl_mulai) != 0) {
                                              echo date_format(date_create($keg->tgl_mulai),"j F Y");
                                          } if (strtotime($keg->tgl_selesai) != 0) {
                                              echo '<br>s/d<br>'.date_format(date_create($keg->tgl_selesai),"j F Y");
                                          } ?>
                                        </td>
                                        <td style="text-align: center">
                                            <ul class="soft col-lg-4">
                                                <li>
                                                    <i class="fas fa-2x fa-users" title="Bekerja dalam tim"></i>
                                                    <span>
                                                        <?= round($keg->softskill1,2) ?>
                                                    </span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-2x fa-comments" title="Komunikasi efektif"></i>
                                                    <span>
                                                        <?= round($keg->softskill2,2) ?>
                                                    </span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-2x fa-user-clock" title="Manajemen diri dan waktu"></i>
                                                    <span style="vertical-align: text-bottom">
                                                        <?= round($keg->softskill3,2) ?>
                                                    </span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-2x fa-user-shield" title="Tangguh"></i>
                                                    <span>
                                                        <?= round($keg->softskill4,2) ?>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="soft col-lg-4">
                                                <li>
                                                    <i class="fas fa-2x fa-brain" title="Berpikir kritis dan analitis"></i>
                                                    <span>
                                                        <?= round($keg->softskill5,2) ?>
                                                    </span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-2x fa-sync-alt" title="Fleksibel"></i>
                                                    <span>
                                                        <?= round($keg->softskill6,2) ?>
                                                    </span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-2x fa-user-check" title="Integritas"></i>
                                                    <span>
                                                        <?= round($keg->softskill7,2) ?>
                                                    </span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-2x fa-paint-brush" title="Kreatif"></i>
                                                    <span>
                                                        <?= round($keg->softskill8,2) ?>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="soft col-lg-4">
                                                <li>
                                                    <i class="fas fa-2x fa-user-tie" title="Mandiri"></i>
                                                    <span>
                                                        <?= round($keg->softskill9,2) ?>
                                                    </span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-2x fa-thumbs-up" title="Dapat Diandalkan"></i>
                                                    <span>
                                                        <?= round($keg->softskill10,2) ?>
                                                    </span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-2x fa-chart-line" title="Produktif"></i>
                                                    <span>
                                                        <?= round($keg->softskill11,2) ?>
                                                    </span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-2x fa-fist-raised" title="Motivasi"></i>
                                                    <span>
                                                        <?= round($keg->softskill12,2) ?>
                                                    </span>
                                                </li>
                                            </ul>
                                        </td>
                                        <td><?php if ($keg->approval==1) {$approval = "Disetujui";$color = "green";} else {$approval = "Tidak disetujui";$color = "red";}?>
                                            <p style="color:<?php echo $color ?>">
                                              <?php echo $approval ?>
                                            </p>
                                        </td>
                                        <td style='text-align:center'><?php $sert = $keg->sertifikat;
                                          if (!empty($sert)) echo anchor(base_url("assets/files/".$sert),"<i class='material-icons'>insert_drive_file
                                          </i>");?>
                                        </td>
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