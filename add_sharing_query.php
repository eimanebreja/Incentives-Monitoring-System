<?php
include_once 'dbcon.php';

if (isset($_POST['add_project'])) {
    $project_id = $_POST['project_name'];
    $amounts = $_POST['price'];

    function convertCurrency()
    {
        $amounts = $_POST['price'];
        $from_currency = 'JPY';
        $to_currency = 'PHP';
        $url = 'https://www.google.co.za/search?q=' . $amounts . '+' . $from_currency . '+to+' . $to_currency;

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
        $totals = ($tottal * $_POST['measurement']);
        return ($totals);
    }

    $price = convertCurrency();
    $employee_id = $_POST['employee_name'];
    $fulldate = date("Y-m-d");
    $yearnumber = date("Y");
    $monthsword = date("F");

    $result_share = mysqli_query($mysqli, "INSERT INTO tbl_share (proj_id, emp_id, share_amount)
    VALUES('$project_id', '$employee_id', '$price')");

    $result_graph = mysqli_query($mysqli, "INSERT INTO tbl_graph (month, year, emp_id, graph_amount, amount_sale)
    VALUES('$monthsword', '$yearnumber', '$employee_id', '$price', '$amounts')");

    $result_update_project = mysqli_query($mysqli, "UPDATE tbl_project SET  proj_paymentdate='$fulldate' WHERE proj_id='$project_id'");

    echo "<script>alert('You successfully added a sharing')</script>";
    echo "<script>window.open('share-project.php','_self')</script>";
}
