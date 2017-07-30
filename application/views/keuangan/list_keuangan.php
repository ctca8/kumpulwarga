<!-- daftar pengumuman -->
<div class="col-md-6">
  <div class="box box-primary">
    <div class="box-body">
      <form action="<?php echo site_url('keuangan/uang_bulanan'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12">
            <!-- <label>Pilih Bulan</label> -->
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <select name="filter_bulan" class="form-control select2">
                <option selected="selected" disabled>Pilih Bulan</option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
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

      <table class="table table-striped">
        <tr>
          <th>Tanggal</th>
          <th style="width: 130px;">Nominal</th>
          <th>Keterangan</th>
          <th>Status</th>
        </tr>
        <?php 
          foreach($keuangan_data as $keuangan)
          { 
        ?>
        <tr class="<?php if ($keuangan->status_uang=="masuk") {
          echo "text-green";
        } elseif($keuangan->status_uang=="keluar") {
          echo "text-red";
        } else {
          echo "text-muted";
        }
         ?>" style="<?php if($keuangan->status_uang=="dihapus"){ echo "text-decoration:line-through"; } ?>">
          <td><?php 
            $data = date_create($keuangan->tgl_uang);
            echo date_format($data,"d M");
          ?></td>
          <td><?php echo "Rp ".number_format($keuangan->nominal, "2", ",", "."); ?></td>
          <td><?php echo $keuangan->keterangan_uang; ?></td>
          <td><?php 
            if($this->session->userdata('status_jabatan')=="aktif" && $this->session->userdata('jabatan')=="1"){ ?>
              <a href="<?php echo site_url('keuangan/ubah_form/'.$keuangan->id_keuangan)?>"><?php echo ucwords($keuangan->status_uang); ?></a>
            <?php } else { echo ucwords($keuangan->status_uang); } ?>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
    <!-- ./box-body -->
    <div class="box-footer">
        Saldo Keuangan: 
         <?php echo "Rp ".number_format($saldo, "2", ",", ".");
      ?>
      </div><!-- box-footer -->
  </div>
  <!-- ./box -->
</div>
<!-- /.col -->

<?php if ($this->session->userdata('status_jabatan')=="aktif" && $this->session->userdata('jabatan')=="1") { ?>
<!-- form tambah Informasi Kas -->
<div class="col-md-3">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Informasi Kas</h3>
    </div>
    <div class="box-body">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="form-group">
            <div class="col-sm-12">
              <label>Tanggal</label>
              
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input name="tgl_uang" type="text" class="form-control pull-right tanggal" id="datepicker">
              </div>
              <!-- /.input group -->
            </div>
          </div>
          <!-- /.form group -->
          <div class="form-group">
            <div class="col-sm-12">
              <label>Status Uang</label>
              <select name="status_uang" class="form-control select2">
                <option value="keluar" selected="selected">Keluar</option>
                <option value="masuk">Masuk</option>
              </select>
            </div>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <div class="col-sm-12">
              <span id="nominal" class="info-box-number"></span>
              <input type="number" class="form-control" placeholder="Nominal" name="nominal" id="nominal" onkeyup="document.getElementById('nominal').innerHTML = formatCurrency(this.value);"/>
            </div>
          </div>
          <!-- ./form-group -->
          <div class="form-group">
            <div class="col-sm-12">
              <textarea name="keterangan_uang" class="form-control" id="inputKeterangan" placeholder="Keterangan uang..."></textarea>
            </div>
          </div>
          <!-- ./form-group -->
          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Sebarkan</button>
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
<?php } ?>