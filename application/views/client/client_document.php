<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row" id="crud_section">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-6">
                            <h4 class="mt-0 header-title">Document Upload</h4>
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
                            <div class="col-md-4">
                                <label class="mb-1 mt-4 fw-medium text-muted">ID</label>
                                <input type="file" class="form-control files" name="files_id[]" id="files_id">
                                <p style="font-size: 11px;">(file format-pdf, jpg, jpeg, png, doc, docx)</p>
                            </div>
                            <div class="col-md-4">
                                <label class="mb-1 mt-4 fw-medium text-muted">Passport</label>
                                <input type="file" class="form-control files" name="files_pass[]" id="files_pass">
                                <p style="font-size: 11px;">(file format-pdf, jpg, jpeg, png, doc, docx)</p>
                            </div>
                            <div class="col-md-4">
                                <label class="mb-1 mt-4 fw-medium text-muted">Bank Statement</label>
                                <input type="file" class="form-control files" name="files_stmt[]" id="files_stmt">
                                <p style="font-size: 11px;">(file format-pdf, jpg, jpeg, png, doc, docx)</p>
                            </div>


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
                                    <p class="card-text">Please click download button for download the file.</p>
                                    <a href="<?php echo base_url(); ?>uploads/<?php echo $identity;?>" target="_blank"
                                        class="btn btn-primary">View</a>
                                    <br />
                                    <?php }else{?>
                                    <p class="card-text">Document not uploaded.</p>
                                    <?php }?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-body" style="background-color: #e3f9ff;">
                                    <h4 class="card-title">Passport Document</h4>
                                    <?php if($passport != '' || $passport != null){?>
                                    <p class="card-text">Please click download button for download the file.</p>
                                    <a href="<?php echo base_url(); ?>uploads/<?php echo $passport;?>" target="_blank"
                                        class="btn btn-primary">View</a>
                                    <br />
                                    <?php }else{?>
                                    <p class="card-text">Document not uploaded.</p>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-body" style="background-color: #e3f9ff;">
                                    <h4 class="card-title">Bank Statement Document</h4>
                                    <?php if($statement != '' || $statement != null){?>
                                    <p class="card-text">Please click download button for download the file.</p>
                                    <a href="<?php echo base_url(); ?>uploads/<?php echo $statement;?>" target="_blank"
                                        class="btn btn-primary">View</a>
                                    <br />
                                    <?php }else{?>
                                    <p class="card-text">Document not uploaded.</p>
                                    <?php }?>
                                </div>
                            </div>
                            <?php if(isset($client_document_details)){?>
                            <?php if ($client_document_details['file_id_verify'] != 1 || $client_document_details['file_passport_verify'] != 1 || $client_document_details['file_statement_verify'] != 1){?>
                            <div class="mb-1 mt-4 col-12" style="text-align:end">
                                <button type="button" onclick="upload_document()"
                                    class="btn btn-success waves-effect waves-light">Submit</button>
                            </div>
                            <?php }?>
                            <?php }else{?>
                            <div class="mb-1 mt-4 col-12" style="text-align:end">
                                <button type="button" onclick="upload_document()"
                                    class="btn btn-success waves-effect waves-light">Submit</button>
                                <?php }?>

                            </div> <!-- end col -->

                        </div>
                        </form>

                        <!-- end row -->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>
    </div> <!-- container -->

</div> <!-- content -->
<script>
function reload() {
    location.reload();
}

function upload_document() {
    $("#loader").show();
    var ops_url = baseurl + 'save-client-document';

    // if ($('#files_id').val() == "") {
    //     swal('', 'ID is required.', 'warning');
    //     return false;
    // }
    // if ($('#files_pass').val() == "") {
    //     swal('', 'Passport is required.', 'warning');
    //     return false;
    // }
    // if ($('#files_stmt').val() == "") {
    //     swal('', 'Bank Statement is required.', 'warning');
    //     return false;
    // }

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
            // alert(result);return false;
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