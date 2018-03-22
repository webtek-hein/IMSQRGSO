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
                                   class="table table-no-bordered">
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
                                           placeholder="E-mail">
                                </div>
                                <small class="form-text text-muted">ex. george_andrews@gmail.com</small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Contact No.</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                    <input type="text" class="form-control has-feedback-left" pattern="^(09|\+639)\d{9}$" title="ex. 0987654321" name="contactno" placeholder="Contact No.">
                                </div>
                                <small class="form-text text-muted">ex. (999) 999-9999</small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Username</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" pattern="^[A-Za-z0-9_-]{4,}$" title="Username must be more than 4 characters, use letters and numbers only." name="username" id="username" class="form-control has-feedback-left" placeholder="Username" required> <span id="username_result"></span>
                                </div>
                                <small class="form-text text-muted">ex. george12g2</small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Password</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input type="password" name="password" id="password" class="form-control has-feedback-left" pattern=".{4,}$"
                                           placeholder="Password" required>
                                </div>
                                <small class="form-text text-muted">ex. Password_123</small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Position</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
                                    <select required class="fa fa-chevron-down align" center" id="position" name="position" onclick='select_dept()' >
                                    <option selected="true" disabled>--Choose Position--</option>
                                    <option value="admin">Admin</option>
                                    <option value="custodian">Custodian</option>
                                    <option value="supply officer">Supply Officer</option>
                                    </select>
                                </div>
                            </div>
                            <div id="dmentselect" style="display:none;" class="form-group">
                                <label class="form-control-label">Department</label>
                                <div class="input-group" >
                                    <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                    <select class="fa fa-chevron-down align" center" id="dment" name="dment" type="button" >
                                        <option value="11">CITY ENVIRONMENT & PARKS MANAGEMENT OFFICE</option>
                                        <option value="12">BUREAU OF FIRE PREVENTION AND SAFETY</option>
                                        <option value="13">GENERAL SERVICES OFFICE</option>
                                        <option value="14">HEALTH SERVICES OFFICE</option>
                                        <option value="15">OFFICE OF THE CITY HUMAN RESOURCE CENTER</option>
                                        <option value="16">CITY LEGAL OFFICE</option>
                                        <option value="17">CITY LIBRARY</option>
                                        <option value="18">CITY MAYOR'S OFFICE</option>
                                        <option value="19"> 
MUNICIPAL TRIAL COURT IN CITIES</option>
                                        <option value="20">OFFICE OF THE CITY PLANNING AND DEVELOPMENT</option>
                                        <option value="21">CITY POLICE OFFICE</option>
                                        <option value="22">PAROLE AND PROBATION OFFICE</option>
                                        <option value="23">CITY PROSECUTOR'S OFFICE</option>
                                        <option value="24">PUBLIC ATTORNEY'S OFFICE</option>
                                        <option value="25">REGIONAL TRIAL COURT</option>
                                        <option value="26">REGISTRY OF DEEDS</option>
                                        <option value="27">SANGGUNIANG PANGLUNGSOD</option>
                                        <option value="28">OFFICE OF THE CITY SOCIAL WELFARE DEVELOPMENT</option>
                                        <option value="29">CITY TREASURER'S OFFICE</option>
                                        <option value="110">CITY ENGINEER'S OFFICE</option>
                                        <option value="111">CITY ACCOUNTANT'S OFFICE</option>
                                        <option value="112">CITY ADMINISTRATOR'S OFFICE</option>
                                        <option value="113">CITY ASSESSOR'S OFFICE</option>
                                        <option value="114">OFFICE OF THE CITY AUDITOR</option>
                                        <option value="115">    
CITY BUDGET OFFICE</option>
                                        <option value="116">CITY BUILDING AND ARCHITECTURE OFFICE</option>
                                        <option value="117">CITY JAIL MANAGEMENT & PENOLOGY</option>
                                        <option value="118">OFFICE OF THE LOCAL CIVIL REGISTRAR</option>
                                        <option value="119">DEPARTMENT OF EDUCATION</option>
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
<!-- end of add user -->

<!--Edit Accounts-->
            <div hidden class="col-lg-12 userDetail">
                <div class="card">
                    <div class="card-header">
                        <button type="button" onclick="EditUserBack()" class="btn btn-primary"></i> Back</a></button>
                    </div>
                    <div class="card-body">
                    <form id="editAccounts" class="form-horizontal form-label-left" action="users/edituser" method="POST">
                        <div class="form-group">
                            <label class=" form-control-user">First Name</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" name="first" id="first" 
                                       class="form-control has-feedback-left" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Last Name</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" id="last" name="last" class="form-control has-feedback-left">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">E-mail</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                <input id="em" class="form-control has-feedback-left" type="email" name="em">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Contact No.</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                <input type="text" class="form-control has-feedback-left" pattern="^(09|\+639)\d{9}$" title="ex. 0987654321" id="cno" name="cno">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Username</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" name="uname" id="uname" class="form-control has-feedback-left" pattern="^[A-Za-z0-9_-]{4,}$" title="Username must be more than 4 characters, use letters and numbers only." required><span id="uname_result"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Password</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input type="password" name="pword" id="pword" class="form-control has-feedback-left" pattern=".{4,}$">
                            </div>
                        </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Status</label>
                                        <div class="col-md-12">
                                            <select id="stat" data-parsley-group="set1"
                                                    list="statuslist" name="Stat"
                                                    class="form-control" >
                                                <option selected="true" disabled>--Activate or Deactivate--</option>
                                                <option value="Inactive">Deactivate</option>
                                                <option value="Active">Activate</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-info" type="submit" name="id" id="edtbutton">
                                        <i class="fa fa-check"></i> save changes
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!--End of Edit Accounts-->
