<!-- form pinjam inventaris -->
<div class="col-md-3">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Pinjam Inventaris</h3>
    </div>
    <div class="box-body">
      <img class="img-responsive" src="<?php echo base_url('assets/gambar/inventaris/'.$gambar_inventaris); ?>" alt="Photo">
      <h3 class="box-title"><?php echo $nama_inventaris; ?></h3>
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="form-group">
            <div class="col-sm-12">
              <label>Tanggal Ambil:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input name="tgl_pinjam" type="text" class="form-control pull-right tanggal" id="datepicker">
              </div>
              <!-- /.input group -->
            </div>
            <!-- ./form-grup -->
            <div class="col-sm-12">
              <br>
              <label>Tanggal Kembali:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input name="tgl_kembali" type="text" class="form-control pull-right tanggal" id="datepicker">
              </div>
              <!-- /.input group -->
            </div>
            <!-- ./form-grup -->
            <div class="col-sm-12">
              <br>
              <label>Jumlah Pinjam:</label>
              <select name="jumlah_pinjam" class="form-control select2">
                <option selected="selected" disabled>Jumlah Pinjam</option>
                <?php for($x=1; $x<=$jumlah_inventaris; $x++){ ?>
                  <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                <?php } ?>
              </select>
            </div>

            <!-- melemparkan id_inventaris -->
            <input type="hidden" name="id_inventaris" value="<?php echo $id_inventaris; ?>">
          </div>
          <!-- /.form group -->
          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-success">Pinjam</button>
            </div>
          </div>
        </form>
    </div>
    <!-- ./box-body -->
  </div>
  <!-- ./box -->
</div>
<!-- ./col -->