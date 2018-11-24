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
                            <?= form_open_multipart(base_url('dashboad/kegiatan_save')); ?>
                                <div class="form-group">
                                    <h2 class="card-inside-title">Nama kegiatan</h2>
                                    <div class="form-line">
                                        <input type="text" name ="keg_name" class="form-control" placeholder="Masukkan nama kegiatan">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h2 class="card-inside-title">Nama kegiatan (English)</h2>
                                    <div class="form-line">
                                        <input type="text" name ="keg_name_eng" class="form-control" placeholder="Masukkan nama kegiatan (dalam Bahasa Inggris)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h2 class="card-inside-title">Deskripsi kegiatan</h2>
                                    <div class="form-line">
                                        <textarea name ="keg_desc" class="form-control" placeholder="Masukkan deskripsi kegiatan"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h2 class="card-inside-title">Bidang kegiatan</h2>                                    
                                    <select class="form-control show-tick">
                                        <option value="">-- Pilih bidang kegiatan --</option>
                                        <option value="10">Penalaran</option>
                                        <option value="20">Minat bakat</option>
                                        <option value="30">Pengabdian kepada masyarakat</option>
                                        <option value="40">Kegiatan kesejahteraan mahasiswa</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <h2 class="card-inside-title">Bentuk kegiatan</h2>                                    
                                    <select class="form-control show-tick">
                                        <option value="">-- Pilih bentuk kegiatan --</option>
                                        <option value="10">Seminar</option>
                                        <option value="20">Workshop/lokakarya</option>
                                        <option value="30">Kuliah tamu/umum</option>
                                        <option value="40">Menulis karya ilmiah</option>
                                    </select>
                                </div>                             
                                <div class="form-group">
                                    <h2 class="card-inside-title">Jenis kepesertaan</h2>                                    
                                    <select class="form-control show-tick">
                                        <option value="">-- Pilih jenis kepesertaan --</option>
                                        <option value="10">Peserta</option>
                                        <option value="20">Panitia</option>
                                        <option value="30">Anggota</option>
                                    </select>
                                </div>                             
                                <div class="form-group">
                                    <h2 class="card-inside-title">Level kegiatan</h2>                                    
                                    <select class="form-control show-tick">
                                        <option value="">-- Pilih level kegiatan --</option>
                                        <option value="10">Jurusan</option>
                                        <option value="20">Fakultas</option>
                                        <option value="30">Universitas</option>
                                        <option value="40">Regional kota</option>
                                        <option value="40">Regional provinsi</option>
                                        <option value="40">Nasional</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <h2 class="card-inside-title">Tanggal pelaksanaan</h2>
                                    <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Date start...">
                                        </div>
                                        <span class="input-group-addon"><i class="material-icons">date_range</i></span>&nbsp;
                                        <span class="input-group-addon">s.d.</span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Date end...">
                                        </div>
                                        <span class="input-group-addon"><i class="material-icons">date_range</i></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h2 class="card-inside-title">Lampiran scan sertifikat</h2>
                                    <input type="file" name ="keg_file" class="form-control">
                                </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">
                                <!-- <span class="input-group-addon"><i class="material-icons">done</i></span> -->
                                SIMPAN
                            </button>
                        </div>  
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>