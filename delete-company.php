<?php
include 'dbcon.php';

$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM tbl_company WHERE comp_id='$id'");

header('location:company.php');
