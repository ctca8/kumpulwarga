<!-- Inventaris -->
<div class="col-md-9">
<div class="box box-default">
  <div class="box-body">
  <form action="<?php echo site_url('inventaris/inventaris_rt'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
    <div class="form-group">
      <div class="col-md-12">
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

<?php foreach($inventaris_data as $inventaris)
      {
        ?>
<div class="col-md-6">
  <!-- Widget: user widget style 1 -->
  <div class="box box-widget widget-user">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('assets/gambar/inventaris/'.$inventaris->gambar_inventaris);?>') center center; height: 200px;">
      <h3 class="widget-user-username"><?php echo ucwords($inventaris->nama_inventaris);?></h3>
      <!-- <h5 class="widget-user-desc">Web Designer</h5> -->
    </div>
   <!--  <div class="widget-user-image">
      <img class="img-circle" src="../dist/img/user3-128x128.jpg" alt="User Avatar">
    </div> -->
    <div class="box-body">
      <dl class="dl-horizontal" style="margin-left: -130px;">
        <dt><i class="fa fa-plus"></i></dt>
        <dd><?php echo ucwords($inventaris->jumlah_inventaris); ?> buah</dd>
        <br>
        <dt><i class="fa fa-align-left"></i></dt>
        <dd><?php echo ucwords($inventaris->deskripsi_inventaris); ?></dd>
        <br>
        <dt><i class="fa fa-heartbeat"></i></dt>
        <dd><?php echo ucwords($inventaris->kondisi_inventaris); ?></dd>
        <br>
        <dt><i class="fa fa-dollar"></i></dt>
        <dd><?php echo "Rp ".number_format($inventaris->biaya_pinjam, "2", ",", "."); ?></dd>
      </dl>
      <a href="<?php echo site_url('inventaris/detail_inventaris/'.$inventaris->id_inventaris);?>" class="btn btn-success btn-block btn-flat">Lihat Detail</a>
    </div>
    <!-- ./box-body -->
  </div>
  <!-- /.widget-user -->
</div>
<!-- /.col -->
<?php } ?>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->