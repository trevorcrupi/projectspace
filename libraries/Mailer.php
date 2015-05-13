<?php

/**
 * @package Quantum
 * @author Trevor Crupi
 * @copyright Copyright (c) 2015-, Communicode, (http://communicode.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @since Version 1.0.0
*/

/**
 * @package Quantum
 * @subpackage Quantum Leap
 * @category Loading classes/functions
 * @author Trevor Crupi
**/

class Mailer {

  public function sendVerification($user_id, $user_email, $activation_hash) {
    $body = EMAIL_VERIFICATION_CONTENT . URL . EMAIL_VERIFICATION_URL . '/' . urlencode($user_id) . '/' . urlencode($activation_hash);

    $mail = new Mail;
    $mail_sent = $mail->sendMail(
      $user_email,
      EMAIL_VERIFICATION_FROM_EMAIL,
      EMAIL_VERIFICATION_FROM_NAME,
      EMAIL_VERIFICATION_SUBJECT,
      $body
    );

    if($mail_sent) {
      return true;
    }

    return false;
  }
}
