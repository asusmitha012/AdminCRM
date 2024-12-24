<div class="content">

    <!-- Start Content-->
   
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2" id="crud_section">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body row">
                                <div class="col-sm-6">
                                            <h4 class="mt-0 header-title">Staff Details</h4>
                                </div>
                                <div class="col-6 mb-2" style="text-align:end">
                                    <a href="javascript:void(0);" onclick="staff_add()" type="button"
                                        class="btn btn-success waves-effect waves-light">Add Staff</a>
                                </div>
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>

                                            <th>Staff-ID</th>
                                            <th>Img</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Phone</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php 
                                        foreach($staff_details as $staff){
                                            if($staff->file == ''){
                                                $contact_image = 'user.png';
                                            }else{
                                                $contact_image = $staff->file;
                                            }
                                            ?>
                                        <tr>

                                            <td><?php echo 'EMP-'.$staff->staff_id;?></td>
                                            <td><img src="<?php echo base_url(); ?>uploads/<?php echo $contact_image;?>"
                                                    alt="image" class="img-fluid avatar-sm rounded-circle"></td>
                                            <td><?php echo $staff->first_name;?> <?php echo $staff->last_name;?></td>
                                            <td><?php echo $staff->email_id;?></td>
                                            
                                            <td><span
                                                    style="color:green;"><?php echo $staff->status == 1 ? "Active" : "Suspended"; ?></span>
                                            </td>
                                            <td><?php echo $staff->phone;?></td>
                                            <td><?php echo date("d-m-Y", strtotime($staff->created_at)); ?></td>

                                            <td><button type="button" class="btn btn-warning btn-xs waves-effect waves-light"
                                                    onclick="edit_staff(<?= $staff->staff_id ?>)">Update</button>
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
            </div>
        </div>
    
</div>

<script>
    function staff_add() {
        $("#loader").show();
        var ops_url = baseurl + 'staff/add-staff';
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

    function edit_staff(staff_id){
        // alert(email_id);return false;
        $("#loader").show();
        var ops_url = baseurl + 'staff/edit-staff';
        $.ajax({
            type: 'POST',
            url: ops_url,
            data: {
                'staff_id': staff_id
            },
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