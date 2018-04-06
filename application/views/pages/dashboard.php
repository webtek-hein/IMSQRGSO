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
    echo '<div class="col-sm-6 col-lg-3">
        <div class="card1 text-white bg-flat-color-1" style="height: 130px; padding: 15px;">
            <div class="card1-body pb-0">
                <i class="fa fa-book" style="font-size:40px;"></i>
                <h4 class="mb-0" id="itemsrec">
                </h4>
                <p class="text-light">New Items Received</p>
            </div>
        </div>
    </div>' .

    '<div class="col-sm-6 col-lg-3" >
        <div class="card1 text-white bg-flat-color-2" style = "height: 130px; padding: 15px;" >
            <div class="card1-body pb-0" >
                <i class="fa fa-truck" style = "font-size:40px;" ></i >
                <h4 class="mb-0" id="itemsiss" >
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
    </div >'.

    '<div class="col-sm-6 col-lg-3" >
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
    echo '<div class="col-sm-8 col-lg-3">
        <div class="card1 text-white bg-flat-color-1" style="height: 130px; padding: 15px;">
            <div class="card1-body pb-0">
                <i class="fa fa-book" style="font-size:40px;"></i>
                <h4 class="mb-0" id="itemsrec">
                </h4>
                <p class="text-light">New Items Received</p>
            </div>
        </div>
    </div>' .

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

<?php $position = $this->session->userdata['logged_in']['position'];
if ($position === 'Supply Officer') {
    echo 
    '<div class="col-sm-6 col-lg-3">
        <div class="card1 text-white bg-flat-color-2" style="height: 130px; padding: 15px;">
            <div class="card1-body pb-0">
                <i class="fa fa-bell" style="font-size:40px;"></i>
                <h4 class="mb-0" id="pendItems"></h4>
                <p class="text-light">Pending Items</p>
            </div>
        </div>
    </div>' .

    '<div class="col-sm-6 col-lg-3">
        <div class="card1 text-white bg-flat-color-1" style="height: 130px; padding: 15px;">
            <div class="card1-body pb-0">
                <i class="fa fa-book" style="font-size:40px;"></i>
                <h4 class="mb-0" id="tItemsDay"></h4>
                <p class="text-light">New Items</p>
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
                <h4 class="mb-0" id="tExprdSO"></h4 >
                <p class="text-light" > Expired Items </p >
            </div >
        </div >
    </div >'.

        '<div class="col-sm-6 col-lg-3" >
        <div class="card1 text-white bg-flat-color-5" style = "height: 130px; padding: 15px;" >
            <div class="card1-body pb-0" >
                <i class="fa fa-money" style = "font-size:40px;" ></i >
                <h4 class="mb-0" id="tCostSO"></h4 >
                <p class="text-light" > Total Inventory Cost </p >
            </div >
        </div >
    </div >';

}
?>
