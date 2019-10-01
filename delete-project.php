<?php
include 'dbcon.php';

$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM tbl_project where proj_id='$id'");

header('location:project-list.php');
