<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/
require("core/bootstrap.php");

// Load our root game object
$game = $em->createQuery("SELECT g FROM \models\Game g")->getResult()[0];

session_start();

// Load our current location
$l_id = is_numeric($_SESSION['location_id']) ? $_SESSION['location_id'] : $game->getInitialLocation()->getId();
$location = $em->createQuery("SELECT l FROM \models\map\Location l WHERE l.id=" . $l_id)->getResult()[0];

// Placeholders
$target_entity = null;

// Begin breaking up the command
$cmd = $_POST['cmd'];
$cmd_pieces = explode(" ", $cmd);
$root_cmd = $cmd_pieces[0];

// Valid direction commands
$_movements = array("w", "n", "s", "e", "ne", "nw", "se", "sw", "in", "out", "up", "down");
$_basic = array("load", "i", "inventory", "look");
$_adv = array("use", "ex", "examine");

$view = null;

// Detect if this is a movement command
if(in_array($cmd, $_movements)) {
  $new_location = $location->getLocation($cmd);

  if(!is_null($new_location)) {
    $location = $new_location; // avoid overwriting this will null before the if
    $_SESSION['location_id'] = $location->getId();
    $view = "look";
  } else {
    echo($location->getNavigationMatrix()->getInvalidDirectionMessage());
    exit;
  }
} else if(in_array($cmd, $_basic)) {
  $view = $cmd;

  switch($cmd) {
    case "i":
      $view = "inventory"; // One view, synonymous commands
      break;
  }
} elseif(in_array($root_cmd, $_adv)) {
  switch($root_cmd) {
    case "use":
      if(!isset($cmd_pieces[1]))
      {
        echo("You must specify what you want to examine!");
        exit;
      }

      foreach($location->getEntities() as $entity) {
        if(strtolower($entity->getName()) == $cmd_pieces[1]) {
          $target_entity = $entity;

          echo("You use the " . $cmd_pieces[1] . " to no effect.");
          exit;
        }
      }

      if(is_null($target_entity)) {
        echo("Couldn't find object '" . $cmd_pieces[1]. "' here. Try shortening the name?");
        exit;
      }
      break;
    case "ex":
      $view = "examine";
      // don't break here so next block runs
    case "examine":
      if(!isset($cmd_pieces[1]))
      {
        echo("You must specify what you want to examine!");
        exit;
      }

      foreach($location->getEntities() as $entity) {
        if(strtolower($entity->getName()) == $cmd_pieces[1]) {
          $target_entity = $entity;
        }
      }

      if(is_null($target_entity)) {
        echo("Couldn't find object '" . $cmd_pieces[1]. "' here. Try shortening the name?");
        exit;
      }
      break;
  }
}

if($view == null) {
  echo("Whoops. I don't understand that!");
  exit;
}


//Load in our view HTML
require(__DIR__ . "/views/" . $view . ".html.php");