<?php if($this->session->userdata['logged_in']['position'] === 'Supply Officer'){
    header('Location: Login/logout');
}
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Decrease Log</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                    <li class="active">Logs</li>
                    <li class="active">Decrease Log</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <!-- Inventory-->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="CO-tab" data-toggle="tab" href="#tab_content1"
                                   role="tab"
                                   aria-controls="co" aria-selected="true">Capital
                                    Outlay</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="MOOE-tab" data-toggle="tab" href="#tab_content2"
                                   role="tab"
                                   aria-controls="mooe" aria-selected="false">MOOE</a>
                            </li>
                        </ul>
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                            <!-- Capital Outaly tab-->
                            <div class="tab-pane fade show active" id="tab_content1" role="tabpanel"
                                 aria-labelledby="CO-tab">
                                <table id="datatable-buttons" data-pagination="true" data-search="true"
                                       data-toggle="table" data-url="logs/decreaseLog/CO" class="table table-bordered">
                                    <thead class="table-secondary">
                                    <tr>
                                        <th data-sortable="true" data-field="timestamp">Timestamp</th>
                                        <th data-sortable="true" data-field="department">Department</th>
                                        <th data-sortable="true" data-field="item">Item Name</th>
                                        <th data-sortable="true" data-field="description">Description</th>
                                        <th data-sortable="true" data-field="quantity">Quantity</th>
                                        <th data-sortable="true" data-field="unit">Unit</th>
                                        <th data-sortable="true" data-field="accountcode">Account Code</th>
                                        <th data-sortable="true" data-field="date">Date Acquired</th>
                                        <?php if($this->session->userdata['logged_in']['position'] !== 'Admin'){
                                            echo "<th data-sortable=\"true\" data-field=\"receivedfrom\">Received From</th>";
                                        } ;?>
                                    </tr>
                                    </thead>
                                </table>

                            </div>
                            <!--MOOE Tab-->
                            <div class="tab-pane fade" id="tab_content2" role="tabpanel" aria-labelledby="MOOE-tab">
                                <table id="datatable-buttons" data-pagination="true" data-search="true"
                                       data-toggle="table" data-url="logs/decreaseLog/MOOE" class="table table-bordered">
                                    <thead class="table-secondary">
                                    <tr>
                                        <th data-sortable="true" data-field="timestamp">Timestamp</th>
                                        <th data-sortable="true" data-field="department">Department</th>
                                        <th data-sortable="true" data-field="item">Item Name</th>
                                        <th data-sortable="true" data-field="description">Description</th>
                                        <th data-sortable="true" data-field="quantity">Quantity</th>
                                        <th data-sortable="true" data-field="unit">Unit</th>
                                        <th data-sortable="true" data-field="accountcode">Account Code</th>
                                        <th data-sortable="true" data-field="date">Date Acquired</th>
                                        <?php if($this->session->userdata['logged_in']['position'] !== 'Admin'){
                                            echo "<th data-sortable=\"true\" data-field=\"receivedfrom\">Received From</th>";
                                        } ;?>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

