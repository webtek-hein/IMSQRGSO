<?php
$username = ($this->session->userdata['logged_in']['username']);
$firstname = ($this->session->userdata['user_in']['firstname']);
$lastname = ($this->session->userdata['user_in']['lastname']);
$position = ($this->session->userdata['logged_in']['position']);
$email = ($this->session->userdata['user_in']['email']);
$contact_no = ($this->session->userdata['user_in']['contact_no']);
$password = ($this->session->userdata['logged_in']['password']);
?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- /.col -->
            <div class="col-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li><a href="" data-toggle="tab">Update Profile</a></li>

                        <?php if ($this->session->flashdata('profilemsg')): ?>
                            <br><p><?php echo $this->session->flashdata('profilemsg'); ?></p>
                        <?php endif; ?>
                    </ul>

                    <div class="form-horizontal">
                        <div class="tab-pane" id="settings">
                            <?php echo validation_errors(); ?>

                            <form id='profile' class="profileform" action="profile/profile_update" method="POST">
                                <div class="card-body col-12">
                                    <div class="form-group">
                                        <label for="first_name" class="control-label">First Name</label>

                                        <div class="input-group">
                                            <input type="text" required class="form-control col-6" id="first_name"
                                                   name="first_name" value="<?php echo $firstname ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name" class=" control-label">Last Name</label>
                                        <div class="input-group">
                                            <input type="text" required class="form-control col-6" id="last_name"
                                                   name="last_name" value="<?php echo $lastname ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail" class="control-label">Email</label>
                                        <div class="input-group">
                                            <input type="email" required class="form-control col-6" id="inputEmail"
                                                   name="email" value="<?php echo $email ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCon" class="control-label">Contact no</label>
                                        <div class="input-group">
                                            <input type="number" required pattern="^(09|\+639)\d{9}$"
                                                   class="form-control col-6" id="contact"
                                                   name="contact_no" value="<?php echo $contact_no ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <button class="btn btn-success" type="submit" name="id" class="edtbutton">
                                                <i class="fa fa-check"></i> Save
                                            </button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li><a href="" data-toggle="tab">Update Password</a></li>
                        <br>
                        <?php if ($this->session->flashdata('passwordmsg')): ?>
                            <br><p><?php echo $this->session->flashdata('passwordmsg'); ?></p>
                        <?php elseif ($this->session->flashdata('response')): ?>
                            <br><p><?php echo $this->session->flashdata('response', "Password does not match"); ?></p>
                        <?php endif; ?>
                    </ul>

                    <div class="form-horizontal">
                        <div class="tab-pane" id="settings">
                            <?php echo validation_errors(); ?>
                            <?php echo form_open('profile/changepass'); ?>

                            FORMAT: must be more than 5 characters
                            <br/>
                            <div class="form-group">
                                <label for="old_password" class="control-label"></label>
                                <div class="input-group">
                                    <input id="old" type="password" required class="form-control col-6"
                                           name="old_password" placeholder="old password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="new_password" class="control-label"></label>
                                <div class="input-group">
                                    <input type="password" required class="form-control col-6" name="new_password"
                                           placeholder="new password" pattern=".{6,}$">
                                </div>
                                <small class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="con_new_password" class="control-label"></label>
                                <div class="input-group">
                                    <input type="password" required class="form-control col-6" id="inputPasswordAgain"
                                           name="con_new_password" placeholder="confirm password">
                                </div>
                            </div>


                            <div class="form-group">
                                <div>
                                    <button class="btn btn-success" type="submit" name="id" class="edtbutton">
                                        <i class="fa fa-check"></i> Save
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
