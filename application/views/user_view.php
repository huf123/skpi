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
        <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>Tambah <?= $title ?></h2>
                        </div>  
                        <div class="body">
                        <?= form_open(base_url('dashboard/user_save')) ?>
                            <div class="form-group">
                                <h2 class="card-inside-title">Nama Lengkap</h2>
                                <div class="form-line">
                                    <input type="text" name ="fullname" class="form-control" placeholder="Masukkan nama lengkap Anda">
                                </div>
                            </div>
                            <div class="form-group">
                                <h2 class="card-inside-title">Username</h2>
                                <div class="form-line">
                                    <input type="text" name ="uname" class="form-control" placeholder="Masukkan username/nickname yang diinginkan">
                                </div>
                            </div>
                            <div class="form-group">
                                <h2 class="card-inside-title">Password</h2>
                                <div class="form-line">
                                    <input type="password" name ="upwd" class="form-control" placeholder="Masukkan password yang diinginkan">
                                </div>
                            </div>
                            <div class="form-group">                                    
                                <div class="demo-radio-button">
                                    <h2 class="card-inside-title">Role</h2>
                                    <input name="role" type="radio" class="radio-col-blue with-gap" id="radio_1" value="1">
                                    <label for="radio_1">Administrator</label>
                                    <input name="role" type="radio" id="radio_2" class="radio-col-blue with-gap" value="2">
                                    <label for="radio_2">Pembantu Dekan III</label>
                                    <input name="role" type="radio" id="radio_3" class="radio-col-blue with-gap" value="3">
                                    <label for="radio_3">Kemahasiswaan</label>
                                    <input name="role" type="radio" id="radio_4" class="radio-col-blue with-gap" value="4">
                                    <label for="radio_4">Mahasiswa</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">TAMBAH</button>
                        </div>  
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                List <?= $title ?>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table style="width:100%" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($user as $u){ ?>
                                        <tr>
                                            <td><?= $u->uname."<br>";
                                            echo anchor(base_url("dashboard/user_edit/".$u->uid), 'Edit');
                                            echo ' | ';
                                            echo anchor(base_url("dashboard/user_delete/".$u->uid), 'Delete'); ?></td>
                                            <td><?= $u->fullname ?></td>
                                            <td><?php if($u->role==1) echo "Administrator"; elseif($u->role==2) echo "Pembantu Dekan III"; 
                                             elseif($u->role==3) echo "Kemahasiswaan";  elseif($u->role==4) echo "Mahasiswa"; ?></td>
                                             <td>
                                                <span class="label label-success">Ditambahkan</span>
                                                <?= ' oleh '.$u->mod_uid.'</br>'.$u->mod_date ?>
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