<!-- daftar Inventaris -->
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">
                Daftar Inventaris
            </h3>
        </div>
        <div class="box-body">
            <form action="<?php echo site_url('inventaris/inventaris_rt'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group">
                  <div class="col-md-12">
                    <!-- <label>Pilih Bulan</label> -->
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-map"></i>
                      </div>
                      <select name="id_rt" class="form-control select2">
                        <option selected="selected" disabled>Pilih RT</option>
                        <?php foreach ($rt_data as $rt) { ?>
                          <option value="<?php echo $rt->id_rt; ?>">RT <?php echo $rt->nama_rt."/".$rt->nama_rw; ?></option>
                        <?php } ?>
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
                    <th>
                        Nama
                    </th>
                    <th>
                        Kondisi
                    </th>
                    <th>
                        Jumlah
                    </th>
                    <th style="width: 40px">
                        Action
                    </th>
                </tr>
        <?php 
          foreach($inventaris_data as $inventaris)
          { 
        ?>
                <tr>
                    <td>
                        <?php echo $inventaris->nama_inventaris; ?>
                    </td>
                    <td>
                        <?php echo ucwords($inventaris->kondisi_inventaris); ?>
                    </td>
                    <td>
                        <?php echo $inventaris->jumlah_inventaris; ?> buah
                    </td>
                    <td>
                        <?php
                            // mengecek apakah ada peminjaman inventaris yang menunggu konfirmasi
                            $tunggu_konfirmasi="FALSE";
                            foreach($konfirmasi_pinjam_data as $konfirmasi) {
                                if ($konfirmasi->id_inventaris==$inventaris->id_inventaris && $konfirmasi->status_peminjaman=="menunggu konfirmasi") {
                                    $tunggu_konfirmasi="TRUE";
                                }
                            }
                        ?>
                        <a class="btn <?php if($tunggu_konfirmasi=="TRUE"){ echo "btn-danger"; } else { echo "btn-info"; } ?> btn-sm" href="<?php echo site_url('inventaris/detail_inventaris/'.$inventaris->id_inventaris); ?>">
                            <i class="fa fa-bars">
                            </i>
                            Detail
                        </a>
                    </td>
                </tr>
          <?php } ?>
            </table>
        </div>
        <!-- ./box-body -->
    </div>
    <!-- ./box -->
</div>
<!-- /.col -->
<!-- form tambah Inventaris -->
<div class="col-md-3">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">
                Tambah Inventaris
            </h3>
        </div>
        <div class="box-body">
            <form action="<?php echo $action; ?>" class="form-horizontal" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <div class="col-sm-12">
                        <input class="form-control" id="inputJudul" name="nama_inventaris" placeholder="Nama Inventaris" type="text">
                        </input>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea class="form-control" id="inputDeskripsi" name="deskripsi_inventaris" placeholder="Deskripsi inventaris..."></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input class="form-control" id="inputJudul" name="jumlah_inventaris" placeholder="Jumlah" type="number">
                        </input>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label>
                            Kondisi Inventaris
                        </label>
                        <select class="form-control select2" name="kondisi_inventaris">
                            <option selected="selected" value="baik">
                                Baik
                            </option>
                            <option value="rusak">
                                Rusak
                            </option>
                            <option value="dijual">
                                Dijual
                            </option>
                            <option value="hilang">
                                Hilang
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <span class="info-box-number" id="nominal">
                        </span>
                        <input class="form-control" id="nominal" name="biaya_pinjam" onkeyup="document.getElementById('nominal').innerHTML = formatCurrency(this.value);" placeholder="Biaya Pinjam" type="number"/>
                    </div>
                </div>
                <!-- ./form-group -->
                <div class="form-group">
                    <div class="col-sm-12">
                        <span class="info-box-number" id="nominal2">
                        </span>
                        <input class="form-control" id="nominal2" name="biaya_denda" onkeyup="document.getElementById('nominal2').innerHTML = formatCurrency(this.value);" placeholder="Biaya Denda" type="number"/>
                    </div>
                </div>
                <!-- ./form-group -->
                <div class="form-group">
                    <dir class="col-sm-12">
                        <input id="inputGambar" name="gambar_inventaris" type="file">
                        </input>
                    </dir>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success" type="submit">
                            <i class="fa fa-paper-plane">
                            </i>
                            Tambahkan
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- ./box-body -->
    </div>
    <!-- ./box -->
</div>
<!-- ./col -->
