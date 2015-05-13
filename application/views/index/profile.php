<h1><?php echo $user['user_name'] ?></h1>
<h1><?php echo $user['user_email'] ?></h1>
<p>Profile Page would go here</p>

<?php if($user['user_name'] == $sess_username): ?>
  <a href="<?php echo URL ?>login/logout">Logout</a>
<?php endif; ?>
