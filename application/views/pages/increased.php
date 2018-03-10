<!-- page content -->
<div id="increaseLogsPage" class="page-content" role="main" xmlns:height="http://www.w3.org/1999/xhtml">
    <div class="inventory-tab">
        <div class="page-title">
            <h1>Increase Log</h1>
        </div>

        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#tab_content1" id="CO-tab" role="tab" data-toggle="tab" aria-expanded="true">Capital
                        Outlay</a>
                </li>
                <li role="presentation" class="">
                    <a href="#tab_content2" role="tab" id="MOOE-tab" data-toggle="tab" aria-expanded="false">MOOE</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="x_content">
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="CO-tab">
                <!-- Implement Bootsrap table-->
                <table id="increaseLogsTable" data-pagination="true" data-search="true" data-toggle="table"
                       data-url="logs/increaseLog/CO" class="table table-no-bordered">
                    <thead>
                    <!-- Data-field for getting data  -->
                    <tr data-toggle="collapse" data-target="#accordion" class="clickable">
                        <th data-sortable="true" data-field="timestamp">Timestamp</th>
                        <th data-sortable="true" data-field="item">Item Name</th>
                        <th data-sortable="true" data-field="description">Description</th>
                        <th data-sortable="true" data-field="quantity">Qty</th>
                        <th data-sortable="true" data-field="unit">Unit</th>
                        <th data-sortable="true" data-field="del">Delivery Date</th>
                        <th data-sortable="true" data-field="rec">Date Received</th>
                        <th data-sortable="true" data-field="cost">Unit Cost</th>
                        <th data-sortable="true" data-field="exp">Exp Date</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div role="tabpanel" class="tab-pane fade active" id="tab_content2" aria-labelledby="MOOE-tab">
                <table id="" data-pagination="true" data-search="true" data-toggle="table"
                       data-url="logs/increaseLog/MOOE" class="table table-no-bordered">
                    <thead>
                    <!-- Data-field for getting data  -->
                    <tr data-toggle="collapse" data-target="#accordion" class="clickable">
                        <th data-sortable="true" data-field="timestamp">Timestamp</th>
                        <th data-sortable="true" data-field="item">Item Name</th>
                        <th data-sortable="true" data-field="description">Description</th>
                        <th data-sortable="true" data-field="quantity">Qty</th>
                        <th data-sortable="true" data-field="unit">Unit</th>
                        <th data-sortable="true" data-field="del">Delivery Date</th>
                        <th data-sortable="true" data-field="rec">Date Received</th>
                        <th data-sortable="true" data-field="cost">Unit Cost</th>
                        <th data-sortable="true" data-field="exp">Exp Date</th>
                    </tr>
                    </thead>
                </table>
            </div>

        </div>
    </div>

    <!-- /page content -->
