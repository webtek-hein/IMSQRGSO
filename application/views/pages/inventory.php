<!-- page content -->
<div class="right_col" role="main" xmlns:height="http://www.w3.org/1999/xhtml">
    <div class="">


        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Inventory</h2>
                    <div class="clearfix"></div>
                </div>
                <!--Accordion-->
                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="false">
                    <!--ADD ITEM-->
                    <div class="panel">
                        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h4 class="panel-title">Add Item</h4>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_content">
                                            <form class="form-horizontal form-label-left input_mask" action="inventory/additem" method="POST">
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input type="text" name="item" class="form-control" id="inputSuccess2" placeholder="Item Name">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input type="number" min='0' name="cost" class="form-control" id="inputSuccess3" placeholder="Unit Cost">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input type="number" min='0' name="quant" class="form-control" id="inputSuccess4" placeholder="Quantity">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input  name="Unit" required="required" class="form-control col-md-7 col-xs-12" class="unit" list="list" placeholder="Unit">
                                                    <datalist id="list">
                                                        <option value="piece">piece</option>
                                                        <option value="box">box</option>
                                                        <option value="set">set</option>
                                                        <option value="ream">ream</option>
                                                        <option value="dozen">dozen</option>
                                                        <option value="bundle">bundle</option>
                                                        <option value="sack">sack</option>
                                                        <option value="others">others</option>
                                                    </datalist>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <select id="type" list="typelist" name="Type" class="form-control"  required placeholder="Type">
                                                        <option value="CO">Capital Outlay</option>
                                                        <option value="MOOE">MOOE</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input type="date" name="del" class="form-control" id="inputSuccess4" placeholder="Delivery Date">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input type="date" name="rec" class="form-control" id="inputSuccess4" placeholder="Date Received">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input type="date" name="exp" class="form-control" id="inputSuccess4" placeholder="Expiration Date">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <select list="typelist"  name="supp" class="supplieropt form-control"  required placeholder="Type">
                                                        <option value="CO">supplier 1</option>
                                                        <option value="MOOE">supplier 2</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <textarea id="message" required="required" class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                                              data-parsley-validation-threshold="10" placeholder="Description"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                                                        <button class="btn btn-primary" type="button"><i class="fa fa-close"></i> Cancel</button>
                                                        <button class="btn btn-danger" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                                                        <button type="submit" class="btn btn-success"><i class="fa fa-send"></i> Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--ADD BULK-->
                    <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h4 class="panel-title">Add Bulk</h4>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_content">
                                            <form class="form-horizontal form-label-left input_mask" action="inventory/additem" method="POST">
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input type="text" name="item" class="form-control" id="inputSuccess2" placeholder="Item Name">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input type="number" min='0' name="cost" class="form-control" id="inputSuccess3" placeholder="Unit Cost">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input type="number" min='0' name="quant" class="form-control" id="inputSuccess4" placeholder="Quantity">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input  name="Unit" required="required" class="form-control col-md-7 col-xs-12" class="unit" list="list" placeholder="Unit">
                                                    <datalist id="list">
                                                        <option value="piece">piece</option>
                                                        <option value="box">box</option>
                                                        <option value="set">set</option>
                                                        <option value="ream">ream</option>
                                                        <option value="dozen">dozen</option>
                                                        <option value="bundle">bundle</option>
                                                        <option value="sack">sack</option>
                                                        <option value="others">others</option>
                                                    </datalist>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <select id="type" list="typelist" name="Type" class="form-control"  required placeholder="Type">
                                                        <option value="Capital Outlay">Capital Outlay</option>
                                                        <option value="MOOE">MOOE</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input type="date" name="del" class="form-control" id="inputSuccess4" placeholder="Delivery Date">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input type="date" name="rec" class="form-control" id="inputSuccess4" placeholder="Date Received">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input type="date" name="exp" class="form-control" id="inputSuccess4" placeholder="Expiration Date">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input type="text" name="supp" class="form-control" id="inputSuccess5" placeholder="Supplier">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <textarea id="message" required="required" class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                                              data-parsley-validation-threshold="10" placeholder="Description"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                                                        <button type="button" class="btn btn-default"><i class="fa fa-mail-reply"></i> Privious</button>
                                                        <button type="submit" class="btn btn-success"><i class="fa fa-send"></i> Submit</a></button>
                                                        <button type="button" class="btn btn-default"><i class="fa fa-mail-forward"></i> Next</button>
                                                    </div>
                                                </div>
                                                <nav>
                                                    <ul class="pagination pg-blue">
                                                        <li class="page-item disabled">
                                                            <a class="page-link" href="#" aria-label="Previous">
                                                                <span aria-hidden="true">&laquo;</span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                        </li>
                                                        <li class="page-item active">
                                                            <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                                        </li>
                                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="#" aria-label="Next">
                                                                <span aria-hidden="true">&raquo;</span>
                                                                <span class="sr-only">Next</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /ADD BULK-->
                </div>
                <!-- Main Table Content-->
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="CO-tab" role="tab" data-toggle="tab" aria-expanded="true">Capital Outlay</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="MOOE-tab" data-toggle="tab" aria-expanded="false">MOOE</a>
                            </li>
                        </ul>

                        <div id="myTabContent" class="tab-content">
                            <!-- Capital Outaly tab-->
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="CO-tab">

                                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                    <!-- Implement Bootsrap table-->
                                    <div class="x_panel">
                                        <table data-pagination="true" data-search="true" data-toggle="table" data-url="inventory/viewitem/CO" data-show-toggle="true" class="table table-no-bordered table-hover">
                                            <thead>
                                            <!-- Data-field for getting data  -->
                                            <tr >
                                                <th data-sortable="true" data-field="number">#</th>
                                                <th data-sortable="true" data-field="item">Item Name</th>
                                                <th data-sortable="true" data-field="description">Description</th>
                                                <th data-sortable="true" data-field="quantity">Quantity</th>
                                                <th data-sortable="true" data-field="unit">Unit</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!--MOOE Tab-->
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="MOOE-tab">
                                <!-- Implement Bootsrap table-->
                                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                    <table id="datatable"  data-pagination="true" data-search="true" data-toggle="table" data-url="inventory/viewitem/MOOE" data-show-toggle="true" class="table table-no-bordered table-hover">
                                        <thead>
                                        <!-- Data-field for getting data  -->
                                        <tr  data-toggle="collapse" data-target="#accordion" class="clickable">
                                            <th data-sortable="true" data-field="number">#</th>
                                            <th data-sortable="true" data-field="item">Item Name</th>
                                            <th data-sortable="true" data-field="description">Description</th>
                                            <th data-sortable="true" data-field="quantity">Quantity</th>
                                            <th data-sortable="true" data-field="unit">Unit</th>
                                            <th data-field="action">Action</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of Main Table Content-->
            </div>


            <!-- Modals -->

            <!-- Item Detail -->
            <div id="Item_Detail" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="height:500px;">
                <div class="modal-dialog-lg">
                    <div class="modal-content">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Item Details</h2>
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                    </button>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-xs-2">
                                        <h4><b>Item Name:</b></h4>
                                        <p>Laptop</p>
                                        <br>
                                        <h4><b>Description:</b></h4>
                                        <p>Dell Latitude E6420 </br> 14" </br> Core i5 2520M </br> 4 GB RAM</br> 320 GB HDD </br> English</p>

                                    </div>

                                    <div class="col-xs-10">
                                        <table id="itemdet" class="table table-striped table-no-bordered">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end of Item Detail -->

