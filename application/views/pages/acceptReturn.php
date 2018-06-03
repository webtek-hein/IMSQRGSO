<!-- accept return -->
<div class="AcceptReturn modal fade" id="accept_modal" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
                <h5 class="modal-title" id="myModalLabel">Are you sure you want to Accept?</h5>
                <br/>

                <div class="col-4">
                    <div class="form-group options">
                        <div class="serial ">
                            <label for="name"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="quant">
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label>Item Status</label>
                        <input id="itemstatus" name="item_status" data-parsley-group="set1"
                               class="form-control"
                               list="list1"
                               data-parsley-required-message="Select the status"
                               required>
                        <datalist id="list1">
                            <option value="Disposal">Disposal</option>
                            <option value="Repair">Repair</option>
                            <option value="Replacement">Replacement</option>
                        </datalist>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button name="id" class="btn btn-outline-success" id="returnAct"><i class="fa fa-arrow-down"></i> Yes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancel</button>

            </div>
        </div>
    </div>
</div>
<!-- end accept return -->