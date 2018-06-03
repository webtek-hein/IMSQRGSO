<?php if($this->session->userdata['logged_in']['position'] !== 'Admin'){
    header('Location: Login/logout');
}
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>User Accounts</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                    <li class="active">users</li>


                </ol>
            </div>
        </div>
    </div>
</div>

<div id="accountsPageContent" class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class=" col-lg-12 accounts-tab">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-info" id="headingZero">
                            <i class="fa fa-plus"></i><span> Add User</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                            <table id="user-table" data-pagination="true" data-search="true"
                                   class="table table-no-bordered">
                                   <thead class="table-secondary"></thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add user -->
            <div hidden class="col-lg-12 addUser ">
                <div class="card-header">
                    <button type="button" id="addUserBack" class="btn btn-dark fa fa-arrow-left"> Back</a></button>
                </div>
                <div class="form-group">
                    <div class="card">
                        <div class="card-body card-block col-lg-8 align-self-center">
                            <form method="POST" action="Users/addUser" data-validate="parsley">
                                <div class="form-group">
                                    <label class=" form-control-user">First Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" name="firstname" id="firstname"
                                               placeholder="First Name" class="form-control has-feedback-left col-6" required>
                                    </div>
                                    <small class="form-text text-muted">ex. George</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Last Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" id="lastname" name="lastname"
                                               class="form-control has-feedback-left col-6"
                                               placeholder="Last Name" required>
                                    </div>
                                    <small class="form-text text-muted">ex. Andrews</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">E-mail</label>
                                    <div id="email-res"></div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input id="email" class="form-control has-feedback-left col-6" type="email" name="email"
                                               placeholder="E-mail">
                                    </div>
                                    <small class="form-text text-muted">ex. george_andrews@gmail.com</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Contact No.</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input class="form-control has-feedback-left col-6" pattern="^(09|\+639)\d{9}$"
                                               title="ex. 0987654321" name="contactno" placeholder="Contact No.">
                                    </div>
                                    <small class="form-text text-muted">format: +639XXXXXXXXX or 09XXXXXXXXX</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Username</label>
                                    <div id="username_result"></div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input pattern="^[A-Za-z0-9_-]{4,}$"
                                               title="Username must be more than 4 characters, use letters and numbers only."
                                               name="username" id="username"
                                               class="form-control has-feedback-left col-6" placeholder="Username" required>
                                    </div>
                                    <small class="form-text text-muted">ex. george12g2</small>

                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                        <input type="password" title="Must be longer that 5 characters." name="password"
                                               id="password"
                                               class="form-control has-feedback-left col-6" pattern=".{6,}$"
                                               placeholder="Password" required>
                                    </div>
                                    <small class="form-text text-muted">Format: >5 characters</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Position</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
                                        <select id="userSelectDept" required class="fa fa-chevron-down align-center col-6" name="position">
                                            <option value="admin">Admin</option>
                                            <option value="custodian" selected>Custodian</option>
                                            <option value="supply officer">Supply Officer</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="dmentselect" style="display:none;" class="form-group">
                                    <label class="form-control-label">Department</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                        <select class="deptopt" type="button" name="dment"
                                                class="col-lg-5 deptopt form-control col-6"></select>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="id" id="edtsave" class="btn btn-success"><i
                                                class="fa fa-send"></i> Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Edit Accounts-->
            <div hidden class="col-lg-12 userDetail">
                <div class="card">
                    <div class="card-header">
                        <button type="button" id="editUserBack" class="btn btn-dark fa fa-arrow-left"></i> Back</a></button>
                    </div>
                    <div class="card-body">
                        <form id="editAccounts" class="form-horizontal form-label-left" action="users/edituser" method="POST">
                            <div class="form-group">
                                <label class=" form-control-user">First Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" name="first" id="first"
                                           class="form-control has-feedback-left col-6" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Last Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" id="last" name="last" class="form-control has-feedback-left col-6" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">E-mail</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    <input id="em" class="form-control has-feedback-left col-6" type="email" name="em">
                                </div>
                                <small class="form-text text-muted">ex. person@gmail.com</small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Contact No.</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                    <input type="text" class="form-control has-feedback-left col-6" pattern="^(09|\+639)\d{9}$"
                                           title="ex. 0987654321" id="cno" name="cno">
                                </div>
                                <small class="form-text text-muted">Format: +639XXXXXXXXX or 09XXXXXXXXX</small>

                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input type="password" name="pword" id="pword" class="form-control has-feedback-left col-6"
                                           pattern=".{6,}$">
                                </div>
                                <small class="form-text text-muted">Format: >5 characters</small>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Status</label>
                                <div class="input-group">
                                    <select id="stat" data-parsley-group="set1"
                                            list="statuslist" name="Stat"
                                            class="form-control col-6">
                                        <option value="Inactive">Inactive</option>
                                        <option value="Active">Activate</option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <button class="btn btn-success" type="submit" name="id" id="edtbutton">
                                <i class="fa fa-check"></i> save changes
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>

<!--End of Edit Accounts-->