<!-- Add Quantity -->
<div id="addquant" class="modal fade Add_Item" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Quantity</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label-left" action="inventory/addquant" method="POST" novalidate>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="quant" min=0 required="required" class="form-control col-md-7 col-xs-12" placeholder="Quantity">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Unit Cost<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                            <input type="number" min='0' name="cost" class="form-control" id="inputSuccess3" placeholder="Unit Cost">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Delivery Date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" name="del" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Date Received<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" name="rec" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Expiration Date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" name="exp" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class=" control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Supplier<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select list="typelist"  name="supp" class="supplieropt form-control"  required placeholder="Type">
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn-modal btn btn-primary" name="id" value="1" id="quantsave"><i class="fa fa-arrow-down"></i> Save</button>
                <button type="button" class="btn btn-danger" id="cancel1" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- end of add quantity -->

<!-- View Serial -->
<div id="addquant" class="modal fade View_serial" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">View Serial</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label-left" action="inventory/addquant" method="POST" novalidate>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="quant" min=0 required="required" value="6161d6sdcd" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="quant" min=0 required="required" value="6161d6sdcd" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="quant" min=0 value="6161d6sdcd" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="quant" min=0 value="6161d6sdcd" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="quant" min=0 value="6161d6sdcd" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="quant" min=0 value="6161d6sdcd" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn-modal btn btn-primary" name="id" value="1" id="quantsave"><i class="fa fa-arrow-down"></i> Save</button>
                <button type="button" class="btn btn-danger" id="cancel1" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- end of view serial -->

