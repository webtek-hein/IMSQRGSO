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