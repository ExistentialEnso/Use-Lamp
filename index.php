<?php
require("core/bootstrap.php");

$user = null;

if(isset($_POST['submit_login'])) {
  $result = $em->createQuery("SELECT u FROM \models\User u WHERE u.email_address = :email")->setParameter("email", $_POST['email_address'])->getResult();

  if(isset($_POST['new_account'])) {
    if(isset($result[0])) {
      $login_error = "That email address already exists in our system.";
    } else {
      // Create and save our user object
      $user = new \models\User();
      $user->setEmailAddress($_POST['email_address']);
      $user->setPassword($_POST['password']);

      // Load our root game object
      $game = $em->createQuery("SELECT g FROM \models\Game g")->getResult()[0];

      // Create our character
      $character = $game->createNewCharacter();
      $character->setUser($user);

      $em->persist($user);
      $em->persist($player);
      $em->flush();

      // Save our login information
      setcookie("login", $user->getEmailAddress().":".$user->getPasswordHash(), time() + (60*24));
    }

  } else {
    if(isset($result[0])) {
      if(crypt($_POST['password'], $result[0]->getPasswordHash())) {
        $user = $result[0];

        // Keep the cookie valid for 24 hrs more from this point
        setcookie("login", $user->getEmailAddress().":".$user->getPasswordHash(), time() + (60*24));
      } else {
        $login_error = "That email/password combination is invalid.";
      }
    } else {
      $login_error = "That email address is not in our system.";
    }
  }


} else if(isset($_COOKIE['login'])) {
  $login_data = explode(":", $_COOKIE['login']);

  if(isset($login_data[1])) {
    $result = $em->createQuery("SELECT u FROM \models\User u WHERE u.email_address = :email")->setParameter("email", $login_data[0])->getResult();

    if(count($result) == 1) {
      if($result[0]->getPasswordHash() == $login_data[2]) {
        $user = $result[0];
      }
    }
  }
}

if(!isset($user)) {
  require("views/login.html.php");
} else {
  require("views/client.html.php");
}
