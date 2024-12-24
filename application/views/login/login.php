<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link href="<?php echo base_url(); ?>assets/sweetalert/sweetalert.css" rel="stylesheet">
    <style>
        html,body {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url(./assets/images/bg.jpg);
            background-size: cover;
            background-position: center;
        }
        .login-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .login-header {
            margin-bottom: 20px;
            text-align: center;
        }
        .login-header h2 {
            margin: 0;
        }
        .btn-primary, .btn-success {
            width: 100%;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Login</h2>
        </div>
        <?php
            echo form_open('login', array('role' => 'form'));
        ?>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                <span class="error"><?php echo form_error('email'); ?></span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <span class="error"><?php echo form_error('password'); ?></span>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
            <div class="mb-3 d-grid text-center log-in">
                <button name="login" id="login" class="btn btn-success" title="Login"> Log In</button>
                <!-- <a href="<php echo base_url(); ?>home" class="btn btn-success" title="Log In"> Log In</a> -->
            </div>
            <div class="mb-3 d-grid text-center">
                <a href="<?php echo base_url(); ?>signup" class="btn btn-primary" title="Sign Up"> Register</a>
            </div>
        <?php echo form_close(); ?>
        <div class="row mt-3">
            <div class="col-12 text-center">
                <p> <a href="<?php echo base_url(); ?>forgot-password" class="text-muted ms-1 pwd-recovry"><i
                            class="fa fa-lock me-1"></i>Forgot your password?</a></p>
            </div>
        </div>
        <!-- <div class="text-center mt-3">
            <a href="#">Forgot password?</a>
        </div> -->
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/sweetalert/sweetalert-dev.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php 
        if(isset($uname) && $uname==0 || isset($pwd) && $pwd == 0){
            echo "<script type='text/javascript'>swal('Login failed', '" . $message . "', 'error')</script>";
        }
        if(isset($credentials) && $credentials==1){
            echo "<script type='text/javascript'>swal('Invalid credentials', '" . $message . "', 'error')</script>";
        }
    ?>
</body>
</html>
