<center>
  <h1><?php echo $user['user_name'] ?></h1>
  <p>Your Account</p>
  <p><?php echo $feedback ?></p>
</center>

<div class="content">
  <div class="row">
    <div style="" class="col-md-6">
      <form class="form-horizontal" method="post" style="margin-top: 6%" action="<?php echo URL ?>profile/updateUsername">
        <div class="form-group">
          <div class="col-sm-9">
            <label class="control-label" for="username">User Name</label>
            <input type="hidden" value="<?php echo $user['user_id'] ?>" name="user_id" />
            <input type="text" value="<?php echo $user['user_name'] ?>" placeholder="Your User Name" name="user_name" class="form-control" id="user_name" maxlength="30" required="required">
          </div>
        </div>
        <input class="btn btn-default" type="submit" value="Update Your User Name">
      </form>
      <form class="form-horizontal" method="post" style="margin-top: 6%" action="<?php echo URL ?>profile/updateEmail">
        <div class="form-group">
          <div class="col-sm-9">
            <label class="control-label" for="email">Email</label>
            <input type="hidden" value="<?php echo $user['user_id'] ?>" name="user_id" />
            <input type="text" value="<?php echo $user['user_email'] ?>" placeholder="Your Email" name="user_email" class="form-control" id="email" maxlength="30" required="required">
          </div>
        </div>
        <input class="btn btn-default" type="submit" value="Update Your Email">
      </form>
      <form class="form-horizontal" method="post" enctype="multipart/form-data" style="margin-top: 6%" action="<?php echo URL ?>profile/uploadAvatar">
          <label for="avatar_file">Select a Profile Picture</label>
          <input type="file" name="avatar_file" required />
          <!-- max size 5 MB (as many people directly upload high res pictures from their digital cameras) -->
          <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
          <input type="submit" value="Upload image" />
      </form>
    </div>

    <div class="col-md-6">
      <form class="form-horizontal" method="post" style="margin-top: 6%" action="<?php echo URL ?>profile/updateFirstName">
        <div class="form-group">
          <div class="col-sm-9">
            <label class="control-label" for="first_name">First Name</label>
            <input type="hidden" value="<?php echo $user['user_id'] ?>" name="user_id" />
            <input type="text" value="<?php echo $user['user_first_name'] ?>" placeholder="Your First Name" name="user_first_name" class="form-control" id="first_name" maxlength="30" required="required">
          </div>
        </div>
        <input class="btn btn-default" type="submit" value="Update Your First Name">
      </form>
      <form class="form-horizontal" method="post" style="margin-top: 6%" action="<?php echo URL ?>profile/updateLastName">
        <div class="form-group">
          <div class="col-sm-9">
            <label class="control-label" for="last_name">Last Name</label>
            <input type="hidden" value="<?php echo $user['user_id'] ?>" name="user_id" />
            <input type="text" value="<?php echo $user['user_last_name'] ?>" placeholder="Your Last Name" name="user_last_name" class="form-control" id="last_name" maxlength="30" required="required">
          </div>
        </div>
        <input class="btn btn-default" type="submit" value="Update Your Last Name">
      </form>
      <form class="form-horizontal" method="post" style="margin-top: 6%" action="<?php echo URL ?>profile/updateUrl">
        <div class="form-group">
          <div class="col-sm-9">
            <label class="control-label" for="url">Portfolio URL</label>
            <input type="hidden" value="<?php echo $user['user_id'] ?>" name="user_id" />
            <input type="text" value="<?php echo $user['user_portfolio_url'] ?>" placeholder="Your Portfolio Url" name="user_portfolio_url" class="form-control" id="portfolio_url" maxlength="50" required="required">
          </div>
        </div>
        <input class="btn btn-default" type="submit" value="Update Your Portfolio">
      </form>
      <form class="form-horizontal" method="post" style="margin-top: 6%" action="<?php echo URL ?>profile/updateOrganization">
        <div class="form-group">
          <div class="col-sm-9">
            <label class="control-label" for="Organization">Organization Name</label>
            <input type="hidden" value="<?php echo $user['user_id'] ?>" name="user_id" />
            <input type="text" value="<?php echo $user['user_organization_name'] ?>" placeholder="Your Organization" name="user_organization_name" class="form-control" id="org_name" maxlength="100" required="required">
          </div>
        </div>
        <input class="btn btn-default" type="submit" value="Update Your Organization">
      </form>
      <form class="form-horizontal" method="post" style="margin-top: 6%" action="<?php echo URL ?>profile/updateBio">
        <div class="form-group">
          <div class="col-sm-9">
            <label class="control-label" for="bio">Biography</label>
            <input type="hidden" value="<?php echo $user['user_id'] ?>" name="user_id" />
            <textarea type="text" placeholder="Tell us About You" name="user_bio" class="form-control" id="user_bio" required="required"><?php echo $user['user_bio'] ?></textarea>
          </div>
        </div>
        <input class="btn btn-default" type="submit" value="Update Your Biography">
      </form>
    </div>
  </div>
</div>
