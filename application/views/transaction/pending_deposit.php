<div class="row">
    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
        <thead>
            <tr>
                <th>Tr. ID</th>
                <th>Name</th>
                <th>Account</th>
                <th>Type</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Charge</th>
                <th>Action</th>
            </tr>
        </thead>


        <tbody>
            <?php foreach($pending_deposit as $pending){    
            $type =[
                1 => 'Nexus Pay',
                2 => 'Direct'
            ];?>
            <tr>
                <td><?php echo $pending->id;?></td>
                <td><?php echo $pending->full_name;?></td>
                <td><?php echo $pending->login;?></td>
                <td><?php echo $type[$pending->type];?></td>
                <td><?php echo date("d-m-Y", strtotime($pending->created_on)); ?>
                </td>
                <td><?php echo number_format($pending->credited_amt, 2);?></td>
                <td><?php echo number_format($pending->charges, 2);?></td>
                <td><button type="button" class="btn btn-warning btn-xs waves-effect waves-light"
                        onclick="confirm_deposit(<?php echo $pending->id;?>)">Process</button>
                    <button type="button" class="btn btn-info btn-xs waves-effect waves-light"
                        onclick="reject_deposit(<?php echo $pending->id;?>)">Reject</button>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div> <!-- end row -->
<script>
"use strict";
$(document).ready(function() {
    $("#datatable").DataTable();
    var a = $("#datatable-buttons").DataTable({
        lengthChange: !1,
        buttons: ["copy", "excel", "pdf"]
    });
    $("#key-table").DataTable({
            keys: !0
        }), $("#responsive-datatable").DataTable(), $("#selection-datatable").DataTable({
            select: {
                style: "multi"
            }
        }), a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"), $(
            "#datatable_length select[name*='datatable_length']").addClass("form-select form-select-sm"), $(
            "#datatable_length select[name*='datatable_length']").removeClass("custom-select custom-select-sm"),
        $(".dataTables_length label").addClass("form-label")
});

if ('this_is' == /an_example/) {
    of_beautifier();
} else {
    var a = b ? (c % d) : e[f];
}

function confirm_deposit(id) {
    swal({
            title: "Confirm",
            text: "Are you sure to Process this Transaction?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: 'OK',
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm) {
            if (isConfirm) {
                process_deposit(id);
            }
        });
}

function reject_deposit(id) {
    swal({
            title: "Confirm",
            text: "Are you sure to Reject this Transaction?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: 'OK',
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm) {
            if (isConfirm) {
                cancel_deposit(id);
            }
        });
}

function process_deposit(id) {
    $("#loader").show();
    var ops_url = baseurl + 'process-transaction';
    $.ajax({
        url: ops_url,
        type: "POST",
        cache: false,
        async: true,
        data: {
            'transaction_id': id,
            'action':'pending_deposit'
        },
        success: function(result) {
            $("#loader").hide();
            var data = $.parseJSON(result)
            if (data.status == 1) {
                swal({
                        title: "Success",
                        text: "Transaction processed.",
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

function cancel_deposit(id) {
    $("#loader").show();
    var ops_url = baseurl + 'reject-transaction';
    $.ajax({
        url: ops_url,
        type: "POST",
        cache: false,
        async: true,
        data: {
            'transaction_id': id,
            'action':'pending_deposit'
        },
        success: function(result) {
            $("#loader").hide();
            var data = $.parseJSON(result)
            if (data.status == 1) {
                swal({
                        title: "Success",
                        text: "Transaction Rejected.",
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