<?php
if (!empty($_GET['id'])) {
    // require connection
    require_once 'database/db.php';

    $customer_id = $_GET['id'];
    $del_query = "DELETE FROM `customer` WHERE id = '" . $customer_id . "'";
    $result = mysqli_query($conn, $del_query);
    if ($result) {
        header('location:/Customer/index.php?msg=del');
    }
}