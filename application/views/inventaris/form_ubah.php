<!-- form tambah Inventaris -->
<div class="col-md-3">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">
                Ubah Kondisi Inventaris
            </h3>
        </div>
        <div class="box-body">
            <img class="img-responsive" src="<?php echo base_url('assets/gambar/inventaris/'.$gambar_inventaris);?>" alt="Photo"><br>
            <form action="<?php echo $action; ?>" class="form-horizontal" enctype="multipart/form-data" method="post">
                <input type="hidden" name="id_inventaris" value="<?php echo $id_inventaris; ?>"/>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label>
                            Nama Inventaris
                        </label>
                        <input class="form-control" id="inputJudul" name="nama_inventaris" placeholder="Nama Inventaris" type="text" value="<?php echo $nama_inventaris; ?>" disabled>
                        </input>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label>
                            Deskripsi Inventaris
                        </label>
                        <textarea class="form-control" id="inputDeskripsi" name="deskripsi_inventaris" placeholder="Deskripsi inventaris..."><?php echo $deskripsi_inventaris; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label>
                            Jumlah Inventaris
                        </label>
                        <input class="form-control" id="inputJudul" name="jumlah_inventaris" placeholder="Jumlah" type="number" value="<?php echo $jumlah_inventaris; ?>">
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
                        <label>
                            Biaya Pinjam
                        </label>
                        <span class="info-box-number" id="nominal">
                        </span>
                        <input class="form-control" id="nominal" name="biaya_pinjam" onkeyup="document.getElementById('nominal').innerHTML = formatCurrency(this.value);" placeholder="Biaya Pinjam" type="number" value="<?php echo $biaya_pinjam; ?>" />
                    </div>
                </div>
                <!-- ./form-group -->
                <div class="form-group">
                    <div class="col-sm-12">
                        <label>
                            Biaya Denda
                        </label>
                        <span class="info-box-number" id="nominal">
                        </span>
                        <input class="form-control" id="nominal" name="biaya_denda" onkeyup="document.getElementById('nominal').innerHTML = formatCurrency(this.value);" placeholder="Biaya Pinjam" type="number" value="<?php echo $biaya_denda; ?>" />
                    </div>
                </div>
                <!-- ./form-group -->
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success" type="submit">
                            <i class="fa fa-paper-plane">
                            </i>
                            Ubah Kondisi
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