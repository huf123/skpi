        <script>
            $(document).ready(function() {
                $("li[class='active']").removeAttr("class");
                $("#laporan").attr("class","active");
            });
        </script>
        <!-- Tables -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header bg-blue">
                        <h2>
                            <?= $title ?> &nbsp;
                            <a href="<?php echo base_url() ?>dashboard/kegiatan_approve" class="btn btn-success waves-effect waves-float" style="font-weight: bold">
                                <i class="material-icons">done</i>
                                <span>APPROVE</span>
                            </a>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table style="width:100%" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th width="1%">
                                            <input type="checkbox" id="check_all" class="filled-in">
                                            <label for="check_all"></label>
                                        </th>
                                        <th width="1%">NIM</th>
                                        <th>Nama mahasiswa</th>
                                        <th>Program studi</th>
                                        <th>Kegiatan</th>
                                        <th>Keterangan softskill</th>
                                        <!-- If role = kemahasiswaan, show Approval column -->
                                    <?php $role = $this->session->userdata('role'); if ($role==3){ ?>
                                        <th width="1%">Approval</th>
                                    <?php } ?>
                                        <th width="1%">Lampiran</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="check_all_bot" class="filled-in">
                                            <label for="check_all_bot"></label>
                                        </th>
                                        <th>NIM</th>
                                        <th>Nama mahasiswa</th>
                                        <th>Program studi</th>
                                        <th>Kegiatan</th>
                                        <th>Keterangan softskill</th>
                                        <!-- If role = kemahasiswaan, show Approval column -->
                                    <?php $role = $this->session->userdata('role'); if ($role==3){ ?>
                                        <th>Approval</th>
                                    <?php } ?>
                                        <th>Lampiran</th>
                                    </tr>
                                </tfoot>
                                <tbody> 
                                    <?php foreach ($laporan as $lapor){ 
                                        $id_transaksi = $lapor->id_transaksi?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="<?php echo 'check_'.$id_transaksi?>" class="filled-in" name="id_transaksi[]" value="<?php echo $id_transaksi?>" <?php if ($lapor->approval==1) echo "checked disabled"?>>
                                            <label for="<?php echo 'check_'.$id_transaksi ?>"></label>
                                        </td>
                                        <td><?= $lapor->nim ?></td>
                                        <td><?= $lapor->nama ?></td>
                                        <td><?= $lapor->jurusan ?></td>
                                        <td><?= $lapor->nama_kg ?></td>
                                        <td></td>
                                        <td>
                                            <center>
                                            <?php if ($lapor->approval==1) {?>                                            
                                                <p style="color:green">Disetujui</p>
                                            <?php }
                                                else { ?>
                                                <button type="button" class="btn btn-success btn-sm waves-effect waves-float"
                                                style="padding: 0 5px">
                                                    <i class="material-icons" style="font-weight:bold">done</i>
                                                </button>
                                            <?php } ?>                                                
                                            </center>
                                        </td>
                                        <td style='text-align:center'><?php $sert = $lapor->sertifikat;
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