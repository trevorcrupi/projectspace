<?php

class Avatar {

  public $Session;
  public $QueryBuilder;

  public function __construct() {
      $this->Session = load_class("Session");
      $this->QueryBuilder = load_class("QueryBuilder");
  }

  public function getFilePath($user_has_avatar, $user_id) {
    if($user_has_avatar) {
      return URL . PATH_AVATARS_PUBLIC . '_' . $user_id . '.jpg';
    }

    return URL . PATH_AVATARS_PUBLIC . AVATAR_DEFAULT_IMAGE;
  }

  public function getFilePathByUserId($table, $user_id) {
    $this->QueryBuilder->query("SELECT user_has_avatar FROM {$table} WHERE user_id = :user_id LIMIT 1");
    $this->QueryBuilder->bind(':user_id', $user_id);
    $result = $this->QueryBuilder->single();

    if($result->user_has_avatar) {
      return URL . PATH_AVATARS_PUBLIC . '_' . $user_id . '.jpg';
    }

    return URL . PATH_AVATARS_PUBLIC . AVATAR_DEFAULT_IMAGE;
  }

  public function createAvatar($table) {
    $this->validateImageFile();

    //Create a JPG image in the avatar folder, write marker to database
    $target_file_path = PATH_AVATARS . '_' . $this->Session->get('user_id');
    self::resizeAvatarImage($_FILES['avatar_file']['tmp_name'], $target_file_path, AVATAR_SIZE, AVATAR_SIZE, AVATAR_JPEG_QUALITY);
    $this->writeToDatabase($table, $this->Session->get('user_id'));
    $this->Session->set('user_avatar_file', $this->getFilePathByUserId($table, $this->Session->get('user_id')));
    $this->Session->add('feedback_positive', 'Avatar Uploaded Successfully!');
    return true;
  }

  public function validateImageFile() {
    if (!is_dir(PATH_AVATARS) OR !is_writable(PATH_AVATARS)) {
      $this->Session->add('feedback_negative', 'The avatar folder does not exist or is not writable');
			return false;
		} else if (!isset($_FILES['avatar_file']) OR empty ($_FILES['avatar_file']['tmp_name'])) {
			$this->Session->add('feedback_negative', 'The avatar file did not upload correctly');
			return false;
		} else if ($_FILES['avatar_file']['size'] > 5000000) {
			// if input file too big (>5MB)
      $this->Session->add('feedback_negative', 'The File Size is too Big');
      return false;
		}

		// get the image width, height and mime type
		$image_proportions = getimagesize($_FILES['avatar_file']['tmp_name']);

		// if input file too small
		if ($image_proportions[0] < AVATAR_SIZE OR $image_proportions[1] < AVATAR_SIZE) {
      $this->Session->add('feedback_negative', 'The Avatar File Size You Uploaded Was Too Small');
			return false;
		} else if (!($image_proportions['mime'] == 'image/jpeg' || $image_proportions['mime'] == 'image/png')) {
      $this->Session->add('feedback_negative', 'The file you uploaded had the wrong type!');
			return false;
		}
  }

  public function writeToDatabase($table, $user_id) {
    $this->QueryBuilder->query("UPDATE {$table} SET user_has_avatar = 1 WHERE user_id = :user_id LIMIT 1");
    $this->QueryBuilder->bind(':user_id', $user_id);
    $this->QueryBuilder->execute();
  }

  public static function resizeAvatarImage($source_image, $destination, $final_width = 200, $final_height = 200, $quality = 150) {
    list($width, $height) = getimagesize($source_image);
    if(!$width || !$height) {
      return false;
    }

    $myImage = imagecreatefromjpeg($source_image);

    if($width > $height) {
      $y = 0;
      $x = ($width - $height) / 2;
      $smallestSide = $height;
    } else {
      $x = 0;
      $y = ($height-$width) / 2;
      $smallestSide = $width;
    }

    $thumb = imagecreatetruecolor($final_width, $final_height);
    imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $final_width, $final_height, $smallestSide, $smallestSide);

    $destination .= '.jpg';
    imagejpeg($thumb, $destination, $quality);

    imagedestroy($thumb);

    if(file_exists($destination)) {
      return true;
    }

    return false;
  }
}
