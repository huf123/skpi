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
                            <form class="form-horizontal" action="<?php echo base_url() ?>dashboard/kegiatan_save" method="POST">
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
                                                <input type="text" name ="keg_name_eng" class="form-control" placeholder="Masukkan nama kegiatan" id="keg_name_eng" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="keg_name_eng">Deskripsi kegiatan</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea name="keg_desc" class="form-control" id="keg_name_eng" placeholder="Masukkan deskripsi kegiatan" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Bidang kegiatan</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick">
                                                <option value="0">-- Pilih bidang kegiatan --</option>
                                                <option value="10">Penalaran</option>
                                                <option value="20">Minat bakat</option>
                                                <option value="30">Pengabdian kepada masyarakat</option>
                                                <option value="40">Kegiatan kesejahteraan mahasiswa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Bentuk kegiatan</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick">
                                                <option value="0">-- Pilih bentuk kegiatan --</option>
                                                <option value="10">Seminar</option>
                                                <option value="20">Workshop/lokakarya</option>
                                                <option value="30">Kuliah tamu/umum</option>
                                                <option value="40">Menulis karya ilmiah</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Jenis kepesertaan</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick" required>
                                                <option value="0">-- Pilih jenis kepesertaan --</option>
                                                <option value="10">Peserta</option>
                                                <option value="20">Panitia</option>
                                                <option value="30">Anggota</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Level kegiatan</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick" required>
                                                <option value="0">-- Pilih level kegiatan --</option>
                                                <option value="10">Jurusan</option>
                                                <option value="20">Fakultas</option>
                                                <option value="30">Universitas</option>
                                                <option value="40">Regional kota</option>
                                                <option value="40">Regional provinsi</option>
                                                <option value="40">Nasional</option>
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
                                                    <input type="text" class="form-control" placeholder="Date start..." required>
                                                </div>
                                                <span class="input-group-addon"><i class="material-icons">date_range</i></span>&nbsp;
                                                <span class="input-group-addon">s.d.</span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="Date end..." required>
                                                </div>
                                                <span class="input-group-addon"><i class="material-icons">date_range</i></span>
                                            </div>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>