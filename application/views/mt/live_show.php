<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row" id="crud_section">
            <div class="col-12">
                <div class="card">
                    <div class="card-body row">

                        <div class="col-6">
                            <h4 class="mt-0 header-title">MT Live Accounts</h4>
                        </div>
                        <!-- <div class="col-6" style="text-align:end">
                            <a href="javascript:void(0);" onclick="client_add()" type="button"
                                class="btn btn-success waves-effect waves-light">Add Client</a>
                        </div> -->
                        <p class="text-muted font-14 mb-3">

                        </p>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Login</th>
                                    <th>Name</th>
                                    <th>Main Password</th>
                                    <th>Invest Password</th>
                                    <th>Phone Password</th>
                                    <th>Date</th>
                                </tr>
                            </thead>


                            <tbody>
                                <!-- <?php foreach($account_details as $row){?>
                                <tr>
                                    <td><?php echo $row->login;?></td>
                                    <td><?php echo $row->full_name;?></td>
                                    <td><?php echo $row->main_password;?></td>
                                    <td><?php echo $row->invest_password;?></td>
                                    <td><?php echo $row->phone_password;?></td>
                                    <td><?php echo date("d-m-Y", strtotime($row->created_on)); ?></td>
                                </tr>
                                <?php }?> -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- container -->

</div> <!-- content -->