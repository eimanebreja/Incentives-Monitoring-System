<?php
include 'dbcon.php';

for ($i = 0; $i < count($_POST['employee_name']); $i++) {
    $project_name = $_POST['project_name'];
    $from_currency = 'JPY';
    $to_currency = 'PHP';
    $amounts = $_POST['price'];
    $employee_name = mysqli_real_escape_string($mysqli, $_POST['employee_name'][$i]);
    $measurement = mysqli_real_escape_string($mysqli, $_POST['measurement'][$i]);
    $yearnumber = date("Y");
    $monthsword = date("F");
    $fulldate = date("Y-m-d");

    $string = $from_currency . "_" . $to_currency;

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://free.currencyconverterapi.com/api/v6/convert?q=$string&compact=ultra&apiKey=4f214b6085f551e138ba",
        CURLOPT_RETURNTRANSFER => 1,
    ));

    $response = curl_exec($curl);
    $response = json_decode($response, true);
    $rate = $response[$string];
    $total = $rate * $amounts;
    $totals = $total * $measurement;

    $share_graph = $employee_name . "-" . $measurement . "-" . $totals;

    if (empty(trim($employee_name))) {
        continue;
    }

    $sharing = "INSERT INTO tbl_share (proj_name, emp_name, share_amount, share_graph)
    VALUES('$project_name', '$employee_name', '$totals', '$share_graph')";
    mysqli_query($mysqli, $sharing);

    $graph = "INSERT INTO tbl_graph (month, year, emp_name, graph_amount, amount_sale, share_graph)
    VALUES('$monthsword', '$yearnumber', '$employee_name', '$totals', '$amounts','$share_graph')";
    mysqli_query($mysqli, $graph);

    $project = "UPDATE tbl_project SET  proj_paymentdate='$fulldate' WHERE proj_project='$project_name'";
    mysqli_query($mysqli, $project);

}

if (mysqli_error($mysqli)) {
    echo "Data base error occured";
} else {
    echo $i . " rows added, Successful";
}
