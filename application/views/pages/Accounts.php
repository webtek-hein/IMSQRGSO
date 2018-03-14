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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-primary" role="tab" id="headingZero" data-toggle="tab"
                                href="#collapseZero" aria-expanded="true" aria-controls="collapseZero">
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

<div class="col-lg-12 AddUser hidden">
    <div class="card-header">
        <button type="button" onclick="addUserBack()" class="btn btn-primary"> Back</a></button>
    </div>
    <div class="card">
        <div class="card-body card-block">
            <form method="POST" action="Users/addUser" data-validate="parsley">
                <div class="form-group">
                    <label class=" form-control-label">First Name</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="text" name="firstname" id="firstname"
                               placeholder="First Name" class="form-control has-feedback-left" required>
                    </div>
                    <small class="form-text text-muted">ex. George</small>
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Last Name</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="text" id="lastname" name="lastname" class="form-control has-feedback-left"
                               placeholder="Last Name" required>
                    </div>
                    <small class="form-text text-muted">ex. Andrews</small>
                </div>
                <div class="form-group">
                    <label class=" form-control-label">E-mail</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
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
                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                        <input type="text" name="username" id="username" class="form-control has-feedback-left"
                               placeholder="Username" required>
                    </div>
                    <small class="form-text text-muted">ex. george12g2</small>
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Password</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-male"></i></div>
                        <input type="password" name="password" id="password" class="form-control has-feedback-left"
                               placeholder="Password" required>
                    </div>
                    <small class="form-text text-muted">ex. ********</small>
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Position</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
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
                            document.getElementById('posi').style.display = 'none';
                        }
                    }
                </script>   
                <div class="form-group">
                    <label class="form-control-label">Department</label>
                    <div class="input-group" >
                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                        <select id="dment" name="dment" type="button" class="deptopt form-control"></select>
                    </div>
                </div>

                <hr>
                <div class="form-group">

                <button type="submit" class="btn btn-success"><i
                            class="fa fa-send"></i> Submit
                </button>
                </div>
            </form>
        </div>
</div>