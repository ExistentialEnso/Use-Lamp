<?php
/**
 * @author Thorne Melcher <tmelcher@portdusk.com>
 */

namespace commands;


class DropCommand extends Command {
  public function run($params) {
    if(!isset($params[0])) {
      echo("You must specify what you want to examine!");
      exit;
    }

    $entity_name = strtolower(implode(" ", $params));
    $target_entity = null;

    foreach($this->player->getInventoryItems() as $entity) {
      if(strtolower($entity->getName()) == $entity_name) {
        $target_entity = $entity;
      }
    }

    if(is_null($target_entity)) {
      echo("Couldn't find '" . $entity_name. "' here. Try adjusting the name?");
      exit;
    }

    $target_entity->setLocation($this->player->getLocation());
    $target_entity->setInInventoryOfPlayer(null);

    $this->set(compact("target_entity"));
  }
}