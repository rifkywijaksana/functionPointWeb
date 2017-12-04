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
              <input type="text" name="namaKegiatan" class="form-control" required="required">
              <label for="namaKegiatan">Tanggal Mulai</label>
              <input type="text" name="tanggalMulai" class="form-control" required="required">
              <label for="namaKegiatan">Tanggal Selesai</label>
              <input type="text" name="tanggalSelesai" class="form-control" required="required">

              <!-- 
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control"  data-provide="datepicker"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                 <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker1').datetimepicker();
                    });
                </script>
              -->
              <label for="namaKegiatan">Status</label>
              <select name="status" class="form-control" required="required">
                <option value="onProgress">On Progress</option>
                <option value="done">Done</option>
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


$query = "  INSERT INTO t_jadwalProject (idProject,namaKegiatan,tanggalMulai,tanggalSelesai,status)
               VALUES('$_GET[idProject]','$_POST[namaKegiatan]','$_POST[tanggalMulai]','$_POST[tanggalSelesai]','$_POST[status]')
       ";
    $insert = mysqli_query($connection,$query) or die(mysqli_error($connection));
    if ($insert)
    {
      echo "Data telah Berhasil Dimasukan.  ";
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