<?php
    $username = ($this->session->userdata['logged_in']['username']);
    $firstname = ($this->session->userdata['user_in']['firstname']);
    $lastname = ($this->session->userdata['user_in']['lastname']);
    $position = ($this->session->userdata['logged_in']['position']);
    $email = ($this->session->userdata['user_in']['email']);
    $contact_no = ($this->session->userdata['user_in']['contact_no']);
    $password = ($this->session->userdata['logged_in']['password']);
?>
<link rel="stylesheet" type="text/css" href="assets/css/profile.css">
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="" data-toggle="tab">Update Profile</a></li>

              <?php if($this->session->flashdata('profilemsg')): ?>
                <br><p><?php echo $this->session->flashdata('profilemsg'); ?></p>
              <?php endif; ?>
            </ul>

             <div class="form-horizontal">
          <div class="tab-pane" id="settings">
              <?php echo validation_errors(); ?>

    <form id='profile' class="profileform" action="profile/profile_update" method="POST">

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">First Name</label>

                    <div class="col-sm-9">
                      <input type="text" required class="form-control" id="inputName" name="first_name" value="<?php echo $firstname ?>">
                    </div>
                  </div>

                 <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Last Name</label>

                    <div class="col-sm-9">
                      <input type="text" required class="form-control" id="inputName" name="last_name" value="<?php echo $lastname ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" required class="form-control" id="inputEmail" name="email" value="<?php echo $email ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputCon" class="col-sm-2 control-label" >Contact no</label>
                    <div class="col-sm-9">
                      <input type="number" required pattern="^(09|\+639)\d{9}$" class="form-control has-feedback-left col-6" id="inputName" name="contact_no" value="<?php echo $contact_no ?>">
                    </div>
                  </div>
    <div class="form-group">
        <div class="col-sm-offset-8 col-sm-9">
            <button class="btn btn-success" type="submit" name="id" id="edtbutton">
                <i class="fa fa-check"></i> Save
            </button>
        </div>
    </div>
    </form>
          </div>
             </div>
          </div>
        </div>

    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li><a href="" data-toggle="tab">Update Password</a></li>
                    <br>
                <?php if($this->session->flashdata('passwordmsg')): ?>
                    <br><p><?php echo $this->session->flashdata('passwordmsg'); ?></p>
                <?php elseif ($this->session->flashdata('response')):?>
                    <br><p><?php echo $this->session->flashdata('response',"Password does not match"); ?></p>
                <?php endif; ?>
            </ul>

            <div class="form-horizontal">
                <div class="tab-pane" id="settings">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('profile/changepass'); ?>

                    FORMAT: must be more than 5 characters
				           <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"></label>
                    <div class="col-sm-9">
                      <input id="old" type="password" required class="form-control" name="old_password" placeholder="old password" >
                    </div>
                  </div>
                  <br>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label"></label>
                        <div class="col-sm-9">
                            <input type="password"  required class="form-control" name="new_password" placeholder="new password" pattern=".{6,}$">
                        </div>
                        <small class="form-text text-muted"></small>
                    </div>
                    <br>
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"></label>
                    <div class="col-sm-9">
                      <input type="password" required class="form-control" id="inputPasswordAgain" name="con_new_password" placeholder="confirm password">
                    </div>
                  </div>


                  <div class="form-group">
                    <div style="padding: 0 20px 10px 90px;" class="col-sm-offset-8 col-sm-9">
                        <button class="btn btn-success" type="submit" name="id" id="edtbutton">
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
