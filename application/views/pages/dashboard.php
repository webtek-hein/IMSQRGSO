

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
</div>


<?php $position = $this->session->userdata['logged_in']['position'];
if ($position === 'Admin') {
    echo '<div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5" id="itemsrec">New Item Received</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            
              <span class="float-left" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="color:black">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right" style="color:black"></i>
              </span>
            </a>
          </div>
          <div class="col-lg-20">
            <div id="overlay">
              <div class="collapse" id="collapseExample">
                  
                        <div class="card" style="height:340px;">
                            <div class="card-header">
                                <h4>New Item Received</h4>
                            </div>
                            <div class="list-group">
                                <a href="#" class="list-group-item">Distribute on Department Name <span>03/26/2018</span></a>
                                <a href="#" class="list-group-item">Edit Item Name <span>03/26/2018</span></a>
                                <a href="#" class="list-group-item">Add Supplier <span>03/26/2018</span></a>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
            </div>
          </div>'.

    '<div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5" id="itemsiss">Issued Item</div>
            </div>
          <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            
              <span class="float-left" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="color:black">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right" style="color:black"></i>
              </span>
            </a>
          </div>
            <div class="col-lg-20">
            <div id="overlay">
              <div class="collapse" id="collapseExample">
                  
                        <div class="card" style="height:340px;">
                            <div class="card-header">
                                <h4>Issued Item</h4>
                            </div>
                            <div class="list-group">
                                <a href="#" class="list-group-item">Distribute on Department Name <span>03/26/2018</span></a>
                                <a href="#" class="list-group-item">Edit Item Name <span>03/26/2018</span></a>
                                <a href="#" class="list-group-item">Add Supplier <span>03/26/2018</span></a>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
            </div>
          </div>'.

    '<div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5" id="retitem">Returned Items</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            
              <span class="float-left" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="color:black">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right" style="color:black"></i>
              </span>
            </a>
          </div>
            <div class="col-lg-20">
            <div id="overlay">
              <div class="collapse" id="collapseExample">
                  
                        <div class="card" style="height:340px;">
                            <div class="card-header">
                                <h4>Returned Items</h4>
                            </div>
                            <div class="list-group">
                                <a href="#" class="list-group-item">Distribute on Department Name <span>03/26/2018</span></a>
                                <a href="#" class="list-group-item">Edit Item Name <span>03/26/2018</span></a>
                                <a href="#" class="list-group-item">Add Supplier <span>03/26/2018</span></a>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
            </div>
          </div>'.

    '<div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5" id="expitems">Expired Item</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            
              <span class="float-left" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="color:black">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right" style="color:black"></i>
              </span>
            </a>
          </div>
            <div class="col-lg-20">
            <div id="overlay">
              <div class="collapse" id="collapseExample">
                  
                        <div class="card" style="height:340px;">
                            <div class="card-header">
                                <h4>Expired Item</h4>
                            </div>
                            <div class="list-group">
                                <a href="#" class="list-group-item">Distribute on Department Name <span>03/26/2018</span></a>
                                <a href="#" class="list-group-item">Edit Item Name <span>03/26/2018</span></a>
                                <a href="#" class="list-group-item">Add Supplier <span>03/26/2018</span></a>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
            </div>
          </div>';
    }
    ?>

