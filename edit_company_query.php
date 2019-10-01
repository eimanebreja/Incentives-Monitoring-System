<?php
include_once 'dbcon.php';
if (isset($_POST['edit_company'])) {
    $company_code = $_POST['company_code'];
    $company_name = $_POST['company_name'];
    $company_namesec = $_POST['company_namesec'];
    $display_name = $_POST['display_name'];
    $post_code = $_POST['post_code'];
    $address = $_POST['address'];
    $building_name = $_POST['building_name'];
    $telephone = $_POST['tel'];
    $fax = $_POST['fax'];
    $url = $_POST['url'];
    $status = $_POST['status'];
    $division = $_POST['division'];
    $industry = $_POST['industry'];
    $register = $_POST['register_date'];
    $update = $_POST['update_date'];
    $comp_id = $_POST['comp_id'];
    $result = mysqli_query($mysqli, "UPDATE tbl_company SET comp_code='$company_code', comp_name='$company_name', comp_namesec='$company_namesec', comp_displayname='$display_name', comp_postcode='$post_code', comp_address='$address', comp_buildingname='$building_name', comp_tel='$telephone', comp_fax='$fax', comp_url='$url', comp_status='$status', comp_division='$division', comp_industry='$industry', comp_regdate='$register', comp_update='$update'  WHERE comp_id='$comp_id'");?>

<?php
echo "<script>alert('Company information is successfully updated!')</script>";
    echo "<script>window.open('company.php?id=1','_self')</script>";
}
?>