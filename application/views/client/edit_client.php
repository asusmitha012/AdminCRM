
<div class="col-lg-12">
    <div class="card">
        <div class="card-body row">
            <div class="col-6">
                <h4 class="mt-0 header-title">Update Client - <?= $client_details['first_name'] ?> <?= $client_details['last_name'] ?></h4>
            </div>
            <div class="col-6" style="text-align:end">
                <a href="javascript:void(0);" onclick="reload()" type="button"
                    class="btn btn-danger waves-effect waves-light">Back</a>
            </div>
            <p class="text-muted font-14 mb-3">

            </p>
            <?php
                    echo form_open_multipart('client_edit_form', array('id' => 'client_edit', 'role' => 'form'));
                    ?>
            <div class="row">
                <div class="col-md-4">
                    <label class="mb-1 mt-4 fw-medium text-muted">First Name</label>
                    <input type="text" maxlength="25" name="firstname" class="form-control" id="firstname" value="<?php echo $client_details['first_name']?>" />
                </div>
                <div class="col-md-4">
                    <label class="mb-1 mt-4 fw-medium text-muted">Last Name</label>
                    <input type="text" maxlength="25" name="lastname" class="form-control" id="lastname" value="<?php echo $client_details['last_name']?>"/>
                </div>
                <div class="col-md-4">
                    <label class="mb-1 mt-4 fw-medium text-muted">Gender</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="<?= $client_details['gender'] ?>" selected><?php echo($client_details['gender']==1) ? "Male" : "Female" ?></option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">Other</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="mb-1 mt-4 fw-medium text-muted">DOB</label>
                    <input type="text" id="dob" name="dob" class="form-control" value="<?php echo date("d-m-Y", strtotime($client_details['dob'])); ?>">
                </div>
                <div class="col-md-4">
                    <label class="mb-1 mt-4 fw-medium text-muted">Country</label>
                    <select class="form-control" id="country" name="country">
                        <!-- <option value="-1" selected>Select Country</option> -->
                        <?php foreach ($countries as $country){?>
                        <option value=<?php echo $country->id;?>
                            <?php echo $client_details['country'] == $country->id ? "selected" : "" ?>
                        >
                            <?php echo  $country->country;?>
                        </option>
                        <?php }?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="mb-1 mt-4 fw-medium text-muted">Email</label>
                    <input type="email" class="form-control" maxlength="50" name="email" id="email" value="<?php echo $client_details['email_id']?>" />
                </div>
                <?php if($this->session->userdata('position')==1){ ?>
                <div class="col-md-4">
                    <label class="mb-1 mt-4 fw-medium text-muted">Manager</label>
                    <select class="form-control" id="manager" name="manager">
                        <option value="-1" selected>Select Manager</option>
                        <?php foreach ($manager_details as $manager){?>
                        <option value=<?php echo $manager->staff_id;?>
                            <?php echo $client_details['manager'] == $manager->staff_id ? "selected" : "" ?>
                        >
                            <?php echo $manager->first_name;?>
                            <?php echo $manager->last_name;?>
                        </option>
                        <?php }?>
                    </select>
                </div>
                <?php } ?>
                <div class="col-md-4">
                    <label class="mb-1 mt-4 fw-medium text-muted">Telephone</label>
                    <input type="text" class="form-control numeric" maxlength="12" name="tel" id="tel" value="<?php echo $client_details['tel']?>"/>
                </div>
                <div class="col-md-4">
                    <label class="mb-1 mt-4 fw-medium text-muted">Department</label>
                    <input type="text" maxlength="25" name="department" class="form-control" id="department" value="<?php echo $client_details['department']?>"/>
                </div>

                <div class="col-md-4">
                    <label class="mb-1 mt-4 fw-medium text-muted">Region</label>
                    <input type="text" class="form-control" maxlength="50" name="region" id="region" value="<?php echo $client_details['region']?>"/>
                </div>
                <div class="col-md-4">
                    <label class="mb-1 mt-4 fw-medium text-muted">Address</label>
                    <input type="text" class="form-control" maxlength="50" name="address" id="address" value="<?php echo $client_details['address']?>"/>
                </div>
                <div class="col-md-4">
                    <label class="mb-1 mt-4 fw-medium text-muted">City</label>
                    <input type="text" class="form-control" maxlength="50" name="city" id="city" value="<?php echo $client_details['city']?>"/>
                </div>
                <div class="col-md-4">
                    <label class="mb-1 mt-4 fw-medium text-muted">Zip Number</label>
                    <input type="text" class="form-control numeric" maxlength="10" name="zip" id="zip" value="<?php echo $client_details['zip']?>"/>
                </div>
                <div class="col-md-4">
                    <label class="mb-1 mt-4 fw-medium text-muted">Citizenship</label>
                    <input type="text" class="form-control" maxlength="50" name="citizen" id="citizen" value="<?php echo $client_details['citizen']?>"/>
                </div>
                <div class="col-md-4">
                    <label class="mb-1 mt-4 fw-medium text-muted">Passport</label>
                    <input type="text" class="form-control" maxlength="10" name="passport" id="passport" value="<?php echo $client_details['passport']?>"/>
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
                <div class="col-md-4">
                    <label class="mb-1 mt-4 fw-medium text-muted">Password</label>
                    <input type="text" class="form-control" maxlength="25" name="password" id="password" />
                </div>

                <div class="mb-1 mt-4 col-12" style="text-align:end">
                    <button type="button" onclick="update_client(<?= $client_details['id'] ?>)"
                        class="btn btn-success waves-effect waves-light">Update</button>
                </div>
            </div> 

        </div>
        </form>

    </div>
</div>
</div>

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
    $('#gender').select2({
        'theme': 'bootstrap'
    });
    
    
    });

    function reload() {
    location.reload();
    }

    function update_client(id) {
    $("#loader").show();
    var ops_url = "<?php echo base_url(); ?>update-client";

    var form = $("#client_edit");
    var formData = new FormData(form[0]);
    formData.append('client_id',id);

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
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ($('#email').val() == "") {
        swal('', 'Email is required.', 'warning');
        $("#loader").hide();
        return false;
    } else if (!regex.test($('#email').val())) {
        swal('', 'Enter valid Mail-Id.', 'warning');
        $("#loader").hide();
        return false;
    }
    if ($('#manager').val() == -1) {
        swal('', 'Manager is required.', 'warning');
        $("#loader").hide();
        return false;
    }
    
    if ($('#tel').val() == "") {
        swal('', 'Telephone is required.', 'warning');
        $("#loader").hide();
        return false;
    }
    if ($('#citizen').val() == "") {
        swal('', 'Citizenship is required.', 'warning');
        $("#loader").hide();
        return false;
    }
    if ($('#passport').val() == "") {
        swal('', 'Passport is required.', 'warning');
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
            // alert(JSON.stringify(data, null, 2));return false;
            if (data.status == 1) {
                swal({
                        title: "Success",
                        text: "Client updated.",
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
            }else {
                swal('Error', 'Please contact Administrator.', 'error');
            }
        }
    });
}

</script>