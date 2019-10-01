<?php
include 'dbcon.php';

$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM tbl_share where share_graph='$id'");
$result = mysqli_query($mysqli, "DELETE FROM tbl_graph where share_graph='$id'");

header('location:share-project.php');
