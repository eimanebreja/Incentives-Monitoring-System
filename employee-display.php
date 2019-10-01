<?php

$host = "localhost";

$username = "root";

$password = "";

$dbname = "project_db";

$result_array = array();
/* Create connection */
$conn = new mysqli($host, $username, $password, $dbname);

/* Check connection  */
if ($conn->connect_error) {
    die("Connection to database failed: " . $conn->connect_error);
}
/* SQL query to get results from database */

$sql = "SELECT emp_id, emp_name FROM tbl_employee ";

$result = $conn->query($sql);
/* If there are results from database push to result array */

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($result_array, $row);
    }
}
/* send a JSON encded array to client */
echo json_encode($result_array);

$conn->close();
