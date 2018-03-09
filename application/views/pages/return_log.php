
        <!-- page content -->
<div id="return_logPage" class="page-content right_col" role="main" xmlns:height="http://www.w3.org/1999/xhtml">
    <div class="inventory-tab">
        <div class="page-title">
            <h1>Return Log</h1>
        </div>

        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#tab_content1" id="CO-tab" role="tab" data-toggle="tab" aria-expanded="true">Capital Outlay</a>
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
                        <table id="datatable-buttons" data-pagination="true" data-search="true" data-toggle="table"
                               data-url="logs/returnLog" class="table table-no-bordered">
                            <thead>
                                <tr>
                                    <th data-sortable="true" data-field="timestamp">Timestamp</th>
                                    <th data-sortable="true" data-field="serial">Serial no.</th>
                                    <th data-sortable="true" data-field="item">Item Name</th>
                                    <th data-sortable="true" data-field="description">Item Description</th>
                                    <th data-sortable="true" data-field="datereturned">Date Returned</th>
                                    <th data-sortable="true" data-field="reason">Reason</th>
                                    <th data-sortable="true" data-field="returnedby">Returned By</th>
                                    <th data-sortable="true" data-field="receivedby">Received By</th>
                                    <th data-sortable="true" data-field="status">Returned Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
</div>
