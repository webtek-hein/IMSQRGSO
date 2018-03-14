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

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <!-- Inventory-->
            <div class=" col-lg-12 accounts-tab">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-primary" id="headingZero">
                            <i class="fa fa-plus"></i><span> Add User</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="tab-content pl-3 p-1" id="myTabContent">
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
                                    <th data-sortable="true" data-field="status">Status</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div hidden class="col-lg-12 addUser ">
    <div class="card-header">
        <button type="button" onclick="addUserBack()" class="btn btn-primary"> Back</a></button>
    </div>
    <div class="form-group">
        <div class="card">
            <div class="card-body card-block">
                        <form method="POST" action="Users/addUser" data-validate="parsley">
                            <div class="form-group">
                                <label class=" form-control-user">First Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" name="firstname" id="firstname"
                                           placeholder="First Name" class="form-control has-feedback-left" required>
                                </div>
                                <small class="form-text text-muted">ex. George</small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Last Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" id="lastname" name="lastname" class="form-control has-feedback-left"
                                           placeholder="Last Name" required>
                                </div>
                                <small class="form-text text-muted">ex. Andrews</small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">E-mail</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    <input id="email" class="form-control has-feedback-left" type="email" name="email"
                                           placeholder="E-mail"
                                           required>
                                </div>
                                <small class="form-text text-muted">ex. george_andrews@gmail.com</small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Contact No.</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                    <input type="text" class="form-control has-feedback-left" pattern="^(09|\+639)\d{9}$"
                                           title="ex. 0987654321" name="contactno" placeholder="Contact No." required>
                                </div>
                                <small class="form-text text-muted">ex. (999) 999-9999</small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Username</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" name="username" id="username" class="form-control has-feedback-left"
                                           placeholder="Username" required>
                                </div>
                                <small class="form-text text-muted">ex. george12g2</small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Password</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input type="password" name="password" id="password" class="form-control has-feedback-left"
                                           placeholder="Password" required>
                                </div>
                                <small class="form-text text-muted">ex. Password_123</small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Position</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
                                    <select class="fa fa-chevron-down align=" center" id="position" name="position"
                                    onclick='select_dept()' required>
                                    <option selected="true" disabled>--Choose Position--</option>
                                    <option value="admin">Admin</option>
                                    <option value="custodian">Custodian</option>
                                    <option value="supply officer">Supply Officer</option>
                                    </select>
                                </div>
                            </div>
                             <script>
                                function select_dept() {
                                    if (document.getElementById('position').value === 'supply officer') {
                                        document.getElementById('dment').style.display  = 'block';
                                    } else {
                                        document.getElementById('dment').style.display = 'none';
                                    }
                                }
                            </script>   
                            <div class="form-group">
                                <label class="form-control-label" >Department</label>
                                <div class="input-group" >
                                    <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                    <select id="dment" name="dment" type="button" style="display:none;" class="deptopt form-control"></select>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success"><i
                                            class="fa fa-send"></i> Submit
                                </button>
                            </div>
                        </form>
            </div>
        </div>
    </div>
</div>
<!-- end of add user -->

            <div hidden class="col-lg-12 userDetail">
                <div class="card">
                    <div class="card-header">
                        <button type="button" onclick="userDetailBack()" class="btn btn"></i> Back</a></button>
                    </div>
                    <div class="card-body">
                    <form id="editInformation" class="serialForm form-horizontal form-label-left" action="inventory/edititem" method="POST">
                                    <div class="form-group">
                                        <label class="col-md-12">Item Name</label>
                                        <div class="col-md-12">
                                            <input id="itemname"
                                                   type="text" name="item"
                                                   class="form-control"
                                                   data-parsley-trigger="blur"
                                                   data-parsley-group="set1"
                                                   data-parsley-length="[1, 20]"
                                                   data-parsley-required-message="Please insert Item name"
                                                   required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Description</label>
                                        <div class="col-md-12">
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

                                    <div class="form-group">
                                        <label class="col-md-12">Total Quantity</label>
                                        <div class="col-md-12">
                                            <p id="total"></p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Unit</label>
                                        <div class="col-md-12">
                                            <input id="unit" name="Unit" data-parsley-group="set1"
                                                   class="form-control" class="unit"
                                                   list="list"
                                                   data-parsley-required-message="Select the Unit"
                                                   required>
                                            <datalist id="list">
                                                <option value="piece">piece</option>
                                                <option value="box">box</option>
                                                <option value="set">set</option>
                                                <option value="ream">ream</option>
                                                <option value="dozen">dozen</option>
                                                <option value="bundle">bundle</option>
                                                <option value="sack">sack</option>
                                                <option value="others">others</option>
                                            </datalist>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Type</label>
                                        <div class="col-md-12">
                                            <select id="itemtype" data-parsley-group="set1" id="type"
                                                    list="typelist" name="Type"
                                                    class="form-control" required>
                                                <option value="CO">Capital Outlay</option>
                                                <option value="MOOE">MOOE</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-info" type="submit" name="id" id="edtbutton">
                                        <i class="fa fa-check"></i> save
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
