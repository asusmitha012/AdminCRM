<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row" id="crud_section">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-6">
                            <h4 class="mt-0 header-title">Transaction</h4>
                        </div>
                        <div class="col-6" style="text-align:end">
                            <a href="javascript:void(0);" onclick="reload()" type="button"
                                class="btn btn-danger waves-effect waves-light">Back</a>
                        </div>
                        <p class="text-muted font-14 mb-3">

                        </p>
                        <?php
                    echo form_open_multipart('transaction', array('id' => 'transaction_add', 'role' => 'form'));
                    ?>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="mb-1 mt-4 fw-medium text-muted">Transaction Action</label>
                                <select class="form-control" id="action" name="action">
                                    <option value="-1">Select</option>
                                    <option value="1">Deposit</option>
                                    <option value="2">Withdraw</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="mb-1 mt-4 fw-medium text-muted">Account</label>
                                <select class="form-control" id="account" name="account">
                                    <option value="-1">Select</option>
                                    <option value="6666">6666</option>
                                    <!-- <php foreach($live_account as $row){?>
                                    <option value="<php echo $row->login;?>"><php echo $row->login;?></option>
                                    <php }?> -->
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="mb-1 mt-4 fw-medium text-muted">Transaction Type</label>
                                <select class="form-control" id="type" name="type">
                                    <option value="-1">Select</option>
                                    <option value="1">Nexus Pay</option>
                                    <option value="2">Direct</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="mb-1 mt-4 fw-medium text-muted">USD</label>
                                <input type="text" class="form-control numeric" maxlength="10" name="amount"
                                    id="amount" />
                            </div>
                            <div class="mb-1 mt-4 col-12" style="text-align:end">
                                <button type="button" onclick="add_transaction()"
                                    class="btn btn-success waves-effect waves-light">Submit</button>
                            </div>
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
$(document).ready(function() {

    $('#action').select2({
        'theme': 'bootstrap'
    });
    $('#account').select2({
        'theme': 'bootstrap'
    });
    $('#type').select2({
        'theme': 'bootstrap'
    });
});

function reload() {
    location.reload();
}

function add_transaction() {
    $("#loader").show();
    var ops_url = baseurl + 'save-transaction';


    if ($('#action').val() == -1) {
        swal('', 'Transaction Action is required.', 'warning');
        $("#loader").hide();
        return false;
    }
    if ($('#account').val() == -1) {
        swal('', 'Account is required.', 'warning');
        $("#loader").hide();
        return false;
    }
    if ($('#type').val() == -1) {
        swal('', 'Transaction Type is required.', 'warning');
        $("#loader").hide();
        return false;
    }
    if ($('#amount').val() == "") {
        swal('', 'USD is required.', 'warning');
        $("#loader").hide();
        return false;
    }
    var action = $('#action').val();
    if (action == 1) {
        var msg = 'Deposit Request Placced.';
    }
    if (action == 2) {
        var msg = 'Withdraw Request Placed.';
    }
    var form = $("#transaction_add");
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
                        text: msg,
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