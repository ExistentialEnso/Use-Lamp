<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

// Handles db connection and basic setup
require("core/bootstrap.php");

$user = null;
if(isset($_COOKIE['login'])) {
  $login_data = explode(":", $_COOKIE['login']);

  if(isset($login_data[1])) {
    $result = $em->createQuery("SELECT u FROM \models\User u WHERE u.email_address = :email")->setParameter("email", $login_data[0])->getResult();

    if(count($result) == 1) {
      if($result[0]->getPasswordHash() == $login_data[1]) {
        $user = $result[0];
      }
    }
  }
}

if(!is_null($user)) {
  $ts = (int) ($_POST['cutoff']/1000);

  $time = new \DateTime();
  $time->setTimestamp($ts);

  $result = $em->createQuery("SELECT n FROM \\models\\events\\Notification n WHERE n.time > :date ORDER BY n.time DESC")->setParameter("date", $time)->getResult();
  $latest = $_POST['cutoff'];
  $output = "";

  foreach($result as $n) {
    if($latest == $_POST['cutoff']) $latest = $n->getTime()->getTimestamp() * 1000;

    $output .= $n->getMessage(). "<br />";
  }

  $response = array();
  $response['output'] = $output;
  $response['latest'] = $latest;

  echo(json_encode($response));
}