<div id="accounts" class="page-content" role="main">
    <div class="page-title">
        <h1>Users</h1>
    </div>
    <button class="pull-right btn btn-success" type="button" data-toggle="modal"
            data-target="#adduser">
        <li class="fa fa-user-plus"></li>
        Add User
    </button>
    <div class="x_content">
        <div id="myTabContent" class="tab-content">
            <div class="users-table table-responsive" role="tablist"
                 aria-multiselectable="true">

                <table id="datatable" data-pagination="true" data-search="true"
                       data-toggle="table" data-url="Users/display_users"
                       class="table table-no-bordered">
                    <thead>
                    <!-- Data-field for getting data  -->
                    <tr>
                        <th data-sortable="true" data-field="name">Name</th>
                        <th data-sortable="true" data-field="email">Email</th>
                        <th data-sortable="true" data-field="contactno">Contact No.</th>
                        <th data-sortable="true" data-field="username">Username</th>
                        <th data-sortable="true" data-field="position">Position</th>
                        <th data-sortable="true" data-field="department">Department</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- Modals -->

</div>
<!-- Add User -->
<div id="adduser" class="modal fade Add_Item" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    <li class="fa fa-user-plus"></li>
                    Add User
                </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label-left">
                    <div class="form-group">
                        <div class="col-md-5 ">
                            <input type="text" class="form-control has-feedback-left" id="inputSuccess2"
                                   placeholder="First Name">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 ">
                            <input type="text" class="form-control has-feedback-left" id="inputSuccess3"
                                   placeholder="Last Name">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-md-11 ">
                            <input type="text" class="form-control has-feedback-left" id="inputSuccess4"
                                   placeholder="Email">
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-md-11 ">

                            <input type="text" class="form-control" id="inputSuccess5" placeholder="Contact No.">
                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                            <div class="form-group">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-11 ">
                            <select class="form-control">
                                <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-md-12 ">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">User Name</label>
                            <input type="text" class="form-control">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <div class="pull-right">
                                <button type="button" class="btn btn-danger">
                                    <li class="fa fa-times-circle-o" style="font-size:15px"></li>
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <li class="fa fa-check-square-o"></li>
                                    Add User
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- end of add user-->
<!--End of Modals -->