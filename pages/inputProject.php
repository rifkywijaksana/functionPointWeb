<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Input Project</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">

<form name="inputProject" method="POST">
	<div class="form-group">
		
				<label for="idProject">ID Project</label>
				
				<input type="text" name="idProject" class="form-control" required="required">
			
				<label for="judulProject">Judul Project</label>
				
				<input type="text" name="judulProject" class="form-control" required="required">
			
				<label for="pemilikProject">Pemilik Project</label>
				
				<input type="text" name="pemilikProject" class="form-control" required="required">
		
				<label for="platformProject">Platform Project</label>
				
				<input type="text" name="platformProject" class="form-control" required="required">
			
				<label for="descProject">Deskripsi Project</label>
				
				<textarea name="descProject" class="form-control" required="required"></textarea>
			
				<label for="tglMulai">Tanggal Mulai</label>
				
				<input type="text" name="tglMulai" class="datepicker form-control" required="required">
		
				<label for="tglSelesai">Tanggal Selesai</label>
				
				<input type="text" name="tglSelesai" class="form-control" required="required">
		
				<label for="manajerProject">Manajer Project/Team Leader</label>
				
				<input type="text" name="manajerProject" class="form-control" required="required">
			
				<label for="timProject">Tim Project</label>
				
				<textarea name="timProject" class="form-control" required="required"></textarea>
				<br>
				<input type="submit" name="simpanProject" class="form-control" required="required">
		
		
	</div>
</form>

<?php
	if(isset($_POST['simpanProject']))
	{
	$idProject			= $_POST['idProject'];
	$judulProject		= $_POST['judulProject'];
	$pemilikProject 	= $_POST['pemilikProject'];
	$platformProject 	= $_POST['platformProject'];
	$descProject 		= $_POST['descProject'];
	$tglMulai 			= $_POST['tglMulai'];
	$tglSelesai 		= $_POST['tglSelesai'];
	$manajerProject 	= $_POST['manajerProject'];
	$timProject 		= $_POST['timProject'];

	

	$query = "  INSERT INTO t_descproject
				VALUES('$idProject','$judulProject','$pemilikProject','$descProject','$platformProject',0,'$tglMulai','$tglSelesai','$manajerProject','$timProject',1)
			 ";
	$insert = mysqli_query($connection,$query) or die(mysqli_error($connection));
	if($insert)
	{
		echo "data telah masuk";
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
