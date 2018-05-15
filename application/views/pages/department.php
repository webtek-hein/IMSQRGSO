<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Departments</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                    <li class="active">Departments</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">

    <div class="animated fadeIn">
        <div class="row">
            <!-- Inventory-->
            <div class="col-lg-12 department-tab">
                <?php
                    $position = ($this->session->userdata['logged_in']['position']);
                    if ($position === 'Custodian' || $position === 'Admin') {
                        echo '<select id="select-dept" class="col-lg-5 deptopt form-control"></select>';
                    }
                ?>
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item active">
                                <a class="nav-link active" id="CO-tab" data-toggle="tab" href="#tab_content1"
                                   role="tab"
                                   aria-controls="co" aria-selected="true">Capital
                                    Outlay</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="MOOE-tab" data-toggle="tab" href="#tab_content2"
                                   role="tab"
                                   aria-controls="mooe" aria-selected="false">MOOE</a>
                            </li>
                        </ul>
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                            <!-- Capital Outaly tab-->
                            <div class="tab-pane fade show active" id="tab_content1" role="tabpanel"
                                 aria-labelledby="CO-tab">
                                <table id="departmentTable" data-show-refresh = "true" data-url="inventory/viewDept/CO/11"
                                       class="table table-no-bordered"
                                       data-pagination="true" data-search="true">
                                </table>
                            </div>
                            <!--MOOE Tab-->
                            <div class="tab-pane fade" id="tab_content2" role="tabpanel" aria-labelledby="MOOE-tab">
                                <!-- Implement Bootsrap table-->
                                <table id="deptMOOEtable" data-pagination="true" data-show-refresh = "true" data-search="true" data-url="inventory/viewDept/MOOE/11" class="table table-no-bordered">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail-->
            <div hidden class="col-lg-12 detail-tab ">
                <div class="card">
                    <div class="card-header">
                        <button type="button"  onclick="toggleDiv($('.department-tab'),$('.detail-tab '))"
                                class="btn btn-outline-primary"><i class=" fa fa-arrow-left"></i> Back</button>
                        <button type="button" id="#" class="btn btn-primary">Print ARE</button>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="DetailTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="DetInfo" data-toggle="tab" href="#Detail_Info"
                                   role="tab"
                                   aria-controls="info" aria-selected="true">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="DetDetail" data-toggle="tab" href="#Detail_Det"
                                   role="tab"
                                   aria-controls="detail" aria-selected="false">Details</a>
                            </li>
                        </ul>
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                            <!-- Information-->
                            <div class="tab-pane fade show active" id="Detail_Info" role="tabpanel"
                                 aria-labelledby="Information-ta">
                                <p class="col-md-12">Item Name : <span id="itemname"></p>


                                <p class="col-md-12">Description: <span id="itemdesc"></p>

                                <p class="col-md-12">Total Quantity: <span id="total"></p>

                                <p class="col-md-12">Unit: <span id="unit"></p>

                                <p class="col-md-12">Type: <span id="itemtype"></p>
                            </div>
                            <!--Detail-->
                            <div class="tab-pane fade" id="Detail_Det" role="tabpanel" aria-labelledby="Detail-tab">
                                <!-- Implement Bootsrap table-->
                                <table id="detail-tab-table" class="table table-no-bordered table-hover">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- View Serial-->
            <div hidden class="Serial col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4><b>List of Serial</b></h4>
                    </div>
                    <div class="card-body card-block">
                        <form class="serial-form" method="POST" action="inventory/addSerial">
                            <!-- Dynamic serial tabs here -->
                            <ul id="serial-tabs" class="nav nav-tabs">
                            </ul>
                            <!-- end of serial tabs -->
                            <div id="serial-tabcontent" class="tab-content">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- View Serial-->
    <div hidden class="Serial  page-content">
        <div id="data1" class="panel-collapse collapse" role="tabpanel">
            <h4><b>List of Serial</b></h4>
            <form class="serial-form" method="POST" action="inventory/addSerial">
                <!-- Dynamic serial tabs here -->
                <ul id="serial-tabs" class="nav nav-tabs">
                </ul>
                <!-- end of serial tabs -->
                <div id="serial-tabcontent" class="tab-content">
                </div>
            </form>
        </div>
    </div>
    <!--End of View Serial-->

    <!-- Accountability-->
    <div hidden id="account" class="accountability col-lg-12 accountability-tab">
        <div class="card">
            <div class="card-header">
                <button type="button" onclick="toggleDiv($('.department-tab'),$('.accountability-tab '))"
                        class="btn btn-outline-primary"><i class=" fa fa-arrow-left"></i> Back</button>
            </div>
            <div class="card-body">
                <table id="accountabilityTable" class="table table-striped table-bordered">
                </table>
            </div>
        </div>
    </div>

</div>

<!--Transfer-->
<form role="form" class="form-horizontal form-label-left" action="inventory/userDistribute" method="POST"
      data-validate="parsley">
<div class="modal fade transfer" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Transfer</h4>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <div class="serialsp col-md-10">
                        <label for="name"></label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="owner col-md-10">
                        <label for="name">Current Owner:</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10">
                        <label for="name">Transfer to:</label>
                        <input name="transfername" class="name form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10">
                        <label for="date">Date of Transfer</label>
                        <input id="date" class="form-control col-md-7 col-xs-12"
                               data-validate-length-range="6"
                               data-validate-words="2" name="date" required type="date">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10">
                        <label for="name">Remarks</label>
                        <textarea id="itemdesc" data-parsley-group="set1"
                                  name="description" id="message"
                                  class="form-control"
                                  data-parsley-trigger="blur"
                                  data-parsley-minlength="1"
                                  data-parsley-maxlength="500"
                                  data-parsley-minlength-message="Description must"
                                  data-parsley-validation-threshold="10"
                                  data-parsley-required-messag="Put description of the items"
                                  required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="serialid" id="save1" class="btn btn-primary btn-modal">Save changes</button>
            </div>

        </div>
    </div>
