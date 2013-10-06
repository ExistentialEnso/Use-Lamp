<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace commands;


class DiceCommand extends Command {
  public function run($params) {
    $sides = isset($params[0]) ? ((int)$params[0]) : 6;

    if($sides < 2) {
      echo("You must specify a numeric value greater than 2 for the number of sides.");
      exit;
    }

    $value = rand(1, $sides);

    $this->set(compact('sides', 'value'));
  }
}