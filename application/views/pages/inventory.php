<!-- page content -->
<div class="right_col" role="main" xmlns:height="http://www.w3.org/1999/xhtml">
    <div class="">


        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
<!--                <div class="x_title">-->
<!--                    <h2>Inventory</h2>-->
<!--                    <div class="clearfix"></div>-->
<!--                </div>-->
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
                                                    <input type="text" name="item" class="form-control" id="inputSuccess2" required placeholder="Item Name">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input type="number" min='0' name="cost" class="form-control" id="inputSuccess3" required placeholder="Unit Cost">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input type="number" min='0' name="quant" class="form-control" id="inputSuccess4" required placeholder="Quantity">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input  name="Unit" class="form-control col-md-7 col-xs-12" class="unit" list="list" required placeholder="Unit">
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
                                                    <input type="date" name="del" class="form-control" id="inputSuccess4" required placeholder="Delivery Date">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input type="date" name="rec" class="form-control" id="inputSuccess4" required placeholder="Date Received">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <input type="date" name="exp" class="form-control" id="inputSuccess4" required placeholder="Expiration Date">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <select list="typelist"  name="supp" id="supplieropt" class="form-control"  required placeholder="Type">
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <textarea id="message" required class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
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
                                            <div class="wizard">
                                                <div class="wizard-inner">
                                                    <div class="connecting-line"></div>
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li role="presentation" class="active">
                                                            <a href="#step1B" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                                                <span class="round-tab">
                                                                    <b>Item 1</b>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li role="presentation" class="disabled">
                                                            <a href="#step2B" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                                                <span class="round-tab">
                                                                    <b>Item 2</b>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li role="presentation" class="disabled">
                                                            <a href="#step3B" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                                                <span class="round-tab">
                                                                    <b>Item 3</b>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li role="presentation" class="disabled">
                                                            <a href="#step4B" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
                                                                <span class="round-tab">
                                                                    <b>Item 4</b>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li role="presentation" class="disabled">
                                                            <a href="#step5B" data-toggle="tab" aria-controls="step5" role="tab" title="Step 5">
                                                                <span class="round-tab">
                                                                    <b>Item 5</b>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li role="presentation" class="disabled">
                                                            <a href="#step6B" data-toggle="tab" aria-controls="step6" role="tab" title="Step 6">
                                                                <span class="round-tab">
                                                                    <b>Item 6</b>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li role="presentation" class="disabled">
                                                            <a href="#step7B" data-toggle="tab" aria-controls="step7" role="tab" title="Step 7">
                                                                <span class="round-tab">
                                                                    <b>Item 7</b>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li role="presentation" class="disabled">
                                                            <a href="#step8B" data-toggle="tab" aria-controls="step8" role="tab" title="Step 8">
                                                                <span class="round-tab">
                                                                    <b>Item 8</b>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li role="presentation" class="disabled">
                                                            <a href="#step9B" data-toggle="tab" aria-controls="step9" role="tab" title="Step 9">
                                                                <span class="round-tab">
                                                                    <b>Item 9</b>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li role="presentation" class="disabled">
                                                            <a href="#step10B" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                                                <span class="round-tab">
                                                                    <b>Item 10</b>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="modal-body">
                                                <form role="form" class="form-horizontal form-label-left input_mask" action="inventory/additem" method="POST">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" role="tabpanel" id="step1B">
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="text" name="item" class="form-control" id="inputSuccess2" required placeholder="Item Name">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="number" min='0' name="cost" class="form-control" id="inputSuccess3" required placeholder="Unit Cost">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="number" min='0' name="quant" class="form-control" id="inputSuccess4" required placeholder="Quantity">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input  name="Unit" required class="form-control col-md-7 col-xs-12" class="unit" list="list" placeholder="Unit">
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
                                                                <input type="date" name="del" class="form-control" id="inputSuccess4" required placeholder="Delivery Date">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="date" name="rec" class="form-control" id="inputSuccess4" required placeholder="Date Received">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="date" name="exp" class="form-control" id="inputSuccess4" required laceholder="Expiration Date">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="text" name="supp" class="form-control" id="inputSuccess5" required placeholder="Supplier">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <textarea id="message" required class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                                              data-parsley-validation-threshold="10" placeholder="Description"></textarea>
                                                            </div>
                                                            <ul class="list-inline pull-right">
                                                                <li ><button type="button" class="btn btn-default next-step"><i class="fa fa-arrow-down"></i> Save and continue</button></li>
                                                            </ul>
                                                        </div>

                                                        <div class="tab-pane" role="tabpanel" id="step2B">
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="text" name="item" class="form-control" id="inputSuccess2" required placeholder="Item Name">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="number" min='0' name="cost" class="form-control" id="inputSuccess3" required placeholder="Unit Cost">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="number" min='0' name="quant" class="form-control" id="inputSuccess4" required placeholder="Quantity">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input  name="Unit" required class="form-control col-md-7 col-xs-12" class="unit" list="list" placeholder="Unit">
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
                                                                <input type="date" name="del" class="form-control" id="inputSuccess4" required placeholder="Delivery Date">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="date" name="rec" class="form-control" id="inputSuccess4" required placeholder="Date Received">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="date" name="exp" class="form-control" id="inputSuccess4" required laceholder="Expiration Date">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="text" name="supp" class="form-control" id="inputSuccess5" required placeholder="Supplier">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <textarea id="message" required class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                                              data-parsley-validation-threshold="10" placeholder="Description"></textarea>
                                                            </div>
                                                            <ul class="list-inline pull-right">
                                                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                                <li ><button type="button" class="btn btn-default next-step"><i class="fa fa-arrow-down"></i> Save and continue</button></li>
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane" role="tabpanel" id="step3B">
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="text" name="item" class="form-control" id="inputSuccess2" required placeholder="Item Name">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="number" min='0' name="cost" class="form-control" id="inputSuccess3" required placeholder="Unit Cost">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="number" min='0' name="quant" class="form-control" id="inputSuccess4" required placeholder="Quantity">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input  name="Unit" required class="form-control col-md-7 col-xs-12" class="unit" list="list" placeholder="Unit">
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
                                                                <input type="date" name="del" class="form-control" id="inputSuccess4" required placeholder="Delivery Date">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="date" name="rec" class="form-control" id="inputSuccess4" required placeholder="Date Received">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="date" name="exp" class="form-control" id="inputSuccess4" required laceholder="Expiration Date">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="text" name="supp" class="form-control" id="inputSuccess5" required placeholder="Supplier">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <textarea id="message" required class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                                              data-parsley-validation-threshold="10" placeholder="Description"></textarea>
                                                            </div>
                                                            <ul class="list-inline pull-right">
                                                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                                <li ><button type="button" class="btn btn-default next-step"><i class="fa fa-arrow-down"></i> Save and continue</button></li>
                                                            </ul>
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane" role="tabpanel" id="step4B">
                                                            <p>Kunwari may Detail</p>
                                                            <ul class="list-inline pull-right">
                                                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                                <li ><button type="button" class="btn btn-default next-step"><i class="fa fa-arrow-down"></i> Save and continue</button></li>
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane" role="tabpanel" id="stepB">
                                                            <p>Kunwari may Detail</p>
                                                            <ul class="list-inline pull-right">
                                                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                                <li ><button type="button" class="btn btn-default next-step"><i class="fa fa-arrow-down"></i> Save and continue</button></li>
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane" role="tabpanel" id="step6B">
                                                            <p>Kunwari may Detail</p>
                                                            <ul class="list-inline pull-right">
                                                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                                <li ><button type="button" class="btn btn-default next-step"><i class="fa fa-arrow-down"></i> Save and continue</button></li>
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane" role="tabpanel" id="step7B">
                                                            <p>Kunwari may Detail</p>
                                                            <ul class="list-inline pull-right">
                                                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                                <li ><button type="button" class="btn btn-default next-step"><i class="fa fa-arrow-down"></i> Save and continue</button></li>
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane" role="tabpanel" id="step8B">
                                                            <p>Kunwari may Detail</p>
                                                            <ul class="list-inline pull-right">
                                                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                                <li ><button type="button" class="btn btn-default next-step"><i class="fa fa-arrow-down"></i> Save and continue</button></li>
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane" role="tabpanel" id="step9B">
                                                            <p>Kunwari may Detail</p>
                                                            <ul class="list-inline pull-right">
                                                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                                <li ><button type="button" class="btn btn-default next-step"><i class="fa fa-arrow-down"></i> Save and continue</button></li>
                                                            </ul>
                                                        </div>
                                                        <div class="tab-pane" role="tabpanel" id="step10B">
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="text" name="item" class="form-control" id="inputSuccess2" required placeholder="Item Name">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="number" min='0' name="cost" class="form-control" id="inputSuccess3" required placeholder="Unit Cost">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="number" min='0' name="quant" class="form-control" id="inputSuccess4" required placeholder="Quantity">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input  name="Unit" required class="form-control col-md-7 col-xs-12" class="unit" list="list" placeholder="Unit">
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
                                                                <input type="date" name="del" class="form-control" id="inputSuccess4" required placeholder="Delivery Date">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="date" name="rec" class="form-control" id="inputSuccess4" required placeholder="Date Received">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="date" name="exp" class="form-control" id="inputSuccess4" required laceholder="Expiration Date">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                                <input type="text" name="supp" class="form-control" id="inputSuccess5" required placeholder="Supplier">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <textarea id="message" required class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                                              data-parsley-validation-threshold="10" placeholder="Description"></textarea>
                                                            </div>
                                                            <ul class="list-inline pull-right">
                                                                <li><button class="btn btn-primary" type="button"><i class="fa fa-close"></i> Cancel</button></li>
                                                                <li><button type="submit" class="btn btn-success"><i class="fa fa-send"></i> Submit</button></li>
                                                            </ul>
                                                        </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </form>
                                                </div>
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
                            <input type="number" name="quant" min=0 required class="form-control col-md-7 col-xs-12" placeholder="Quantity">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Unit Cost<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                            <input type="number" min='0' name="cost" class="form-control" id="inputSuccess3" required placeholder="Unit Cost">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Delivery Date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" name="del" required class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Date Received<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" name="rec" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12" required>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Expiration Date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" name="exp" data-validate-length-range="5,20" required class="optional form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class=" control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Supplier<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select list="typelist"  name="supp" class="supplieropt form-control" required placeholder="Type">
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
                            <input type="text" name="quant" min=0 required value="6161d6sdcd" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="quant" min=0 required value="6161d6sdcd" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="quant" min=0 value="6161d6sdcd" required class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="quant" min=0 value="6161d6sdcd" required class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="quant" min=0 value="6161d6sdcd" required class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="quant" min=0 value="6161d6sdcd" required class="form-control col-md-7 col-xs-12" >
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


