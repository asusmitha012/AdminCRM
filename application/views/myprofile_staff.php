<?php 
    if($result->file == ''){
        $contact_image = 'user.png';
    }else{
        $contact_image = $result->file;
    }
?>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
   
<body>
    <div class="container-fluid" >
        <div class="row" id="crud_section">
            <div class="col-lg-12">
            <div class="card">
            <div class="card-body row">
        <div class="col-6">
            <h1 class="mt-0 header-title"><b>My Profile</b> </h1>
        </div>
        <div class="col-6" style="text-align:end">
            <a href="javascript:void(0);" onclick="reload()" type="button"
            class="btn btn-danger waves-effect waves-light">Back</a>
        </div>
        
            <div class="col-xl-4">
                <div class="card">
                    <div class = "text-center card-body">
                        <div>
                            <img src="<?php echo base_url(); ?>uploads/<?php echo $contact_image;?>"
                            alt="image" class="img-fluid contact-img">
                            <!-- <img src="https://via.placeholder.com/150" alt="Profile Picture" class="profile-picture"> -->
                            <div class="">
                                <p class="mt-3"><?= $result->first_name ?> <?= $result->last_name ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        
                        <p><span class="fw-bold">First Name: </span> <?= $result->first_name ?></p>
                        <p><span class="fw-bold">Email: </span> <?= $result->email_id ?></p>
                        <p><span class="fw-bold">Phone: </span> <?= $result->phone ?></p>
                        <p><span class="fw-bold">Dob: </span> <?= $result->dob ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                    <p><span class="fw-bold">Last Name: </span> <?= $result->last_name ?></p>
                        <p><span class="fw-bold">Gender: </span> <?= $result->gender == 1 ? "Male" : "Female" ?></p>
                        <p><span class="fw-bold">Department: </span> <?= $result->department ?></p>
                        <p><span class="fw-bold">Location: </span> <?= $result->address ?><?= $result->city ?></p>
                    </div>
                </div>
            </div>
            <div class="col-12" style="text-align:end">
            <a href="javascript:void(0)" onclick="update_staff(<?php echo $result->staff_id;?>)"
                type="button" class="btn btn-success waves-effect waves-light">Update</a>
        </div>
        </div>
        
    </div>
    </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    function reload() {
    history.back();
    }

    function update_staff(staff_id){
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
