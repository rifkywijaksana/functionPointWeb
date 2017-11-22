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
            <div class="col-md-6">
            <table class='table table-border'>
              <tr><td>ID Project</td><td> :</td><td> <?=$_GET['idProject'];?></td></tr>
              <tr><td>Judul Project </td><td>: </td><td><?=$_GET['judulProject'];?></td></tr>
            </table>

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