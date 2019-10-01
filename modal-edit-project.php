

<div id="edit<?php echo $id; ?>" class="modal modal-edit-project modal-fixed-footer">
    <div class="modal-content">
        <h4 style="text-align:center">Edit Project Information</h4>
        <div class="row">
            <form class="col s12" method="post" action="">
                <div class="row">
                    <div class="input-field col s12 m4">
                        <input id="company_name" name="project_id" type="hidden" class="validate" value="<?php echo $project_row['proj_id']; ?>">
                            <select name="company_name" >
                            <option value="<?php echo $project_row['proj_company']; ?>" selected><?php echo $project_row['proj_company']; ?></option>
                                    <?php
$result_company_one = mysqli_query($mysqli, "SELECT * FROM tbl_company");
while ($comp_row = mysqli_fetch_array($result_company_one)) {?>
                                    <option  value="<?php echo $comp_row['comp_displayname']; ?>"><?php echo $comp_row['comp_displayname']; ?></option>
                                    <?php }?>
                                    </select>
                                    <label>Select Company Name</label>
                        </div>
                        <div class="input-field col s12 m4">
                        <input id="company_name" name="project_price" type="hidden" class="validate" value="<?php echo $project_row['proj_price']; ?>">
                            <input id="project_name" name="project_name" type="text" class="validate" value="<?php echo $project_row['proj_project']; ?>">
                            <label for="project_name">Project Name</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input id="sale_price" name="sale_price" type="text" class="validate" value="<?php echo $project_row['proj_salesprice']; ?>">
                            <label for="sale_price">Sales Price</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="order_date" name="order_date" type="date" class="validate" value="<?php echo $project_row['proj_orderdate']; ?>">
                            <label for="order_date">Order date</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="deadline_date" name="deadline_date" type="date" class="validate" value="<?php echo $project_row['proj_deaddate']; ?>">
                            <label for="deadline_date">Deadline Date</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="delivery_date" name="delivery_date" type="date" class="validate" value="<?php echo $project_row['proj_deliverdate']; ?>">
                            <label for="delivery_date">Delivery Date</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="invoice_date" name="invoice_date" type="date" class="validate" value="<?php echo $project_row['proj_invoicedate']; ?>">
                            <label for="invoice_date">Invoice Date</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="payment_date" name="payment_date" type="date" class="validate" value="<?php echo $project_row['proj_paymentdate']; ?>">
                            <label for="payment_date">Payment Date</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="incentives_date" name="incentives_date" type="date" class="validate" value="<?php echo $project_row['proj_paymentdate']; ?>">
                            <label for="incentives_date">Incentives Date</label>
                        </div>
                    </div>
                        <div class="modal-footer" style="padding-right:40px;">
                        <button name="edit_project" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i>&nbsp;Edit Data</button>
                        <button class="modal-close waves-effect waves-light btn red" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Close</button>
                        </div>
                </div>
             </form>
         </div>
    </div>
</div>

<?php
if (isset($_POST['edit_project'])) {

    $company_name = $_POST['company_name'];
    $project_name = $_POST['project_name'];
    $project_price = $_POST['project_price'];
    $sale_price = $_POST['sale_price'];
    $price_amount = $sale_price * 10;

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
    $incentives = $sale_price * $rate;

    $order_date = $_POST['order_date'];
    $deadline_date = $_POST['deadline_date'];
    $delivery_date = $_POST['delivery_date'];
    $invoice_date = $_POST['invoice_date'];
    $payment_date = $_POST['payment_date'];
    $incentives_date = $_POST['incentives_date'];
    $project_id = $_POST['project_id'];

    $result = mysqli_query($mysqli, "UPDATE tbl_project SET  proj_company='$company_name', proj_project='$project_name', proj_price='$price_amount', proj_salesprice = '$sale_price', proj_incentive = '$incentives', proj_orderdate = '$order_date', proj_deaddate = '$deadline_date', proj_deliverdate = '$delivery_date', proj_invoicedate = '$invoice_date', proj_paymentdate = '$payment_date' , proj_incentdate = '$incentives_date' where proj_id='$project_id'");

    ?>

<?php
echo "<script>alert('Project information is successfully updated!')</script>";
    echo "<script>window.open('project-list.php?id=1','_self')</script>";
}
?>