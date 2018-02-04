<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>


        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Inventory</h2>
                    <div class="clearfix"></div>
                </div>


                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="false">
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
                                                <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                                    <input type="text" name="item" class="form-control" id="inputSuccess2" placeholder="Item Name">
                                                </div>
                                                <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                                    <input type="text" name="description" class="form-control" id="inputSuccess4" placeholder="Description">
                                                </div>
                                                <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                                    <input type="text" name="cost" class="form-control" id="inputSuccess3" placeholder="Unit Cost">
                                                </div>
                                                <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                                    <input type="number" name="quant" class="form-control" id="inputSuccess4" placeholder="Quantity">
                                                </div>
                                                <div class="col-md-5 col-sm-5 col-xs-12 form-group">
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

                                                <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                                    <select id="type" list="typelist" name="Type" class="form-control col-md-7 col-xs-12"  required placeholder="Type">
                                                        <option value="Capital Outlay">Capital Outlay</option>
                                                        <option value="MOOE">MOOE</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                                    <input type="date" name="del" class="form-control" id="inputSuccess4" placeholder="Delivery Date">
                                                </div>
                                                <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                                    <input type="date" name="rec" class="form-control" id="inputSuccess4" placeholder="Date Received">
                                                </div>
                                                <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                                    <input type="date" name="exp" class="form-control" id="inputSuccess4" placeholder="Expiration Date">
                                                </div>
                                                <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                                                    <input type="text" name="supp" class="form-control" id="inputSuccess5" placeholder="Supplier">
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

                    <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h4 class="panel-title">Add Bulk</h4>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">

                                        <!-- Smart Wizard -->

                                        <div id="wizard" class="form_wizard wizard_horizontal">
                                            <ul class="wizard_steps">
                                                <li>
                                                    <a href="#step-1">
                                                        <span class="step_no">1</span>
                                                        <span class="step_descr">
                                                    Item 1<br />
                                                </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-2">
                                                        <span class="step_no">2</span>
                                                        <span class="step_descr">
                                                    Item 2<br />
                                                </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-3">
                                                        <span class="step_no">3</span>
                                                        <span class="step_descr">
                                                    Item 3<br />
                                                </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-4">
                                                        <span class="step_no">4</span>
                                                        <span class="step_descr">
                                                    Item 4<br />
                                                </span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div id="step-1">


                                            </div>

                                            <div id="step-2">

                                            </div>
                                            <div id="step-3">

                                            </div>
                                            <div id="step-4">

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End SmartWizard Content -->
                    <!-- end of accordion -->

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
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="CO-tab">

                                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item Name</th>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>1</th>
                                                <td><a role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#data1" aria-expanded="true" aria-controls="collapseOne">Laptop</a></td>
                                                <td>Dell</td>
                                                <td>3</td>
                                                <td>Piece</td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target=".Add_Item" class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"></i> Add Quantity</a>
                                                    <a href="#" data-toggle="modal" data-target=".Edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                                </td>
                                            </tr>

                                            <!-- Item Details -->
                                            <tr>
                                                <td colspan="12">
                                                    <div id="data1" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="x_content">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped jambo_table bulk_action">
                                                                            <thead>
                                                                            <tr class="headings">
                                                                                <th>
                                                                                    <input type="checkbox" id="check-all" class="flat">
                                                                                </th>
                                                                                <th class="column-title">Delivery Date</th>
                                                                                <th class="column-title">Date Received</th>
                                                                                <th class="column-title">Expiration Date</th>
                                                                                <th class="column-title">Cost</th>
                                                                                <th class="column-title">Account Code</th>
                                                                                <th class="column-title no-link last"><span class="nobr">Supplier</span>
                                                                                </th>
                                                                                <th class="bulk-actions" colspan="11">
                                                                                    <a class="antoo" style="color:#fff; font-weight:00;">( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                                                </th>
                                                                            </tr>
                                                                            </thead>

                                                                            <tbody>
                                                                            <tr class="even pointer">
                                                                                <td class="a-center ">
                                                                                    <input type="checkbox" class="flat" name="table_records">
                                                                                </td>
                                                                                <td class=" ">-01/03/18</td>
                                                                                <td class=" ">-01/03/18</td>
                                                                                <td class=" ">-03/03/18</td>
                                                                                <td class=" ">28,000</td>
                                                                                <td class="a-right a-right ">Office</td>
                                                                                <td class=" last">Sony<a href="#"></a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr class="odd pointer">
                                                                                <td class="a-center ">
                                                                                    <input type="checkbox" class="flat" name="table_records">
                                                                                </td>
                                                                                <td class=" ">-05/20/18/</td>
                                                                                <td class=" "></td>
                                                                                <td class=" "></td>
                                                                                <td class=" "></td>
                                                                                <td class="a-right a-right "></td>
                                                                                <td class=" last"><a href="#"></a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr class="even pointer">
                                                                                <td class="a-center ">
                                                                                    <input type="checkbox" class="flat" name="table_records">
                                                                                </td>
                                                                                <td class=" ">-09/10/18-</td>
                                                                                <td class=" "></td>
                                                                                <td class=" "></td>
                                                                                <td class=" "></td>
                                                                                <td class="a-right a-right "></td>
                                                                                <td class=" last"><a href="#"></a>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>

                                                                        <div >
                                                                            <div class="col-sm-12 text-center">
                                                                                <a href="#" data-toggle="modal" data-target=".Distribute" class="btn btn-info btn-md"><i class="fa fa-minus-circle"></i> Distribute</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                </td>
                                            </tr>
                                            <!--/Item Details-->

                                            <!--Item Details-->
                                            <tr>
                                                <th>2</th>
                                                <td><a role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#data2" aria-expanded="true" aria-controls="collapseTwo">TV</a></td>
                                                <td>Sony</td>
                                                <td>5</td>
                                                <td>Piece</td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target=".Add_Item" class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"></i> Add Quantity</a>
                                                    <a href="#" data-toggle="modal" data-target=".Edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                                </td>
                                            </tr>
                                            <!-- Item Details -->
                                            <tr>
                                                <td colspan="12">
                                                    <div id="data2" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingTwo">
                                                        <div class="panel-body">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="x_content">

                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped jambo_table bulk_action">
                                                                                <thead>
                                                                                <tr class="headings">
                                                                                    <th>
                                                                                        <input type="checkbox" id="check-all" class="flat">
                                                                                    </th>
                                                                                    <th class="column-title">Delivery Date</th>
                                                                                    <th class="column-title">Date Received</th>
                                                                                    <th class="column-title">Expiration Date</th>
                                                                                    <th class="column-title">Cost</th>
                                                                                    <th class="column-title">Account Code</th>
                                                                                    <th class="column-title no-link last"><span class="nobr">Supplier</span>
                                                                                    </th>
                                                                                    <th class="bulk-actions" colspan="11">
                                                                                        <a class="antoo" style="color:#fff; font-weight:00;">( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                                                    </th>
                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                <tr class="even pointer">
                                                                                    <td class="a-center ">
                                                                                        <input type="checkbox" class="flat" name="table_records">
                                                                                    </td>
                                                                                    <td class=" ">-01/03/18</td>
                                                                                    <td class=" ">-01/03/18</td>
                                                                                    <td class=" ">-03/03/18</td>
                                                                                    <td class=" ">28,000</td>
                                                                                    <td class="a-right a-right ">Office</td>
                                                                                    <td class=" last">Sony<a href="#"></a>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="odd pointer">
                                                                                    <td class="a-center ">
                                                                                        <input type="checkbox" class="flat" name="table_records">
                                                                                    </td>
                                                                                    <td class=" ">-05/20/18/</td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class="a-right a-right "></td>
                                                                                    <td class=" last"><a href="#"></a>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="even pointer">
                                                                                    <td class="a-center ">
                                                                                        <input type="checkbox" class="flat" name="table_records">
                                                                                    </td>
                                                                                    <td class=" ">-09/10/18-</td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class="a-right a-right "></td>
                                                                                    <td class=" last"><a href="#"></a>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>

                                                                            <div >
                                                                                <div class="col-sm-12 text-center">
                                                                                    <a href="#" data-toggle="modal" data-target=".Distribute" class="btn btn-info btn-md"><i class="fa fa-minus-circle"></i> Distribute</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!--/Item Details-->
                                            <!--Item Detail-->
                                            <tr>
                                                <th>3</th>
                                                <td ><a role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#data3" aria-expanded="true" aria-controls="collapseThree">TV</a></td>
                                                <td>Sony</td>
                                                <td>1</td>
                                                <td>Piece</td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target=".Add_Item" class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"></i> Add Quantity</a>
                                                    <a href="#" data-toggle="modal" data-target=".Edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                                </td>
                                            </tr>
                                            <!-- Item Details -->
                                            <tr>
                                                <td colspan="12">
                                                    <div id="data3" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingThree">
                                                        <div class="panel-body">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="x_content">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped jambo_table bulk_action">
                                                                                <thead>
                                                                                <tr class="headings">
                                                                                    <th>
                                                                                        <input type="checkbox" id="check-all" class="flat">
                                                                                    </th>
                                                                                    <th class="column-title">Delivery Date</th>
                                                                                    <th class="column-title">Date Received</th>
                                                                                    <th class="column-title">Expiration Date</th>
                                                                                    <th class="column-title">Cost</th>
                                                                                    <th class="column-title">Account Code</th>
                                                                                    <th class="column-title no-link last"><span class="nobr">Supplier</span>
                                                                                    </th>
                                                                                    <th class="bulk-actions" colspan="11">
                                                                                        <a class="antoo" style="color:#fff; font-weight:00;">( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                                                    </th>
                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                <tr class="even pointer">
                                                                                    <td class="a-center ">
                                                                                        <input type="checkbox" class="flat" name="table_records">
                                                                                    </td>
                                                                                    <td class=" ">-01/03/18</td>
                                                                                    <td class=" ">-01/03/18</td>
                                                                                    <td class=" ">-03/03/18</td>
                                                                                    <td class=" ">28,000</td>
                                                                                    <td class="a-right a-right ">Office</td>
                                                                                    <td class=" last">Sony<a href="#"></a>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="odd pointer">
                                                                                    <td class="a-center ">
                                                                                        <input type="checkbox" class="flat" name="table_records">
                                                                                    </td>
                                                                                    <td class=" ">-05/20/18/</td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class="a-right a-right "></td>
                                                                                    <td class=" last"><a href="#"></a>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="even pointer">
                                                                                    <td class="a-center ">
                                                                                        <input type="checkbox" class="flat" name="table_records">
                                                                                    </td>
                                                                                    <td class=" ">-09/10/18-</td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class="a-right a-right "></td>
                                                                                    <td class=" last"><a href="#"></a>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>

                                                                            <div >
                                                                                <div class="col-sm-12 text-center">
                                                                                    <a href="#" data-toggle="modal" data-target=".Distribute" class="btn btn-info btn-md"><i class="fa fa-minus-circle"></i> Distribute</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>


                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="MOOE-tab">

                                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item Name</th>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>1</th>
                                                <td><a role="tab" id="headingOneM" data-toggle="collapse" data-parent="#accordion" href="#data1M" aria-expanded="true" aria-controls="collapseOneM">Envelope</a></td>
                                                <td>Brown, short</td>
                                                <td>500</td>
                                                <td>Piece</td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target=".Add_Item" class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"></i> Add Quantity</a>
                                                    <a href="#" data-toggle="modal" data-target=".Edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                                </td>
                                            </tr>

                                            <!-- Item Details -->
                                            <tr>
                                                <td colspan="12">
                                                    <div id="data1M" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOneM">
                                                        <div class="panel-body">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="x_content">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped jambo_table bulk_action">
                                                                                <thead>
                                                                                <tr class="headings">
                                                                                    <th>
                                                                                        <input type="checkbox" id="check-all" class="flat">
                                                                                    </th>
                                                                                    <th class="column-title">Delivery Date</th>
                                                                                    <th class="column-title">Date Received</th>
                                                                                    <th class="column-title">Expiration Date</th>
                                                                                    <th class="column-title">Cost</th>
                                                                                    <th class="column-title">Account Code</th>
                                                                                    <th class="column-title no-link last"><span class="nobr">Supplier</span>
                                                                                    </th>
                                                                                    <th class="bulk-actions" colspan="11">
                                                                                        <a class="antoo" style="color:#fff; font-weight:00;">( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                                                    </th>
                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                <tr class="even pointer">
                                                                                    <td class="a-center ">
                                                                                        <input type="checkbox" class="flat" name="table_records">
                                                                                    </td>
                                                                                    <td class=" ">-01/03/18</td>
                                                                                    <td class=" ">-01/03/18</td>
                                                                                    <td class=" ">-03/03/18</td>
                                                                                    <td class=" ">28,000</td>
                                                                                    <td class="a-right a-right ">Office</td>
                                                                                    <td class=" last">Sony<a href="#"></a>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="odd pointer">
                                                                                    <td class="a-center ">
                                                                                        <input type="checkbox" class="flat" name="table_records">
                                                                                    </td>
                                                                                    <td class=" ">-05/20/18/</td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class="a-right a-right "></td>
                                                                                    <td class=" last"><a href="#"></a>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="even pointer">
                                                                                    <td class="a-center ">
                                                                                        <input type="checkbox" class="flat" name="table_records">
                                                                                    </td>
                                                                                    <td class=" ">-09/10/18-</td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class="a-right a-right "></td>
                                                                                    <td class=" last"><a href="#"></a>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>

                                                                            <div >
                                                                                <div class="col-sm-12 text-center">
                                                                                    <a href="#" data-toggle="modal" data-target=".Distribute" class="btn btn-info btn-md"><i class="fa fa-minus-circle"></i> Distribute</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!--/Item Details-->

                                            <!--Item Details-->
                                            <tr>
                                                <th>2</th>
                                                <td><a role="tab" id="headingTwoM" data-toggle="collapse" data-parent="#accordion" href="#data2M" aria-expanded="true" aria-controls="collapseTwoM">Bond Paper</a></td>
                                                <td>A4</td>
                                                <td>5</td>
                                                <td>Ream</td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target=".Add_Item" class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"></i> Add Quantity</a>
                                                    <a href="#" data-toggle="modal" data-target=".Edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                                </td>
                                            </tr>
                                            <!-- Item Details -->
                                            <tr>
                                                <td colspan="12">
                                                    <div id="data2M" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingTwoM">
                                                        <div class="panel-body">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="x_content">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped jambo_table bulk_action">
                                                                                <thead>
                                                                                <tr class="headings">
                                                                                    <th>
                                                                                        <input type="checkbox" id="check-all" class="flat">
                                                                                    </th>
                                                                                    <th class="column-title">Delivery Date</th>
                                                                                    <th class="column-title">Date Received</th>
                                                                                    <th class="column-title">Expiration Date</th>
                                                                                    <th class="column-title">Cost</th>
                                                                                    <th class="column-title">Account Code</th>
                                                                                    <th class="column-title no-link last"><span class="nobr">Supplier</span>
                                                                                    </th>
                                                                                    <th class="bulk-actions" colspan="11">
                                                                                        <a class="antoo" style="color:#fff; font-weight:00;">( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                                                    </th>
                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                <tr class="even pointer">
                                                                                    <td class="a-center ">
                                                                                        <input type="checkbox" class="flat" name="table_records">
                                                                                    </td>
                                                                                    <td class=" ">-01/03/18</td>
                                                                                    <td class=" ">-01/03/18</td>
                                                                                    <td class=" ">-03/03/18</td>
                                                                                    <td class=" ">28,000</td>
                                                                                    <td class="a-right a-right ">Office</td>
                                                                                    <td class=" last">Sony<a href="#"></a>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="odd pointer">
                                                                                    <td class="a-center ">
                                                                                        <input type="checkbox" class="flat" name="table_records">
                                                                                    </td>
                                                                                    <td class=" ">-05/20/18/</td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class="a-right a-right "></td>
                                                                                    <td class=" last"><a href="#"></a>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="even pointer">
                                                                                    <td class="a-center ">
                                                                                        <input type="checkbox" class="flat" name="table_records">
                                                                                    </td>
                                                                                    <td class=" ">-09/10/18-</td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class="a-right a-right "></td>
                                                                                    <td class=" last"><a href="#"></a>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>

                                                                            <div >
                                                                                <div class="col-sm-12 text-center">
                                                                                    <a href="#" data-toggle="modal" data-target=".Distribute" class="btn btn-info btn-md"><i class="fa fa-minus-circle"></i> Distribute</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!--/Item Details-->
                                            <!--Item Detail-->
                                            <tr>
                                                <th>3</th>
                                                <td><a role="tab" id="headingThreeM" data-toggle="collapse" data-parent="#accordion" href="#data3M" aria-expanded="true" aria-controls="collapseThreeM">Scotch Tape</td>
                                                <td>Medium Size</td>
                                                <td>10</td>
                                                <td>Box</td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target=".Add_Item" class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"></i> Add Quantity</a>
                                                    <a href="#" data-toggle="modal" data-target=".Edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                                </td>
                                            </tr>
                                            <!-- Item Details -->
                                            <tr>
                                                <td colspan="12">
                                                    <div id="data3M" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingThreeM">
                                                        <div class="panel-body">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="x_content">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped jambo_table bulk_action">
                                                                                <thead>
                                                                                <tr class="headings">
                                                                                    <th>
                                                                                        <input type="checkbox" id="check-all" class="flat">
                                                                                    </th>
                                                                                    <th class="column-title">Delivery Date</th>
                                                                                    <th class="column-title">Date Received</th>
                                                                                    <th class="column-title">Expiration Date</th>
                                                                                    <th class="column-title">Cost</th>
                                                                                    <th class="column-title">Account Code</th>
                                                                                    <th class="column-title no-link last"><span class="nobr">Supplier</span>
                                                                                    </th>
                                                                                    <th class="bulk-actions" colspan="11">
                                                                                        <a class="antoo" style="color:#fff; font-weight:00;">( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                                                    </th>
                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                <tr class="even pointer">
                                                                                    <td class="a-center ">
                                                                                        <input type="checkbox" class="flat" name="table_records">
                                                                                    </td>
                                                                                    <td class=" ">-01/03/18</td>
                                                                                    <td class=" ">-01/03/18</td>
                                                                                    <td class=" ">-03/03/18</td>
                                                                                    <td class=" ">28,000</td>
                                                                                    <td class="a-right a-right ">Office</td>
                                                                                    <td class=" last">Sony<a href="#"></a>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="odd pointer">
                                                                                    <td class="a-center ">
                                                                                        <input type="checkbox" class="flat" name="table_records">
                                                                                    </td>
                                                                                    <td class=" ">-05/20/18/</td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class="a-right a-right "></td>
                                                                                    <td class=" last"><a href="#"></a>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="even pointer">
                                                                                    <td class="a-center ">
                                                                                        <input type="checkbox" class="flat" name="table_records">
                                                                                    </td>
                                                                                    <td class=" ">-09/10/18-</td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class=" "></td>
                                                                                    <td class="a-right a-right "></td>
                                                                                    <td class=" last"><a href="#"></a>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>

                                                                            <div >
                                                                                <div class="col-sm-12 text-center">
                                                                                    <a href="#" data-toggle="modal" data-target=".Distribute" class="btn btn-info btn-md"><i class="fa fa-minus-circle"></i> Distribute</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
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

        <!-- /page content -->

        <!-- Modal -->
        <!-- Add Quantity -->
        <div class="modal fade Add_Item" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <input type="number" name="quant" min=0 required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Unit<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  name="Unit" required="required" class="form-control col-md-7 col-xs-12" class="unit" list="list">
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
                                    <select id="type" list="typelist" name="Type" class="form-control col-md-7 col-xs-12"  required>
                                        <option selected="true" value="CO">Capital Outlay</option>
                                        <option value="MOOE">MOOE</option>
                                    </select>
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
                                    <input type="number" name="cost" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
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
                                    <input type="text" name="supp" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
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
        <!-- /Add Item -->

        <!--Distribution-->
        <div class="modal fade Distribute" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Distribution</h4>
                    </div>
                    <div class="modal-body">
                        <b>Distribute Item with Serial:</b>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="">6161d6sdcd</br>
                                <input type="checkbox" value="">6161d6sdcd</br>
                                <input type="checkbox" value="">6161d6sdcd</br>
                                <input type="checkbox" value="">6161d6sdcd
                            </label>
                        </div>
                        <b>To</b>
                        <form class="form-horizontal form-label-left" novalidate>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Department<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="website" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="dept" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">PO Number<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="website" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="dept" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">PR Number<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="website" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="dept" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">OBR Number<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="website" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="dept" required="required" type="text">
                                </div>
                            </div>
                        </form>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="save1"><i class="fa fa-arrow-down"></i> Save</button>
                            <button type="button" class="btn btn-danger" id="cancel1" data-dismiss="modal">Cancel</button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /Distribution-->

            <!--Edit-->
            <div class="modal fade Edit" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Edit</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal form-label-left" novalidate>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Item Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="item" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Description<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="description" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Unit<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="Unit" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Type<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="Type" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="save1"><i class="fa fa-arrow-down"></i> Save</button>
                            <button type="button" class="btn btn-danger" id="cancel1" data-dismiss="modal">Cancel</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!--/Edit-->
    <!-- /Mdal -->



