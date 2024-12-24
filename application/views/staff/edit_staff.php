<div class="col-lg-12">
    <div class="card">
        <div class="card-body row">
            <div class="col-6">
                <h4 class="mt-0 header-title">Update Staff - <?php echo $staff_details['first_name'];?>
                    <?php echo $staff_details['last_name'];?></h4>
            </div>
            <div class="col-6" style="text-align:end">
                <a href="javascript:void(0);" onclick="reload()" type="button"
                    class="btn btn-danger waves-effect waves-light">Back</a>
            </div>
            <p class="text-muted font-14 mb-3">

            </p>
            <?php
                echo form_open_multipart('staff_add_form', array('id' => 'staff_update', 'role' => 'form'));
            ?>
                <div class="row">
                    <div class="col-md-4">
                        <label class="mb-1 mt-4 fw-medium text-muted">First Name</label>
                        <input type="text" maxlength="25" name="firstname" class="form-control" id="firstname" value="<?php echo $staff_details['first_name']?>" />
                    </div>
                    <div class="col-md-4">
                        <label class="mb-1 mt-4 fw-medium text-muted">Last Name</label>
                        <input type="text" maxlength="25" name="lastname" class="form-control" id="lastname" value="<?php echo $staff_details['last_name']?>" />
                    </div>
                    <div class="col-md-4">
                        <label class="mb-1 mt-4 fw-medium text-muted">DOB</label>
                        <input type="text" id="dob" name="dob" class="form-control" value="<?php echo date("d-m-Y", strtotime($staff_details['dob'])); ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="mb-1 mt-4 fw-medium text-muted">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="<?= $staff_details['gender'] ?>" selected><?php echo($staff_details['gender']==1) ? "Male" : "Female" ?></option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                    <?php if($this->session->userdata('staff_position') == 1) {?>
                    <div class="col-md-4">
                        <label class="mb-1 mt-4 fw-medium text-muted">Email</label>
                        <input type="text" class="form-control" maxlength="25" name="email" id="email" value="<?= $staff_details['email_id'] ?>" />
                    </div>
                    <?php }else{ ?>
                    <div class="col-md-4">
                        <label class="mb-1 mt-4 fw-medium text-muted">Email</label>
                        <input type="text" class="form-control" maxlength="25" name="email" id="email" value="<?= $staff_details['email_id'] ?>" disabled />
                    </div>
                    <?php } ?>
                    <div class="col-md-4">
                        <label class="mb-1 mt-4 fw-medium text-muted">Password</label>
                        <input type="password" class="form-control" maxlength="25" name="password" id="password" />
                    </div>
                    <div class="col-md-4">
                        <label class="mb-1 mt-4 fw-medium text-muted">Phone no</label>
                        <input type="text" class="form-control numeric" maxlength="12" name="phone" id="tel" value="<?= $staff_details['phone'] ?> "/>
                    </div>
                    <div class="col-md-4">
                        <label class="mb-1 mt-4 fw-medium text-muted">Department</label>
                        <input type="text" maxlength="25" name="department" class="form-control" id="department" value="<?= $staff_details['department'] ?>" />
                    </div>
                    <div class="col-md-4">
                        <label class="mb-1 mt-4 fw-medium text-muted">Position</label>
                        <select class="form-control" id="position" name="position">
                            <option value="<?= $staff_details['staff_position'] ?>" selected><?php echo($staff_details['staff_position']==1) ? "Admin" : "Manager" ?></option>    
                            <option value="1">Admin</option>
                            <option value="2">Manager</option>
                            <!-- <option value="3">Sales</option> -->
                        </select>
                    </div>
                    <div class="col-md-4">
                            <label class="mb-1 mt-4 fw-medium text-muted">Employee Ref ID</label>
                            <input type="text" class="form-control" maxlength="25" name="empid" id="empid" value="<?= $staff_details['employee_id'] ?>" />
                    </div>
                    <div class="col-md-4">
                        <label class="mb-1 mt-4 fw-medium text-muted">Country</label>
                        <select class="form-control" id="country" name="country">
                            <option value="-1" selected>Select Country</option>
                            <?php foreach ($countries as $country){?>
                            <option value=<?php echo $country->id;?>
                            <?php echo $staff_details['country'] == $country->id ? "selected" : "" ?>
                            >
                                <?php echo  $country->country;?>
                            </option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="mb-1 mt-4 fw-medium text-muted">Zip Number</label>
                        <input type="text" class="form-control" maxlength="25" name="zip" id="zip" value="<?= $staff_details['zip'] ?>" />
                    </div>
                    <div class="col-md-4">
                        <label class="mb-1 mt-4 fw-medium text-muted">City</label>
                        <input type="text" class="form-control" maxlength="25" name="city" id="city" value="<?= $staff_details['city'] ?>" />
                    </div>
                    <div class="col-md-4">
                        <label class="mb-1 mt-4 fw-medium text-muted">Address</label>
                        <input type="text" class="form-control" maxlength="25" name="address" id="address" value="<?= $staff_details['address'] ?>" />
                    </div>
                    <div class="col-md-4">
                        <label class="mb-1 mt-4 fw-medium text-muted">Image</label>
                        <input type="file" class="form-control files" name="files[]" id="files">
                        <p style="font-size: 11px;">(file format-pdf, jpg, jpeg, png, doc, docx)</p>
                    </div>
                    <div class="col-md-4">
                        <label class="mb-1 mt-4 fw-medium text-muted">Status</label>
                        <input type="text" maxlength="25" name="cstatus" placeholder="Active" class="form-control"
                            id="cstatus" readonly />
                    </div>
                    
                </div>
            </form>
            <div class="mb-1 mt-4 col-12" style="text-align:end">
                <button type="button" onclick="update_staff(<?= $staff_details['staff_id'] ?>)"
                    class="btn btn-success waves-effect waves-light">Submit</button>
            </div>
            <!-- end row -->
        </div> <!-- end card-body -->
    </div> <!-- end card -->
</div> <!-- end col -->
<script>
$(document).ready(function() {

    $('#dob').datepicker({
        "setDate": new Date(),
        "format": 'dd-mm-yyyy',
        "endDate": '-14y',
        "autoclose": true
    });
    $('#country').select2({
        'theme': 'bootstrap'
    });
    $('#cstatus').select2({
        'theme': 'bootstrap'
    });
    $('#position').select2({
        'theme': 'bootstrap'
    });
});

function reload() {
    location.reload();
}

function update_staff(id) {
    $("#loader").show();
    var ops_url = baseurl + 'update-staff';

    var form = $("#staff_update");
    var formData = new FormData(form[0]);
    formData.append('staff_id',id)
    // var staff_id = id;

    if ($('#firstname').val() == "") {
        swal('', 'First Name is required.', 'warning');
        $("#loader").hide();
        return false;
    }
    if ($('#lastname').val() == "") {
        swal('', 'Last Name is required.', 'warning');
        $("#loader").hide();
        return false;
    }
    if ($('#dob').val() == "") {
        swal('', 'DOB is required.', 'warning');
        $("#loader").hide();
        return false;
    }
    if ($('#tel').val() == "") {
        swal('', 'Phone number is required.', 'warning');
        $("#loader").hide();
        return false;
    }

    $.ajax({
        type: "POST",
        cache: false,
        async: true,
        url: ops_url,
        processData: false,
        contentType: false,
        data: formData,
        success: function(result) {
            $("#loader").hide();
            var data = $.parseJSON(result);
            if (data.status == 1) {
                swal({
                        title: "Success",
                        text: "Staff Updated.",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            location.reload();
                        } else {
                            location.reload();
                        }
                    });
            } else {
                swal('Error', 'Please contact Administrator.', 'error');
            }
        }
    });
}
</script>