<!--Distribution-->
<div id="myModal" class="modal fade Distribute" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Distribution</h4>
            </div>
            <div class="modal-body">
                <p><small>Inputed 3 out 5 serial.</small></p>
                <b>Distribute Item with Serial:</b>
                <div class="checkbox">
                   <ul>
                       <li>123456</li>
                       <li>123485</li>
                       <li>741595</li>
                   </ul>
                </div>
                <b>To</b>

                <form class="form-horizontal form-label-left" method="POST" action="inventory/distribute"  novalidate>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Quantity<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="website" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="quantity" required="required" type="text" placeholder="Qauntity">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Serial<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="website" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="serial" required="required" type="text" placeholder="Serial">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Department<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-8 form-group">
                            <select list="typelist"  name="dept" class="deptopt form-control"  required placeholder="Type">
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Account Code<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-8 form-group">
                            <select list="typelist"  name="Code" class="accode form-control"  required placeholder="Account Code">
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receiving Person<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="website" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="owner" required="required" type="text" placeholder="Receiving Person">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="po">PO Number<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="website" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="po" required="required" type="text" placeholder="PO Number">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">PR Number<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="website" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="pr" required="required" type="text" placeholder="PR Number">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">OBR Number<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="website" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="obr" required="required" type="text" placeholder="OBR Number">
                        </div>
                    </div>

                <div class="modal-footer">
                    <button type="submit" class="btn-modal btn btn-primary" id="save1"><i class="fa fa-arrow-down"></i> Save</button>
                    <button type="button" class="btn btn-danger" id="cancel1" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- end of distribution-->

<!--Edit-->
<div id="edit_modal" class="modal fade Edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label-left" method="POST" action="inventory/edititem" novalidate>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Item Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="item" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="item" required="required" type="text" placeholder="Item Name">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="description" type="text" name="description" required="required" class="form-control col-md-7 col-xs-12" placeholder="Description">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Unit<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="Unit"  type="text" name="Unit" required="required" class="form-control col-md-7 col-xs-12" placeholder="Unit">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Type<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="Type" type="text" name="Type" required="required" class="form-control col-md-7 col-xs-12" placeholder="Type">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="id" class="btn-modal btn btn-primary" id="save1"><i class="fa fa-arrow-down"></i> Save</button>
                <button type="button" class="btn btn-danger" id="cancel1" data-dismiss="modal">Cancel</button>
            </div>

        </div>
        </form>
    </div>
</div>
<!--end of edit-->

<!-- Add Quantity -->
<div id="addquant" class="modal fade Add_Quantity" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Quantity</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label-left" action="inventory/addquant" method="POST" novalidate>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Quantity<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="quant" min=0 required="required" class="form-control col-md-7 col-xs-12" placeholder="Quantity">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn-modal btn btn-primary" name="id" value="1" id="quantsave"><i class="fa fa-arrow-down"></i> Save</button>
                <button type="button" class="btn btn-danger" id="cancel1" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- end of add quantity -->

<!-- /Modal -->
</div>
</div>
</div>