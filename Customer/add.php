<?php

if (isset($_POST['submit']) && $_POST['submit'] != '') {
    // require the db connection
    require_once 'database/db.php';

    $first_name = (!empty($_POST['first_name'])) ? $_POST['first_name'] : '';
    $last_name = (!empty($_POST['last_name'])) ? $_POST['last_name'] : '';
    $gender = (!empty($_POST['gender'])) ? $_POST['gender'] : '';
    $jobs = (!empty($_POST['jobs'])) ? $_POST['jobs'] : '';
    $hobbys = (!empty($_POST['hobbys'])) ? $_POST['hobbys'] : '';
    $d = implode(",",$hobbys);
    $id = (!empty($_POST['customer_id'])) ? $_POST['customer_id'] : '';

    if (!empty($id)) {
        // update the record
        $customer_query = "UPDATE `customer` SET first_name='" . $first_name . "', last_name='" . $last_name . "', gender='" . $gender . ", jobs='" . $jobs . "', hobbys='" . $d . "'  WHERE id ='" . $id . "'";
        $msg = "update";
    } else {
        // insert the new record
        $customer_query = "INSERT INTO `customer` (first_name, last_name, gender, jobs,hobbys) VALUES ('" . $first_name . "', '" . $last_name . "', '" . $gender . "' , '" . $jobs . "' , '" . $d . "')";
        $msg = "add";
    }

    $result = mysqli_query($conn, $customer_query);

    if ($result) {
        header('location:/Customer/index.php?msg=' . $msg);
    }

}

if (isset($_GET['id']) && $_GET['id'] != '') {
    // require the db connection
    require_once 'database/db.php';

    $customer_id = $_GET['id'];
    $customer_query = "SELECT * FROM `customer` WHERE id='" . $customer_id . "'";
    $customer_res = mysqli_query($conn, $customer_query);
    $results = mysqli_fetch_row($customer_res);
    $first_name = $results[1];
    $last_name = $results[2];
    $gender = $results[3];
    $jobs = $results[4];
    $hobbys = $results[5];

} else {
    $first_name = "";
    $last_name = "";
    $gender = "";
    $jobs = "";
    $hobbys = "";
    $customer_id = "";
}

if(isset($_POST['submit'])){
    if(!empty($_POST['hobbys'])) {
        foreach($_POST['hobbys'] as $value){
            echo "value : ".$value.'<br/>';
        }

    }

}
?>


<!DOCTYPE html>
<html lang="en">
<?php include 'partial/head.php';?>
<body>
   <?php include 'partial/navbar.php';?>

    <div class="container">
        <div class="formdiv">
        <div class="info"></div>
        <form method="POST" action="">
            <div class="form-group row">
                <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-7">
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-7">
                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>">
                </div>
            </div>
            <div class="form-group row">
            <label for="gender" class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-7">
                <select class="form-control" name="gender" id="gender">
                <option value="">Select Gender</option>
                <option value="Male" <?php if ($gender == 'Male') {echo "selected";}?> >Male</option>
                <option value="Female" <?php if ($gender == 'Female') {echo "selected";}?>>Female</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
            <label for="jobs" class="col-sm-3 col-form-label">Job</label>
            <div class="col-sm-7">
                <select class="form-control" name="jobs" id="jobs">
                <option value="">Select Job</option>
                <option value="Development" <?php if ($jobs == 'Development') {echo "selected";}?>>Development</option>
                <option value="Personnel" <?php if ($jobs == 'Personnel') {echo "selected";}?>>Personnel</option>
                <option value="Marketing" <?php if ($jobs == 'Marketing') {echo "selected";}?>>Marketing</option>
                <option value="Management" <?php if ($jobs == 'Management') {echo "selected";}?>>Management</option>
                </select>
                </div>
            </div>

            <div class="form-group row">
            <label for="hobbys" class="col-sm-3 col-form-label">hobbys</label>
             <div class="col-sm-7">
             <form method="post" action="">
               <span>Select hobbys</span><br/>
               <input type="checkbox" name='hobbys[]' value="Trip"> Trip <br/>
               <input type="checkbox" name='hobbys[]' value="Sport"> Sport <br/>
               <input type="checkbox" name='hobbys[]' value="surfing"> surfing <br/>
               <input type="checkbox" name='hobbys[]' value="Backgammon"> Backgammon <br/>
               <input type="submit"  class="btn btn-primary" value="Submit" name="submit">
             </form>
          </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-7">
                <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
                </div>
            </div>
        </form>
    </div>

</div>
</body>
</html>