<?php $position = $this->session->userdata['logged_in']['position'];
if ($position === 'Custodian') {
    echo '<div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5" id="itemsrec">Items Received</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapse_newitems" aria-expanded="false" aria-controls="collapseExample">
            
              <span class="float-left" data-toggle="collapse" data-target="#collapse_newitems" aria-expanded="false" aria-controls="collapseExample" style="color:black">View Details</span>
              <span class="float-right">
              <span class="label label-pill label-danger count" style="border-radius:10px;"></span>
                <i class="fa fa-bell" style="color:black; font-size:18px;"></i>
              </span>
            </a>
          </div>
            <div class="col-lg-20">
            <div id="overlay">
              <div class="collapse" id="collapse_newitems">
                  
                        <div class="card" style="height:340px;">
                            <div class="card-header">
                                <h4>Items Received</h4>
                            </div>
                             <div class="list-group">
                            <ul id="increase" class="increase">
                               
                            </ul>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
            </div>
          </div>'.

        '<div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5" id="itemsiss">Issued Items</div>
            </div>
           <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapse_issueditems" aria-expanded="false" aria-controls="collapseExample">
            
              <span class="float-left" data-toggle="collapse" data-target="#collapse_issueditems" aria-expanded="false" aria-controls="collapseExample" style="color:black">View Details</span>
              <span class="float-right">
              <span class="label label-pill label-danger count" style="border-radius:10px;"></span>
                <i class="fa fa-bell" style="color:black; font-size:18px;"></i>
              </span>
            </a>
          </div>
            <div class="col-lg-20">
            <div id="overlay">
              <div class="collapse" id="collapse_issueditems">
                  
                        <div class="card" style="height:340px;">
                            <div class="card-header">
                                <h4>Issued Items</h4>
                            </div>
                            <div class="list-group">
                               <ul id="issued" >
                               
                                </ul>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
            </div>
          </div>'.

        '<div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5" id="retitem">Returned Items</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapse_return" aria-expanded="false" aria-controls="collapseExample">
            
              <span class="float-left" data-toggle="collapse" data-target="#collapse_return" aria-expanded="false" aria-controls="collapseExample" style="color:black">View Details</span>
              <span class="float-right">
              <span class="label label-pill label-danger count" style="border-radius:10px;"></span>
                <i class="fa fa-bell" style="color:black; font-size:18px;"></i>
              </span>
            </a>
          </div>
            <div class="col-lg-20">
            <div id="overlay">
              <div class="collapse" id="collapse_return">
                  
                        <div class="card" style="height:340px;">
                            <div class="card-header">
                                <h4>Returned Items</h4>
                            </div>
                            <div class="list-group">
                               <ul id="returned">
                               
                                </ul>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
            </div>
          </div>'.

        '<div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5" id="expitems">Expired Items</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapse_expired" aria-expanded="false" aria-controls="collapseExample">
            
              <span class="float-left" data-toggle="collapse" data-target="#collapse_expired" aria-expanded="false" aria-controls="collapseExample" style="color:black">View Details</span>
              <span class="float-right">
              <span class="label label-pill label-danger count" style="border-radius:10px;"></span>
                <i class="fa fa-bell" style="color:black; font-size:18px;"></i>
              </span>
            </a>
          </div>
            <div class="col-lg-20">
            <div id="overlay">
              <div class="collapse" id="collapse_expired">
                  
                        <div class="card" style="height:340px;">
                            <div class="card-header">
                                <h4>Expired Items</h4>
                            </div>
                            <div class="list-group">
                                <ul id="expired">
                               
                                </ul>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
            </div>
          </div>';
}
?>

