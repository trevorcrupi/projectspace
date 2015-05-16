<?php

class ProfileController extends Controller {

  function profile($username = null) {
    $user = load_class('User_Data');
    $Redirect = load_class('Redirect');
    $Session = load_class('Session');
    $Avatar = load_class("Avatar");
    $this->set('title', 'Profile');
    $Redirect->auth();
    $user_id = $user->getUserId('users', $username);
    $this->set('user', $user->getUser('users', $user_id));
    $this->set('sess_username', $Session->get('user_name'));
    $this->set('avatar', $Session->get('user_avatar_file'));
  }

  function settings($username = null) {
    $user = load_class('User_Data');
    $Redirect = load_class('Redirect');
    $Session = load_class('Session');
    $this->set('title', 'Profile');
    $Redirect->auth();
    $user_id = $user->getUserId('users', $username);
    $this->set('user', $user->getUser('users', $user_id));
    $this->set('sess_username', $Session->get('user_name'));
    $this->set('feedback', $this->renderFeedbackMessages());
    $this->set('avatar', $Session->get('user_avatar_file'));
  }

  function updateUsername() {
    $Request = load_class('Request');
    $Redirect = load_class('Redirect');
    $Session = load_class('Session');
    $this->Profile->query("UPDATE users SET user_name = :user_name WHERE user_id = :user_id");
    $this->Profile->bind(':user_name', $Request->post('user_name'));
    $this->Profile->bind(':user_id', $Request->post('user_id'));
    $this->set('sess_username', $Request->post('user_name'));
    $this->Profile->execute();
    $Redirect->to('login/logout');
  }

  function updateEmail() {
    $Request = load_class('Request');
    $Redirect = load_class('Redirect');
    $Session = load_class('Session');
    $user = load_class('User_Data');
    $this->Profile->query("UPDATE users SET user_email = :user_email WHERE user_id = :user_id");
    $this->Profile->bind(':user_email', $Request->post('user_email'));
    $this->Profile->bind(':user_id', $Request->post('user_id'));
    $this->Profile->execute();
    $Redirect->to('login/logout');
  }

  function uploadAvatar() {
    $Avatar = load_class("Avatar");
    $Redirect = load_class("Redirect");
    $Session = load_class("Session");
    $Redirect->Auth();
    $Avatar->createAvatar('users');
    $Redirect->to('profile/settings/' . $Session->get('user_name'));
  }

  function updateFirstName() {
    $Request = load_class('Request');
    $Redirect = load_class('Redirect');
    $user = load_class('User_Data');
    $this->Profile->query("UPDATE users SET user_first_name = :user_first_name WHERE user_id = :user_id");
    $this->Profile->bind(':user_first_name', $Request->post('user_first_name'));
    $this->Profile->bind(':user_id', $Request->post('user_id'));
    $username = $user->getUsername('users', $Request->post('user_id'));
    $this->Profile->execute();
    $Redirect->to('profile/settings/' . $username);
  }

  function updateLastName() {
    $Request = load_class('Request');
    $Redirect = load_class('Redirect');
    $user = load_class('User_Data');
    $this->Profile->query("UPDATE users SET user_last_name = :user_last_name WHERE user_id = :user_id");
    $this->Profile->bind(':user_last_name', $Request->post('user_last_name'));
    $this->Profile->bind(':user_id', $Request->post('user_id'));
    $username = $user->getUsername('users', $Request->post('user_id'));
    $this->Profile->execute();
    $Redirect->to('profile/settings/' . $username);
  }

  function updateUrl() {
    $Request = load_class('Request');
    $Redirect = load_class('Redirect');
    $user = load_class('User_Data');
    $this->Profile->query("UPDATE users SET user_portfolio_url = :user_portfolio_url WHERE user_id = :user_id");
    $this->Profile->bind(':user_portfolio_url', $Request->post('user_portfolio_url'));
    $this->Profile->bind(':user_id', $Request->post('user_id'));
    $username = $user->getUsername('users', $Request->post('user_id'));
    $this->Profile->execute();
    $Redirect->to('profile/profile/' . $username);
  }

  function updateOrganization() {
    $Request = load_class('Request');
    $Redirect = load_class('Redirect');
    $user = load_class('User_Data');
    $this->Profile->query("UPDATE users SET user_organization_name = :user_organization_name WHERE user_id = :user_id");
    $this->Profile->bind(':user_organization_name', $Request->post('user_organization_name'));
    $this->Profile->bind(':user_id', $Request->post('user_id'));
    $username = $user->getUsername('users', $Request->post('user_id'));
    $this->Profile->execute();
    $Redirect->to('profile/settings/' . $username);
  }

  function updateBio() {
    $Request = load_class('Request');
    $Redirect = load_class('Redirect');
    $user = load_class('User_Data');
    $this->Profile->query("UPDATE users SET user_bio = :user_bio WHERE user_id = :user_id");
    $this->Profile->bind(':user_bio', $Request->post('user_bio'));
    $this->Profile->bind(':user_id', $Request->post('user_id'));
    $username = $user->getUsername('users', $Request->post('user_id'));
    $this->Profile->execute();
    $Redirect->to('profile/settings/' . $username);
  }

  function addFollow($username = null) {
    $user = load_class('User_Data');
    $Request = load_class('Request');
    $Session = load_class('Session');
    $user_id = $user->getUserId('users', $username);
    $data = $user->getUser('users', $user_id);
    $cols = array('user_id, user_name, follower_id, follower_name, follower_first_name, follower_last_name, follower_bio, follow_timestamp');
    $vals = array($Session->get('user_id'), $Session->get('user_name'), $data['user_name'], $data['user_name'], $data['first_name'], $data['last_name'], $data['user_bio'], time());
    $this->Item->insert('following', $cols, $vals);
  }

  function renderFeedbackMessages() {
		$Session = load_class("Session");
    $feedback_positive = $Session->get('feedback_positive');
		$feedback_negative = $Session->get('feedback_negative');

		// echo out positive messages
		if (isset($feedback_positive)) {
		    foreach ($feedback_positive as $feedback) {
		        echo '<div class="feedback success">'.$feedback.'</div>';
		    }
		}

		// echo out negative messages
		if (isset($feedback_negative)) {
		    foreach ($feedback_negative as $feedback) {
		        echo '<div class="feedback error">'.$feedback.'</div>';
		    }
		}

		$Session->set('feedback_positive', null);
		$Session->set('feedback_negative', null);
	}
}
