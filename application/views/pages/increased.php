<!-- page content -->
<div id="increaseLogsPage" class="page-content" role="main" xmlns:height="http://www.w3.org/1999/xhtml">
    <div class="inventory-tab">
        <div class="page-title">
            <h1>Increase Log</h1>
        </div>
    </div>

    <div class="x_content">

        <div class="accordion" id="accordion" class="table-main table-responsive" role="tablist"
             aria-multiselectable="true">
            <!-- Implement Bootsrap table-->
            <table data-pagination="true" data-search="true" id="itemtable" class="main table-no-bordered"
                   class="table table-no-bordered table-hover">
            </table>
        </div>

        <table id="increaseLogsTable" data-pagination="true" data-search="true" data-toggle="table"
               data-url="logs/increaseLog" class="table table-no-bordered">
            <thead>
            <!-- Data-field for getting data  -->
            <tr data-toggle="collapse" data-target="#accordion" class="clickable">
                <th data-sortable="true" data-field="timestamp">Timestamp</th>
                <th data-sortable="true" data-field="item">Item Name</th>
                <th data-sortable="true" data-field="description">Description</th>
                <th data-sortable="true" data-field="quantity">Qty</th>
                <th data-sortable="true" data-field="unit">Unit</th>
                <th data-sortable="true" data-field="type">Type</th>
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