<?php $position = $this->session->userdata['logged_in']['position'];
if ($position === 'Supply Officer') {
    echo '<div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5" id="itemsrec">New Item Received</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            
              <span class="float-left" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="color:black">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right" style="color:black"></i>
              </span>
            </a>
          </div>
            <div class="col-lg-20">
            <div id="overlay">
              <div class="collapse" id="collapseExample">
                  
                        <div class="card" style="height:340px;">
                            <div class="card-header">
                                <h4>New Item Received</h4>
                            </div>
                            <div class="list-group">
                                <a href="#" class="list-group-item">Distribute on Department Name <span>03/26/2018</span></a>
                                <a href="#" class="list-group-item">Edit Item Name <span>03/26/2018</span></a>
                                <a href="#" class="list-group-item">Add Supplier <span>03/26/2018</span></a>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
            </div>
          </div>'.

        '<div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5" id="itemsiss">Issued Item</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            
              <span class="float-left" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="color:black">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right" style="color:black"></i>
              </span>
            </a>
          </div>
            <div class="col-lg-20">
            <div id="overlay">
              <div class="collapse" id="collapseExample">
                  
                        <div class="card" style="height:340px;">
                            <div class="card-header">
                                <h4>Issued Item</h4>
                            </div>
                            <div class="list-group">
                                <a href="#" class="list-group-item">Distribute on Department Name <span>03/26/2018</span></a>
                                <a href="#" class="list-group-item">Edit Item Name <span>03/26/2018</span></a>
                                <a href="#" class="list-group-item">Add Supplier <span>03/26/2018</span></a>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
            </div>
          </div>'.

        '<div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5" id="retitem">Returned Items</div>
            </div>
           <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            
              <span class="float-left" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="color:black">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right" style="color:black"></i>
              </span>
            </a>
          </div>
            <div class="col-lg-20">
            <div id="overlay">
              <div class="collapse" id="collapseExample">
                  
                        <div class="card" style="height:340px;">
                            <div class="card-header">
                                <h4>Returned Items</h4>
                            </div>
                            <div class="list-group">
                                <a href="#" class="list-group-item">Distribute on Department Name <span>03/26/2018</span></a>
                                <a href="#" class="list-group-item">Edit Item Name <span>03/26/2018</span></a>
                                <a href="#" class="list-group-item">Add Supplier <span>03/26/2018</span></a>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
            </div>
          </div>'.

        '<div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5" id="expitems">Expired Item</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            
              <span class="float-left" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="color:black">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right" style="color:black"></i>
              </span>
            </a>
          </div>
            <div class="col-lg-20">
            <div id="overlay">
              <div class="collapse" id="collapseExample">
                  
                        <div class="card" style="height:340px;">
                            <div class="card-header">
                                <h4>Expired Item</h4>
                            </div>
                            <div class="list-group">
                                <a href="#" class="list-group-item">Distribute on Department Name <span>03/26/2018</span></a>
                                <a href="#" class="list-group-item">Edit Item Name <span>03/26/2018</span></a>
                                <a href="#" class="list-group-item">Add Supplier <span>03/26/2018</span></a>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
            </div>
          </div>';
}
?>

<!-- Example Bar Chart Card-->
<!--<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-bar-chart"></i> Bar Chart Example</div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-8 my-auto">
                <canvas id="myBarChart" width="100" height="50"></canvas>
            </div>
            <div class="col-sm-4 text-center my-auto">
                <div class="h4 mb-0 text-primary">$34,693</div>
                <div class="small text-muted">YTD Revenue</div>
                <hr>
                <div class="h4 mb-0 text-warning">$18,474</div>
                <div class="small text-muted">YTD Expenses</div>
                <hr>
                <div class="h4 mb-0 text-success">$16,219</div>
                <div class="small text-muted">YTD Margin</div>
            </div>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
-->
<!-- Area Chart Example-->
<!--<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-area-chart"></i> Area Chart Example</div>
    <div class="card-body">
        <canvas id="myAreaChart" width="100%" height="30"></canvas>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

<div class="col-lg-4">
    <div class="card" style="height:350px;">
        <div class="card-header">
            <h4>Daily Activity</h4>
        </div>
        <div class="list-group">
            <a href="#" class="list-group-item">Distribute on Department Name <span>03/26/2018</span></a>
            <a href="#" class="list-group-item">Edit Item Name <span>03/26/2018</span></a>
            <a href="#" class="list-group-item">Add Supplier <span>03/26/2018</span></a>
        </div>
    </div>-->
    <!-- /# card -->
<!--</div>
<div class="col-lg-4">
    <div class="card" style="height:350px;">
        <div class="card-header">
            <h4>Daily Activity</h4>
        </div>
        <div class="list-group">
            <a href="#" class="list-group-item">Distribute on Department Name <span>03/26/2018</span></a>
            <a href="#" class="list-group-item">Edit Item Name <span>03/26/2018</span></a>
            <a href="#" class="list-group-item">Add Supplier <span>03/26/2018</span></a>
        </div>
    </div>-->
    <!-- /# card -->
</div>


