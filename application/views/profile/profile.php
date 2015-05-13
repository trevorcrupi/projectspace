<center>
  <h1><?php echo $user['user_name'] ?></h1>
  <p>Create Your Account And Begin Your Adventure</p>
</center>
<div class="content">
  <div class="row">
    <center>
      <div style="" class="col-md-6">
        <div class="row info-col info-1">
          <div class="info-square info-square-1"></div>
          <div class="info-square info-square-2"></div>
        </div>
        <div class="row info-col info-2">
          <div class="info-square info-square-3"></div>
          <div class="info-square info-square-4"></div>
        </div>
      </div>
    </center>

    <div class="col-md-6">
      <form class="form-horizontal" method="post" style="margin-top: 6%" action="<?php echo URL ?>register/register">
        <div class="form-group">
          <div class="col-sm-9">
            <label class="control-label" for="username">User Name</label>
            <input type="text" placeholder="Your User Name" name="user_name" class="form-control" id="user_name" maxlength="30" required="required">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-9">
            <label class="control-label" for="email">Email</label>
            <input type="text" placeholder="Your Email" name="user_email" class="form-control" id="email" maxlength="30" required="required">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-9">
            <label class="control-label" for="firstname">Password</label>
            <input type="password" placeholder="Password" name="password" class="form-control" id="firstname" maxlength="30" required="required">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-9">
            <label class="control-label" for="firstname">Confirm Password</label>
            <input type="password" placeholder="Confirm Password" name="confirm_pass" class="form-control" id="firstname" maxlength="30" required="required">
          </div>
        </div>
        <input class="btn btn-default" type="submit" value="Start Creating.">
      </form>
    </div>
  </div>
</div>
<a href="<?php echo URL ?>login/logout">Logout</a>
</div>
