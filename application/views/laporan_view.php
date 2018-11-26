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
                            <?= $title ?>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table style="width:100%" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
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
                                </thead>
                                <tfoot>
                                    <tr>
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
                                    <?php foreach ($profil as $pro){ ?>
                                    <tr>
                                        <td><?= $pro->mhs_nim ?></td>
                                        <td><?= $pro->mhs_name ?></td>
                                        <td><?= $pro->mhs_department ?></td>
                                        <td><?= $pro->keg_name ?></td>
                                        <td></td>
                                        <td>
                                            adasdasda
                                        </td>
                                        <td>
                                            <a href="">
                                                <i class="material-icons">insert_drive_file</i>
                                            </a>
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