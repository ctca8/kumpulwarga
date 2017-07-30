<!-- daftar agenda -->
<div class="col-md-5">
  <div class="box box-primary">
    <div class="box-body">
      <?php foreach($agenda_data as $agenda)
      {
        ?>
      <!-- Post -->
        <div class="post">
          <div class="user-block">
            <img class="img-circle img-bordered-sm" src="<?php echo base_url('assets/adminlte/dist/img/user1-128x128.jpg');?>" alt="User Image">
                <span class="username">
                  <a href="#"><?php echo $agenda->nama_agenda; ?></a>
                  <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                </span>
            <span class="description">Ketua RT - 6 days ago</span>
          </div>
          <!-- /.user-block -->
          <div class="row margin-bottom">
            <div class="col-sm-12">
              <p>
                <?php echo $agenda->keterangan_agenda; ?>
              </p>
              <p>Tanggal Mulai: <?php echo $agenda->tgl_mulai; ?></p>
              <p>Tanggal Selesai: <?php echo $agenda->tgl_selesai; ?></p>
              <!-- <img class="img-responsive" src="<?php //echo base_url('assets/gambar/').$pengumuman->gambar_pengumuman;?>" alt="Photo"> -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.post -->
        <?php } ?>
    </div>
    <!-- ./box-body -->
  </div>
  <!-- ./box -->
</div>
<!-- /.col -->

<!-- form tambah agenda -->
<div class="col-md-4">
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
          <!-- /.form-group -->
          <!-- <div class="form-group">
            <dir class="col-sm-12">
              <input name="gambar_pengumuman" type="file" id="inputGambar">
            </dir>
          </div> -->
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
<!-- ./col