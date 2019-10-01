<?php
## Database configuration
include 'dbcon.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Search
$searchQuery = " ";
if ($searchValue != '') {
    $searchQuery = " and (emp_name like '%" . $searchValue . "%' or
    emp_position like '%" . $searchValue . "%' or
    emp_email like'%" . $searchValue . "%' or
    emp_phone like'%" . $searchValue . "%'or
    emp_address like'%" . $searchValue . "%'or
    emp_image like'%" . $searchValue . "%') ";
}

## Total number of records without filtering
$sel = mysqli_query($mysqli, "select count(*) as allcount from tbl_employee");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($mysqli, "select count(*) as allcount from tbl_employee WHERE 1 " . $searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from tbl_employee WHERE 1 " . $searchQuery . " order by " . $columnName . " " . $columnSortOrder . " limit " . $row . "," . $rowperpage;
$empRecords = mysqli_query($mysqli, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array(
        "emp_name" => $row['emp_name'],
        "emp_position" => $row['emp_position'],
        "emp_email" => $row['emp_email'],
        "emp_phone" => $row['emp_phone'],
        "city" => $row['city'],
        "emp_address" => $row['emp_address'],
        "emp_image" => $row['emp_image'],
    );
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecordwithFilter,
    "iTotalDisplayRecords" => $totalRecords,
    "aaData" => $data,
);

echo json_encode($response);
