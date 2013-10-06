<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace commands;


use models\events\Notification;

class DanceCommand extends Command {
  public function run($params) {
    $location = $this->player->getLocation();

    foreach($location->getEntities() as $entity) {
      if($entity instanceof \models\entities\PlayerCharacter) {
        $notification = new Notification();
        $notification->setTime(new \DateTime());
        $notification->setPlayer($entity);
        $notification->setMessage(ucfirst($this->player->getName()) . " danced to music only " . $this->player->getPronoun() . " could hear.");

        $this->new_notifications[] = $notification;
      }
    }
  }
}