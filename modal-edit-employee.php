<div id="edit_employees<?php echo $id; ?>" class="modal modal-edit modal-fixed-footer">
    <div class="modal-content">
        <h4 style="text-align:center">Edit Employee Information</h4>
        <div class="row">
            <form class="col s12" method="post" action="">
                <div class="row">
                    <div class="input-field col s12 m4">
                        <input id="employ_name" name="employ_id" type="hidden" class="validate" value="<?php echo $employee_row['emp_id']; ?>">
                            <input id="employ_name" name="employ_name" type="text" class="validate" value="<?php echo $employee_row['emp_name']; ?>">
                            <label for="employ_name">Name</label>
                        </div>
                        <div class="input-field col s12 m4 ">
                                    <select name="employ_position">
                                    <option value="<?php echo $employee_row['emp_position']; ?>"selected><?php echo $employee_row['emp_position']; ?></option>
                                    <option  value="Web Developer">Web Developer</option>
                                    <option  value="Designer">Designer</option>
                                    <option  value="Bridge">Bridge</option>
                                    </select>
                                    <label>SELECT POSITION</label>
                                </div>
                        <div class="input-field col s12 m4">
                            <input id="employ_email" name="employ_email" type="email" class="validate" value="<?php echo $employee_row['emp_email']; ?>">
                            <label for="employ_email">Email</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input id="employ_telephone" name="employ_telephone" type="text" class="validate" value="<?php echo $employee_row['emp_phone']; ?>">
                            <label for="employ_telephone">Telephone Number</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input id="employ_address" name="employ_address" type="text" class="validate" value="<?php echo $employee_row['emp_address']; ?>">
                            <label for="employ_address">Address</label>
                        </div>
                        <div class="input-field col s12 m4">
                        <input class="jscolor" name="color" value="<?php echo $employee_row['emp_color']; ?>">
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

    $name = $_POST['employ_name'];
    $position = $_POST['employ_position'];
    $email = $_POST['employ_email'];
    $phone = $_POST['employ_telephone'];
    $address = $_POST['employ_address'];
    $color = $_POST['color'];
    $hash = "#";
    $employ_id = $_POST['employ_id'];

    $result = mysqli_query($mysqli, "UPDATE tbl_employee SET  emp_name='$name', emp_position='$position', emp_email='$email', emp_phone='$phone', emp_address='$address', emp_color='$hash$color' WHERE emp_id='$employ_id'");?>

<?php
echo "<script>alert('Project information is successfully updated!')</script>";
    echo "<script>window.open('employee-list.php?id=1','_self')</script>";
}
?>

<script src="assets/js/jscolor.js"></script>

