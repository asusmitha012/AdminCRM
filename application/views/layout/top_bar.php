<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="<?php echo base_url(); ?>assets/#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>


    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- <li class="nav-item">
        <a class="nav-link " data-widget="navbar-search" href="<?php echo base_url(); ?>assets/#" role="button" >
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> -->

      

      <li class="dropdown nav-item notification-list topbar-dropdown">
          <a class="nav-link" data-toggle="dropdown"
              href="#" role="button" aria-haspopup="false" aria-expanded="false">
              <?php if($this->session->userdata('file')!=''){
                $contactImg = $this->session->userdata('file');
              }else{
                $contactImg = 'user.png';
              } ?>
              <img src="<?php echo base_url(); ?>uploads/<?= $contactImg ?>">
                  
              <span class="pro-user-name ms-1">
                  <?= $this->session->userdata('name') ?> <i class="mdi mdi-chevron-down"></i>
              </span>
          </a>
          <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
              
            <div class="dropdown-header noti-title">
                <h6 class="text-overflow">Welcome <?= $this->session->userdata('name') ?>!</h6>
            </div>

            
            <a href="<?php echo base_url(); ?>myprofile" class="dropdown-item notify-item">
                <i class="fas fa-user"></i>
                <span>My Account</span>
            </a>

            <a href="javascript:void(0)" onclick="log_out()" class="dropdown-item notify-item">
            <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>

          </div>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->