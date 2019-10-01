<?php
include_once 'dbcon.php';
if (isset($_POST['add_project'])) {

    $company_name = $_POST['company_name'];
    $project_name = $_POST['project_name'];
    $project_price = $_POST['sale_price'];
    $total_saleprice = $project_price * 0.1;
    $amount = round($total_saleprice);

    $from_currency = 'JPY';
    $to_currency = 'PHP';

    $string = $from_currency . "_" . $to_currency;

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://free.currencyconverterapi.com/api/v6/convert?q=$string&compact=ultra&apiKey=4f214b6085f551e138ba",
        CURLOPT_RETURNTRANSFER => 1,
    ));

    $response = curl_exec($curl);
    $response = json_decode($response, true);
    $rate = $response[$string];
    $incentives = $amount * $rate;

    $order_date = $_POST['order_date'];
    $deadline_date = $_POST['deadline_date'];

    $result = mysqli_query($mysqli, "insert into tbl_project (proj_company, proj_project, proj_price, proj_salesprice, proj_incentive, proj_orderdate, proj_deaddate)
    values('$company_name', '$project_name', '$project_price', '$amount', '$incentives', '$order_date', '$deadline_date')");

    echo "<script>alert('You successfully added one Project!')</script>";
    echo "<script>window.open('project-list.php','_self')</script>";
    ?>

	<?php
}
?>