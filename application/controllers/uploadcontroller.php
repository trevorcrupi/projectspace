<?php

class UploadController extends Controller {

  function index() {
    $Session = load_class("Session");
    $this->set('title', 'Create Your Project');
    $this->set('sess_username', $Session->get('user_name'));
    $this->set('sess_user_id', $Session->get('user_id'));
  }

  function upload() {
    $Session = load_class("Session");
		$Request = load_class('Request');
    $Redirect = load_class("Redirect");
    $vals = array($Request->post('project_name'), $Request->post('project_desc'), time(), $Session->get('user_id'), $Session->get('user_name'));
		$this->Upload->insert('saved_projects', $vals, array('project_name','project_tags', 'project_desc', 'project_timestamp', 'user_id', 'user_name'));
    $Redirect->to('profile/profile/' . $Session->get('user_name'));
  }
}
