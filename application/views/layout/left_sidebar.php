<style>
  .user-panel img{
    width: 100px!important;
  }
</style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 position">
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-4 pb-3 mb-1 text-center">
        <div class="image mb-3">
        <a href="<?php echo base_url(); ?>home" class="d-block"><img src="<?php echo base_url(); ?>uploads/logo.jpg" class="img-circle" alt="User Image"></a>
        </div>
        <!-- <div class="info">
          <a href="<?php echo base_url(); ?>home" class="d-block">LOGO</a>
        </div> -->

        <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="<?php echo base_url(); ?>myprofile" class=" left-user-info">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a href="javascript:void(0);" class=" left-user-info" onclick="log_out()">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>


      </div>
      

      <!-- position 1 staff 
                position 2 client
                staff_position 1 Admin
                staff_position 2 Manager -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="<?php echo base_url(); ?>home" class="nav-link <?php echo ($title == 'Dashboard') ? 'active' : ''; ?>">
            <i class="mdi mdi-view-dashboard-outline"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php if($this->session->userdata('position') ==1){?>
            <?php if($this->session->userdata('staff_position') == 1){?>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>staff-list" class="nav-link <?php echo ($title == 'Staff') ? 'active' : ''; ?>">
                <i class="mdi mdi-account-cog-outline"></i>
                  <p>
                    Staff
                  </p>
                </a>
              </li>
          <?php } ?>
          
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>client-list" class="nav-link <?php echo ($title == 'Client') ? 'active' : ''; ?>">
            <i class="mdi mdi-account-group-outline"></i>
              <p>
                Clients
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>mt-demo-account" class="nav-link <?php echo ($title == 'Demo') ? 'active' : ''; ?>">
              <i class="mdi mdi-align-vertical-top"></i>
              <p> MT Demo Accounts </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>mt-live-account" class="nav-link <?php echo ($title == 'Live') ? 'active' : ''; ?>">
                <i class="mdi mdi-align-vertical-top"></i>
                <p> MT Live Accounts </p>
            </a>
          </li>
          <?php if($this->session->userdata('staff_position') == 1){?>
          <li class="nav-item">
              <a href="<?php echo base_url(); ?>pending-transaction" class="nav-link <?php echo ($title == 'Pending') ? 'active' : ''; ?>">
                  <i class="mdi mdi-format-align-middle"></i>
                  <p> Pending Transactions</p>
              </a>
          </li>
          <?php }?>
          <li class="nav-item">
              <a href="<?php echo base_url(); ?>successful-transaction" class="nav-link <?php echo ($title == 'Success') ? 'active' : ''; ?>">
                  <i class="mdi mdi-remote-desktop"> </i>
                  <p> Successfull Transactions</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url(); ?>transaction-history" class="nav-link <?php echo ($title == 'Transaction') ? 'active' : ''; ?>">
                  <i class="mdi mdi-arrow-left-right"></i>
                  <p> Transaction History</p>
              </a>
          </li>
        <?php } ?>

        <?php if($this->session->userdata('position') ==2){?>
          <li class="nav-item">
              <a href="<?php echo base_url(); ?>document-upload" class="nav-link <?php echo ($title == 'Document') ? 'active' : ''; ?>">
                  <i class="mdi mdi-application-import"></i>
                  <p> Document Upload </p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url(); ?>bank-upload" class="nav-link <?php echo ($title == 'Bank details') ? 'active' : ''; ?>">
                  <i class="mdi mdi-application-import"></i>
                  <p> Bank Details Upload </p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url(); ?>client-transaction" class="nav-link <?php echo ($title == 'Transactions') ? 'active' : ''; ?>">
                  <i class="mdi mdi-arrow-left-right"></i>
                  <p> Transactions </p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?php echo base_url(); ?>transaction-history" class="nav-link <?php echo ($title == 'History') ? 'active' : ''; ?>">
                  <i class="mdi mdi-arrow-left-right"></i>
                  <p> Transaction History</p>
              </a>
          </li>
        <?php }?>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>