<?php
include_once 'dbcon.php';
if (isset($_POST['addemploy'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $fullname = $_POST['firstname'] . " " . $_POST['lastname'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $color = $_POST['color'];
    $hash = "#";

    $result = mysqli_query($mysqli, "INSERT INTO tbl_employee (emp_name, emp_position, emp_email, emp_phone, emp_address, emp_image, emp_color)
    VALUES('$fullname', '$position', '$email', '$phone', '$address', 'upload/user.png',  '$hash$color')");

    echo "<script>alert('You successfully register a new employee!')</script>";
    echo "<script>window.open('employee-list.php','_self')</script>";

}
