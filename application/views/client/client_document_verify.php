<div class="col-lg-12">
    <div class="card">
        <div class="card-body row">
            <div class="col-6">
                <h4 class="mt-0 header-title">Verify Document - <?= $client_details['first_name'] ?> <?= $client_details['last_name'] ?></h4>
            </div>
            <div class="col-6" style="text-align:end">
                <a href="javascript:void(0);" onclick="reload()" type="button"
                    class="btn btn-danger waves-effect waves-light">Back</a>
            </div>
            <p class="text-muted font-14 mb-3">

            </p>
            <?php
                    echo form_open_multipart('document_upload', array('id' => 'document_upload', 'role' => 'form'));
                    ?>
            <div class="row">
                <?php if(isset($client_document_details)){
                                $identity = $client_document_details['file_id'];
                                $passport = $client_document_details['file_passport'];
                                $statement = $client_document_details['file_statement'];
                                }else{
                                $identity = '';
                                $passport = '';
                                $statement = '';
                                }?>
                <div class="col-md-4">
                    <div class="card card-body" style="background-color: #e3f9ff;">
                        <h4 class="card-title">Identity Document</h4>
                        <?php if($identity != '' || $identity != null){?>
                        <!-- <p class="card-text">Please click download button to download the file and click
                            verify button for verification.</p> -->
                        <a href="<?php echo base_url(); ?>uploads/<?php echo $identity;?>" target="_blank"
                            class="btn btn-primary">View</a>
                        <br />

                        <?php if($client_document_details['file_id_verify'] != 1){?>
                        <a href="javascript:void(0);"
                            onclick="verify_document(1,<?php echo $client_document_details['contact_id'];?>)"
                            class="btn btn-success" id="id_btn">Verify</a>
                        <?php }?>

                        <?php }else{?>
                        <p class="card-text">Document not uploaded.</p>
                        <?php }?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-body" style="background-color: #e3f9ff;">
                        <h4 class="card-title">Passport Document</h4>
                        <?php if($passport != '' || $passport != null){?>
                        <!-- <p class="card-text">Please click download button to download the file and click
                            verify button for verification.</p> -->
                        <a href="<?php echo base_url(); ?>uploads/<?php echo $passport;?>" target="_blank"
                            class="btn btn-primary">View</a>
                        <br />
                        <?php if($client_document_details['file_passport_verify'] != 1){?>
                        <a href="javascript:void(0);"
                            onclick="verify_document(2,<?php echo $client_document_details['contact_id'];?>)" class=" btn
                                        btn-success" id="passport_btn">Verify</a>
                        <?php }?>
                        <?php }else{?>
                        <p class="card-text">Document not uploaded.</p>
                        <?php }?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-body" style="background-color: #e3f9ff;">
                        <h4 class="card-title">Bank Statement Document</h4>
                        <?php if($statement != '' || $statement != null){?>
                        <!-- <p class="card-text">Please click download button to download the file and click
                            verify button for verification.</p> -->
                        <a href="<?php echo base_url(); ?>uploads/<?php echo $statement;?>" target="_blank"
                            class="btn btn-primary">View</a>
                        <br />

                        <?php if($client_document_details['file_statement_verify'] != 1){?>
                        <a href="javascript:void(0);"
                            onclick="verify_document(3,<?php echo $client_document_details['contact_id'];?>)" class=" btn
                                        btn-success" id="stmt_btn">Verify</a>
                        <?php }?>
                        <?php }else{?>
                        <p class="card-text">Document not uploaded.</p>
                        <?php }?>
                    </div>
                </div>

                <?php if($identity != '' && $passport != '' && $statement!=''){?>
                <div class="mb-1 mt-4 col-12" style="text-align:end">
                    <button type="button" onclick="verify_user(<?php echo $client_document_details['contact_id'];?>,'<?php echo $client_details['email_id'];?>')"
                        class="btn btn-success waves-effect waves-light">Verify
                        User</button>
                </div>
                <?php }?>

            </div> <!-- end col -->

        </div>
        </form>

        <!-- end row -->
    </div> <!-- end card-body -->
</div> <!-- end card -->

<script>
function reload() {
    location.reload();
}

function verify_user(client_id,email) {
    $("#loader").show();
    var ops_url = baseurl + 'verify-user';
    $.ajax({
        type: "POST",
        cache: false,
        async: true,
        url: ops_url,
        data: {
            "client_id": client_id,
            "email": email
        },
        success: function(result) {
            // alert();
            $("#loader").hide();
            var data = $.parseJSON(result);
            // alert(result);
            console.log('Server response:', data);
            if (data.status == 1) {
                swal({
                        title: "Success",
                        text: "User Verified Successfully",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        location.reload();
                    });
            } else if (data.status == 2) {
                swal('Error', 'Verify the documents and try again!.', 'error');
            } else {
                swal('Error', 'Please contact Administrator.', 'error');
            }
        },
    });
}


function verify_document(val, client_id) {
    $("#loader").show();
    var ops_url = baseurl + 'verify-client-document';
    if (val == 1) {
        var message = 'Identity Verified Succesfully.';
        $('#id_btn').hide();
    }
    if (val == 2) {
        var message = 'Passport Verified Succesfully.';
        $('#passport_btn').hide();
    }
    if (val == 3) {
        var message = 'Bank Statement Verified Succesfully.';
        $('#stmt_btn').hide();
    }
    $.ajax({
        type: "POST",
        cache: false,
        async: true,
        url: ops_url,
        data: {
            "val": val,
            "client_id": client_id
        },
        success: function(result) {
            $("#loader").hide();
            var data = $.parseJSON(result)
            if (data.status == 1) {
                swal({
                        title: "Success",
                        text: message,
                        type: "success",
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        closeOnConfirm: true,
                        closeOnCancel: false
                    },
                    function(isConfirm) {

                    });
            } else {
                swal('Error', 'Please contact Administrator.', 'error');
            }
        }
    });
}


function upload_document() {
    $("#loader").show();
    var ops_url = baseurl + 'save-client-document';

    if ($('#files_id').val() == "") {
        swal('', 'ID is required.', 'warning');
        $("#loader").hide();
        return false;
    }
    if ($('#files_pass').val() == "") {
        swal('', 'Passport is required.', 'warning');
        $("#loader").hide();
        return false;
    }
    if ($('#files_stmt').val() == "") {
        swal('', 'Bank Statement is required.', 'warning');
        $("#loader").hide();
        return false;
    }

    var form = $("#document_upload");
    var formData = new FormData(form[0]);

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
            var data = $.parseJSON(result)
            if (data.status == 1) {
                swal({
                        title: "Success",
                        text: "Document uploaded.",
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