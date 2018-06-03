<!--Return-->
<form role="form" class="form-horizontal form-label-left" action="Inventory/deptreturn"
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
                               class="optional form-control has-feedback-left" required>
                    </div>

                    <div class="form-group">
                        <label>Receiver</label>
                        <input class="form-control" data-parsley-group="set2" type="text"
                               name="receiver" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Remarks<span
                                class="required">*</span>
                        </label>
                        <textarea class="form-control" name="remarks" id="remarks" required></textarea>
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