<!--Serial and Department Number-->
<div id="firststep" class="modal fade distQuestion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <p><small>Inputed 3 Items.</small></p>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" novalidate>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Distribute<span class="required"><p><small>Enter # of Items</small></p>*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="website" class="form-control col-md-3 col-sm-3 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="owner" required type="text" placeholder="Quantity">
                        </div>
                    </div>

                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Department<span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-8 col-xs-8 form-group">
                        <select list="typelist"  name="dept" id="deptopt" class="form-control" required placeholder="Type">
                        </select>
                    </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Account Code<span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-8 col-xs-8 form-group">
                        <select list="typelist" id="accode" name="Code" class="form-control" required placeholder="Account Code">
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Receiving Person<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="website" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="owner" required type="text" placeholder="Receiving Person">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3" for="po">PO Number<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="website" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="po" required type="text" placeholder="PO Number">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">PR Number<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="website" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="pr" required type="text" placeholder="PR Number">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">OBR Number<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="website" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="obr" required type="text" placeholder="OBR Number">
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn-hide btn btn-default btn-md" href="#" data-target=".Distribute" data-toggle="modal" aria-hidden="true"><i class="fa fa-share"></i> Next</button>
            </div>

        </div>
    </div>
</div>
<!--end of Serial and Department Number-->


