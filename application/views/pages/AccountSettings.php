            <div class="col-lg-12 userDetail">
                <div class="card">
                    <div class="card-body">
                    <form id="editAccounts" class="form-horizontal form-label-left" action="users/edituser" method="POST">
                        <div class="form-group">
                            <label class=" form-control-user">First Name</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" name="first" id="first" 
                                       class="form-control has-feedback-left" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Last Name</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" id="last" name="last" class="form-control has-feedback-left" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">E-mail</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                <input id="em" class="form-control has-feedback-left" type="email" name="em">
                            </div>
                            <small class="form-text text-muted">ex. person@gmail.com</small>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Contact No.</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                <input type="text" class="form-control has-feedback-left" pattern="^(09|\+639)\d{9}$" title="ex. 0987654321" id="cno" name="cno">
                            </div>
                                <small class="form-text text-muted">Format: +639XXXXXXXXX or 09XXXXXXXXX</small>

                        </div>
                   
                        <div class="form-group">
                            <label class=" form-control-label">Password</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input type="password" name="pword" id="pword" class="form-control has-feedback-left" pattern=".{6,}$">
                            </div>
                            <small class="form-text text-muted">Format: >5 characters</small>
                        </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Status</label>
                                        <div class="col-md-12">
                                            <select id="stat" data-parsley-group="set1"
                                                    list="statuslist" name="Stat"
                                                    class="form-control" >
                                                <option value="Inactive">Inactive</option>
                                                <option value="Active">Activate</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br><br>
                                    <button class="btn btn-info" type="submit" name="id" id="edtbutton">
                                        <i class="fa fa-check"></i> save changes
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>