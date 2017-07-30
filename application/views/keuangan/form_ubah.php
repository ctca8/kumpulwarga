<div class="col-md-3">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Hapus Informasi Kas</h3>
    </div>
    <div class="box-body">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
          <input type="hidden" name="id_keuangan" value="<?php echo $id_keuangan; ?>">
          <div class="form-group">
            <div class="col-sm-12">
              <label>Tanggal</label>
              
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input name="tgl_uang" type="text" value="<?php echo $tgl_uang; ?>" class="form-control pull-right tanggal" id="datepicker" disabled>
              </div>
              <!-- /.input group -->
            </div>
          </div>
          <!-- /.form group -->
          <div class="form-group">
            <div class="col-sm-12">
              <label>Status Uang</label>
              <input name="status_uang" type="text" value="<?php echo $status_uang; ?>" class="form-control pull-right" disabled>
            </div>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <div class="col-sm-12">
              <span id="nominal" class="info-box-number"></span>
              <input type="number" value="<?php echo $nominal; ?>" class="form-control" placeholder="Nominal" name="nominal" id="nominal" onkeyup="document.getElementById('nominal').innerHTML = formatCurrency(this.value);" disabled>
            </div>
          </div>
          <!-- ./form-group -->
          <div class="form-group">
            <div class="col-sm-12">
              <textarea name="keterangan_uang" class="form-control" id="inputKeterangan" placeholder="Keterangan penghapusan...">[<?php echo $keterangan_uang; ?>] </textarea>
            </div>
          </div>
          <!-- ./form-group -->
          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-danger"><i class="fa fa-paper-plane"></i> Hapus</button>
            </div>
          </div>
          <!-- ./form-group -->
        </form>
    </div>
    <!-- ./box-body -->
  </div>
  <!-- ./box -->
</div>
<!-- ./col -->