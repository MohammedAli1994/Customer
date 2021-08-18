<div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" 
role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" 
aria-hidden="true">&times;</button>
<center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
</div>
<div class="modal-body">
<?php
$edit=$mysqli->query("select * from employee_basics where id=".$row['id']);
$erow=$edit->fetch_assoc();
?>
<div class="container-fluid">
<form method="POST" action="update.php?id=<?php echo $erow['id']; ?>" 
enctype="multipart/form-data">
<div class="row">
<div class="col-lg-4" align="left">
<label style="position:relative; top:7px;">Name:</label>
</div>
<div class="col-lg-8">
<input type="text" name="name" class="form-control" 
value="<?php echo $erow['name']; ?>">
</div>
</div>
<div style="height:10px;"></div>

<div class="row">
<div class="col-lg-4" align="left">
<label style="position:relative; top:7px;">Customer Type:</label>
</div>
<div class="col-lg-8" align="left">
<select name="customer">
<?php if ($erow['customer']=="privte") {?>
<option selected>Private</option>
<option>Business customer</option>
<option>Student</option>
<?php }else{ ?>
<option>Private</option>
<option selected>Business customer</option>
<option selected>Student</option>
<?php }?>
</select>
</div>
</div>
<div style="height:10px;"></div>

<div class="row">
<div class="col-lg-4" align="left">
<label style="position:relative; top:7px;">Gender:</label>
</div>
<div class="col-lg-8" align="left">
<select name="gender">
<?php if ($erow['gender']=="Male") {?>
<option selected>Male</option>
<option>Female</option>
<?php }else{ ?>
<option>Male</option>
<option selected>Female</option>
<?php }?>
</select>
</div>
</div>
<div style="height:10px;"></div>
<div class="row">
<div class="col-lg-4" align="left">
<label style="position:relative; top:7px;">Address:</label>
</div>
<div class="col-lg-8">
<input type="text" name="address" class="form-control" 
value="<?php echo $erow['address']; ?>">
</div>
</div>
<div style="height:10px;"></div>
<div class="row">
<div class="col-lg-4" align="left">
<label class="control-label" style="position:relative; top:7px;">Phone:</label>
</div>
<div class="col-lg-8">
<input type="text" class="form-control" name="phone" 
value="<?php echo $erow['phone']; ?>">
</div>
</div>

<div class="row">
<div class="col-lg-4" align="left">
<label class="control-label" style="position:relative; top:7px;">email:</label>
</div>
<div class="col-lg-8">
<input type="text" class="form-control" name="email" 
value="<?php echo $erow['email']; ?>">
</div>
</div>

<div style="height:10px;"></div>
<div class="row">
<div class="col-lg-4" align="left">
<label style="position:relative; top:7px;">favorite:</label>
</div>
<div class="col-lg-8" align="left">
<select name="favorite">
<?php if ($erow['favorite']=="Maacbook") {?>
<option selected>Macbook </option>
<option> Apple watch</option>
<option>IMac</option>
<option>AppleTV</option>
<option>iPhone</option>
<option>iPad</option>
<option>Airpods</option>
<?php }else{ ?>
<option selected>Macbook </option>
<option> Apple watch</option>
<option>IMac</option>
<option>AppleTV</option>
<option>iPhone</option>
<option>iPad</option>
<option>Airpods</option>
<?php }?>
</select>
</div>
</div>
<div class="row">
<div class="col-lg-4" align="left">
<label class="control-label" style="position:relative; top:7px;">Profile Image:
</label>
</div>
 
<div class="col-lg-8">
 
<input type="file" class="filestyle" name="pimage" />
 
</div>
 
</div>
 
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">
<span class="glyphicon glyphicon-remove"></span> Cancel</button>
<button type="submit" class="btn btn-warning">
<span class="glyphicon glyphicon-check"></span> Save</button>
</div>
</form>
</div>
</div>
</div>
<!-- /.modal -->