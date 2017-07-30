<!-- daftar pengumuman -->
<div class="col-md-5">
  <div class="box box-primary">
    <div class="box-body">
      <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?> 
      <?php foreach($pengumuman_data as $pengumuman)
      {
      ?>
      <!-- Post -->
        <div class="post">
          <div class="user-block">
            <img class="img-circle img-bordered-sm" src="<?php echo base_url('assets/gambar/profil/'.$pengumuman->photo);?>" alt="User Image">
                <span class="username">
                  <a href="#"><?php echo $pengumuman->judul; ?></a>
              <?php if ($pengumuman->id_rj==$this->session->userdata('id_rj')) { ?>
                  <a href="<?php echo site_url('pengumuman/hapus_action/'.$pengumuman->id_pengumuman);?>" class="pull-right btn-box-tool" onclick="javasciprt: return confirm('Anda Yakin?')"><i class="fa fa-times"></i></a>
                  <a href="<?php echo site_url('pengumuman/ubah_form/'.$pengumuman->id_pengumuman);?>" class="pull-right btn-box-tool"><i class="fa fa-pencil"></i></a>
              <?php } ?>
                </span>
            <span class="description"><?php echo $pengumuman->nama_pdk; ?> | <?php echo $pengumuman->nama_j; ?></span>
          </div>
          <!-- /.user-block -->
          <div class="row margin-bottom">
            <div class="col-sm-12">
              <p>
                <?php echo $pengumuman->isi_pengumuman; ?>
              </p>
              <img class="img-responsive" src="<?php echo base_url('assets/gambar/pengumuman/'.$pengumuman->gambar_pengumuman);?>" alt="Photo">
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

<script>
  function validateForm() {
      var x = document.forms["myForm"]["judul"].value;
      var y = document.forms["myForm"]["isi_pengumuman"].value;
      var z = document.forms["myForm"]["gambar_pengumuman"].value;

      if (x == "") {
          alert("Mohon isi judul terlebih dahulu!");
          return false;
      }
      if (y == "") {
          alert("Mohon isi deskripsi pengumuman dahulu!");
          return false;
      }
      if (z == "") {
          alert("Mohon isi gambar pengumuman dahulu!");
          return false;
      }
  }
</script>

<!-- form tambah pengumuman -->
<?php if ($this->session->userdata('status_jabatan')=="aktif") { ?>
<div class="col-md-4">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Pengumuman</h3>
    </div>
    <div class="box-body">
      <form name="myForm" action="<?php echo $action; ?>" onsubmit="return validateForm()" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="form-group">
            <div class="col-sm-12">
              <input name="judul" type="text" class="form-control" id="inputJudul" placeholder="Judul">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <textarea name="isi_pengumuman" class="form-control" id="inputDeskripsi" placeholder="Deskripsikan isi pengumuman.."></textarea>
            </div>
          </div>
          <div class="form-group">
            <dir class="col-sm-12">
              <input name="gambar_pengumuman" type="file" id="inputGambar">
            </dir>
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