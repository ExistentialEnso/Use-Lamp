<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace commands;

/**
 * Command to turn on showing descriptions of locations upon moving into them.
 *
 * @package commands
 */
class VerboseCommand extends Command {
  public function run($params) {
    $this->player->getUser()->setVerboseModeOn(true);
  }
}