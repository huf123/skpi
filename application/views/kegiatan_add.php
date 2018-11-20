            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                <?= $title ?>
                            </h2>
                        </div>  
                        <div class="body">
                            <?= form_open_multipart(base_url('dashboad/update_user')); ?>
                                <div class="form-group">
                                    <h2 class="card-inside-title">Nama Kegiatan</h2>
                                    <div class="form-line">
                                        <input type="text" name ="fullname" class="form-control" placeholder="Enter your question" value="<?= $user_where->fullname ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h2 class="card-inside-title">Jenis Kegiatan</h2>
                                    <div class="form-line">
                                        <input type="text" name ="uname" class="form-control" placeholder="Enter your question" value="<?= $user_where->uname ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h2 class="card-inside-title">Deskripsi Kegiatan</h2>
                                    <div class="form-line">
                                        <input type="password" name ="upwd" class="form-control" placeholder="Enter your question" value="<?= $user_where->upwd ?>">
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <h2 class="card-inside-title">Kepesertaan</h2>
                                    <div id="preview">
                                        <img src="<?= base_url('assets/images/user'.$user_where->pic) ?>"><br/>
                                        <a href="#" id="removePreview">Remove</a>
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <div class="demo-radio-button">
                                        <h2 class="card-inside-title">Bidang</h2>
                                        <input name="role" type="radio" class="radio-col-blue with-gap" id="radio_1" value="1" <?php if($user_where->role==1) echo "checked" ?>>
                                        <label for="radio_1">Administrator</label>
                                        <input name="role" type="radio" id="radio_2" class="radio-col-blue with-gap" value="2" <?php if($user_where->role==2) echo "checked" ?>>
                                        <label for="radio_2">Moderator</label>
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <div class="demo-radio-button">
                                        <h2 class="card-inside-title">Bentuk</h2>
                                        <input name="role" type="radio" class="radio-col-blue with-gap" id="radio_1" value="1" <?php if($user_where->role==1) echo "checked" ?>>
                                        <label for="radio_1">Administrator</label>
                                        <input name="role" type="radio" id="radio_2" class="radio-col-blue with-gap" value="2" <?php if($user_where->role==2) echo "checked" ?>>
                                        <label for="radio_2">Moderator</label>
                                    </div>
                                </div>
                                <div class="form-group">                                    
                                    <div class="demo-radio-button">
                                        <h2 class="card-inside-title">Bidang</h2>
                                        <input name="role" type="radio" class="radio-col-blue with-gap" id="radio_1" value="1" <?php if($user_where->role==1) echo "checked" ?>>
                                        <label for="radio_1">Administrator</label>
                                        <input name="role" type="radio" id="radio_2" class="radio-col-blue with-gap" value="2" <?php if($user_where->role==2) echo "checked" ?>>
                                        <label for="radio_2">Moderator</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="file" name ="keg_file" class="form-control">
                                </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">TAMBAH</button>
                        </div>  
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>