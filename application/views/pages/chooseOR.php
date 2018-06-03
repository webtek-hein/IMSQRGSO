<!--Choose OR-->
<form role="form" class="form-horizontal form-label-left col-12" method="POST" data-validate="parsley">
    <div class="chooseOR modal fade" id="pickOR" tabindex="-1" role="dialog" aria-labelledby="chooseOR-modal"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Please choose OR number</h5>
                </div>
                <div class="modal-body">
                    <label>Please select Official Receipt Number: </label>
                    <select class="form-control" id="or_no">
                        <option>-No Official Receipt Numbers -</option>
                    </select>
                </div>

                <div class="modal-footer">
                    <a onclick="createReport()" data-dismiss="modal" class="btn btn-success btn-modal">Create Form</a>
                </div>

            </div>
        </div>
    </div>
</form>
<!--End choose OR-->