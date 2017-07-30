<div class="col-md-9">
<div class="box box-default">
    <!-- <h3 class="box-title"><i class="fa fa-tag"></i> Daftar Warga</h3> -->
  <div class="box-body">
  <?php if ($this->session->userdata('status_jabatan')=="aktif" && $this->session->userdata('jabatan')!="1") { ?>
    <form action="<?php echo site_url('warga/warga_rt'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12">
            <!-- <label>Pilih Bulan</label> -->
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-map"></i>
              </div>
              <select name="id_rt" class="form-control select2">
                <option selected="selected" disabled>Pilih RT</option>
                <?php foreach ($rt_data as $rt) { ?>
                  <option value="<?php echo $rt->id_rt; ?>">RT <?php echo $rt->nama_rt."/".$rt->nama_rw; ?></option>
                <?php } ?>
              </select>
              <span class="input-group-btn">
                <button type="submit" class="btn btn-info btn-flat">Go!</button>
              </span>
            </div>
            <!-- /.input group -->
          </div>
          <!-- ./col -->
        </div>
        <!-- /.form group -->
      </form>
    <?php } ?>
    <div class="row">
      <?php foreach ($warga_data as $warga) { ?>
        <div class="col-md-6">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="<?php echo base_url('assets/gambar/profil/'.$warga->photo); ?>" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php echo $warga->nama_pdk; ?></h3>
              <h5 class="widget-user-desc"><?php 
              if ($warga->stts_rj =="aktif") {
                if ($warga->id_j =="1") {
                  echo "Ketua RT";
                } elseif ($warga->id_j =="2") {
                  echo "Ketua RW";
                } elseif ($warga->id_j =="3") {
                  echo "Kepala Desa";
                }
              } else {
                echo "Warga Biasa";
              }
              ?>
              | <b>RT <?php echo $warga->nama_rt."/".$warga->nama_rw; ?></b>
              </h5>
            </div>
            <div class="box-body">
              <dl class="dl-horizontal" style="margin-left: -130px;">
                <dt><i class="fa fa-calendar"></i></dt>
                <dd><?php echo ucwords($warga->tmp_lahir_pdk).", ".$warga->tgl_lahir_pdk; ?></dd>
                <br>
                <dt><i class="fa fa-intersex"></i></dt>
                <dd><?php echo ucwords($warga->jk_pdk); ?></dd>
                <br>
                <dt><i class="fa fa-heart"></i></dt>
                <dd><?php echo ucwords($warga->agama_pdk); ?></dd>
                <br>
                <dt><i class="fa fa-heartbeat"></i></dt>
                <dd><?php echo ucwords($warga->stts_nikah_pdk); ?></dd>
                <br>
                <dt><i class="fa fa-suitcase"></i></dt>
                <dd><?php echo ucwords($warga->pekerjaan_pdk); ?></dd>
              </dl>
            </div>
            <!-- ./box-body -->
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
        <?php } ?>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->