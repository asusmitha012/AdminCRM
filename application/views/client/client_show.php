<?php 
    if($client_details['file'] == ''){
        $contact_image = 'user.png';
    }else{
        $contact_image = $client_details['file'];
    }
    
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-header {
            background-color: #f8f9fa;
            padding: 30px;
            text-align: center;
        }
        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .content-page{
            margin-top: unset!important;
        }
    </style>

<body>
    <div class="container mt-5 row">
        <div class="col-6">
            <h1 class="mt-0 header-title"><b>View Client</b> </h1>
        </div>
        <div class="col-6" style="text-align:end">
            <a href="javascript:void(0);" onclick="reload()" type="button"
                class="btn btn-danger waves-effect waves-light">Back</a>
        </div>
        <div class="profile-header">
            <img src="<?php echo base_url(); ?>uploads/<?php echo $contact_image;?>"
            alt="image" class="img-fluid profile-picture">
            <!-- <img src="https://via.placeholder.com/150" alt="Profile Picture" class="profile-picture"> -->
            <h2 class="mt-3"><?= $client_details['first_name'] ?> <?= $client_details['last_name'] ?></h2>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <p class="fw-bold">First Name</p>
                        <p><?= $client_details['first_name'] ?></p>
                    </div>
                    <div class="col-md-4">
                        <p class="fw-bold">Last Name</p>
                        <p><?= $client_details['last_name'] ?></p>
                    </div>
                    <div class="col-md-4">
                        <p class="fw-bold">Email</p>
                        <p><?= $client_details['email_id'] ?></p>
                    </div>
                    <div class="col-md-4">
                        <p class="fw-bold">Phone</p>
                        <p><?= $client_details['tel'] ?></p>
                    </div>
                    <div class="col-md-4">
                        <p class="fw-bold">Gender</p>
                        <p><?= $client_details['gender']==1 ? "Male" : "Female" ?></p>
                    </div>
                    <div class="col-md-4">
                        <p class="fw-bold">Manager</p>
                        <p><?= $client_details['manager_name'] ?></p>
                    </div>
                    <div class="col-md-4">
                        <p class="fw-bold">Status</p>
                        <p><?= $client_details['verify']==1 ? "Verified" : "Not Verified" ?></p>
                    </div>
                    <div class="col-md-4">
                        <p class="fw-bold">Location</p>
                        <p><?= $client_details['address'] ?></p>
                    </div>
                </div><br><br>
                <?php
                 if($client_details['verify'] != 0){
                    $identity = $client_document_details['file_id'];
                    $passport = $client_document_details['file_passport'];
                    $statement = $client_document_details['file_statement'];
                ?>
                
                <p class="fw-bold">Uploaded Documents:</p>
                <div class="row">
                <div class="col-md-4">
                    <div class="card mt-3">
                        <div class="card-body" style="display: ruby">
                            <h4 class="card-title">Identity Document</h4>
                            <a href="<?php echo base_url(); ?>uploads/<?php echo $identity;?>" target="_blank"
                                class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mt-3">
                        <div class="card-body" style="display: ruby">
                            <h4 class="card-title">Passport Document</h4>
                            <a href="<?php echo base_url(); ?>uploads/<?php echo $passport;?>" target="_blank"
                                class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mt-3">
                        <div class="card-body" style="display: ruby">
                            <h4 class="card-title">Bank Statement</h4>
                            <a href="<?php echo base_url(); ?>uploads/<?php echo $statement;?>" target="_blank"
                                class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
                </div>
                <?php
                 }
                 else{
                ?>
                <div class="col-md-4">
                    <p class="fw-bold">Documents not uploaded!</p>
                </div>
                <?php    
                 }
                ?>

            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    function reload() {
    location.reload();
    }
</script>
