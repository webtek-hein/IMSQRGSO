<!-- Distribution Modal -->
<form role="form" class="form-horizontal form-label-left" action="inventory/distribute" method="POST"
      data-validate="parsley" id="form">
    <div class="Distribute dist modal fade" id="DitributeItem" tabindex="-1" role="dialog"
         aria-labelledby="distrib-modal"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Distribution</h5>
                    <i class="fa fa-times" data-dismiss="modal" style="color:red"></i>
                </div>
                <div class="modal-body">

                    <div class="col-4">
                        <div class="form-group">
                            <p>Quantity Left: <span id="quantLeft"></span></p>
                            <br>
                            <div class="form-group options">
                                <div class="serial">
                                    <label for="name"></label>
                                </div>
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
                                <label for="name">Department</label>
                                <select list="typelist" name="dept" class="deptopt form-control" required>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <label for="name">Account Code</label>
                                <select list="typelist" name="Code" id="accode" class="form-control" required>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <ul class="list-unstyled">
                                <li class="text-danger distrib-err-msg"></li>
                            </ul>
                            <div class="col-md-10">
                                <div class="text-danger dist-error-msg"></div>
                                <label for="date">Date of Distribution</label>
                                <input id="date" class="form-control col-md-7 col-xs-12"
                                       data-validate-length-range="6"
                                       data-validate-words="2" name="date" required type="date">
                            </div>


                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <label for="name">OBR Number</label>
                                <input id="obr" class="form-control col-md-7 col-xs-12"
                                       data-validate-length-range="6"
                                       data-validate-words="2" name="obr" required>
                            </div>
                        </div>

                        <div class="item form-group">
                            <div class="col-md-10">
                                <label for="name">Supply Officer</label>
                                <select list="typelist" name="owner" class="ownerOpt form-control" required>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="id" id="distSave" class="btn btn-success btn-modal">
                        <i class="fa fa-arrow-down"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>