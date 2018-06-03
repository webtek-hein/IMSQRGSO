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
<?php
$position = ($this->session->userdata['logged_in']['position']);
?>
<div id="departmentPageContent" class="content mt-3">

    <div class="animated fadeIn">
        <div class="row">
            <!-- Inventory-->
            <div class="col-lg-12 department-tab">
                <div class="card">
                    <div class="card-header">
                        <?php

                        if ($position === 'Custodian' || $position === 'Admin') {
                            echo '<select id="select-dept" class="col-lg-5 deptopt form-control"></select>';
                        }
                        ?>
                    </div>

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
                                <table id="departmentTable" data-show-refresh="true"
                                       class="table table-bordered"
                                       data-pagination="true" data-search="true">
                                    <thead class="table-secondary"></thead>
                                </table>
                            </div>
                            <!--MOOE Tab-->
                            <div class="tab-pane fade" id="tab_content2" role="tabpanel" aria-labelledby="MOOE-tab">
                                <!-- Implement Bootsrap table-->
                                <table id="deptMOOEtable" data-pagination="true" data-show-refresh="true"
                                       data-search="true" data-url="inventory/viewDept/MOOE/11"
                                       class="table table-bordered">
                                    <thead class="table-secondary"></thead>
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
                        <button type="button" onclick="toggleDiv($('.department-tab'),$('.detail-tab '))"
                                class="btn btn-dark btn-sm"><i class=" fa fa-arrow-left"></i> Back
                        </button>

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
                                <table id="detail-tab-table" class="table table-bordered table-hover">
                                    <thead class="table-secondary"></thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!--Transfer-->
<form role="form" class="form-horizontal form-label-left" action="inventory/userDistribute" method="POST"
      data-validate="parsley" >
    <div class="modal fade transfer" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2">Transfer</h4>
                    <i class="fa fa-times" data-dismiss="modal" style="color:red"></i>
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
                    <button type="submit" name="serialid" id="save1" class="btn btn-success btn-modal"><i class="fa fa-check"></i> Save Changes</button>
                </div>

            </div>
        </div>
    </div>
</form>

<!--History-->
<div hidden id="historyPage" class="history col-lg-12">
    <div class="card">
        <div class="card-header">
            <button type="button" onclick="toggleDiv($('.department-tab'),$('.history'))"
                    class="btn btn-dark btn-sm"><i class=" fa fa-arrow-left"></i> Back
            </button>
        </div>

        <div id='hist' class="table-responsive-sm-sm tab-content pl-3 p-1">
            <table id="history" class="table table-striped table-bordered">
                <thead class="table-secondary"></thead>
            </table>
        </div>
    </div>
</div>


<!--Return-->
<form role="form" class="form-horizontal form-label-left" action="inventory/deptreturn"
      method="POST" data-validate="parsley" id="returnform">
    <div class="Return returnsp modal fade" id="return" tabindex="-1" role="dialog"
         aria-labelledby="largeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Return</h5>
                    <i data-dismiss="modal" class="fa fa-times" style="color:red"></i>
                </div>
                <div class="modal-body">

                    <div class="col-4">
                    <div class="form-group">
                        <div class="serialsp col-md-10">
                        </div>
                    </div>
                    </div>

                    <div class="col-7">
                    <div class="form-group">
                        <div class="quantsp form-group">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="text-danger ret-error-msg"></div>
                        <label>Date Returned</label>
                        <input required type="date" name="returndate" class="optional form-control has-feedback-left">
                    </div>

                    <div class="form-group">
                        <label>Receiver</label>
                        <input required class="form-control" type="text" name="receiver">
                    </div>
                    <div class="form-group">
                            <label>Item Status</label>
                                <input id="remarks" name="remarks" class="form-control"
                                       list="list" required>
                                <datalist id="list">
                                    <option value="Disposal">Disposal</option>
                                    <option value="Repair">Repair</option>
                                    <option value="Replacement">Replacement</option>
                                </datalist>
                    </div>
                        <div class="form-group">
                            <label>Reason</label>
                            <textarea id="reason" name="reason" class="form-control" required>
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> Cancel</button>
                    <button type="submit" name="id" class="btn btn-success btn-modal" id="save1" onclick="return valreturn();">
                        <i class="fa fa-check"></i> Save
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
                    <i class="fa fa-times" style="color:red"></i>
                </div>
                <div class="modal-body">

<?php
include 'history.php';
if ($position === 'Supply Officer') {
    include 'transfer.php';
    include 'accountability.php';
    include 'soDistribution.php';
    include 'departmentReturn.php';
}
?>



