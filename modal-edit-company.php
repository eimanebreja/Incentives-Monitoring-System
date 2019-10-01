<div id="edit_companys<?php echo $id; ?>" style="height:80% !important;" class="modal modal-edit modal-fixed-footer">
    <div class="modal-content">
        <h4 style="text-align:center">Edit Company Information</h4>
        <div class="row">
            <form class="col s12" method="post" action="">
                <div class="row">
                <div class="input-field col s12 m4">
                            <input  id="comp_code" name="comp_code" type="text" class="validate" value="<?php echo $company_row['comp_code']; ?>" disabled>
                            <label for="comp_code">Company Code</label>
                     </div>
                    <div class="input-field col s12 m4">
                        <input id="comp_id" name="comp_id" type="hidden" class="validate" value="<?php echo $company_row['comp_id']; ?>">
                            <input id="comp_name" name="comp_name" type="text" class="validate" value="<?php echo $company_row['comp_name']; ?>">
                            <label for="comp_name">Company Name</label>
                      </div>
                        <div class="input-field col s12 m4">
                            <input  id="comp_displayname" name="comp_displayname" type="text" class="validate" value="<?php echo $company_row['comp_displayname']; ?>">
                            <label for="comp_displayname">Display Name</label>
                     </div>

                     <div class="input-field col s12 m4">
                            <input  id="comp_postcode" name="comp_postcode" type="text" class="validate" value="<?php echo $company_row['comp_postcode']; ?>">
                            <label for="comp_postcode">Post Code</label>
                     </div>
                     <div class="input-field col s12 m4">
                            <input  id="comp_address" name="comp_address" type="text" class="validate" value="<?php echo $company_row['comp_address']; ?>">
                            <label for="comp_address">Company Address</label>
                     </div>
                     <div class="input-field col s12 m4">
                            <input  id="comp_buildingname" name="comp_buildingname" type="text" class="validate" value="<?php echo $company_row['comp_buildingname']; ?>">
                            <label for="comp_buildingname">Building Name</label>
                     </div>
                     <div class="input-field col s12 m4">
                            <input  id="comp_tel" name="comp_tel" type="text" class="validate" value="<?php echo $company_row['comp_tel']; ?>">
                            <label for="comp_tel">Tel</label>
                     </div>
                     <div class="input-field col s12 m4">
                            <input  id="comp_fax" name="comp_fax" type="text" class="validate" value="<?php echo $company_row['comp_fax']; ?>">
                            <label for="comp_fax">Fax</label>
                     </div>
                     <div class="input-field col s12 m4">
                            <input  id="comp_url" name="comp_url" type="text" class="validate" value="<?php echo $company_row['comp_url']; ?>">
                            <label for="comp_url">Url</label>
                     </div>
                     <div class="input-field col s12 m4">
                            <input  id="comp_industry" name="comp_industry" type="text" class="validate" value="<?php echo $company_row['comp_industry']; ?>">
                            <label for="comp_industry">Industry</label>
                     </div>
                     <div class="input-field col s12 m4">
                            <input  id="comp_register" name="comp_register" type="text" class="validate" value="<?php echo $company_row['comp_regdate']; ?>">
                            <label for="comp_register">Register Date</label>
                     </div>
                     <div class="input-field col s12 m4">
                            <input  id="comp_update" name="comp_update" type="text" class="validate" value="<?php date_default_timezone_set('Asia/Manila');
echo date('Y-m-d H:i:s');?>" >
                            <label for="comp_update">Update Date</label>
                     </div>
                        <div class="modal-footer" style="padding-right:40px;">
                        <button name="edit_company" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i>&nbsp;Edit Data</button>
                        <button class="modal-close waves-effect waves-light btn red" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Close</button>
                        </div>
                </div>
             </form>
         </div>
    </div>
</div>

<?php
if (isset($_POST['edit_company'])) {

    $comp_code = $_POST['comp_code'];
    $comp_name = $_POST['comp_name'];
    $comp_displayname = $_POST['comp_displayname'];
    $comp_phoneticname = $_POST['comp_phoneticname'];
    $comp_postcode = $_POST['comp_postcode'];
    $comp_address = $_POST['comp_address'];
    $comp_buildingname = $_POST['comp_buildingname'];
    $comp_tel = $_POST['comp_tel'];
    $comp_fax = $_POST['comp_fax'];
    $comp_url = $_POST['comp_url'];
    $comp_industry = $_POST['comp_industry'];
    $comp_register = $_POST['comp_register'];
    $comp_update = $_POST['comp_update'];
    $comp_id = $_POST['comp_id'];
    $result = mysqli_query($mysqli, "UPDATE tbl_company SET comp_code='$comp_code', comp_name='$comp_name', comp_displayname='$comp_displayname', comp_postcode='$comp_postcode', comp_address='$comp_address', comp_buildingname='$comp_buildingname', comp_tel='$comp_tel', comp_fax='$comp_fax', comp_url='$comp_url', comp_industry='$comp_industry', comp_regdate='$comp_register', comp_update='$comp_update'  WHERE comp_id='$comp_id'");?>

<?php
echo "<script>alert('Company information is successfully updated!')</script>";
    echo "<script>window.open('company.php?id=1','_self')</script>";
}
?>

