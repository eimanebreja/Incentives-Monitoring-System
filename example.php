$result = mysqli_query($mysqli, "INSERT INTO tbl_company (comp_name, comp_phoneticname, comp_postcode, comp_address, comp_buildingname, comp_tel, comp_fax, comp_url, comp_status, comp_classification, comp_industry, comp_establishment, comp_other)
    VALUES('$company_name, $display_name, $phonetic, $zip_code, $address, $building_name, $telephone, $fax, $url, $status, $category, $industry, $establish, $display_name, $other')");
<?php include 'session.php';?>
<?php
//index.php

$connect = new PDO("mysql:host=localhost;dbname=testing4", "root", "");
function fill_unit_select_box($connect)
{
    $output = '';
    $query = "SELECT * FROM tbl_unit ORDER BY unit_name ASC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output .= '<option value="' . $row["unit_name"] . '">' . $row["unit_name"] . '</option>';
    }
    return $output;
}
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Add Remove Select Box Fields Dynamically using jQuery Ajax in PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Add Remove Select Box Fields Dynamically using jQuery Ajax in PHP</h3>
   <br />
   <h4 align="center">Enter Item Details</h4>
   <br />
   <form method="post" id="insert_form">
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
       <th>Enter Item Name</th>
       <th>Enter Quantity</th>
       <th>Select Unit</th>
       <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
      </tr>
     </table>
     <div align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Insert" />
     </div>
    </div>
   </form>

   <?php
$monthss = "月";
$dayss = "日";
$currentMonth = date('m');
$nextMonth = date('m', strtotime('+1 month'));

$year = date('Y');
$monthsArr = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

$sundaysArr = array();

for ($j = 0; $j <= count($monthsArr) - 1; $j++) {
    if ($monthsArr[$j] == $currentMonth || $monthsArr[$j] == $nextMonth) {
        $days = cal_days_in_month(CAL_GREGORIAN, $monthsArr[$j], $year);

        for ($i = 1; $i <= $days; $i++) {
            $day = date('Y-' . $monthsArr[$j] . '-' . $i);
            $result = date("l", strtotime($day));

            if ($result == "Sunday") {
                $getSunday = date($monthsArr[$j] . '-d', strtotime($day));
                array_push($sundaysArr, $getSunday);
            }
        }
    }
}

$getCurrDay = date('m-d');
$j = 0;
for ($i = 0; $i < count($sundaysArr) - 1; $i++) {

    if ($getCurrDay < $sundaysArr[$i]) {
        if ($j < 3) {
            echo $sundaysArr[$i] . '<br>';
            $j++;
        }

    }
}
?>
  </div>





  <div class="form-style">
                  <div class="row sunday">
                        <div class="col s12 m2 l2" style="margin-top:-25px;">
                           <div class="input-field col s12 m12 l12">
                           <label for="firstname">体験希望日</label>
                       </div>
                    </div>

                    <?php
$month = date('m');
$year = date('Y');
$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
for ($i = 1; $i <= $days; $i++) {
    $day = date('Y-m-' . $i);
    $result = date("l", strtotime($day));
    if ($result == "Sunday") {
        $getloopDay = date('d', strtotime($day));
        $dayNow = date('d');
        if ($dayNow < $getloopDay) {
            $monthss = "月";
            $dayss = "日";?>
                    <div class="col s4 m3 l3">
                        <div class="radio">
                            <input name="input-sunday" id="<?php echo date("m", strtotime($day)) . "$monthss" . "" .
            date("d", strtotime($day)) . "$dayss"; ?>" type="radio"  value="<?php echo date("m", strtotime($day)) . "$monthss" . "" .
            date("d", strtotime($day)) . "$dayss"; ?>" />
                             <label for="<?php echo date("m", strtotime($day)) . "$monthss" . "" .
            date("d", strtotime($day)) . "$dayss"; ?>">
            <?php echo date("m", strtotime($day)) . "$monthss" . "" .
            date("d", strtotime($day)) . "$dayss"; ?> <br> <span>11:45~13:30 </span>
            </label>
                        </div>
                      </div>

                      <?php
}
    }
}
?>
 </body>
</html>

<script>
$(document).ready(function(){

 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><input type="text" name="item_name[]" class="form-control item_name" /></td>';
  html += '<td><input type="text" name="item_quantity[]" class="form-control item_quantity" /></td>';
  html += '<td><select name="item_unit[]" class="form-control item_unit"><option value="">Select Unit</option><?php echo fill_unit_select_box($connect); ?></select></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });

 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });

 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';



  var form_data = $(this).serialize();

   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(rt)
                    {
                        alert(rt);
                        $('#internship_details')[0].reset();
                    }
   });

 });

});
</script>