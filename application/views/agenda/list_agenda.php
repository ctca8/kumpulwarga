<!-- daftar agenda -->
<div class="col-md-6">
  <div class="box box-primary">
    <div class="box-body no-padding">
      <div id="calendar"></div>
    </div>
    <!-- ./box-body -->
  </div>
  <!-- ./box -->
</div>
<!-- /.col -->

<?php if ($this->session->userdata('status_jabatan')=="aktif") { ?>
<!-- form tambah agenda -->
<div class="col-md-3">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Agenda</h3>
    </div>
    <div class="box-body">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="form-group">
            <div class="col-sm-12">
              <input name="nama_agenda" type="text" class="form-control" id="inputAgenda" placeholder="Nama Agenda">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <label>Tanggal Mulai:</label>
              
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input name="tgl_mulai" type="text" class="form-control pull-right tanggal" id="datepicker">
              </div>
              <!-- /.input group -->
            </div>
          </div>
          <!-- /.form group -->
          <div class="form-group">
            <div class="col-sm-12">
              <label>Tanggal Selesai:</label>
              
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input name="tgl_selesai" type="text" class="form-control pull-right tanggal" id="datepicker">
              </div>
              <!-- /.input group -->
            </div>
          </div>
          <!-- /.form group -->
          <div class="form-group">
            <div class="col-sm-12">
              <input name="lokasi" type="text" class="form-control" id="inputLokasi" placeholder="Lokasi">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <textarea name="keterangan_agenda" class="form-control" id="inputKeterangan" placeholder="Terangkan agendamu disini.."></textarea>
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-12">
              <label>Status Agenda</label>
              <select name="status_agenda" class="form-control select2">
                <option value="Sangat Penting" selected="selected">Sangat Penting</option>
                <option value="Penting">Penting</option>
                <option value="Kurang Penting">Kurang Penting</option>
                <option value="Tidak Penting">Tidak Penting</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Sebarkan</button>
            </div>
          </div>
        </form>
    </div>
    <!-- ./box-body -->
  </div>
  <!-- ./box -->
</div>
<!-- ./col -->
<?php } ?>