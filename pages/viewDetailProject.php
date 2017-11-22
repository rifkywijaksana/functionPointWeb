<?php
      $query = " SELECT * FROM t_descproject where idProject='$_GET[idProject]'";
      $getData = mysqli_query($connection,$query) or die(mysqli_error($connection));
      $row = mysqli_fetch_array($getData);
?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Detail Project</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
            <table class='table table-border'>
              <tr><td>ID Project</td><td> :</td><td> <?=$row['idProject'];?></td></tr>
              <tr><td>Judul Project </td><td>: </td><td><?=$row['judulProject'];?></td></tr>
              <tr><td>Pemilik Project </td><td>: </td><td><?=$row['pemilikProject'];?></td></tr>
              <tr><td>Deskripsi Project </td><td>: </td><td><?=$row['descProject'];?></td></tr>
              <tr><td>Platform Project </td><td>: </td><td><?=$row['platformProject'];?></td></tr>
              <tr><td>Tanggal Mulai Project </td><td>: </td><td><?=$row['tanggalMulaiProject'];?></td></tr>
              <tr><td>Tanggal Selesai Project </td><td>: </td><td><?=$row['tanggalSelesaiProject'];?></td></tr>
              <tr><td>Manajer Project </td><td>: </td><td><?=$row['manajerProject'];?></td></tr>
              <tr><td>Tim Project </td><td>: </td><td><?=$row['timProject'];?></td></tr>
              <tr><td>Nilai Function Point </td><td>: </td><td><strong><?=$row['functionPoint'];?></strong></td></tr>
            </table>
            </div>
          </div>
        </div>
</div>

<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Function Point</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-9 center">
<?php
    $query2 = " SELECT * FROM t_karakteristik where idProject='$_GET[idProject]'";
    $query = " SELECT * FROM t_levelkompleksitas  where idProject='$_GET[idProject]' ";
        $getData = mysqli_query($connection,$query) or die(mysqli_error($connection));
        $getData2 = mysqli_query($connection,$query2) or die(mysqli_error($connection));
        $row = mysqli_fetch_array($getData);
        $row2 = mysqli_fetch_array($getData2);
?>

<table  class="table table-border">
      <tr>
        <th rowspan="2" align="center">Tipe Komponen</th>
        <th colspan="3" align="center">Level Kompleksitas</th>
      </tr>
      <tr>
        <th align="center">Sederhana</th>
        <th align="center">Menengah</th>
        <th align="center">Kompleks</th>
      </tr>
      
        <tr>
          <td><strong>Tipe Input</strong></td>
          <td align="center"><strong><?=$row['simpleInput'] ?></strong></td>
          <td align="center"><strong><?=$row['mediumInput'] ?></strong></td>
          <td align="center"><strong><?=$row['kompleksInput'] ?></strong></td>
        </tr>
        <tr>
          <td><strong>Tipe Output</strong></td>
          <td align="center"><strong><?=$row['simpleOutput'] ?></strong></td>
          <td align="center"><strong><?=$row['mediumOutput'] ?></strong></td>
          <td align="center"><strong><?=$row['kompleksOutput'] ?></strong></td>
        </tr>
        <tr>
          <td><strong>Tipe Query/Seach/View</strong></td>
          <td align="center"><strong><?=$row['simpleQuery'] ?></strong></td>
          <td align="center"><strong><?=$row['mediumQuery'] ?></strong></td>
          <td align="center"><strong><?=$row['kompleksQuery'] ?></strong></td>
        </tr>
        <tr>
          <td><strong>Tipe File/Table/Database</strong></td>
          <td align="center"><strong><?=$row['simpleFile'] ?></strong></td>
          <td align="center"><strong><?=$row['mediumFile'] ?></strong></td>
          <td align="center"><strong><?=$row['kompleksFile'] ?></strong></td>
        </tr>
        <tr>
          <td><strong>Tipe Interface External</strong></td>
          <td align="center"><strong><?=$row['simpleInterface'] ?></strong></td>
          <td align="center"><strong><?=$row['mediumInterface'] ?></strong></td>
          <td align="center"><strong><?=$row['kompleksInterface'] ?></strong></td>
        </tr>
      
    </table>
   <table  class="table table-border">
      
        <tr>
          <th align="center">No</th>
          <th align="center">Karakteristik</th>
          <th align="center">Bobot [0-5]</th>
        </tr>
      
        <tr>
          <td>1.</td>
          <td>Tingkat Kompleksitas Komunikasi Data</td>
          <td align="center"><strong><?=$row2['Q1'] ?></strong></td>
        </tr>
        <tr>
          <td>2.</td>
          <td>Tingkat Kompleksitas Pemrosesan Terdistribusi</td>
          <td align="center"><strong><?=$row2['Q2'] ?></strong></td>
        </tr>
        <tr>
          <td>3.</td>
          <td>Tingkat Kompleksitas Performance</td>
          <td align="center"><strong><?=$row2['Q3'] ?></strong></td>
        </tr>
        <tr>
          <td>4.</td>
          <td>Tingkat Kompleksitas Konfigurasi</td>
          <td align="center"><strong><?=$row2['Q4'] ?></strong></td>
        </tr>
        <tr>
          <td>5.</td>
          <td>Tingkat Frekuensi Penggunaan Software</td>
          <td align="center"><strong><?=$row2['Q5'] ?></strong></td>
        </tr>
        <tr>
          <td>6.</td>
          <td>Tingkat Frekuensi Input Data</td>
          <td align="center"><strong><?=$row2['Q6'] ?></strong></td>
        </tr>
        <tr>
          <td>7.</td>
          <td>Tingkat Kemudahan Penggunaan Bagi User</td>
          <td align="center"><strong><?=$row2['Q7'] ?></strong></td>
        </tr>
        <tr>
          <td>8.</td>
          <td>Tingkat Frekuensi Update Data</td>
          <td align="center"><strong><?=$row2['Q8'] ?></strong></td>
        </tr>
        <tr>
          <td>9.</td>
          <td>Tingkat Kompleksitas Prosesing Data</td>
          <td align="center"><strong><?=$row2['Q9'] ?></strong></td>
        </tr>
        <tr>
          <td>10.</td>
          <td>Tingkat Kemungkinan Penggunaan Kembali/Reusable Kode Program</td>
          <td align="center"><strong><?=$row2['Q10'] ?></strong></td>
        </tr>
        <tr>
          <td>11.</td>
          <td>Tingkat Kemudahan Dalam Instalasi</td>
          <td align="center"><strong><?=$row2['Q11'] ?></strong></td>
        </tr>
        <tr>
          <td>12.</td>
          <td>Tingkat Kemudahan Oeperasional Software (Backup/Recovery/dll)</td>
          <td align="center"><strong><?=$row2['Q12'] ?></strong></td>
        </tr>
        <tr>
          <td>13.</td>
          <td>Tingkat Software Dibuat untuk Multi Organisasi/Perusahaan/Client</td>
          <td align="center"><strong><?=$row2['Q13'] ?></strong></td>
        </tr>
        <tr>
          <td>14.</td>
          <td>Tingkat Kompleksitas Dalam Perubahan/Fleksibel</td>
          <td align="center"><strong><?=$row2['Q14'] ?></strong></td>
        </tr>
      
    </table>
  </div>
  </div>
  </div>
