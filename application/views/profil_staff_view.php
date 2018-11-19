<section class="content" style="margin-left:190px">
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
                            <?= $title ?>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table style="width:100%" class="table table-bordered table-striped table-hover js-basic-example dataTable js-exportable">
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
                                    <?php foreach ($profil as $pro){ ?>
                                    <tr>
                                        <td><?= $pro->mhs_nim ?></td>
                                        <td><?= $pro->mhs_name ?></td>
                                        <td><?= $pro->mhs_birthplace ?></td>
                                        <td><?= $pro->mhs_birthdate ?></td>
                                        <td><?= $pro->mhs_address ?></td>
                                        <td><?= $pro->mhs_phone ?></td>
                                        <td><?= $pro->mhs_department ?></td>
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