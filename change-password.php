<?php
include_once "dbcon.php";
if (isset($_POST['editprof'])) {

    $password = $_POST['user_password'];
    $id = $_POST['user_id'];

    $result = mysqli_query($mysqli, "UPDATE tbl_user SET  user_password='$password' WHERE user_id='$id'");?>

<?php
echo "<script>alert('Password is successfully changed!')</script>";
    echo "<script>window.open('project-list.php?id=1','_self')</script>";
}
?>