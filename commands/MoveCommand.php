<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace commands;


class MoveCommand extends Command {
  public function run($params) {
    $new_location = $this->player->getLocation()->getNearbyLocation($params[0]);

    if(is_null($new_location)) {
      // A null value means they can't go that way, so we should show their current location's error.
      echo($this->player->getLocation()->getNavigationMatrix()->getInvalidDirectionMessage());
      exit;
    } else {
      $_SESSION['location_id'] = $new_location->getId(); // temp thing in development while player saving isn't setup fully

      $this->player->setLocation($new_location); // Move our player object to the new location.
    }

    /*$new_location = $location->getLocation($cmd);

    if(!is_null($new_location)) {
      $location = $new_location; // avoid overwriting this will null before the if
      $_SESSION['location_id'] = $location->getId();
      $view = "look"; // Good enough for output
    } else {
      echo($location->getNavigationMatrix()->getInvalidDirectionMessage());
      exit;
    }*/

    return parent::run($params);
  }
}