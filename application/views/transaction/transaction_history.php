<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row" id="crud_section">
            <div class="col-12">
                <div class="card">
                    <div class="card-body row">

                        <div class="col-6">
                            <h4 class="mt-0 header-title">Transaction History</h4>
                        </div>

                        <p class="text-muted font-14 mb-3">

                        </p>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Tr. ID</th>
                                    <th>Type</th>
                                    <th>Account</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Charge</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php foreach($transactions_history as $row){    
                                                                $type =[
                                                                    1 => 'Nexus Pay',
                                                                    2 => 'Direct'
                                                                ];?>
                                <tr>
                                    <td><?php echo $row->id;?></td>
                                    <td><?php if($row->action == 1){
                                        echo '<span class="badge bg-success">Deposit</span>';
                                    }else{
                                        echo '<span class="badge bg-purple">Withdraw</span>';
                                    }?></td>
                                    <td><?php echo $row->login;?></td>
                                    <td><?php echo $type[$row->type];?></td>
                                    <td><?php echo date("d-m-Y", strtotime($row->created_on)); ?>
                                    </td>
                                    <td><?php echo number_format($row->credited_amt, 2);?></td>
                                    <td><?php echo number_format($row->charges, 2);?></td>
                                    <td><?php if($row->status == 1 && $row->processed == 1){
                                        echo '<span class="badge bg-success">Completed</span>';
                                    }
                                    else if($row->status == 1 && $row->processed == 0){
                                        echo '<span class="badge bg-danger">Rejected</span>';
                                    }
                                    else{
                                        echo '<span class="badge bg-warning">Pending</span>';
                                    }?></button>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- container -->

</div> <!-- content -->
<script>
function reload() {
    location.reload();
}
</script>