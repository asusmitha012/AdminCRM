<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/select2-bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/spinner.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url(./assets/images/bg.jpg);
            background-size: cover;
            background-position: center;
        }
        .registration-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .registration-header {
            margin-bottom: 20px;
            text-align: center;
        }
        .registration-header h2 {
            margin: 0;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <div class="registration-header">
            <h2>Sign Up</h2>
        </div>
        <?php
            echo form_open_multipart('login/signup', array('id' => 'client_add', 'role' => 'form'));
        ?>
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="fname" placeholder="First name" name="fname">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lname" placeholder="Last name" name="lname">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
            </div>
            <!-- <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div> -->
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="numeric" class="form-control" id="phone" max-length="12" placeholder="Phone number" name="phone">
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <select class="form-control" id="country" name="country">
                    <option value="-1">Select One</option>
                    <?php 
                        foreach($countries as $country){ ?>
                            <option value = <?= $country->id ?>><?= $country->country ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3 d-grid text-center">
                <a href="javascript:void(0);" onclick="save_signup()" class="btn btn-success"
                    title="Login"> Sign Up</a>
            </div>
        </form>
        <div class="text-center mt-3">
        Already have an account? <a href="<?php echo base_url(); ?>">Login here</a>
        </div>
    </div>

    
    
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/sweetalert/sweetalert-dev.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        var baseurl = '<?php echo base_url(); ?>';
        $(document).ready(function() {
            $('#country').select2({
                'theme': 'bootstrap'
            });
        });

        function save_signup(){
            var form_url = baseurl + 'login/add_client';
            // alert(form_url);return false;
            var form = $("#client_add");
            var formData = new FormData(form[0]);
            if ($('#fname').val() == "") {
                swal('', 'First Name is required.', 'warning');
                return false;
            }
            if ($('#lname').val() == "") {
                swal('', 'Last Name is required.', 'warning');
                return false;
            }
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if ($('#email').val() == "") {
                swal('', 'Email is required.', 'warning');
                return false;
            }else if(!regex.test($('#email').val())){
                swal('','Enter a valid Mail-Id', 'warning');
                return false;
            }
            var phone = $('#phone').val();
            if ($('#phone').val() == "" || phone.length <= 9) {
                swal('', 'Enter a valid number.', 'warning');
                return false;
            }
            if ($('#country').val() == "") {
                swal('', 'Country is required.', 'warning');
                return false;
            }

            $.ajax({
            type: "POST",
            cache: false,
            async: true,
            url: form_url,
            processData: false,
            contentType: false,
            data: formData,
            success: function(result) {
                var data = $.parseJSON(result)
                // alert(data.value);return false;
                if (data.status == 1) {
                    swal({
                            title: "Success",
                            text: "Registered successfully! Please check the email id you provided for your credentials.",
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
                } else if (data.status == 2) {
                    swal('Error',
                        'Email or Phone number already exist. Please contact the administrator.',
                        'error');
                }else if (data.status == 3) {
                    swal('Error',
                        'Email not sent!',
                        'error');
                }else {
                    swal('Error', 'Please contact Administrator.', 'error');
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: " + status + ": " + error);
            }
        });
        }
    </script>



</body>
</html>
