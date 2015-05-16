<center>
  <h1><?php echo $user['user_name'] ?></h1>
  <p>Your Account</p>
  <a href="<?php echo URL ?>upload/index"><button class="btn btn-primary">Upload A Project</button></a>
  <?php if($sess_username != $user['user_name']): ?>
    <a href="<?php echo URL ?>profile/profile/addFollow/<?php echo $user['user_name'] ?>"><button id="followButton" class="btn btn-primary">Follow</button></a>
  <?php endif; ?>
</center>

<img height="50" width="50" src="<?php echo $avatar ?>" />
<p>Email: <?php echo $user['user_email'] ?></p>
<p>First Name: <?php echo $user['user_first_name'] ?></p>
<p>Last Name: <?php echo $user['user_last_name'] ?></p>
<p>Portfolio Url: <?php echo $user['user_portfolio_url'] ?></p>
<p>Organization Name: <?php echo $user['user_organization_name'] ?></p>
<p>Biography: <?php echo $user['user_bio'] ?></p>
