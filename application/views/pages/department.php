<!-- page content -->
<div id="inventory-main-page" class="page-content right_col" role="main" xmlns:height="http://www.w3.org/1999/xhtml">
        <div class="page-title">

        </div>

        <div class="clearfix"></div>

        <div class="inventory-tab row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 id="deptNameDistrib">Departments</h2>
                        <div class="clearfix"></div>
                    </div>
                    <select id="selct-dept" type="button" class="deptopt btn btn-default"><i class="fa fa-chevron-down"></select>
                    <div class="x_content">

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" id="CO"  class="active"><a href="#tab_content1" id="CO-tab" data-toggle="tab"  role="tab" aria-expanded="true">Capital Outlay</a>
                                </li>
                                <li role="presentation" id="MOOE" class=""><a  href="#tab_content2" role="tab" id="MOOE-tab" data-toggle="tab" aria-expanded="true">MOOE</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="CO-tab">
                                    <table id="departmentTable" data-url="inventory/viewDept/CO/11"  data-toggle="table" data-pagination="true"
                                           data-search="true" class="table table-striped table-bordered">
                                        <thead>
                                        <tr data-toggle="collapse" data-target="#accordion" class="clickable">
                                            <th data-sortable="true" data-field="name">Item Name</th>
                                            <th data-sortable="true" data-field="description">Description</th>
                                            <th data-sortable="true" data-field="quant">quantity</th>
                                            <th data-sortable="true" data-field="rec">Date Received</th>
                                            <th data-sortable="true" data-field="unit">Unit</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="MOOE-tab">
                                    <table id="datatable" data-pagination="true" data-search="true" data-toggle="table" data-url="inventory/viewDept/MOOE/11" data-show-toggle="true" class="table table-striped table-bordered">
                                        <thead>
                                        <tr data-toggle="collapse" data-target="#accordion" class="clickable">
                                            <th data-sortable="true" data-field="name">Item Name</th>
                                            <th data-sortable="true" data-field="description">Description</th>
                                            <th data-sortable="true" data-field="quant">quantity</th>
                                            <th data-sortable="true" data-field="rec">Date Received</th>
                                            <th data-sortable="true" data-field="unit">Unit</th>
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
    <div class="clearfix"></div>
    <div class="detail-tab hidden">
</div>
<!-- /page content -->