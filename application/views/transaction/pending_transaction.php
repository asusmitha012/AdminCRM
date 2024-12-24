<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title mb-3"> Pending Transactions</h4>

                        <form>
                            <div id="basicwizard">

                                <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-4">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" id="deposit-button" onclick="load_deposit()"
                                            class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-arrow-down-thin-circle-outline"></i>
                                            <span class="d-none d-sm-inline">Deposit</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" id="withdraw-button" onclick="load_withdraw()"
                                            class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-arrow-up-thin-circle-outline"></i>
                                            <span class="d-none d-sm-inline">Withdraw</span>
                                        </a>
                                    </li>
                                </ul>

                                <div id="crud_section">

                                </div> <!-- tab-content -->
                            </div> <!-- end #basicwizard-->
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>


        </div>
    </div> <!-- container -->

</div> <!-- content -->
<script>
$(document).ready(function() {
    load_deposit();
    $("#deposit-button").addClass('active');
});

function load_deposit() {
    $("#loader").show();
    var ops_url = baseurl + 'pending-deposit-show';
    $.ajax({
        type: 'POST',
        url: ops_url,
        dataType: "html",
        success: function(response) {
            $("#loader").hide();
            $("#crud_section").html(response);
            $('#crud_section').addClass('in-down');
            $("#deposit-button").addClass('active');
            $("#withdraw-button").removeClass('active');
        },
        error: function(error_) {
            $("#loader").hide();
            MYLOG(error_);
        }
    });
}

function load_withdraw() {
    $("#loader").show();
    var ops_url = baseurl + 'pending-withdraw-show';
    $.ajax({
        type: 'POST',
        url: ops_url,
        dataType: "html",
        success: function(response) {
            console.log(response);
            $("#loader").hide();
            $("#crud_section").html(response);
            $('#crud_section').addClass('in-down');
            $("#withdraw-button").addClass('active');
            $("#deposit-button").removeClass('active');
        },
        error: function(error_) {
            $("#loader").hide();
            MYLOG(error_);
        }
    });
}


function reload() {
    location.reload();
}
</script>