<section class="content-header">
      <h1>
        View All Project
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View All Project</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="table-responsive">
    <form name="detailProject" method="POST">
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead class="header">
      <tr>
        <th rowspan="2" valign="middle">No</th>
        <th rowspan="2" valign="middle">ID</th>
        <th rowspan="2" valign="middle" width="200px">Judul</th>
        <th rowspan="2" valign="middle">Jadwal</th>
        <th rowspan="2" valign="middle">%</th>
        <th valign="middle" colspan="2">Function Point</th>
        <th rowspan="2" valign="middle">EVM</th>
        <th rowspan="2" valign="middle">Action</th>
      </tr>
      <tr>
        <th valign="middle">Nilai</th>
        <th valign="middle">Action</th>
      </tr>
      </thead>
      <tbody class="body">
    <?php
      $no=1;
      $query = " SELECT * FROM t_descproject ";
      $getData = mysqli_query($connection,$query) or die(mysqli_error($connection));
      while ($row = mysqli_fetch_array($getData))
      { 

        $sql = "SELECT SUM(IF(STATUS='done',1,0))/COUNT(*) persentase FROM t_jadwalproject WHERE idProject='$row[idProject]'";
        $getData2 = mysqli_query($connection,$sql) or die(mysqli_error($connection));
        $rows = mysqli_fetch_array($getData2);
        ?>
          <tr>
            <td align="center" valign="middle"><?=$no?></td>
            <td align="center"><?=$row['idProject']?></td>
            <td><?=$row['judulProject']?></td>
             <td align="center"><a href="?id=<?php echo urlencode(base64_encode(13)); ?>&idProject=<?php echo urlencode(base64_encode($row['idProject']));?>&judulProject=<?php echo urlencode(base64_encode($row['judulProject']));?>" class="btn btn-info" role="button"><i class="glyphicon glyphicon-eye-open"></i> View</a></td>
             <td align="center"><strong><?=number_format($rows['persentase']*100, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);?>%</strong></td>
            <td align="center"><strong><?=number_format($row['functionPoint'], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);?></strong></td>
            <td align="center"> 
            <?php
              if ($row['functionPoint']==0)
              {
            ?>
              <a href="?id=<?php echo urlencode(base64_encode(5)); ?>&idProject=<?php echo urlencode(base64_encode($row['idProject']));?>&judulProject=<?php echo urlencode(base64_encode($row['judulProject']));?>" class="btn btn-success" role="button"><i class="glyphicon glyphicon-plus"></i> Add</a>
            <?php
              }
              else
              {
                ?>
                 <a href="?id=<?php echo urlencode(base64_encode(6)); ?>&idProject=<?php echo urlencode(base64_encode($row['idProject']));?>&judulProject=<?php echo urlencode(base64_encode($row['judulProject']));?>" class="btn btn-primary" role="button"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                <?php
              }
            ?>
            </td>
            <td align="center">
              <a href="?id=<?php echo urlencode(base64_encode(10)); ?>&idProject=<?php echo urlencode(base64_encode($row['idProject']));?>&judulProject=<?php echo urlencode(base64_encode($row['judulProject']));?>" class="btn btn-info" role="button"><i class="glyphicon glyphicon-eye-open"></i> View</a>
              <a href="?id=<?php echo urlencode(base64_encode(9)); ?>&idProject=<?php echo urlencode(base64_encode($row['idProject']));?>&judulProject=<?php echo urlencode(base64_encode($row['judulProject']));?>" class="btn btn-success" role="button"><i class="glyphicon glyphicon-plus"></i> Add</a>
            </td>
            <td align="center">
             <a href="?id=<?php echo urlencode(base64_encode(11)); ?>&idProject=<?php echo urlencode(base64_encode($row['idProject']));?>&judulProject=<?php echo urlencode(base64_encode($row['judulProject']));?>" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</a>
              <a href="" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
              <a href="" class="btn btn-danger" data-toggle="confirmation"><i class="glyphicon glyphicon-trash"></i>  Delete</a>
            </td>
          </tr>
        <?php
        $no++;
      }
    ?>
    </tbody>
    </table>
    </form>
    </div>
    </section>