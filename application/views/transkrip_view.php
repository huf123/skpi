        <script>
            $(document).ready(function() {
                $("li[class='active']").removeAttr("class");
                $("#transkrip").attr("class","active");
            });
        </script>            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                <?= $title ?>&nbsp;
                            </h2>
                        </div>
                        <div class="body">
                            <?php if ($locked == 0): ?>                                
                            <div class="alert alert-warning">
                                <strong>Perhatian!</strong> Anda harus mengunci kegiatan sebelum mengambil transkrip
                                <a href="<?php echo base_url() ?>dashboard/kegiatan/add" class="btn btn-sm btn-success waves-effect waves-float" style="font-weight: bold;margin-left: 25px">
                                    <i class="material-icons">lock</i>
                                    <span>KUNCI KEGIATAN</span>
                                </a>
                            </div>
                            <?php endif ?>
                            <?php if ($locked == 1): ?>
                            <center>
                                <a href="<?php echo base_url() ?>dashboard/generate" class="btn btn-danger waves-effect waves-float" style="font-weight: bold;margin-right: 15px">
                                    <i class="material-icons">picture_as_pdf</i>
                                    <span>Download PDF</span>
                                </a>
                                <button type="button" class="btn btn-primary waves-effect waves-float" style="font-weight: bold" onclick="frames['frame'].print()">
                                    <i class="material-icons">print</i>
                                    <span>Cetak Transkrip</span>
                                </button>
                                <iframe src="<?php echo base_url()?>dashboard/transkrip_print" style="display:none" name="frame"></iframe>
                            </center>                                
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>