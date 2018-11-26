        <div class="row">
            <div class="col-lg-3 col-md-3 icon-button-demo">
                <a href="<?php echo base_url('dashboard/survey/add')?>" type="button" class="btn btn-primary waves-effect btn-dashboard">
                    <i class="material-icons" style="font-size:60px">person</i><br>
                    Profil
                </a>
            </div>
            <div class="col-lg-3 col-md-3 icon-button-demo">
                <a href="<?php echo base_url('dashboard/survey/add')?>" type="button" class="btn btn-danger waves-effect btn-dashboard">
                    <i class="material-icons" style="font-size:60px">work</i><br>
                    Kegiatan
                </a>
            </div>
            <div class="col-lg-3 col-md-3 icon-button-demo">
                <a href="<?php echo base_url('dashboard/survey/add')?>" type="button" class="btn btn-warning waves-effect btn-dashboard">
                    <i class="material-icons" style="font-size:60px">assignment</i><br>
                    Transkrip
                </a>
            </div>
            <?php if ($this->session->userdata('role')==1){?>                
            <div class="col-lg-3 col-md-3 icon-button-demo">
                <a href="<?php echo base_url('dashboard/survey/add')?>" type="button" class="btn btn-default waves-effect btn-dashboard">
                    <i class="material-icons" style="font-size:60px">supervisor_account</i><br>
                    User & Privilege
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>