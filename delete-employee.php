<?php
include 'dbcon.php';

$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM tbl_employee WHERE emp_id='$id'");

header('location:employee-list.php');
