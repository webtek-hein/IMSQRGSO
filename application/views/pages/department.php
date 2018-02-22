<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 id="deptNameDistrib"></h2>
                        <button type="button" class="btn btn-default">Departments <i class="fa fa-chevron-down"></i></button>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content1" id="CO-tab" role="tab" data-toggle="tab" aria-expanded="true">Capital Outlay</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="MOOE-tab" data-toggle="tab" aria-expanded="false">MOOE</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="CO-tab">
                                    <table id="departmentTable"  data-toggle="table" data-pagination="true"
                                           data-search="true" data-show-toggle="true" class="table table-striped table-bordered">
                                        <thead>
                                        <tr data-toggle="collapse" data-target="#accordion" class="clickable">
                                            <th data-sortable="true" data-field="name">Item Name</th>
                                            <th data-sortable="true" data-field="description">Description</th>
                                            <th data-sortable="true" data-field="quant">quantity</th>
                                            <th data-sortable="true" data-field="rec">Date Received</th>
                                            <th data-sortable="true" data-field="unit">Unit</th>
                                            <th data-sortable="true" data-field="action">Action</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="MOOE-tab">
                                    <table id="datatable" data-pagination="true" data-search="true" data-toggle="table" data-url="" data-show-toggle="true" class="table table-striped table-bordered">
                                        <thead>
                                        <tr data-toggle="collapse" data-target="#accordion" class="clickable">
                                            <th data-sortable="true">Item Name</th>
                                            <th data-sortable="true">Description</th>
                                            <th data-sortable="true">quantity</th>
                                            <th data-sortable="true">Date Received</th>
                                            <th data-sortable="true">Unit</th>
                                        </tr>
                                        <tbody>
                                        </tbody>
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
</div>
<!-- /page content -->