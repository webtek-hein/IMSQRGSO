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
                    <button type="submit" name="id" class="btn btn-success btn-modal" id="deptReturn">
                        <i class="fa fa-check"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>