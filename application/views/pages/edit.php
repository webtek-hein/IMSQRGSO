<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Log</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                    <li class="active">Logs</li>
                    <li class="active">Edit Log</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <!-- Inventory-->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
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
                                <table id="editlogco" data-pagination="true" data-search="true"
                                       data-url="logs/editlogitem/CO" class="table table-striped table-bordered table-sm">

                                </table>

                            </div>
                            <!--MOOE Tab-->
                            <div class="tab-pane fade" id="tab_content2" role="tabpanel" aria-labelledby="MOOE-tab">
                                <table id="editlogmooe" data-pagination="true" data-search="true"
                                       data-url="logs/editlogitem/MOOE" class="table table-striped table-bordered table-sm">

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade Add_Item" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div id="editlogmodal" class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit Log </h4>
            </div>

            <div class="modal-body">

                    <table id="editlog datatable-buttons" data-pagination="true" data-search="true" data-toggle="table"
                           class="table table-striped table-bordered table-sm">
                        <thead>
                        <tr>
                            <th data-sortable="true" data-field="timestamp">Timestamp</th>
                            <th data-sortable="true" data-field="fieldedited">Field Edited</th>
                            <th data-sortable="true" data-field="oldvalue">Old Value</th>
                            <th data-sortable="true" data-field="newvalue">New Value</th>
                        </tr>
                        </thead>
                    </table>
            </div>
        </div>
    </div>
</div>

