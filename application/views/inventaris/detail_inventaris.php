<!-- Detail Inventaris -->
<div class="col-md-3">
  <div class="box box-solid">
    <div class="box-header no-padding">
    	<img class="img-responsive" src="<?php echo base_url('assets/gambar/inventaris/'.$gambar_inventaris);?>" alt="Photo">
    </div>
    <div class="box-body">
    	<h4 class="box-title" id="nama_inventaris" value="<?php echo $nama_inventaris; ?>"><?php echo $nama_inventaris;?></h4>
      <br>
      <dl class="dl-horizontal" style="margin-left: -130px;">
        <dt><i class="fa fa-plus"></i></dt>
        <dd><?php echo ucwords($jumlah_inventaris); ?> buah</dd>
        <br>
        <dt><i class="fa fa-align-left"></i></dt>
        <dd><?php echo ucwords($deskripsi_inventaris); ?></dd>
        <br>
        <dt><i class="fa fa-heartbeat"></i></dt>
        <dd><?php echo ucwords($kondisi_inventaris); ?></dd>
        <br>
        <dt><i class="fa fa-dollar"></i></dt>
        <dd><?php echo "Rp ".number_format($biaya_pinjam, "2", ",", "."); ?></dd>
        <br>
        <dt><i class="fa fa-heart-o"></i></dt>
        <dd><?php echo "Rp ".number_format($biaya_denda, "2", ",", "."); ?></dd>
      </dl>
      <?php if($kondisi_inventaris == "hilang" || $kondisi_inventaris == "rusak") { ?>
    	   <a href="#" class="btn btn-primary btn-block btn-flat disabled">Pinjam</a>
      <?php } else { ?>
          <a href="<?php echo site_url('inventaris/form_pinjam/'.$id_inventaris); ?>" class="btn btn-primary btn-block btn-flat">Pinjam</a>
          <?php } ?>
          <?php if($this->session->userdata('id_rt')==$id_rt && $this->session->userdata('status_jabatan') == "aktif" && $this->session->userdata('jabatan')=="1") { ?>
          <a href="<?php echo site_url('inventaris/ubah_inventaris_form/'.$id_inventaris); ?>" class="btn btn-info btn-block btn-flat">Ubah Kondisi</a>
          <?php } ?>
    </div>
    <!-- ./box-body -->
  </div>
  <!-- ./box -->
</div>
<!-- /.col -->

<div class="col-md-6">
  <div class="box box-primary">
  	<div class="box-header">
  		<h3 class="box-title">Riwayat Peminjaman</h3>
  	</div>
    <div class="box-body no-padding">
    	<table class="table table-striped">
        <tr>
          <th>Peminjam</th>
          <th>Ambil</th>
          <th>Kembali</th>
          <!-- <th>Jumlah Pinjam</th>
          <th>Jumlah Kembali</th>
          <th>Biaya Sewa</th>
          <th>Biaya Denda</th> -->
          <th>Status</th>
          <th>action</th>
        </tr>
        <?php
          foreach($peminjaman_data as $peminjaman)
          {
        ?>
        <tr>
          <td><?php echo $peminjaman->nama_pdk; ?></td>
          <td><?php echo $peminjaman->tgl_pinjam; ?></td>
          <td><?php echo $peminjaman->tgl_kembali; ?></td>
          <!-- <td><?php //echo $peminjaman->jumlah_pinjam; ?> buah</td>
          <td><?php //echo $peminjaman->jumlah_kembali; ?> buah</td>
          <td><?php //echo "Rp ".number_format($peminjaman->total_bayar, "2", ",", ".");
          ?></td>
          <td><?php //echo "Rp ".number_format($peminjaman->total_denda, "2", ",", ".");
          ?></td> -->

          <td><?php if($this->session->userdata('status_jabatan')=="aktif" && $this->session->userdata('jabatan')=="1") { ?>
            <?php if($peminjaman->status_peminjaman=="menunggu konfirmasi"){ ?>
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-flat btn-xs"><?php echo $peminjaman->status_peminjaman; ?></button>
              <button type="button" class="btn btn-default btn-flat btn-xs dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url('inventaris/konfirmasi_pinjam/'.$peminjaman->id_peminjaman.'/disetujui'); ?>">disetujui</a></li>
                <li><a href="<?php echo site_url('inventaris/konfirmasi_pinjam/'.$peminjaman->id_peminjaman.'/ditolak'); ?>">ditolak</a></li>
              </ul>
            </div>
            <?php } elseif($peminjaman->status_peminjaman=="disetujui") { ?>
              <a href="<?php echo site_url('inventaris/form_kembali/'.$peminjaman->id_peminjaman); ?>" class="btn btn-xs btn-success">kembali</a>
              <?php } else { ?>
                <button class="btn btn-xs btn-default disabled"><?php echo $peminjaman->status_peminjaman; ?></button>
              <?php } ?>
            <?php } else { echo $peminjaman->status_peminjaman;} ?>
          </td>
          <td><button id="id_peminjaman" onclick="detail(this)" class="btn btn-xs btn-info" value="<?php echo $peminjaman->id_peminjaman; ?>">detail</button></td>
        </tr>
        <?php } ?>
      </table>
    </div>
    <!-- ./box-body -->
  </div>
  <!-- ./box -->
</div>
<!-- ./col -->
<div id="modal_peminjaman"></div>

<script>
  function detail(id_peminjaman)
  {
    var id=id_peminjaman.value;
    var nama_inventaris=getElementById('nama_inventaris').value;
    $.ajax({
      url: "<?php echo site_url('inventaris/pinjam_detail'); ?>",
      method: "POST",
      cache: false,
      data: {
        id_peminjaman: id,
        nama_inventaris: nama_inventaris,
      },
      success: function(html){
        $('#modal_peminjaman').html(html);
      }
    });
    return false;
  }
</script>
