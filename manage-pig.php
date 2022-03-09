<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/sidebar.php'; ?>
<?php include 'session.php'; ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Pig Management</b></h5>
  </header>
 
 <?php include 'inc/data.php'; ?>

 
 <div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
 	<h2>Manage Pigs</h2>
  <a href="add-pig.php" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> Add New Pig</a><br><br>
 <div class="table-responsive">
 	<table class="table table-hover table-striped" id="table">
 		<thead>
 			<tr>
 				<th>S/N</th>
        <th>Photo</th>
 				<th>Pig No.</th>
 				<th>Breed</th>
 				<th>Weight</th>
 				<th>Gender</th>
 				<th>Arrived</th>
 				<th>Desc.</th>
        <th></th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php
       $all_pig = $db->query("SELECT * FROM pigs ORDER BY id DESC");
       $fetch = $all_pig->fetchAll(PDO::FETCH_OBJ);
       foreach($fetch as $data){ 
          $get_breed = $db->query("SELECT * FROM breed WHERE id = '$data->breed_id'");
          $breed_result = $get_breed->fetchAll(PDO::FETCH_OBJ);
          foreach($breed_result as $breed){
        ?>
          <tr>
            <td><?php echo $data->id ?></td>
            <td>
              <img width="70" height="70" src="<?php echo $data->img; ?>" class="img img-responsive thumbnail">
            </td>
            <td><?php echo $data->pigno ?></td>
            <td><?php echo $breed->name ?></td>
            <td><?php echo $data->weight ?></td>
            <td><?php echo $data->gender ?></td>
            <td><?php echo $data->arrived ?></td>
            <td><?php echo wordwrap($data->remark,300,'<br>'); ?></td>
            <td>
               <div class="dropdown">
                  <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-cog"></i> Option
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="edit-pig.php?id=<?php echo $data->id ?>"><i class="fa fa-edit"></i> Edit</a></li>
                    <li><a onclick="return confirm('Continue delete pig ?')" href="delete.php?id=<?php echo $data->id ?>"><i class="fa fa-trash"></i> Delete</a></li>
                    <li><a onclick="return confirm('Continue quarantine pig ?')" href="quarantine.php?id=<?php echo $data->id; ?>"><i class="fa fa-paper-plane"></i> Quarantine Pig</a></li>
                  </ul>
                </div> 
            </td>
          </tr>    
      <?php 
       }
      }
      ?>
 		</tbody>
 	</table>
 </div>
 </div>
</div>


</div>


<?php include 'theme/foot.php'; ?>