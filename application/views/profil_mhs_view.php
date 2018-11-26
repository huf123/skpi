        <script>
            $(document).ready(function() {
                $("li[class='active']").removeAttr("class");
                $("#profil").attr("class","active");
            });
        </script>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                <?= $title ?>&nbsp; <?php if (isset($profil)){ ?>                                    
                                <button class="btn btn-default waves-effect waves-float edit_profil" style="font-weight: bold;">
                                    <i class="material-icons" style="color: #000!important">add</i>
                                    <span>EDIT PROFIL</span>
                                </button>
                                <?php } ?>
                            </h2>
                        </div>
                        <div class="body">
                            <?php echo form_open(base_url($url),"id='form_wrap'"); ?>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="mhs_name">Nama</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name ="mhs_name" class="form-control" id="mhs_name" <?php if (isset($profil)) echo "value='$profil->mhs_name'" ?> readonly disabled>
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
                                                <input type="number" name ="mhs_phone" class="form-control" placeholder="Masukkan nomor telepon" id="mhs_phone" <?php if (isset($profil)) echo "value='$profil->mhs_phone'"?> required disabled>
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
                                                <input type="text" name ="mhs_birthplace" class="form-control" placeholder="Masukkan tempat lahir" id="mhs_birthplace" <?php if(isset($profil)) echo "value='$profil->mhs_birthplace'"?> required disabled>
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
                                                    <input type="date" class="form-control" placeholder="Masukkan tanggal lahir" <?php if (isset($profil)){$date = date('dd-m-YY',strtotime($profil->mhs_birthdate)); echo "value='".$date."'";} ?>name="mhs_birthdate" required disabled>
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
                                                <textarea name="mhs_address" class="form-control" id="mhs_address" placeholder="Masukkan alamat tinggal saat ini" required disabled><?php if (isset($profil)) echo $profil->mhs_address?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect simpan" disabled>
                                            SIMPAN
                                        </button>&nbsp;
                                        <button type="button" class="btn btn-warning m-t-15 waves-effect cancel" style="margin-left: 15px">BATAL</button>
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