<!-- daftar agenda -->
<div class="col-md-4">
  <div class="box box-solid">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?> 
    <div class="box-header with-border">
      <i class="fa fa-calendar"></i>
      <h3 class="box-title"><?php echo $judul; ?></h3>
  <?php if ($id_rj==$this->session->userdata('id_rj')) { ?>
      <a href="<?php echo site_url('agenda/hapus_action/'.$id_agenda);?>" class="pull-right btn-box-tool" onclick="javasciprt: return confirm('Anda Yakin?')"><i class="fa fa-times"></i></a>
      <a href="<?php echo site_url('agenda/ubah_form/'.$id_agenda);?>" class="pull-right btn-box-tool"><i class="fa fa-pencil"></i></a>
  <?php } ?>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <dl class="dl-horizontal" style="margin-left: -130px;">
        <dt><i class="fa fa-calendar"></i></dt>
        <dd><b><?php 
          $data = date_create($start);
          echo date_format($data,"d-M-Y"); ?></b> s/d <b>
          <?php 
            $data = date_create($end);
            echo date_format($data,"d-M-Y");?></b></dd>       
        <br>
        <dt><i class="fa fa-map-pin"></i></dt>
        <dd><?php echo $lokasi; ?></dd>
        <br>
        <dt><i class="fa fa-align-left"></i></dt>
        <dd><?php echo $description; ?></dd>
        <br>
        <dt><i class="fa  fa-balance-scale"></i></dt>
        <dd><?php echo $status_agenda; ?></dd>
      </dl>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<!-- /.col -->