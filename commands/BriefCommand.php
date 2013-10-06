<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace commands;

/**
 * Command to turn off showing descriptions of locations upon moving into them.
 *
 * @package commands
 */
class BriefCommand extends Command {
  public function run($params) {
    $this->player->getUser()->setVerboseModeOn(false);
  }
}