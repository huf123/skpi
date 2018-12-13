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
                            <a href="<?php echo base_url() ?>dashboard/kegiatan/add" class="btn btn-default waves-effect waves-float" style="font-weight: bold;">
                                <i class="material-icons" style="color: #000!important">add</i>
                                <span>TAMBAH KEGIATAN</span>
                            </a>
                            <a href="<?php echo base_url() ?>dashboard/kegiatan/add" class="btn btn-success waves-effect waves-float" style="font-weight: bold;float: right">
                                <i class="material-icons">lock</i>
                                <span>KUNCI KEGIATAN & GENERATE TRANSKRIP</span>
                            </a>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table style="width:100%;" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th width="30%">Nama</th>
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
                                        <td>
                                          <?= $keg->nama_kg."<br>";
                                            echo anchor(base_url("dashboard/kegiatan_edit/".$keg->id_transaksi), 'Edit');
                                            echo ' | ';
                                            echo anchor(base_url("dashboard/kegiatan_delete/".$keg->id_transaksi), 'Delete'); ?>
                                        </td>
                                        <td><?= $keg->info ?></td>
                                        <td><?= $keg->bentuk ?></td>
                                        <td><?= $keg->tingkatan ?></td>
                                        <td><?= $keg->peranan ?></td>
                                        <td>
                                          <?php if (strtotime($keg->tgl_mulai) != 0) {
                                              echo date_format(date_create($keg->tgl_mulai),"j F Y");
                                          } if (strtotime($keg->tgl_selesai) != 0) {
                                              echo ' - '.date_format(date_create($keg->tgl_selesai),"j F Y");
                                          } ?>
                                        </td>
                                        <td></td>
                                        <td><?php if ($keg->approval==1) {$approval = "Disetujui";$color = "green";} else {$approval = "Tidak disetujui";$color = "red";}?>
                                            <p style="color:<?php echo $color ?>">
                                              <?php echo $approval ?>
                                            </p>
                                        </td>
                                        <td style='text-align:center'><?php $sert = $keg->sertifikat;
                                          if (!empty($sert)) echo anchor(base_url("dashboard/assets/files/".$sert),"<i class='material-icons'>insert_drive_file
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