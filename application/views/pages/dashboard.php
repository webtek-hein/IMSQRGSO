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
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
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
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
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
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
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
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
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
              <div class="mr-5" id="itemsrec">New Item Received</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
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
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
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
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
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
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>';
}
?>

<?php $position = $this->session->userdata['logged_in']['position'];
if ($position === 'Supply Officer') {
    echo '<div class="col-sm-6 col-lg-3">
        <div class="card1 text-white bg-flat-color-1" style="height: 130px; padding: 15px;">
            <div class="card1-body pb-0">
                <i class="fa fa-book" style="font-size:40px;"></i>
                <h4 class="mb-0" id="itemsrec">
                </h4>
                <p class="text-light">New Items Received</p>
            </div>
        </div>
    </div>'.

        '<div class="col-sm-6 col-lg-3" >
        <div class="card1 text-white bg-flat-color-2" style = "height: 130px; padding: 15px;" >
            <div class="card1-body pb-0" >
                <i class="fa fa-truck" style = "font-size:40px;" ></i >
                <h4 class="mb-0" id="itemsiss">
                </h4 >
                <p class="text-light" > Issued Items </p >
            </div >
        </div >
    </div >'.

        '<div class="col-sm-6 col-lg-3" >
        <div class="card1 text-white bg-flat-color-3" style = "height: 130px; padding: 15px;" >
            <div class="card1-body pb-0" >
                <i class="fa fa-undo" style = "font-size:40px;" ></i >
                <h4 class="mb-0" id="retitem">
                </h4 >
                <p class="text-light" > Returned Items </p >
            </div >
        </div >
    </div >'.

        '<div class="col-sm-6 col-lg-3" >
        <div class="card1 text-white bg-flat-color-4" style = "height: 130px; padding: 15px;" >
            <div class="card1-body pb-0" >
                <i class="fa fa-clock-o" style = "font-size:40px;" ></i >
                <h4 class="mb-0" id="expitems">
                </h4 >
                <p class="text-light" > Expired Items </p >
            </div >
        </div >
    </div >'.

        '<div class="col-sm-6 col-lg-3" >
        <div class="card1 text-white bg-flat-color-5" style = "height: 130px; padding: 15px;" >
            <div class="card1-body pb-0" >
                <i class="fa fa-money" style = "font-size:40px;" ></i >
                <h4 class="mb-0" id="tcost">
                </h4 >
                <p class="text-light" > Total Inventory Cost </p >
            </div >
        </div >
    </div >';
}
?>

<!-- Example Bar Chart Card-->
<div class="card mb-3">
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

<!-- Area Chart Example-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-area-chart"></i> Area Chart Example</div>
    <div class="card-body">
        <canvas id="myAreaChart" width="100%" height="30"></canvas>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>