<?php
//insert.php;

if (isset($_POST["employee_name"])) {
    $connect = new PDO("mysql:host=localhost;dbname=project_db", "root", "");
    $share_id = uniqid();
    $proj_name = $_POST["proj_name"];
    for ($count = 0; $count < count($_POST["employee_name"]); $count++) {
        $query = "INSERT INTO tbl_share
  (share_id, proj_name, emp_name, share_amount)
  VALUES (:share_id, :proj_name, :employee_name, :share_amount)
  ";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':share_id' => $share_id,
                ':proj_name' => $proj_name,
                ':employee_name' => $_POST["employee_name"][$count],
                ':share_amount' => $_POST["share_amount"][$count],
            )
        );
    }
    $result = $statement->fetchAll();
    if (isset($result)) {
        echo 'ok';
    }
}