<!--Distribution-->
<div id="myModal" class="modal fade Distribute" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Distribution</h4>
            </div>
            <div class="wizard">
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <b>Item 1</b>
                            </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <b>Item 2</b>
                            </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <b>Item 3</b>
                            </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                              <b>Item 4</b>
                            </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="modal-body">
                    <form role="form" class="form-horizontal form-label-left">
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="step1">
                            <div class="item form-group">
                                <label class="control-label col-md-1 col-sm-1 col-xs-6" for="name">Serial<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <input id="website" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="serial" required type="text" placeholder="Serial">
                                </div>
                            </div>
                            <ul class="list-inline pull-right">
                                <li><button type="button" class="btn btn-default next-step">Save and continue</button></li>
                            </ul>
                        </div>

                        <div class="tab-pane" role="tabpanel" id="step2">
                            <div class="item form-group">
                                <label class="control-label col-md-1 col-sm-1 col-xs-6" for="name">Serial<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <input id="website" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="serial" required type="text" placeholder="Serial">
                                </div>
                            </div>
                            <ul class="list-inline pull-right">
                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                            </ul>
                        </div>

                        <div class="tab-pane" role="tabpanel" id="step3">
                            <div class="item form-group">
                                <label class="control-label col-md-1 col-sm-1 col-xs-6" for="name">Serial<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <input id="website" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="serial" required type="text" placeholder="Serial">
                                </div>
                            </div>
                            <ul class="list-inline pull-right">
                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                                <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="complete">
                            <div class="item form-group">
                                <label class="control-label col-md-1 col-sm-1 col-xs-6" for="name">Serial<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <input id="website" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="serial" required type="text" placeholder="Serial">
                                </div>
                            </div>
                            <ul class="list-inline pull-right">
                                <button class="btn btn-danger" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-send"></i> Submit</button>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    </form>
                </div>
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
                            <input id="item" class="form-control col-md-7 col-xs-12" data-validate-length-range="20" data-validate-words="2" name="item" type="text" required placeholder="Item Name">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="description" type="text" name="description" class="form-control col-md-7 col-xs-12" required placeholder="Description">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Unit<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="Unit"  type="text" name="Unit" class="form-control col-md-7 col-xs-12" required placeholder="Unit">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Type<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="Type" type="text" name="Type" class="form-control col-md-7 col-xs-12" required placeholder="Type">
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
                            <input type="number" name="quant" min=0 class="form-control col-md-7 col-xs-12" required placeholder="Quantity">
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