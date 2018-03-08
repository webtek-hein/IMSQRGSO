<!-- page content -->
<div id="accounts" class="page-content main" role="main" xmlns:height="http://www.w3.org/1999/xhtml">

    <div class="inventory-tab">
        <div class="page-title">
            <h1>Users</h1>
        </div>

        <button class="pull-right" role="tab" id="headingZero" data-toggle="tab"
                href="#collapseZero" aria-expanded="true" aria-controls="collapseZero">
            <i class="fa fa-plus"></i><span> Add User</span>
        </button>

        <div class="accordion table-responsive" id="accordion" role="tablist" aria-multiselectable="true">

                <table id="user-table" data-pagination="true" data-search="true"
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

<div class="AddUser hidden" role="tabpanel" aria-labelledby="headingZero">
    <button type="button" onclick="addUserBack()" class="btn btn"> Back</a></button>
    <div class="x_content">
        <div class="panel-body">
            <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form method="POST" action="Users/addUser" data-validate="parsley">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="First Name">First Name</label>
                                    <input type="text" name="firstname" id="firstname"
                                           data-required="true" class="form-control has-feedback-left"
                                           data-error-message="Please enter the first name.">
                                    <span class="fa fa-user form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="Last Name">Last Name</label>
                                    <input type="text" id="lastname" name="lastname"
                                           data-required="true" class="form-control has-feedback-left"
                                           data-error-message="Please enter the last name.">
                                    <span class="fa fa-user form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="Email">Email</label>
                                    <input id="email" class="form-control has-feedback-left"
                                           type="text" name="email" data-required="true"
                                           data-error-message="Please Enter the email.">
                                    <span class="fa fa-envelope form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="Contact Number">Contact No.</label>
                                    <input type="text" name="contactno" id="contactno"
                                           data-required="true" class="form-control has-feedback-left"
                                           data-error-message="Please enter the contact number.">
                                    <span class="fa fa-phone form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="Username">Username</label>
                                    <input type="text" name="username" id="username"
                                           data-required="true" class="form-control has-feedback-left"
                                           data-error-message="Please enter the username.">
                                    <span class="fa fa-user form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="Password">Password</label>
                                    <input type="text" name="password" id="password"
                                           data-required="true" class="form-control has-feedback-left"
                                           data-error-message="Please enter the password.">
                                    <span class="fa fa-key form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                            </div>
                     
                             <div class="form-group">
                                <script>
                                    function select_dept() {
                                        if (document.getElementById('position').value === 'supply officer' || document.getElementById('position').value === 'custodian') {
                                            document.getElementById('dment').style.display  = 'block';
                                        } else {
                                            document.getElementById('dment').style.display = 'none';
                                        }
                                    }
                                </script>                               
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="Department">Position</label>
                                    <select class="fa fa-chevron-down align="center" id="position" name="position"  onclick='select_dept()' required >
                                        <option selected="true" disabled>--Choose Position--</option>
                                        <option value="admin">Admin</option>
                                        <option value="custodian">Custodian</option>
                                        <option value="supply officer">Supply Officer</option>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <select id="dment" name="dment" style="display:none;" type="button" class="deptopt btn btn-default"> <i class="fa fa-chevron-down"></i></select>
                            </div>                                                                        
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                                    <button type="submit" class="btn btn-success"><i
                                                class="fa fa-send"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of add user-->
<!--End of Modals -->