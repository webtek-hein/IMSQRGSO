<!--Genearate Report-->
<div hidden class="generateReport col-lg-12">
    <div class="card">
        <div class="card-header">
            <button onclick="toggleDiv($('.inventory-tab'),$('.generateReport'))"
                    class="btn btn-dark fa fa-arrow-left">
                Back
            </button>

        </div>
        <div class="card-body">
            <button onclick="printToPDFreport()" class="btn btn-info fa fa-download"> Download as PDF</button>
            <hr>
            <div class="row">
                <div class="col-md-12 form-horizontal">
                    <label>Select the type of Item:</label>
                    <input value="ALL" type="radio" name="type" checked> All
                    <input value="CO" type="radio" name="type"> Capital Outlay
                    <input value="MOOE" type="radio" name="type"> MOOE
                </div>
                <div class="col-md-4 form-horizontal">
                    <div class="select form-group">
                        <label>Reports on:</label>
                        <select class="form-control" id="reportsOption">
                            <option value="0">Delivered Item</option>
                            <option value="1">Distributed Items</option>
                            <option value="2">Returned Items</option>
                            <option value="3">Supplier</option>
                        </select>
                    </div>
                </div>
                <form id="reportDate" class="col-md-8 form-inline">
                    <div class="form-group">
                        <label for="from"> From: </label>
                        <input required type="date" class="form-control" id="from">
                        </input>
                    </div>
                    <div class="form-group">
                        <label for="to"> To: </label>
                        <input required type="date" class="form-control" id="to">
                        </input>
                    </div>
                    <button type="button" id="repdateBTN" onclick="getreportDate()" class="btn btn-success">Go</button>
                </form>
            </div>
            <div class="row">
                <div id="returnedReport" class="col-md-12 table-responsive">
                    <table id="reportTable"
                           data-pagination="true"
                           class="table table-bordered table-hover">
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Genearate Report-->