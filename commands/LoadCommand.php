<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace commands;

/**
 * Since PHP as a language necessitates loading from DB each command, this is really just stuff to show when the game
 * first loads and to hook into anything that should be done here.
 *
 * @package commands
 */
class LoadCommand extends Command {
  public function run($params) {
    // Anything special you want to happen when the user first logs into the game should happen here.
    // The default game does not make use of this option, however.

    return parent::run($params);
  }
}