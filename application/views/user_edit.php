        <script>
            $(document).ready(function() {
                $("li[class='active']").removeAttr("class");
                $("#user").attr("class","active");
            });
        </script>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                Edit <?= $title ?>
                            </h2>
                        </div>  
                        <div class="body">
                            <?= form_open_multipart(base_url('dashboad/update_user')); ?>
                                <div class="form-group">
                                    <h2 class="card-inside-title">Nama Lengkap</h2>
                                    <div class="form-line">
                                        <input type="text" name ="fullname" class="form-control" placeholder="Enter your question" value="<?= $user_where->fullname ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h2 class="card-inside-title">Username</h2>
                                    <div class="form-line">
                                        <input type="text" name ="uname" class="form-control" placeholder="Enter your question" value="<?= $user_where->uname ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h2 class="card-inside-title">Password</h2>
                                    <div class="form-line">
                                        <input type="password" name ="upwd" class="form-control" placeholder="Enter your question" value="<?= $user_where->upwd ?>">
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <h2 class="card-inside-title">Picture</h2>
                                    <div id="preview">
                                        <img src="<?= base_url('assets/images/user'.$user_where->pic) ?>"><br/>
                                        <a href="#" id="removePreview">Remove</a>
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <div class="demo-radio-button">
                                        <h2 class="card-inside-title">Role</h2>
                                        <input name="role" type="radio" class="radio-col-blue with-gap" id="radio_1" value="1" <?php if($user_where->role==1) echo "checked" ?>>
                                        <label for="radio_1">Administrator</label>
                                        <input name="role" type="radio" id="radio_2" class="radio-col-blue with-gap" value="2" <?php if($user_where->role==2) echo "checked" ?>>
                                        <label for="radio_2">Moderator</label>
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
                                            <th>Picture</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Picture</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($user as $u){ ?>
                                        <tr>
                                            <td><?= $u->uname."<br>";
                                            echo anchor(base_url("dashboard/edit_user/".$u->uid), 'Edit');
                                            echo ' | ';
                                            echo anchor(base_url("dashboard/del_user/".$u->uid), 'Delete'); ?></td>
                                            <td><?= $u->fullname ?></td>
                                            <td><?php if($u->role==1) echo "Administrator"; elseif($u->role==2) echo "Moderator" ?></td>
                                            <td><img src="<?= base_url('assets/images/user/'.$u->pic) ?>"></td>      
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