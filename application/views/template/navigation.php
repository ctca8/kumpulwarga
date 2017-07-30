<div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/gambar/profil/'.$this->session->userdata('photo'));?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $this->session->userdata('nama_pdk')?></h3>
              <!-- menampilkan jabatan -->
              <p class="text-muted text-center"><?php 
              if ($this->session->userdata('status_jabatan')=="aktif") {
                if ($this->session->userdata('jabatan')=="1") {
                  echo "Ketua RT";
                } elseif ($this->session->userdata('jabatan')=="2") {
                  echo "Ketua RW";
                } elseif ($this->session->userdata('jabatan')=="3") {
                  echo "Kepala Desa";
                }
              } else {
                echo "Warga Biasa";
              }
              ?></p>
              <!-- menampilkan alamat -->
              <p class="text-muted text-center"><?php echo ucwords($this->session->userdata('dusun')); ?> RT <?php echo ucwords($this->session->userdata('rt')); ?>/<?php echo ucwords($this->session->userdata('rw')); ?>, <?php echo ucwords($this->session->userdata('kelurahan')); ?></p>

              <ul class="nav nav-pills nav-stacked">
                <li class="<?php if($title == "warga"){echo "active";}?>"><a href="<?php echo site_url('warga') ?>"><i class="fa fa-users"></i> Warga</a></li>
                <li class="<?php if($title == "pengumuman"){echo "active";}?>"><a href="<?php echo site_url('pengumuman') ?>"><i class="fa fa-bullhorn"></i> Pengumuman</a></li>
                <li class="<?php if($title == "agenda"){echo "active";}?>"><a href="<?php echo site_url('agenda') ?>"><i class="fa fa-calendar"></i> Agenda</a></li>
                <li class="<?php if($title == "inventaris"){echo "active";}?>"><a href="<?php echo site_url('inventaris') ?>"><i class="fa fa-tasks"></i> Inventaris</a></li>
                <li class="<?php if($title == "keuangan"){echo "active";}?>"><a href="<?php echo site_url('keuangan') ?>"><i class="fa fa-money"></i> Informasi Kas</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
               <a href="<?php echo site_url('auth/logout');?>" class="btn btn-danger btn-block"><i class="fa fa-sign-out"></i><b> Logout</b></a>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->