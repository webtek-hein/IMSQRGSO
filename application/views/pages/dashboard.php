<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php $position = $this->session->userdata['logged_in']['position'];
if ($position === 'Admin') {
    echo '<div class="col-sm-6 col-lg-2">
        <div class="card1 text-white bg-flat-color-1" style="height: 130px; padding: 15px;">
            <div class="card1-body pb-0">
                <i class="fa fa-book" style="font-size:40px;"></i>
                <h4 class="mb-0" id="itemsrec">
                </h4>
                <p class="text-light">Total Items Received</p>
            </div>
        </div>
    </div>' .

    '<div class="col-sm-6 col-lg-2" >
        <div class="card1 text-white bg-flat-color-2" style = "height: 130px; padding: 15px;" >
            <div class="card1-body pb-0" >
                <i class="fa fa-truck" style = "font-size:40px;" ></i >
                <h4 class="mb-0" id="itemsiss" >
                </h4 >
                <p class="text-light" > Issued Items </p >
            </div >
        </div >
    </div >'.

    '<div class="col-sm-6 col-lg-2" >
        <div class="card1 text-white bg-flat-color-3" style = "height: 130px; padding: 15px;" >
            <div class="card1-body pb-0" >
                <i class="fa fa-undo" style = "font-size:40px;" ></i >
                <h4 class="mb-0" id="retitem">
                </h4 >
                <p class="text-light" > Returned Items </p >
            </div >
        </div >
    </div >'.

    '<div class="col-sm-6 col-lg-2" >
        <div class="card1 text-white bg-flat-color-4" style = "height: 130px; padding: 15px;" >
            <div class="card1-body pb-0" >
                <i class="fa fa-clock-o" style = "font-size:40px;" ></i >
                <h4 class="mb-0" id="expitems">
                </h4 >
                <p class="text-light" > Expired Items </p >
            </div >
        </div >
    </div >'.

    '<div class="col-sm-6 col-lg-2" >
        <div class="card1 text-white bg-flat-color-5" style = "height: 130px; padding: 15px;" >
            <div class="card1-body pb-0" >
                <i class="fa fa-money" style = "font-size:40px;" ></i >
                <h4 class="mb-0" id="tcost">
                </h4 >
                <p class="text-light" > Total Cost </p >
            </div >
        </div >
    </div >'.

    '<div class="col-sm-6 col-lg-2" >
        <div class="dashnotif text-white bg-flat-color-6" style = "height: 130px; padding: 15px; background: #f49230;" >
            <div class="car1d-body pb-0" >
                <i class="fa fa-users" style = "font-size:40px;" ></i >
                <h4 class="mb-0" id="tUser">
                </h4 >
                <p class="text-light" > Total Users </p >
            </div >
        </div >
    </div >';
    }
    ?>

<?php $position = $this->session->userdata['logged_in']['position'];
if ($position === 'Custodian') {
    echo '<div class="col-sm-8 col-lg-2">
        <div class="card1 text-white bg-flat-color-1" style="height: 130px; padding: 15px;">
            <div class="card1-body pb-0">
                <i class="fa fa-book" style="font-size:40px;"></i>
                <h4 class="mb-0" id="itemsrec">
                </h4>
                <p class="text-light">Total Items Received</p>
            </div>
        </div>
    </div>' .

        '<div class="col-sm-6 col-lg-2" >
        <div class="card1 text-white bg-flat-color-2" style = "height: 130px; padding: 15px;" >
            <div class="card1-body pb-0" >
                <i class="fa fa-truck" style = "font-size:40px;" ></i >
                <h4 class="mb-0" id="itemsiss">
                </h4 >
                <p class="text-light" > Issued Items </p >
            </div >
        </div >
    </div >'.

        '<div class="col-sm-6 col-lg-2" >
        <div class="card1 text-white bg-flat-color-3" style = "height: 130px; padding: 15px;" >
            <div class="card1-body pb-0" >
                <i class="fa fa-undo" style = "font-size:40px;" ></i >
                <h4 class="mb-0" id="retitem">
                </h4 >
                <p class="text-light" > Returned Items </p >
            </div >
        </div >
    </div >'.

        '<div class="col-sm-6 col-lg-2" >
        <div class="card1 text-white bg-flat-color-4" style = "height: 130px; padding: 15px;" >
            <div class="card1-body pb-0" >
                <i class="fa fa-clock-o" style = "font-size:40px;" ></i >
                <h4 class="mb-0" id="expitems">
                </h4 >
                <p class="text-light" > Expired Items </p >
            </div >
        </div >
    </div >'.

        '<div class="col-sm-6 col-lg-2" >
        <div class="card1 text-white bg-flat-color-5" style = "height: 130px; padding: 15px;" >
            <div class="card1-body pb-0" >
                <i class="fa fa-money" style = "font-size:40px;" ></i >
                <h4 class="mb-0" id="tcost">
                </h4 >
                <p class="text-light" > Total Cost </p >
            </div >
        </div >
    </div >';
}
?>

