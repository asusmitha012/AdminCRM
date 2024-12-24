<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- <div class="content-header"> -->
            <!-- <div class="container-fluid"> -->
                <div class="row mb-2" id="crud_section">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body row">
                                <div class="col-sm-6">
                                            <h4 class="mt-0 header-title">Client Details</h4>
                                </div>
                                <div class="col-6 mb-2" style="text-align:end">
                                    <a href="javascript:void(0);" onclick="client_add()" type="button"
                                        class="btn btn-success waves-effect waves-light">Add Client</a>
                                </div>

                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>

                                            <th>Client-ID</th>
                                            <th>Img</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Manager</th>
                                            <th>Status</th>
                                            <th>Phone</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php 
                                        foreach($client_details as $client){
                                            if($client->file == ''){
                                                $contact_image = 'user.png';
                                            }else{
                                                $contact_image = $client->file;
                                            }
                                            ?>
                                        <tr>

                                            <td><?php echo 'CL-'.$client->id;?></td>
                                            <td><img src="<?php echo base_url(); ?>uploads/<?php echo $contact_image;?>"
                                                    alt="image" class="img-fluid avatar-sm rounded-circle"></td>
                                            <td><?php echo $client->first_name;?> <?php echo $client->last_name;?></td>
                                            <td><?php echo $client->email_id;?></td>
                                            <td><?php if($client->manager == 0){
                                                echo "<span style='color:red;'>Not Assigned</span>";
                                                }else{
                                                    echo $client->manager_name;
                                                }
                                                ?></td>
                                            <td><span
                                                    style="<?php if($client->verify == 1){ ?>color:green;<?php } else{ ?>color:red;<?php } ?>"><?php echo $client->verify == 1 ? "Verified" : "Not Verified"; ?></span>
                                            </td>
                                            <td><?php echo $client->tel;?></td>
                                            <td><?php echo date("d-m-Y", strtotime($client->dob)); ?></td>
                                            <td><button type="button" class="btn btn-warning btn-xs waves-effect waves-light"
                                                    onclick="edit_client(<?= $client->id; ?>)">Update</button>
                                                <button type="button" class="btn btn-info btn-xs waves-effect waves-light"
                                                    onclick="view_client(<?= $client->id; ?>)">View</button>
                                                <?php if($client->verify != 1){?>
                                                <button type="button" class="btn btn-success btn-xs waves-effect waves-light"
                                                    onclick="verify_client(<?= $client->id; ?>)">Verify</button>
                                                <?php }?>
                                            </td>
                                        </tr>
                                        <?php
                                    }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        <!-- </div> -->
    </div>
</div>

<script>
    function client_add() {
        $("#loader").show();
        var ops_url = baseurl + 'client/add-client';
        $.ajax({
            type: 'POST',
            url: ops_url,
            dataType: "html",
            success: function(response) {
                $("#loader").hide();
                $("#crud_section").html(response);
                // $('#crud_section').addClass('in-down');
            },
            error: function(error_) {
                $("#loader").hide();
                MYLOG(error_);
            }
    });
    }

    function edit_client(id){
        // alert(id);return false;
        $("#loader").show();
        var ops_url = baseurl + 'client/edit-client';
        $.ajax({
            type: 'POST',
            url: ops_url,
            data: {'client_id':id},
            success: function(response) {
                $("#loader").hide();
                $("#crud_section").html(response);
                // $('#crud_section').addClass('in-down');
            },
            error: function(error_) {
                $("#loader").hide();
                MYLOG(error_);
            }
        });
    }

    function view_client(id){
        $("#loader").show();
        var ops_url = baseurl + 'client/show-client';
        $.ajax({
            type: 'POST',
            url: ops_url,
            data: {'client_id':id},
            success: function(response) {
                $("#loader").hide();
                $("#crud_section").html(response);
                // $('#crud_section').addClass('in-down');
            },
            error: function(error_) {
                $("#loader").hide();
                MYLOG(error_);
            }
    });
    }

    function verify_client(id){
        $("#loader").show();
        var ops_url = baseurl + 'client/verify-client';
        $.ajax({
            type: 'POST',
            url: ops_url,
            data: {'client_id':id},
            success: function(response) {
                $("#loader").hide();
                $("#crud_section").html(response);
                // $('#crud_section').addClass('in-down');
            },
            error: function(error_) {
                $("#loader").hide();
                MYLOG(error_);
            }
    });
    }
</script>