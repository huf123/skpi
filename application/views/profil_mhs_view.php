            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                <?= $title ?>
                            </h2>
                        </div>
                        <div class="body">
                            <?php echo form_open(base_url($url)); ?>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="mhs_name">Nama</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name ="mhs_name" class="form-control" id="mhs_name" <?php if (isset($profil)) echo "value='$profil->mhs_name'" ?> readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="mhs_phone">No. Telepon</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" name ="mhs_phone" class="form-control" placeholder="Masukkan nomor telepon" id="mhs_phone" <?php if (isset($profil)) echo "value='$profil->mhs_phone'"?> required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="mhs_birthplace">Tempat lahir</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name ="mhs_birthplace" class="form-control" placeholder="Masukkan tempat lahir" id="mhs_birthplace" <?php if(isset($profil)) echo "value='$profil->mhs_birthplace'"?> required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="mhs_birthdate">Tanggal lahir</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="input-group date" id="bs_datepicker_component_container">
                                                <div class="form-line">
                                                    <input type="date" class="form-control" placeholder="Masukkan tanggal lahir" <?php if (isset($profil)){$date = date('dd-m-YY',strtotime($profil->mhs_birthdate)); echo "value='".$date."'";} ?>name="mhs_birthdate" required>
                                                </div>
                                                <span class="input-group-addon"><i class="material-icons">date_range</i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="mhs_address">Alamat tinggal</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea name="mhs_address" class="form-control" id="mhs_address" placeholder="Masukkan alamat tinggal saat ini" required><?php if (isset($profil)) echo $profil->mhs_address?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">
                                            SIMPAN
                                        </button>&nbsp;
                                        <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" type="button" class="btn btn-warning m-t-15 waves-effect" style="margin-left: 15px">BATAL</a>
                                    </div>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>