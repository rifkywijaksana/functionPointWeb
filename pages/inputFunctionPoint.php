<?php
	if(isset($_POST['submit']))
	{
		$totalInput 	= $_POST['simpleInput']*3 + $_POST['mediumInput']*4 + $_POST['kompleksInput']*6;
		$totalOutput 	= $_POST['simpleOutput']*4 + $_POST['mediumOutput']*5 + $_POST['kompleksOutput']*7;
		$totalQuery 	= $_POST['simpleQuery']*3 + $_POST['mediumQuery']*4 + $_POST['kompleksQuery']*6;
		$totalFile 		= $_POST['simpleFile']*7 + $_POST['mediumFile']*10 + $_POST['kompleksFile']*15;
		$totalInterface = $_POST['simpleInteface']*6 + $_POST['mediumInterface']*7 + $_POST['kompleksInterface']*10;
		$totalCfp 		= $totalInput + $totalOutput + $totalQuery + $totalFile + $totalInterface;

		$rcaf			= $_POST['c1'] + $_POST['c2'] + $_POST['c3'] + $_POST['c4'] + $_POST['c5'] + $_POST['c6'] + $_POST['c7'] + $_POST['c8'] + $_POST['c9'] + $_POST['c10'] + $_POST['c11'] + $_POST['c12'] + $_POST['c13'] + $_POST['c14'] ;

		
		$fp				= $totalCfp * (0.65 + 0.01 * $rcaf);

		echo "Total CFP            =".$totalCfp;
		echo "<br>";
		echo "Total RCAF 		   =".$rcaf;
		echo "<br>";
		echo "<font color='red'>Total Function Point =".$fp."</font>";
		$query = "INSERT INTO t_levelkompleksitas (idProject,simpleInput,simpleOutput,simpleQuery,simpleFile,simpleInterface,mediumInput,mediumOutput,mediumQuery,mediumFile,mediumInterface,kompleksInput,kompleksOutput,kompleksQuery,kompleksFile,kompleksInterface,idUser)
		VALUES ('$_GET[idProject]',$_POST[simpleInput],$_POST[simpleOutput],$_POST[simpleQuery],$_POST[simpleFile],$_POST[simpleInteface],$_POST[mediumInput],$_POST[mediumOutput],$_POST[mediumQuery],$_POST[mediumFile],$_POST[mediumInterface],$_POST[kompleksInput],$_POST[kompleksOutput],$_POST[kompleksQuery],$_POST[kompleksFile],$_POST[kompleksInterface],1)";

		$query2 = "INSERT INTO t_karakteristik (idProject,Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,Q9,Q10,Q11,Q12,Q13,Q14,idUser)
					VALUES ($_GET[idProject],$_POST[c1],$_POST[c2],$_POST[c3],$_POST[c4],$_POST[c5],$_POST[c6],$_POST[c7],$_POST[c8],$_POST[c9],$_POST[c10],$_POST[c11],$_POST[c12],$_POST[c13],$_POST[c14],1)";
		$query3 = "UPDATE t_descproject set functionPoint=$fp where idProject=$_GET[idProject]";
		$insert = mysqli_query($connection,$query) or die(mysqli_error($connection));
		$insert2 = mysqli_query($connection,$query2) or die(mysqli_error($connection));
		$insert3 = mysqli_query($connection,$query3) or die(mysqli_error($connection));
		
		if($insert && $insert2 && $insert3)
		{
			echo "data telah masuk";
		}
		else
		{
			"gagal";
		}
	}
	else
	{
		
?>
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Input Function Point</h3>

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


	

	<form method="POST">
		<center>
		<table  class="table table-striped">
			<thead class="thead-inverse">
			<tr>
				<th rowspan="2" align="center">Tipe Komponen</th>
				<th colspan="3" align="center">Level Kompleksitas</th>
			</tr>
			<tr>
				<th align="center">Sederhana</th>
				<th align="center">Menengah</th>
				<th align="center">Kompleks</th>
			</tr>
			</thead>
			<tbody>
				<tr>
					<td>Tipe Input</td>
					<td><input class="form-control"  type="text" name="simpleInput" placeholder="Simple Input Value" onkeypress="return numberInput(event)" required="required" style="text-align:right"></td>
					<td><input class="form-control"  type="text" name="mediumInput" placeholder="Medium Input Value" onkeypress="return numberInput(event)" required="required" style="text-align:right"></td>
					<td><input class="form-control"  type="text" name="kompleksInput" placeholder="Kompleks Input Value" onkeypress="return numberInput(event)" required="required" style="text-align:right"></td>
				</tr>
				<tr>
					<td>Tipe Output</td>
					<td><input class="form-control"  type="text" name="simpleOutput" placeholder="Simple Output Value" onkeypress="return numberInput(event)" required="required" style="text-align:right"></td>
					<td><input class="form-control"  type="text" name="mediumOutput" placeholder="Medium Output Value" onkeypress="return numberInput(event)" required="required" style="text-align:right"></td>
					<td><input class="form-control"  type="text" name="kompleksOutput" placeholder="Kompleks Output Value" onkeypress="return numberInput(event)" required="required" style="text-align:right"></td>
				</tr>
				<tr>
					<td>Tipe Query/Seach/View</td>
					<td><input class="form-control"  type="text" name="simpleQuery" placeholder="Simple Query Value" onkeypress="return numberInput(event)" required="required" style="text-align:right"></td>
					<td><input class="form-control"  type="text" name="mediumQuery" placeholder="Medium Query Value" onkeypress="return numberInput(event)" required="required" style="text-align:right"></td>
					<td><input class="form-control"  type="text" name="kompleksQuery" placeholder="Kompleks Query Value" onkeypress="return numberInput(event)" required="required" style="text-align:right"></td>
				</tr>
				<tr>
					<td>Tipe File/Table/Database</td>
					<td><input class="form-control"  type="text" name="simpleFile" placeholder="Simple File Value" onkeypress="return numberInput(event)" required="required" style="text-align:right"></td>
					<td><input class="form-control"  type="text" name="mediumFile" placeholder="Medium File Value" onkeypress="return numberInput(event)" required="required" style="text-align:right"></td>
					<td><input class="form-control"  type="text" name="kompleksFile" placeholder="Kompleks File Value" onkeypress="return numberInput(event)" required="required" style="text-align:right"></td>
				</tr>
				<tr>
					<td>Tipe Interface External</td>
					<td><input class="form-control"  type="text" name="simpleInteface" placeholder="Simple Interface Value" onkeypress="return numberInput(event)" required="required" style="text-align:right"></td>
					<td><input class="form-control"  type="text" name="mediumInterface" placeholder="Medium Interface Value" onkeypress="return numberInput(event)" required="required" style="text-align:right"></td>
					<td><input class="form-control"  type="text" name="kompleksInterface" placeholder="Kompleks Interface Value" onkeypress="return numberInput(event)" required="required" style="text-align:right"></td>
				</tr>
			</tbody>
		</table>
		</center>
		<table  class="table table-striped">
			<thead class="thead-inverse">
				<tr>
					<th align="center">No</th>
					<th align="center">Karakteristik</th>
					<th align="center">Bobot [0-5]</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1.</td>
					<td>Tingkat Kompleksitas Komunikasi Data</td>
					<td><input class="form-control"  type="text" name="c1" placeholder="Input Value" onkeypress="return numberInput2(event)" required="required" maxlength="1" style="text-align:right"></td>
				</tr>
				<tr>
					<td>2.</td>
					<td>Tingkat Kompleksitas Pemrosesan Terdistribusi</td>
					<td><input class="form-control"  type="text" name="c2" placeholder="Input Value" onkeypress="return numberInput2(event)" required="required" maxlength="1" style="text-align:right"></td>
				</tr>
				<tr>
					<td>3.</td>
					<td>Tingkat Kompleksitas Performance</td>
					<td><input class="form-control"  type="text" name="c3" placeholder="Input Value" onkeypress="return numberInput2(event)" required="required" maxlength="1" style="text-align:right"></td>
				</tr>
				<tr>
					<td>4.</td>
					<td>Tingkat Kompleksitas Konfigurasi</td>
					<td><input class="form-control"  type="text" name="c4" placeholder="Input Value" onkeypress="return numberInput2(event)" required="required" maxlength="1" style="text-align:right"></td>
				</tr>
				<tr>
					<td>5.</td>
					<td>Tingkat Frekuensi Penggunaan Software</td>
					<td><input class="form-control"  type="text" name="c5" placeholder="Input Value" onkeypress="return numberInput2(event)" required="required" maxlength="1" style="text-align:right"></td>
				</tr>
				<tr>
					<td>6.</td>
					<td>Tingkat Frekuensi Input Data</td>
					<td><input class="form-control"  type="text" name="c6" placeholder="Input Value" onkeypress="return numberInput2(event)" required="required" maxlength="1" style="text-align:right"></td>
				</tr>
				<tr>
					<td>7.</td>
					<td>Tingkat Kemudahan Penggunaan Bagi User</td>
					<td><input class="form-control"  type="text" name="c7" placeholder="Input Value" onkeypress="return numberInput2(event)" required="required" maxlength="1" style="text-align:right"></td>
				</tr>
				<tr>
					<td>8.</td>
					<td>Tingkat Frekuensi Update Data</td>
					<td><input class="form-control"  type="text" name="c8" placeholder="Input Value" onkeypress="return numberInput2(event)" required="required" maxlength="1" style="text-align:right"></td>
				</tr>
				<tr>
					<td>9.</td>
					<td>Tingkat Kompleksitas Prosesing Data</td>
					<td><input class="form-control"  type="text" name="c9" placeholder="Input Value" onkeypress="return numberInput2(event)" required="required" maxlength="1" style="text-align:right"></td>
				</tr>
				<tr>
					<td>10.</td>
					<td>Tingkat Kemungkinan Penggunaan Kembali/Reusable Kode Program</td>
					<td><input class="form-control"  type="text" name="c10" placeholder="Input Value" onkeypress="return numberInput2(event)" required="required" maxlength="1" style="text-align:right"></td>
				</tr>
				<tr>
					<td>11.</td>
					<td>Tingkat Kemudahan Dalam Instalasi</td>
					<td><input class="form-control"  type="text" name="c11" placeholder="Input Value" onkeypress="return numberInput2(event)" required="required" maxlength="1" style="text-align:right"></td>
				</tr>
				<tr>
					<td>12.</td>
					<td>Tingkat Kemudahan Oeperasional Software (Backup/Recovery/dll)</td>
					<td><input class="form-control"  type="text" name="c12" placeholder="Input Value" onkeypress="return numberInput2(event)" required="required" maxlength="1" style="text-align:right"></td>
				</tr>
				<tr>
					<td>13.</td>
					<td>Tingkat Software Dibuat untuk Multi Organisasi/Perusahaan/Client</td>
					<td><input class="form-control"  type="text" name="c13" placeholder="Input Value" onkeypress="return numberInput2(event)" required="required" maxlength="1" style="text-align:right"></td>
				</tr>
				<tr>
					<td>14.</td>
					<td>Tingkat Kompleksitas Dalam Perubahan/Fleksibel</td>
					<td><input class="form-control"  type="text" name="c14" placeholder="Input Value" onkeypress="return numberInput2(event)" required="required" maxlength="1" style="text-align:right"></td>
				</tr>
			</tbody>
		</table>
		<input class="form-control"  type="submit" name="submit">	
	</form>
<?php } ?>
</div>
            </div>
            </div></div>
