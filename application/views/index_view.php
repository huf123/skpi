        <script>
            $(document).ready(function() {
                $("li[class='active']").removeAttr("class");
                $("#dashboard").attr("class","active");
            });
        </script>
        <div class="row">
            <div class="col-lg-3 col-md-3 icon-button-demo">
                <a href="<?php echo base_url('dashboard/profil')?>" type="button" class="btn btn-primary waves-effect btn-dashboard">
                    <i class="material-icons" style="font-size:60px">person</i><br>
                    <h3>Profil</h3>
                </a>
            </div>
            <?php $role = $this->session->userdata('role'); if ($role==1 OR $role==4){ ?>
            <div class="col-lg-3 col-md-3 icon-button-demo">
                <a href="<?php echo base_url('dashboard/kegiatan')?>" type="button" class="btn btn-danger waves-effect btn-dashboard">
                    <i class="material-icons" style="font-size:60px">work</i><br>
                    <h3>Kegiatan</h3>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 icon-button-demo">
                <a href="<?php echo base_url('dashboard/transkrip')?>" type="button" class="btn btn-warning waves-effect btn-dashboard">
                    <i class="material-icons" style="font-size:60px">assignment</i><br>
                    <h3>Transkrip</h3>
                </a>
            </div>                
            <?php } if ($role==1 OR $role==2 OR $role==3) {?>
            <div class="col-lg-3 col-md-3 icon-button-demo">
                <a href="<?php echo base_url('dashboard/transkrip')?>" type="button" class="btn btn-success waves-effect btn-dashboard">
                    <i class="material-icons" style="font-size:60px">description</i><br>
                    <h3>Laporan</h3>
                </a>
            </div>
            <?php } if ($role==1){?>                
            <div class="col-lg-3 col-md-3 icon-button-demo">
                <a href="<?php echo base_url('dashboard/user')?>" type="button" class="btn btn-default waves-effect btn-dashboard">
                    <i class="material-icons" style="font-size:60px">supervisor_account</i><br>
                    <h3>User & Privilege</h3>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>