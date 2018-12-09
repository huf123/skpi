        <script>
            $(document).ready(function() {
                $("li[class='active']").removeAttr("class");
                $("#profil").attr("class","active");
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
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat Tinggal</th>
                                        <th>Telepon</th>
                                        <th>Jurusan</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat Tinggal</th>
                                        <th>Telepon</th>
                                        <th>Jurusan</th>
                                    </tr>
                                </tfoot>
                                <tbody> 
                                    <?php foreach ($profil as $pro){ 
                                        if ($pro->id_jns_kelamin==1) $jns_kelamin = "Laki-laki";
                                        else $jns_kelamin = "Perempuan";?>
                                    <tr>
                                        <td><?= $pro->nim ?></td>
                                        <td><?= $pro->nama ?></td>
                                        <td><?= $jns_kelamin ?></td>
                                        <td><?= $pro->kota_lahir ?></td>
                                        <td><?= $pro->tgl_lahir ?></td>
                                        <td><?= $pro->alamat ?></td>
                                        <td><?= $pro->handphone ?></td>
                                        <td><?= $pro->jurusan ?></td>
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