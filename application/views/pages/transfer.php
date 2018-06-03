<!--Transfer-->
<form role="form" class="form-horizontal form-label-left" action="inventory/userDistribute" method="POST"
      data-validate="parsley" >
    <div class="modal fade transfer" id="account" tabindex="-1" role="dialog" aria-hidden="true">
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