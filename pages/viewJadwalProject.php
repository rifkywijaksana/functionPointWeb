<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Jadwal Project</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
            		<table class='table table-border'>
              <tr><td>ID Project</td><td> :</td><td> <?=$_GET['idProject'];?></td></tr>
              <tr><td>Judul Project </td><td>: </td><td><?=$_GET['judulProject'];?></td></tr>
            </table>
<a href="?id=<?php echo urlencode(base64_encode(14)); ?>&idProject=<?php echo urlencode(base64_encode($_GET['idProject']));?>&judulProject=<?php echo urlencode(base64_encode($_GET['judulProject']));?>" class="btn btn-success" role="button"><i class="glyphicon glyphicon-plus"></i> Tambah Jadwal Kegiatan Project</a>
<table id="example" class="table table-striped table-bordered" cellspacing="0">
  <thead>
  <tr>
    <th>No</th>
    <th>Nama Kegiatan</th>
    <th>Tanggal Mulai</th>
    <th>Tanggal Selesai</th>
    <th>Status</th>
    <th>Aksi</th>
  </tr>
  </thead>
  <tfoot>
    <th>No</th>
    <th>Nama Kegiatan</th>
    <th>Tanggal Mulai</th>
    <th>Tanggal Selesai</th>
    <th>Status</th>
    <th>Aksi</th>
  </tfoot>
  <tbody>
  <?php
      $no=1;
      $query = " SELECT * FROM t_jadwalproject WHERE idProject='$_GET[idProject]' ORDER BY tanggalMulai ASC";
      $getData = mysqli_query($connection,$query) or die(mysqli_error($connection));
      while ($row = mysqli_fetch_array($getData))
      {
        ?>

        <tr>
          <td align="center"><?=$no?></td>
          <td><?=$row['namaKegiatan']?></td>
          <td align="center"><?=$row['tanggalMulai']?></td>
          <td align="center"><?=$row['tanggalSelesai']?></td>
          <?php
          $hariIni =  date("Y-m-d");
            if ($row['status']=="done")
            {

              ?>
                <td align="center" bgcolor="#00ce22"><strong><?=strtoupper($row['status'])?></strong></td>
              <?php

            }
            else 
            {
              ?>
                 <td valign="middle" align="center" bgcolor="#f6ff00"><strong><?=strtoupper($row['status'])?></strong></td>
              <?php
            }
          ?>
         
          <td align="center"><a href="?id=<?php echo urlencode(base64_encode(15)); ?>&idJadwalProject=<?php echo urlencode(base64_encode($row['idJadwalProject']));?>&idProject=<?php echo urlencode(base64_encode($_GET['idProject']));?>&judulProject=<?php echo urlencode(base64_encode($_GET['judulProject']));?>" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i> Edit</a>
              <a href="?id=<?php echo urlencode(base64_encode(16)); ?>&idProject=<?php echo urlencode(base64_encode($_GET['idProject']));?>&judulProject=<?php echo urlencode(base64_encode($_GET['judulProject']));?>" class="btn btn-danger" data-toggle="confirmation"><i class="glyphicon glyphicon-trash"></i>Delete</a></td>
        </tr>

        <?php
        $no++;

      }

  ?>
  </tbody>
</table>
            </div>
            </div>
            </div>
            </div>
          
