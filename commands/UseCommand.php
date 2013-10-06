<?php
/**
 * @author Thorne Melcher <tmelcher@portdusk.com>
 */

namespace commands;


class UseCommand extends Command {
  public function run($params) {
    if(!isset($params[0])) {
      echo("You must specify what you want to use!");
      exit;
    }

    $entity_name = strtolower(implode(" ", $params));
    $target_entity = null;

    // Search the player's inventory for items to use first
    foreach($this->player->getInventoryItems()as $entity) {
      if(strtolower($entity->getName()) == $entity_name) {
        $target_entity = $entity;
      }
    }

    // Search the location they're in if that didn't turn up anything
    if(is_null($target_entity)) {
      foreach($this->player->getLocation()->getEntities() as $entity) {
        if(strtolower($entity->getName()) == $entity_name) {
          $target_entity = $entity;
        }
      }
    }

    if(is_null($target_entity)) {
      echo("Couldn't find '" . $entity_name. "' here. Try adjusting the name?");
      exit;
    }

    $action_output = "";

    $actions = $target_entity->getOnUseActions();
    if(!is_null($actions)) {
      foreach($actions as $action) {
        $action_output .= $action->execute($this->game, $this->player);
      }
    }

    if($action_output == "") {
      $action_output = "You can't tell if anything happened.<br />";
    }

    $this->set(compact("target_entity", "action_output"));
  }
}