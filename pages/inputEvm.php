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
	<input type="text" name="bac" onkeypress="return numberInput(event)" class="form-control" ></td></tr>
	<label for="pv">Planned Value (PV) %</label>
	<input type="text" name="pv" onkeypress="return numberInput(event)" required="required" class="form-control" placeholder="% Prograss Rencana"></td></tr>
	<label for="ev">Earned Value (EV) %</label>
	<input type="text" name="ev" onkeypress="return numberInput(event)" required="required" class="form-control" placeholder="% Prograss Actual" ></td></tr>
	<label for="ac">Actual Cost (AC) </label>
	<input type="text" name="ac" onkeypress="return numberInput(event)" required="required" class="form-control" ></td></tr>
	<label for="week">Minggu Ke </label>
	<input type="text" name="week" onkeypress="return numberInput(event)" required="required" class="form-control" ></td></tr>
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
		echo "<table class='table table-border'>";

		$query = "  INSERT INTO t_evm (idProject,ev,pv,ac,bac,sv,cv,spi,cpi,eac,etc,tcpi,tcpi2,week,idUser)
				       VALUES('$_GET[idProject]',$ev,$pv,$ac,$bac,$sv,$cv,$spi,$cpi,$eac,$etc,$tcpi,$tcpi2,$week,1)
			 ";
		$insert = mysqli_query($connection,$query) or die(mysqli_error($connection));
		?>
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
		



		$querry = "SELECT * FROM t_evm where week between 1 and $week AND idProject='$_GET[idProject]'";
		$get = mysqli_query($connection,$querry) or die(mysqli_error($connection));

		while ($rows = mysqli_fetch_array($get))
     	 {
     	 		echo "<tr>";
     	 		echo "<td>$rows[week]</td>";
     	 		echo "<td>".number_format($rows[sv], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
     	 		echo "<td>".number_format($rows[cv], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
     	 		echo "<td>".number_format($rows[spi], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
     	 		echo "<td>".number_format($rows[cpi], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
     	 		echo "<td>".number_format($rows[etc], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
     	 		echo "<td>".number_format($rows[eac], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."</td>";
     	 		echo "</tr>";
     	 }
     	 echo "</table>";
		
		if($insert)
		{
			echo "Data EVM Untuk Id Project $_GET[idProject] Minggu ke-$week telah disimpan";
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