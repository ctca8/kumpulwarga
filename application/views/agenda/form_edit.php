<!-- form edit agenda -->
<div class="col-md-3">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Agenda</h3>
    </div>
    <div class="box-body">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
          <input type="hidden" name="id_agenda" value="<?php echo $id_agenda; ?>">
          <div class="form-group">
            <div class="col-sm-12">
              <input name="title" type="text" class="form-control" id="inputAgenda" placeholder="Nama Agenda" value="<?php echo $title; ?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <label>Tanggal Mulai:</label>
              
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input name="start" type="text" class="form-control pull-right tanggal" id="datepicker" value="<?php echo $start; ?>">
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
                <input name="end" type="text" class="form-control pull-right tanggal" id="datepicker" value="<?php echo $end; ?>">
              </div>
              <!-- /.input group -->
            </div>
          </div>
          <!-- /.form group -->
          <div class="form-group">
            <div class="col-sm-12">
              <input name="lokasi" type="text" class="form-control" id="inputLokasi" placeholder="Lokasi" value="<?php echo $lokasi; ?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <textarea name="description" class="form-control" id="inputKeterangan" placeholder="Terangkan agendamu disini.."><?php echo $description; ?></textarea>
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-12">
              <label>Status Agenda</label>
              <select name="status_agenda" class="form-control select2">
                <option value="Sangat Penting" selected="<?php if($status_agenda=="sangat penting"){echo "selected";} ?>">Sangat Penting</option>
                <option value="Penting" selected="<?php if($status_agenda=="penting"){echo "selected";} ?>">Penting</option>
                <option value="Kurang Penting" selected="<?php if($status_agenda=="kurang penting"){echo "selected";} ?>">Kurang Penting</option>
                <option value="Tidak Penting" selected="<?php if($status_agenda=="tidak penting"){echo "selected";} ?>">Tidak Penting</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Ubah</button>
            </div>
          </div>
        </form>
    </div>
    <!-- ./box-body -->
  </div>
  <!-- ./box -->
</div>
<!-- ./col -->