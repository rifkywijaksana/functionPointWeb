<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">View EVM</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-9">
            <table class='table table-border'>
              <tr><td>ID Project</td><td> :</td><td> <?=$_GET['idProject'];?></td></tr>
              <tr><td>Judul Project </td><td>: </td><td><?=$_GET['judulProject'];?></td></tr>
            </table>
            </div>
            </div>
             <div class="row">
            <div class="col-md-12">

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
         <div class="pull-right hidden-xs">
          <a href="?id=<?php echo urlencode(base64_encode(16)); ?>&idProject=<?php echo urlencode(base64_encode($_GET['idProject']));?>&judulProject=<?php echo urlencode(base64_encode($_GET['judulProject']));?>&week=<?php echo urlencode(base64_encode($row['week']));?>"><b>EDIT</b></a>
        </div>
      </h4>
    </div>
    <div id="collapse<?=$i?>" class="panel-collapse collapse">
      <div class="panel-body">
      <table class="table table-striped table-bordered" cellspacing="0" width="100%">
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
          ?>
      </table>
    
    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
      <tr>
        <th rowspan="4">
        Minggu Ke-
        </th>
        <th colspan="2">Analisa Varian</th>
        <th colspan="2">Analisa Kinerja</th>
        <th colspan="2">Analisa Estimasi</th>
      </tr>
      <tr>
        <th>Waktu</th>
        <th>Biaya</th>
        <th>Waktu</th>
        <th>Biaya</th>
        <th>Waktu</th>
        <th>Biaya</th>
      </tr>
      <tr>
        <th>SV</th>
        <th>CV</th>
        <th rowspan="2">SPI</th>
        <th rowspan="2">CPI</th>
        <th>ETC</th>
        <th>EAC</th>
      </tr>
      <tr>
        <th>(Rp)</th>
        <th>(Rp)</th>
        <th>(Hari)</th>
        <th>(Rp)</th>
      </tr>
    <?php
    



    $querry = "SELECT * FROM t_evm where week between 1 and $row[week] AND idProject='$_GET[idProject]'";
    $get = mysqli_query($connection,$querry) or die(mysqli_error($connection));

    while ($rows = mysqli_fetch_array($get))
       {
          echo "<tr>";
          echo "<td align='center'>$rows[week]</td>";
          echo "<td align='center'>".number_format($rows[sv], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
          echo "<td align='center'>".number_format($rows[cv], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
          echo "<td align='center'>".number_format($rows[spi], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
          echo "<td align='center'>".number_format($rows[cpi], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
          echo "<td align='center'>".number_format($rows[etc], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
          echo "<td align='right'>".number_format($rows[eac], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
          echo "</tr>";
       }
       echo "</table>";
       ?>
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