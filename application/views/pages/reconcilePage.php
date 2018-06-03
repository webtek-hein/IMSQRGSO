<!--Reconcile Page-->
<div hidden class="reconcilePage col-lg-12">
    <!-- Modal -->
    <div class="modal fade" id="reconSerialSelect" tabindex="-1" role="dialog" aria-labelledby="reconSerialSelect"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Please select the serials that was lost:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="items">Serial not found.</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="serialSave btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <form id="recValidate">
        <div class="card">
            <div class="card-header">
                <button onclick="toggleDiv($('.inventory-tab'),$('.reconcilePage'))"
                        class="btn btn-dark fa fa-arrow-left"> Back
                </button>

            </div>
            <div class="card-body">
                <a id="reconcile-btn" hidden type="button" class="compare btn btn-success " onclick="validateReconcile()">Reconcile Items</a>
                <a type="button" id="compare-btn" class="compare btn btn-success ">Compare</a>

                <button onclick="printToPDFreconcile()" class="btn btn-info fa fa-download pull-right"> Download as
                    PDF
                </button>

                <ul class="nav nav-tabs" id="serialTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-status="1" id="non-serialized-tab" data-toggle="tab"
                           href="#nonSerTab"
                           role="tab"
                           aria-controls="serialized" aria-selected="false">Serialized Items</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " data-status="0" id="serialized-tab" data-toggle="tab" href="#serTab"
                           role="tab"
                           aria-controls="co" aria-selected="true">non-Serialized Items</a>
                    </li>

                </ul>
                <div class="tab-content pl-3 p-1">
                    <div class="table-responsive-sm tab-pane fade show active" id="nonSerTab" role="tabpanel"
                         aria-labelledby="nonSer-tab">

                        <table data-show-refresh="true" data-pagination="true" data-search="true" id="serializedItems"
                               class="table table-bordered table-hover table-responsive">
                            <thead class="table-secondary">
                        </table>
                    </div>
                    <div class="table-responsive-sm  tab-pane fade " id="serTab"
                         role="tabpanel"
                         aria-labelledby="nonSerialized-tab">
                        <table data-show-refresh="true" data-pagination="true" data-search="true" id="withoutSerial"
                               class="table table-bordered table-hover table-responsive">
                            <thead class="table-secondary"></thead>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
<!--End of Reconcile Page-->

<!--Reconcile Page Modal-->
<div class="invdate modal fade" id="addinvdate" tabindex="-1" role="dialog"
     aria-labelledby="largeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="dateInv">

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
                            <input required id="inventoryDate" class="form-control col-md-7 col-xs-12"
                                   data-validate-length-range="6"
                                   data-validate-words="2" name="date" required type="date">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="button" onclick="reconcile()" name="id" class="btn btn-success btn-modal" id="save1">
                        <i class="fa fa-arrow-down"></i> Save
                    </button>
                </div>
        </form>
    </div>
</div>
</div>
<!--end of add inventory date-->