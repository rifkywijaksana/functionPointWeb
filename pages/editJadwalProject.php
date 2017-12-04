<?php
$query = " SELECT * FROM t_jadwalproject WHERE idProject='$_GET[idProject]' AND idJadwalProject=$_GET[idJadwalProject] ORDER BY tanggalMulai ASC";
      $getData = mysqli_query($connection,$query) or die(mysqli_error($connection));
     $row = mysqli_fetch_array($getData);
?>
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
            <form method="Post" class="form-group">
              <label for="namaKegiatan">Nama Kegiatan</label>
              <input type="text" name="namaKegiatan" class="form-control" required="required" value="<?=$row['namaKegiatan']?>">
              <label for="namaKegiatan">Tanggal Mulai</label>
              <input type="text" name="tanggalMulai" class="form-control" required="required" value="<?=$row['tanggalMulai']?>">
              <label for="namaKegiatan">Tanggal Selesai</label>
              <input type="text" name="tanggalSelesai" class="form-control" required="required" value="<?=$row['tanggalSelesai']?>">
              <label for="namaKegiatan">Status</label>
              <select name="status" class="form-control" required="required">
                <option value="onProgress" <?php if($row['status'] == "onProgress" ) echo "selected=selected"; ?> >On Progress</option>
                <option value="done" <?php if($row['status'] == "done" ) echo "selected=selected"; ?> >Done</option>
              </select>
              <input type="submit" name="submit" class="form-control">
            </form>
            </div>
            </div>
            </div>
            </div>

<?php
if (isset($_POST['submit']))
{


$query = "  UPDATE t_jadwalProject SET namaKegiatan='$_POST[namaKegiatan]' ,tanggalMulai='$_POST[tanggalMulai]' ,tanggalSelesai='$_POST[tanggalSelesai]' ,status='$_POST[status]' WHERE idJadwalProject=$_GET[idJadwalProject]";
    $insert = mysqli_query($connection,$query) or die(mysqli_error($connection));
    if ($insert)
    {
      echo "Data telah Berhasil Diupdate.  ";
      ?>
      <a href="?id=<?php echo urlencode(base64_encode(13)); ?>&idProject=<?php echo urlencode(base64_encode($_GET['idProject']));?>&judulProject=<?php echo urlencode(base64_encode($_GET['judulProject']));?>" > Kembali Ke Daftar Jadwal</a>
      <?php
    }
    else
    {
      echo "gagal input data";
    }
  }
?>