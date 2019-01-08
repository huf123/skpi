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
                                                <input type="text" name ="keg_name" class="form-control" placeholder="Masukkan nama kegiatan" id="keg_name" required
                                                <?php if (isset($kegiatan)){
                                                    echo "value='".$kegiatan->nama_kg."'";
                                                }?>>
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
                                                <input type="text" name ="keg_name_eng" class="form-control" placeholder="Masukkan nama kegiatan dalam Bahasa Inggris" id="keg_name_eng" required
                                                <?php if (isset($kegiatan)){
                                                    echo "value='".$kegiatan->nama_kg_eng."'";
                                                }?>>
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
                                            <select class="form-control show-tick bidang" name="keg_bidang" id="keg_bidang" required>
                                                <option value="">-- Pilih bidang kegiatan --</option>
                                                <?php foreach ($bidang as $bid){ $idbidang = $bid->id_bidang;?>
                                                <option value="<?php echo $idbidang ?>"
                                                    <?php if (isset($kegiatan)){
                                                        $id_bidang = $kegiatan->id_bidang;
                                                        if ($id_bidang == $idbidang) {
                                                            echo " selected";
                                                        }
                                                    }?>><?php echo $bid->info ?></option>
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
                                                <option value="" id="select_none">-- Pilih bentuk kegiatan --</option>
                                                <?php if (isset($bentuk)){ 
                                                    foreach ($bentuk as $bentuk) { 
                                                        $idbentuk = $bentuk->id_bentuk;
                                                        $id_bentuk = $kegiatan->id_bentuk;
                                                        if ($id_bentuk == $idbentuk) $select = " selected"; else $select = "";?>
                                                <option value="<?php echo $idbentuk ?>" <?php echo $select ?>>
                                                    <?php echo $bentuk->bentuk ?>
                                                </option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="keg_peran">Jenis Peranan</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick peran" name="keg_peran" id="keg_peran" required>
                                                <option value="" id="select_none">-- Pilih jenis Peranan --</option>
                                                <?php if (isset($peran)){ 
                                                    foreach ($peran as $peran) { 
                                                        $idperan = $peran->id_peranan;
                                                        $id_peran = $kegiatan->id_peranan;
                                                        if ($id_peran == $idperan) $select = " selected"; else $select = "";?>
                                                <option value="<?php echo $idperan ?>" <?php echo $select ?>>
                                                    <?php echo $peran->peranan ?>
                                                </option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="keg_tingkat">Tingkatan kegiatan</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick" name="keg_tingkat" id="keg_tingkat" required>
                                                <option value="" id="select_none">-- Pilih tingkatan kegiatan --</option>
                                                <?php foreach ($tingkatan as $ting){ 
                                                    $idtingkatan = $ting->id_tingkatan;?>
                                                <option value="<?php echo $idtingkatan ?>"
                                                    <?php if (isset($kegiatan)){
                                                        $id_tingkatan = $kegiatan->id_tingkatan;
                                                        if ($id_tingkatan == $idtingkatan) {
                                                            echo "selected";
                                                        }
                                                    }?>><?php echo $ting->tingkatan ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="date">Tanggal pelaksanaan</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="Date start..." required name="keg_start"
                                                    <?php if (isset($kegiatan)){
                                                    echo "value='".date_format(date_create($kegiatan->tgl_mulai),"j F Y")."'";
                                                        if (strtotime($kegiatan->tgl_selesai) != 0){
                                                            $checked = 'checked';
                                                            $keg_finish = '';
                                                            $value = $kegiatan->tgl_selesai;
                                                        }
                                                        else {
                                                            $checked = '';
                                                            $keg_finish = 'style="display: none"';
                                                            $value = '';
                                                        }
                                                    } else {
                                                        $checked = '';
                                                        $keg_finish = 'style="display: none"';
                                                        $value = '';
                                                    } ?>>
                                                </div>
                                                <span class="input-group-addon" style="padding-right: 10px"><i class="material-icons">date_range</i></span>
                                                <span class="input-group-addon sd" <?php echo $keg_finish?>>s.d.</span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="Date end..."  name="keg_finish" <?php echo $value.' '.$keg_finish?>>
                                                </div>
                                                <span class="input-group-addon keg_finish" <?php echo $keg_finish?>><i class="material-icons">date_range</i></span>
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
                                        <div class="form-group" style="margin-top: 5px">
                                            <?php if (isset($kegiatan)){
                                                echo anchor("./assets/files/".$kegiatan->sertifikat,'Tampilkan Sertifikat','id="show_sertifikat" style="color:green"');
                                                echo " | ";
                                                echo '<input type="hidden" id="file_path" value="'.$kegiatan->sertifikat.'">';
                                                echo '<a href="javascript:void(0);" id="remove_sertifikat" style="color:red">Hapus</a>';
                                            } else echo '<input type="file" name ="keg_file" class="form-control" required>'?>                                            
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