</div>

<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">EVM</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">

<?php

      $i=1;
      $query = " SELECT * FROM t_evm where idProject='$_GET[idProject]' ";
      $getData = mysqli_query($connection,$query) or die(mysqli_error($connection));
      
        ?>
<div class="panel-group" id="accordion">
<?php
while ($row = mysqli_fetch_array($getData))
      {
?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i?>">
        Minggu Ke-<?=$row['week']?></a>
      </h4>
    </div>
    <div id="collapse<?=$i?>" class="panel-collapse collapse">
      <div class="panel-body">
      <table class='table table-border'>
           <?php
          echo "<tr><td>Anggaran Total Proyek (BAC)</td><td>=</td><td align=right> <strong>".number_format($row[bac], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</strong></td></tr>";
          echo "<tr><td>Earned Value (EV)</td><td>=</td><td align=right > <strong>".number_format($row[ev], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</strong></td></tr>";
          echo "<tr><td>Planned Value (PV) </td><td>=</td><td align=right> <strong>".number_format($row[pv], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)." </td></tr>";
          echo "<tr><td>Schedule Variance (SV) </td><td>=</td><td align=right> <strong>".number_format($row[sv], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)." </td></tr>";
          echo "<tr><td>Cost Variance (CV) </td><td>=</td><td align=right> <strong>".number_format($row[cv], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)." </td></tr>";
          echo "<tr><td>Schedule Performance Index (SPI) </td><td>=</td><td align=right><strong>".number_format($row[spi], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)." </td></tr>";
          echo "<tr><td>Cost Performance Index (CPI) </td><td>= </td><td align=right><strong>".number_format($row[cpi], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)." </td></tr>";
          echo "<tr><td>Estimate at Completion (EAC) </td><td>=</td><td align=right><strong>".number_format($row[eac], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)." </td></tr>";
          echo "<tr><td>Estimate to Complete (ETC) </td><td>=</td><td align=right> <strong>".number_format($row[etc], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)." </td></tr>";
          echo "<tr><td>To-Complete Performance Index (TCPI) (Under Budget) </td><td>=</td><td align=right><strong>".number_format($row[tcpi], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)." </td></tr>";
          echo "<tr><td>To-Complete Performance Index (TCPI) (Over Budget) </td><td>=</td><td align=right><strong>".number_format($row[tcpi2], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)." </td></tr>";
          ?>
      </table>
      </div>
    </div>
  </div>
  <?php
    $i++;
    }
  ?>
</div>
    </div>
</div>
</div>
</div>


