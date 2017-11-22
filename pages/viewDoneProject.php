<section class="content-header">
      <h1>
        View Done Project
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Done Project</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="table-responsive">
    <form name="detailProject" method="POST">
    <table class="table table-bordered" style="background-color: white!important;">
      <thead class="header">
      <tr>
        <th rowspan="2" valign="middle">No</th>
        <th rowspan="2" valign="middle">ID Project</th>
        <th rowspan="2" valign="middle">Judul Project</th>
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
      $query = " SELECT * FROM t_descproject WHERE CURDATE() > tanggalSelesaiProject";
      $getData = mysqli_query($connection,$query) or die(mysqli_error($connection));
      while ($row = mysqli_fetch_array($getData))
      {

        ?>
          <tr>
            <td align="center" valign="middle"><?=$no?></td>
            <td align="center"><?=$row['idProject']?></td>
            <td><?=$row['judulProject']?></td>
            <td align="center"><?=$row['functionPoint']?></td>
            <td align="center">
            <?php
              if ($row['functionPoint']==0)
              {
            ?>
              <a href="?id=<?php echo urlencode(base64_encode(5)); ?>&idProject=<?php echo urlencode(base64_encode($row['idProject']));?>&judulProject=<?php echo urlencode(base64_encode($row['judulProject']));?>" class="btn btn-info" role="button">Add</a>
            <?php
              }
              else
              {
                ?>
                 <a href="?id=<?php echo urlencode(base64_encode(6)); ?>&idProject=<?php echo urlencode(base64_encode($row['idProject']));?>&judulProject=<?php echo urlencode(base64_encode($row['judulProject']));?>" class="btn btn-info" role="button">Edit</a>
                <?php
              }
            ?>
            </td>
            <td align="center">
              <a href="" class="btn btn-info">View</a>
              <a href="" class="btn btn-info">Edit</a>
            </td>
            <td align="center">
             <a href="" class="btn btn-info">View</a>
              <a href="" class="btn btn-info">Edit</a>
              <a href="" class="btn btn-danger">Delete</a>
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