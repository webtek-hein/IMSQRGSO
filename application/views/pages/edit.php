     <!-- page content -->
<div id="inventory-main-page" class="page-content right_col" role="main" xmlns:height="http://www.w3.org/1999/xhtml">
    <div class="inventory-tab">
        <div class="page-title">
            <h1>Edit Log</h1>
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

            <div class="x_content">
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="CO-tab">
                        <table id="datatable-buttons" data-pagination="true" data-search="true" data-toggle="table"
                               data-url="logs/editLog/CO" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th data-sortable="true" data-field="timestamp">Timestamp</th>
                                    <th data-sortable="true" data-field="fieldedited">Field Edited</th>
                                    <th data-sortable="true" data-field="oldvalue">Old Value</th>
                                    <th data-sortable="true" data-field="newvalue">New Value</th>
                                </tr>
                        </table>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="MOOE-tab">
                        <table id="datatable-buttons" data-pagination="true" data-search="true" data-toggle="table"
                               data-url="logs/editLog/MOOE" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th data-sortable="true" data-field="timestamp">Timestamp</th>
                                    <th data-sortable="true" data-field="fieldedited">Field Edited</th>
                                    <th data-sortable="true" data-field="oldvalue">Old Value</th>
                                    <th data-sortable="true" data-field="newvalue">New Value</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- /page content -->