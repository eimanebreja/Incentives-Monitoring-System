<?php
include_once 'dbcon.php';
if (isset($_POST['add_company'])) {
    $company_code = $_POST['company_code'];
    $company_name_one = $_POST['company_name'];
    $company_name_two = $_POST['company_name_two'];
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

    $result = mysqli_query($mysqli, "INSERT INTO tbl_company (comp_code, comp_name, comp_namesec, comp_displayname, comp_postcode, comp_address, comp_buildingname, comp_tel, comp_fax, comp_url, comp_status, comp_division, comp_industry, comp_regdate, comp_update)
    VALUES('$company_code', '$company_name_one', '$company_name_two', '$display_name', '$post_code', '$address', '$building_name', '$telephone', '$fax', '$url', '$status', '$division', '$industry', '$register', '$update')");

    echo "<script>alert('You successfully added one Company!')</script>";
    echo "<script>window.open('company.php','_self')</script>";
    ?>

	<?php
}
?>