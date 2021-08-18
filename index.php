<!DOCTYPE html>

<html>
<head>

<title>ISTORE CUSTOMER</title>
<script src="jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
<link rel="stylesheet" href="style.css">
<script>

$(document).ready(function(){
$('#empTable').dataTable();
$('.file-upload').file_upload();
});



</script>

</head>

<body>


<div class="container">
    <div class="alert alert alert-primary" role="alert">
      <h4 class="text-primary text-center">ISTORE CUSTOMER</h4>
    </div>
    <div class="alert alert-success text-center message" role="alert">

    </div>
    <div class="row mb-3">
      <div class="col-3">
      <span class="pull-left">
       <button href="#addnew"  class="btn btn-primary" data-toggle="modal" >
       <span class="glyphicon glyphicon-plus"></span> Add New<i
            class="fa fa-user-circle-o"></i>
       </button></span>
      </div>
      </div>
     </form>

    

     <div style="height:50px;" ></div>
     
    <table class="table  table-bordered  table-hover " id="empTable">   
    <thead>
      <th><center>ID</center></th>
      <th><center>Image</center></th>
      <th><center>Name</center></th>
      <th><center>Customer Type</center></th>
      <th><center>Email</center></th>
      <th><center>Adresse</center></th>
      <th><center>Phone</center></th>
      <th><center>favorite</center></th>
      <th><center>Gender</center></th>
      <th><center>Action</center></th>

    
  </thead>
  <tbody>
<?php
include('database.php');
$result=$mysqli->query("select * from employee_basics");
while($row=$result->fetch_assoc()){
    $GET = "https://gql.thatcopy.pw/catapi/".$row['id']. ".jpg";?>
<tr>
<td><?php echo $row['id']; ?></td>
<td> <img src='<?php echo $img ?>' height="50px" width="70px" /></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['customer']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['address']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['favorite']; ?></td>
<td><?php echo $row['gender']; ?></td>
<td>


<a href="#detail<?php echo $row['id']; ?>" 
data-toggle="modal" class="btn btn-success btn-sm">
<span class="glyphicon glyphicon-floppy-open">
</span>Detail</a>&nbsp;

<a href="#edit<?php echo $row['id']; ?>" 
data-toggle="modal" class="btn btn-warning btn-sm">
<span class="glyphicon glyphicon-edit">
</span> Edit</a>&nbsp;

<a href="#del<?php echo $row['id']; ?>" 
data-toggle="modal" class="btn btn-danger btn-sm">
<span class="glyphicon glyphicon-trash">
</span> Delete</a>

<!-- include edit modal -->
<?php include('show_detail_modal.php'); ?>
<!-- End -->
<!-- include edit modal -->
<?php include('show_edit_modal.php'); ?>
<!-- End -->
<!-- include delete modal -->
<?php include('show_delete_modal.php'); ?>
<!-- End -->
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<!-- include insert modal -->
<?php include('show_add_modal.php'); ?>
<!-- End -->
</div>
</body>
</html>