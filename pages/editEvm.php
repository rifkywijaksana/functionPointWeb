<?php
$query = " SELECT * FROM t_evm WHERE idProject='$_GET[idProject]' AND week=$_GET[week]";
      $getData = mysqli_query($connection,$query) or die(mysqli_error($connection));
     $row = mysqli_fetch_array($getData);
?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Input EVM, ID Project : <?=$_GET['idProject'];?>
	Judul Project : <?=$_GET['judulProject'];?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
<form name="inputEvm" method="POST">
	<label for="bac">Budgeted At Cost (BAC)</label>
	<input type="text" name="bac" onkeypress="return numberInput(event)" class="form-control" value="<?=$row['bac']?>"></td></tr>
	<label for="pv">Planned Value (PV) %</label>
	<input type="text" name="pv" onkeypress="return numberInput(event)" required="required" class="form-control"  value="<?=$row['pv']*100/$row['bac']?>"></td></tr>
	<label for="ev">Earned Value (EV) %</label>
	<input type="text" name="ev" onkeypress="return numberInput(event)" required="required" class="form-control"  value="<?=$row['ev']*100/$row['bac']?>"></td></tr>
	<label for="ac">Actual Cost (AC) </label>
	<input type="text" name="ac" onkeypress="return numberInput(event)" required="required" class="form-control"  value="<?=$row['ac']?>"></td></tr>
	<label for="week">Minggu Ke </label>
	<input type="text" name="week" onkeypress="return numberInput(event)" required="required" class="form-control" readonly="readonly" value="<?=$row['week']?>"></td></tr>
	<input type="submit" name="submit" class="form-control">
</form>

<?php
	if(isset($_POST['submit']))
	{

		$queryDurasi = " Select DATEDIFF(tanggalSelesaiProject,tanggalMulaiProject)+1 as durasi
						 from t_descproject
						 WHERE idProject='$_GET[idProject]'
			 ";
		$SelectDurasi = mysqli_query($connection,$queryDurasi) or die(mysqli_error($connection));
		$rowDurasi = mysqli_fetch_array($SelectDurasi);
		
		$week = $_POST['week'];
		$bac=$_POST['bac'];
		$ev=$_POST['ev']/100*$bac;
		$pv=$_POST['pv']/100*$bac;
		$ac=$_POST['ac'];
		

		$sv=$ev - $pv;
		$cv=$ev - $ac;

		$spi=$ev/$pv;
		$cpi=$ev/$ac;

		$eac=$bac/$cpi;
		$etc=$rowDurasi['durasi'] /$spi;

		$tcpi=($bac-$ev)/($bac-$ac);
		$tcpi2=($bac-$ev)/($eac-$ac);
		echo "<table class='table table-border'>";
		echo "<tr><td>Cost Variance (CV) </td><td>=</td><td> $ev - $ac</td><td>=</td><td>$cv </td></tr>";
		echo "<tr><td>Schedule Variance (SV) </td><td>=</td><td> $ev - $pv</td><td>=</td><td>$sv </td></tr>";
		echo "<tr><td>Schedule Performance Index (SPI) </td><td>=</td><td> $ev / $pv</td><td>=</td><td>$spi </td></tr>";
		echo "<tr><td>Cost Performance Index (CPI) </td><td>= </td><td>$ev / $ac</td><td>=</td><td>$cpi </td></tr>";
		echo "<tr><td>Estimate to Complete (ETC) </td><td>=</td><td> $rowDurasi[durasi] / $spi</td><td>=</td><td>$etc </td></tr>";
		echo "<tr><td>Estimate at Completion (EAC) </td><td>=</td><td> $bac / $cpi</td><td>=</td><td>$eac </td></tr>";
		echo "</table>";

		$query = "  UPDATE t_evm set ev=$ev,pv=$pv,ac=$ac,bac=$bac,sv=$sv,cv=$cv,spi=$spi,cpi=$cpi,eac=$eac,etc=$etc,tcpi=$tcpi,tcpi2=$tcpi2
				       where idProject='$_GET[idProject]' AND week=$week";
		$insert = mysqli_query($connection,$query) or die(mysqli_error($connection));
		
		
		if($insert)
		{
			echo "Data EVM Untuk Id Project $_GET[idProject] Minggu ke-$week telah diupdate";
		}
		else
		{
			"gagal";
		}
		
	}
?>
</div>
</div>
</div>
</div>