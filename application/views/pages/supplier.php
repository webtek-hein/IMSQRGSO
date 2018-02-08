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
                        <h2>Supplier</h2>
                        <div class="clearfix"></div>
                    </div>
                            <div class="x_content">
                                            <!-- start accordion -->
                                            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                                <div class="panel">
                                                    <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <h4 class="panel-title">Add Supplier</h4>
                                                    </a>
                                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">

                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="x_panel">
                                                                    <div class="x_content">
                                                                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Supplier Name</label>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Address</label>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Contact Number</label>
                                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                    <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                                                                </div>
                                                                            </div>

                                                                            <div class="ln_solid"></div>
                                                                            <div class="form-group">
                                                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                                                                                    <button class="btn btn-primary" type="button"><i class="fa fa-close"></i> Cancel</button>
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

                                            </div>
                                            <!-- end of accordion -->

                                <div class="x_content">

                                    <table id="datatable" class="table table-striped table-bordered"  data-pagination="true" data-search="true" data-toggle="table" data-url="inventory/viewitem" data-show-toggle="true" class="table table-hover">
                                        <thead>
                                        <!-- Data-field for getting data  -->
                                        <tr >
                                            <th >Supplier Name</th>
                                            <th a>Address</th>
                                            <th >Contact Number</th>
                                        </tr>
                                        </thead>
                                        <!-- start of Item Details -->
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <!-- Data-field for getting data  -->
                                        <tr >
                                            <th >Supplier Name</th>
                                            <th a>Address</th>
                                            <th >Contact Number</th>
                                        </tr>
                                        </tfoot>
                                        <!-- end of Item Details-->
                                    </table>
                            </div>
                </div>
            </div>
        </div>
    </div>
    </div>
        <!-- Add Supplier -->
        <div class="modal fade Supplier" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Unit<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
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
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Type<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="type" list="typelist" name="Type" class="form-control col-md-7 col-xs-12" required="required" placeholder="Type">
                                    <datalist id="typelist">
                                        <option value="CO">CO</option>
                                        <option value="MOOE">MOOE</option>
                                    </datalist>
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
                                <label for="password" class="control-label col-md-3">Unit Cost</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" name="cost" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required" placeholder="Unit Cost">
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Supplier<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="supp" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="Supplier">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="id" value="1" id="save1"><i class="fa fa-arrow-down"></i> Save</button>
                        <button type="button" class="btn btn-danger" id="cancel1" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- end of add Supplier -->
</div>
    <div class="clearfix"></div>
</div>
</div>
<!-- /page content -->