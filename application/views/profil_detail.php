        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-9">
                <div class="card">
                    <div class="header bg-blue">
                        <h2>Tambah <?= $title ?></h2>
                    </div>  
                    <div class="body">
                    <?= form_open(base_url('dashboard/save_category'),"class='form-horizontal'") ?>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="mhs_name">Nama</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="mhs_name" id="mhs_name" class="form-control" placeholder="Masukkan nama lengkap">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="mhs_phone">No. Telp</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="mhs_phone" id="mhs_phone" class="form-control" placeholder="Masukkan nomor telepon yang diinginkan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="mhs_birthplace">Tempat Lahir</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="mhs_birthplace" id="mhs_birthplace" class="form-control" placeholder="Masukkan tempat lahir Anda">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="mhs_birthdate">Tanggal Lahir</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="datepicker form-control" placeholder="Masukkan tanggal lahir anda">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="mhs_sex">Jenis Kelamin</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">  
                                    <div class="demo-radio-button">
                                        <input name="mhs_sex" type="radio" id="radio_l" class="with-gap radio-col-blue" value="1">
                                        <label for="radio_l">L</label>
                                        <input name="mhs_sex" type="radio" id="radio_p" class="with-gap radio-col-blue" value="2">
                                        <label for="radio_p">P</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="mhs_address">Alamat Tinggal</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" name="mhs_address" class="form-control no-resize" placeholder="Masukkan alamat tinggal Anda saat ini" id="mhs_address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success waves-effect" style="float: left;display: inline">SIMPAN</button>
                        <?php echo form_close(); ?>                        
                        <button type="button" class="btn btn-danger waves-effect" style="float: right;display: inline">BATAL</button>
                    </div>  
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>
</section>