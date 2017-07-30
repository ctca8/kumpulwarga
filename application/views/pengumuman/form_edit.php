<!-- form tambah pengumuman -->
<div class="col-md-6">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Pengumuman</h3>
    </div>
    <div class="box-body">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
          <input type="hidden" name="id_pengumuman" value="<?php echo $id_pengumuman; ?>">
          <div class="form-group">
            <div class="col-sm-12">
              <input name="judul" type="text" class="form-control" id="inputJudul" placeholder="Judul" value="<?php echo $judul; ?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <textarea name="isi_pengumuman" class="form-control" id="inputDeskripsi" placeholder="Deskripsikan isi pengumuman.."><?php echo $isi_pengumuman; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <dir class="col-sm-12">
              <input name="gambar_pengumuman" type="file" id="inputGambar">
            </dir>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <img class="img-responsive" src="<?php echo base_url('assets/gambar/pengumuman/'.$gambar_pengumuman);?>" alt="Photo">
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