<?php $position = $this->session->userdata['logged_in']['position'];
if ($position === 'Supply Officer') {
    echo '<div class="col-sm-6 col-lg-3">
        <div class="card1 text-white bg-flat-color-1" style="height: 130px; padding: 15px;">
            <div class="card1-body pb-0">
                <i class="fa fa-book" style="font-size:40px;"></i>
                <h4 class="mb-0" id="tItemsDay"></h4>
                <p class="text-light">Total Items Received</p>
            </div>
        </div>
    </div>' .

        '<div class="col-sm-6 col-lg-3" >
        <div class="card1 text-white bg-flat-color-3" style = "height: 130px; padding: 15px;" >
            <div class="card1-body pb-0" >
                <i class="fa fa-undo" style = "font-size:40px;" ></i >
                <h4 class="mb-0" id="tReturnedDay"></h4 >
                <p class="text-light" > Returned Items </p >
            </div >
        </div >
    </div >'.

        '<div class="col-sm-6 col-lg-3" >
        <div class="card1 text-white bg-flat-color-4" style = "height: 130px; padding: 15px;" >
            <div class="card1-body pb-0" >
                <i class="fa fa-clock-o" style = "font-size:40px;" ></i >
                <h4 class="mb-0" >
                    <span class="count" > 10468</span >
                </h4 >
                <p class="text-light" > Expired Items </p >
            </div >
        </div >
    </div >'.

        '<div class="col-sm-6 col-lg-3" >
        <div class="card1 text-white bg-flat-color-5" style = "height: 130px; padding: 15px;" >
            <div class="card1-body pb-0" >
                <i class="fa fa-money" style = "font-size:40px;" ></i >
                <h4 class="mb-0" >
                    <span class="count" > 10468</span >
                </h4 >
                <p class="text-light" > Total Cost </p >
            </div >
        </div >
    </div >';

}
?>



    <div class="col-xl-12">
        <div class="card" style="margin-top: 20px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="card-title mb-0">Traffic</h4>
                        <div class="small text-muted">October 2017</div>
                    </div>
                    <!--/.col-->
                    <div class="col-sm-8 hidden-sm-down">
                        <button type="button" class="btn btn-primary float-right bg-flat-color-1"><i class="fa fa-cloud-download"></i></button>
                        <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-3" data-toggle="buttons" aria-label="First group">
                                <label class="btn btn-outline-secondary">
                                    <input type="radio" name="options" id="option1"> Day
                                </label>
                                <label class="btn btn-outline-secondary active">
                                    <input type="radio" name="options" id="option2" checked=""> Month
                                </label>
                                <label class="btn btn-outline-secondary">
                                    <input type="radio" name="options" id="option3"> Year
                                </label>
                            </div>
                        </div>
                    </div><!--/.col-->


                </div><!--/.row-->
                <div class="chart-wrapper mt-4" >
                    <canvas id="trafficChart" style="height:120px;" height="120"></canvas>
                </div>

            </div>
            <div class="card-footer">
                <ul>
                    <li>
                        <div class="text-muted">Visits</div>
                        <strong>29.703 Users (40%)</strong>
                        <div class="progress progress-xs mt-2" style="height: 5px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li class="hidden-sm-down">
                        <div class="text-muted">Items</div>
                        <strong>24.093 Received (20%)</strong>
                        <div class="progress progress-xs mt-2" style="height: 5px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li>
                        <div class="text-muted">Items</div>
                        <strong>78.706 Issued (60%)</strong>
                        <div class="progress progress-xs mt-2" style="height: 5px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li class="hidden-sm-down">
                        <div class="text-muted">Items</div>
                        <strong>22.123 Requested (80%)</strong>
                        <div class="progress progress-xs mt-2" style="height: 5px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li class="hidden-sm-down">
                        <div class="text-muted">Items</div>
                        <strong>22.123 Returned (40%)</strong>
                        <div class="progress progress-xs mt-2" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>



    <div class="col-lg-4">
        <div class="card" style="height:350px;">
            <div class="card-header">
                <h4>Out of Stock Items</h4>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Item</th>
                    <th>Qty</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Laptop</td>
                    <td>10</td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /# card -->
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
    </div>
    <!-- /# card -->
</div>

<div class="col-lg-4">
    <div class="card" style="height:350px;">
        <div class="card-header">
            <h4>Department Usage</h4>
        </div>
        asdfghjkl
    </div>
    <!-- /# card -->
</div>


</div> <!-- .content -->
</div><!-- /#right-panel -->