<?php
include('database.php');
 
$name=$_POST['name'];
$customer=$_POST['customer'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$favorite=$_POST['favorite'];
$post=$_POST['post'];
$mysqli->query("insert into employee_basics (name,customer, gender, address,phone,email,favorite,post) 
values ('$name', '$customer','$gender', '$address','$phone','$email','$favorite','$post')");
 
$res = $mysqli->query("select id from employee_basics order by id desc");
$row = $res->fetch_row();
$id = $row[0];
 
define ("FILEREPOSITORY","cat/");
 
if (is_uploaded_file($_FILES['pimage']['tmp_name']))
{
if ($_FILES['pimage']['type'] != "image/jpg") {
echo "<p>Profile image must be uploaded in JPEG format.</p>";
} else {
 
$name = $_FILES['classnotes']['name'];
$filename=$id.".jpg";
 
$result = move_uploaded_file($_FILES['pimage']['tmp_name'],FILEREPOSITORY.$filename);
$result = move_uploaded_file($_FILES['pimg']['tmp_name'],
"https://i.thatcopy.pw/cat/wsJErNu.jpg");
if ($result == 1) echo "<p>File successfully uploaded.</p>";
else echo "<p>There was a problem uploading the file.</p>";
}
}
header('location:index.php');
?>