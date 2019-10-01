<?php
session_start();

?>
<?php
include 'dbcon.php';
if (isset($_POST['submit'])) {

    $username = $_POST['user_name'];
    $password = $_POST['user_password'];

    $query = mysqli_query($mysqli, "SELECT * FROM tbl_user WHERE user_name='$username' AND user_password='$password'");
    $num_row = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);
    if ($num_row > 0) {
        header('location:project-list.php');
        $_SESSION['id'] = $row['user_id'];
    } else {echo "<script type='text/javascript'>alert('Invalid Username or Password!');
									document.location='index.php'</script>";?>
								<?php
}}

?>

