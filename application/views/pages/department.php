<!-- page content -->
<div id="department" class="page-content" role="main" xmlns:height="http://www.w3.org/1999/xhtml">
    <div class="inventory-tab">
        <div class="page-title">
            <h1>Departments</h1>
        </div>
        <select id="selct-dept" type="button" class="deptopt btn btn-default"><i class="fa fa-chevron-down"></select>

        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" id="CO" class="active"><a href="#tab_content1" id="CO-tab" data-toggle="tab"
                                                                  role="tab" aria-expanded="true">Capital Outlay</a>
                </li>
                <li role="presentation" id="MOOE" class=""><a href="#tab_content2" role="tab" id="MOOE-tab"
                                                              data-toggle="tab" aria-expanded="true">MOOE</a>
                </li>
            </ul>
        </div>

        <div class="x_content">
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="CO-tab">
                    <div class="accordion" id="accordion" class="table-main table-responsive" role="tablist"
                         aria-multiselectable="true">

                        <table id="departmentTable" data-url="inventory/viewDept/CO/11" class="table table-no-bordered"
                               data-pagination="true" data-search="true">
                        </table>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="MOOE-tab">
                    <div class="accordion" id="accordion" class="table-responsive" role="tablist"
                         aria-multiselectable="true">
                        <table id="deptMOOEtable" data-pagination="true" data-search="true"
                               data-url="inventory/viewDept/MOOE/11" class="table table-no-bordered">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="detail-tab hidden">
        <button type="button" onclick="detail_back()" class="btn btn"></i> Back</a></button>
        <div class="x_title" id="DetailsHead">
            <form action="inventory/edititem" method="POST">
                <h4>Item Name: <b id="itemname"></b></h4>
                <p>Description: <b id="itemdesc"></b></p>
                <p>Total Quantity: <b id="total"></b></p>
                <p>Unit: <b id="unit"></b></p>
                <p>Type: <b id="itemtype"></b></p>
                <button type="submit" name="id" id="edtbutton" hidden>save</button>
            </form>
        </div>
        <div class="clearfix"></div>
        <!-- Main Table Content-->
        <div role="tabpanel" class="tab-pane fade active in" id="tab_cont." aria-labelledby="CO-tab">
            <a id="detailAddquantity" href="#" data-toggle="modal" data-target="#addquant"
               class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"></i> Add Quantity</a>

            <!-- Add Quantity -->
            <div id="addquant" class="modal fade Add_Item" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span
                                        aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Add Quantity</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal form-label-left" action="inventory/addquant" method="POST"
                                  novalidate>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label>Quantity</label>
                                    <input data-parsley-group="set2" data-parsley-trigger="blur" type="number"
                                           name="quant" min=0
                                           class="form-control has-feedback-left">
                                    <span class="fa fa-plus-square-o form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label>Unit Cost</label>
                                    <input type="number" min='0' name="cost" class="form-control has-feedback-left"
                                           id="inputSuccess3">
                                    <span class="fa fa-circle-o form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label>Delivery Date</label>
                                    <input type="date" name="del" class="form-control has-feedback-left">
                                    <span class="fa fa-calendar-plus-o form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label>Date Received</label>
                                    <input type="date" name="rec" data-validate-length-range="5,20"
                                           class="optional form-control has-feedback-left">
                                    <span class="fa fa-calendar-check-o form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label>Expiration Date</label>
                                    <input type="date" name="exp" data-validate-length-range="5,20"
                                           class="optional form-control has-feedback-left">
                                    <span class="fa fa-calendar-times-o form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>

                                <div class="col-md-4 form-group has-feedback">
                                    <label>Supplier</label>
                                    <select list="typelist" name="supp"
                                            class="supplieropt form-control has-feedback-left"
                                            placeholder="Type">
                                    </select>
                                    <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label>Official Receipt Number</label>
                                    <input data-parsley-group="set2" data-parsley-trigger="blur" type="number"
                                           name="quant" min=0 class="form-control has-feedback-left">
                                    <span class="fa fa-ticket form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn-modal btn btn-default" id="savequant" name="id"
                                    value="1" id="quantsave">
                                <i class="fa fa-arrow-down"> Save</i>
                            </button>
                            <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">
                                <i class="fa fa-close"> Cancel</i>
                            </button>
                        </div>
                        </form>

                    </div>

                </div>
            </div>

            <table id="detail-tab-table" class="table table-no-bordered table-hover">
            </table>

            <!-- Serial Accordion-->
            <div id="data1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <div class="col-md-offset-2">
                        <h4><b>List of Serial</b></h4>
                            <!-- Dynamic serial tabs here -->
                            <ul id="serial-tabs" class="nav nav-tabs">
                            </ul>
                            <!-- end of serial tabs -->
                            <div id="serial-tabcontent" class="tab-content">
                            </div>
                    </div>
                </div>
            </div>
            <!-- /Serial Accordion-->
        </div>
        <!-- end of Main Table Content-->

    </div>
</div>

<!-- /page content -->