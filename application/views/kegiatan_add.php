        <script>
            $(document).ready(function() {
                $("li[class='active']").removeAttr("class");
                $("#kegiatan").attr("class","active");
            });
        </script>
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
                            <?php echo form_open_multipart(base_url($url),"class='form-horizontal'"); ?>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="keg_name">Nama kegiatan</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name ="keg_name" class="form-control" placeholder="Masukkan nama kegiatan" id="keg_name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="keg_name_eng">Nama kegiatan (English)</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name ="keg_name_eng" class="form-control" placeholder="Masukkan nama kegiatan dalam Bahasa Inggris" id="keg_name_eng" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="keg_desc">Deskripsi kegiatan</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea name="keg_desc" class="form-control" id="keg_desc" placeholder="Masukkan deskripsi kegiatan" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="keg_bidang">Bidang kegiatan</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick bidang" name="id_bidang" id="id_bidang" required>
                                                <option value="">-- Pilih bidang kegiatan --</option>
                                                <?php foreach ($bidang as $bid){ ?>
                                                <option value="<?php echo $bid->id_bidang ?>"><?php echo $bid->info ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="keg_bentuk">Bentuk kegiatan</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick bentuk" name="keg_bentuk" id="keg_bentuk" required>
                                                <option value="">-- Pilih bentuk kegiatan --</option>
                                                <option value="1">Seminar</option>
                                                <option value="2">Workshop/lokakarya</option>
                                                <option value="3">Kuliah tamu/umum</option>
                                                <option value="4">Menulis karya ilmiah</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="keg_kepesertaan">Jenis Peranan</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick peran" name="keg_kepesertaan" id="keg_kepesertaan" required>
                                                <option value="">-- Pilih jenis Peranan --</option>
                                                <option value="1">Peserta</option>
                                                <option value="2">Panitia</option>
                                                <option value="3">Anggota</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="keg_level">Tingkatan kegiatan</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick" name="keg_level" id="keg_level" required>
                                                <option value="">-- Pilih tingkatan kegiatan --</option>
                                                <?php foreach ($tingkatan as $ting){ ?>
                                                <option value="<?php echo $ting->id_tingkatan ?>"><?php echo $ting->tingkatan ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Tanggal pelaksanaan</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="Date start..." required name="keg_start">
                                                </div>
                                                <span class="input-group-addon"><i class="material-icons">date_range</i></span>
                                                <span class="input-group-addon sd" style="display: none">s.d.</span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="Date end..."  name="keg_finish" style="display: none">
                                                </div>
                                                <span class="input-group-addon keg_finish" style="display: none"><i class="material-icons">date_range</i></span>
                                            </div>
                                            <input type="checkbox" class="filled-in chk-col-blue" id="date_end_show">
                                            <label for="date_end_show">Lebih dari 1 hari</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Lampiran scan sertifikat</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name ="keg_file" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">
                                            SIMPAN
                                        </button>
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