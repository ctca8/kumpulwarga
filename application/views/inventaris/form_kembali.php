<div class="col-md-3">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Kembalikan Inventaris</h3>
    </div>
    <div class="box-body">
      <form action="<?php echo site_url('inventaris/konfirmasi_pinjam/'.$id_peminjaman.'/kembali'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
          <input type="hidden" name="id_peminjaman" value="<?php echo $id_peminjaman; ?>">
          <div class="form-group">
            <div class="col-sm-12">
              <label>Tanggal Kembali</label>

              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input name="tgl_uang" type="text" value="<?php echo $tgl_kembali; ?>" class="form-control pull-right tanggal" id="datepicker" disabled>
              </div>
              <!-- /.input group -->
            </div>
          </div>
          <!-- /.form group -->
          <div class="form-group">
            <div class="col-sm-12">
              <label>Jumlah Pinjam</label>
              <input name="status_uang" type="text" value="<?php echo $jumlah_pinjam; ?>" class="form-control pull-right" disabled>
            </div>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
              <div class="col-sm-12">
                  <label>Jumlah Kembali</label>
                  <select name="jumlah_kembali" class="form-control select2">
                    <option selected="selected" disabled>Jumlah Kembali</option>
                    <?php for($x=0; $x<=$jumlah_pinjam; $x++){ ?>
                      <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                    <?php } ?>
                  </select>
              </div>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <div class="col-sm-12">
              <textarea name="keterangan_kembali" class="form-control" id="inputKeterangan" placeholder="Keterangan Pengembalian"></textarea>
            </div>
          </div>
          <!-- ./form-group -->
          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-danger"><i class="fa fa-paper-plane"></i> Kembali</button>
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