</div>
</form>
<!--History-->
<div class="modal fade history" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="history">History</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date Transfered</th>
                        <th>Current User</th>
                        <th>Last User</th>
                        <th>Remarks</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!--Reconcile Page-->
<!--add inventory date-->
<div hidden class="reconcilePage col-lg-12">
    <div class="card">
        <div class="card-header">
            <button onclick="toggleDiv($('.department-tab'), $('.reconcilePage'))" class="btn btn-primary">Back</button>
        </div>
        <form id="compareitem" role="form"
              action="inventory/compare/" method="POST">
            <div class="table-responsive-sm-sm tab-content pl-3 p-1">
                <table class="table table-no-bordered"
                       data-pagination="true" data-search="true" id="reconcileTable">
                </table>
            </div>
    </div>
    <a type="button" class="compare btn btn-success" data-toggle="modal"
       data-target=".invdate">Reconcile Items</a>
    <a type="button" class="compare btn btn-success">Compare</a>

</div>

<!--End of Reconcile Page-->

<div class="invdate modal fade" id="addinvdate" tabindex="-1" role="dialog"
     aria-labelledby="largeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Date of Inventory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <div class="col-md-10">
                        <label for="invdate">Date of Inventory</label>
                        <input id="date" class="form-control col-md-7 col-xs-12"
                               data-validate-length-range="6"
                               data-validate-words="2" name="date" required type="date">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" onclick="reconcile()" name="id" class="btn btn-primary btn-modal" id="save1">
                    <i class="fa fa-arrow-down"></i> Save
                </button>
            </div>
        </div>
    </div>
</div>
</form>
<!--end of add inventory date-->

<!-- accept -->
<form class="form-horizontal form-label-left" method="POST" action="inventory/acceptitem">
    <div class="Accept acceptsp modal fade" id="accept_modal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <h5 class="modal-title" id="myModalLabel">Are you sure you want to Accept?</h5>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Remarks</label>
                        <textarea class="form-control" name="remarks" id="remarks"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" name="id" class="btn-modal btn btn-primary" id="save1"><i
                                class="fa fa-arrow-down"></i> Yes
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- end of accept -->

<!--Return-->
<form role="form" class="form-horizontal form-label-left" action="inventory/deptreturn"
      method="POST" data-validate="parsley">
    <div class="Return returnsp modal fade" id="return" tabindex="-1" role="dialog"
         aria-labelledby="largeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Return</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="serialsp col-md-10">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class=" quantsp form-group">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label>Date Returned</label>
                        <input type="date" name="returndate" data-validate-length-range="5,20"
                               class="optional form-control has-feedback-left">
                    </div>

                    <div class="form-group">
                        <label>Receiver</label>
                        <input class="form-control" data-parsley-group="set2" data-parsley-trigger="blur" type="text"
                               name="receiver">
                    </div>
                    <div class="form-group">
                        <label for="name">Remarks<span
                                    class="required">*</span>
                        </label>
                        <textarea class="form-control" name="remarks" id="remarks"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="id" class="btn btn-primary btn-modal" id="save1">
                        <i class="fa fa-arrow-down"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<!--Transfer-->
<form role="form" class="form-horizontal form-label-left" action="inventory/distribute" method="POST"
      data-validate="parsley">
    <div class="transfer dist modal fade" id="transfer" tabindex="-1" role="dialog"
         aria-labelledby="return-modal"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Transfer</h5>
                </div>
                <div class="modal-body">

                    <div class="col-4">
                        <div class="form-group">
                            <p>Quantity Left: <span id="quantLeft"></span></p>
                            <br>
                            <div class="serial">
                                <label for="name"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="quant">
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-group">
                            <div class="col-md-10">
                                <label for="name">Item</label>
                                <select list="typelist" name="dept" class="deptopt form-control" required>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <label for="name">Qauntity</label>
                                <select list="typelist" name="Code" id="accode" class="form-control" required>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <label for="date">Transfer Date</label>
                                <input id="date" class="form-control col-md-7 col-xs-12"
                                       data-validate-length-range="6"
                                       data-validate-words="2" name="date" required type="date">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <label for="name">From</label>
                                <input id="obr" class="form-control col-md-7 col-xs-12"
                                       data-validate-length-range="6"
                                       data-validate-words="2" name="obr" required>
                            </div>
                        </div>

                        <div class="item form-group">
                            <div class="col-md-10">
                                <label for="name">To</label>
                                <select list="typelist" name="owner" class="form-control" required>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="id" id="save1" class="btn btn-primary btn-modal">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!--Distribution for Supply Officer-->
<form role="form" class="form-horizontal form-label-left" action="inventory/distribute"
      method="POST" data-validate="parsley">
    <div class="DistributeSP distsp modal fade" id="DitributeItemSP" tabindex="-1" role="dialog"
         aria-labelledby="largeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Distribution</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <div class="serialsp col-md-10">
                            <label for="name"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="quantsp col-md-10">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10">
                            <label for="date">Date of Distribution</label>
                            <input id="date" class="form-control col-md-7 col-xs-12"
                                   data-validate-length-range="6"
                                   data-validate-words="2" name="date" required type="date">
                        </div>
                    </div>

                    <div class="form-group">
                        <div id="container2" class="col-md-10">
                            <label for="name">End User</label>
                            <input id="owner" class="form-control col-md-7 col-xs-12" name="owner"
                                   type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="id" class="btn btn-primary btn-modal" id="save1">
                        <i class="fa fa-arrow-down"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- /page content -->