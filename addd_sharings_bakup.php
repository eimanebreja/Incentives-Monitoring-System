<?php
include 'dbcon.php';

for ($i = 0; $i < count($_POST['employee_name']); $i++) {
    $project_name = $_POST['project_name'];
    $amounts = $_POST['price'];
    $employee_name = mysqli_real_escape_string($mysqli, $_POST['employee_name'][$i]);
    $measurement = mysqli_real_escape_string($mysqli, $_POST['measurement'][$i]);
    $yearnumber = date("Y");
    $monthsword = date("F");

    $from_currency = 'JPY';
    $to_currency = 'PHP';
    $url = 'https://www.google.com.ph/search?q=' . $amounts . '+' . $from_currency . '+to+' . $to_currency;

    $cSession = curl_init();
    curl_setopt($cSession, CURLOPT_URL, $url);
    curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cSession, CURLOPT_SSL_VERIFYPEER, true);

    $buffer = curl_exec($cSession);
    curl_close($cSession);
    preg_match("/<div class=\"J7UKTe\">(.*)<\/div>/", $buffer, $matches);
    $matches = preg_replace("/[^0-9.]/", "", $matches[1]);
    $amount = round($matches);
    $tottal = substr($amount, mb_strlen($amounts));
    $totals = ($tottal * $measurement);

    if (empty(trim($employee_name))) {
        continue;
    }

    $sharing = "INSERT INTO tbl_share (proj_name, emp_name, share_amount)
    VALUES('$project_name', '$employee_name', '$totals')";
    mysqli_query($mysqli, $sharing);

    $graph = "INSERT INTO tbl_graph (month, year, emp_name, graph_amount, amount_sale)
    VALUES('$monthsword', '$yearnumber', '$employee_name', '$totals', '$amounts')";
    mysqli_query($mysqli, $graph);

    $project = "UPDATE tbl_project SET  proj_paymentdate='$fulldate' WHERE proj_project='$project_name'";
    mysqli_query($mysqli, $project);

}

if (mysqli_error($mysqli)) {
    echo "Data base error occured";
} else {
    echo $i . " rows added, Successful";
}
