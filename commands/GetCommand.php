<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace commands;


class GetCommand extends Command {
  public function run($params) {
    if(!isset($params[0])) {
      echo("You must specify what you want to examine!");
      exit;
    }

    $entity_name = strtolower(implode(" ", $params));
    $target_entity = null;

    foreach($this->player->getLocation()->getEntities() as $entity) {
      if(strtolower($entity->getName()) == $entity_name) {
        $target_entity = $entity;
      }
    }

    if(is_null($target_entity)) {
      echo("Couldn't find '" . $entity_name. "' here. Try adjusting the name?");
      exit;
    }

    if(!($target_entity instanceof \models\entities\Item)) {
      echo("That is not something you can pick up.");
      exit;
    }

    $target_entity->setLocation(null);
    $target_entity->setInInventoryOfPlayer($this->player);

    $this->set(compact("target_entity"));
  }
}