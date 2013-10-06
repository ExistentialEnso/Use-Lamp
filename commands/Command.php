<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace commands;

use commands\Response;

/**
 * The parent "Command" class from which all command logic-processing classes should extend. Though there are no abstract
 * methods, it is declared abstract to prevent direct instantiation.
 *
 * @package commands
 */
abstract class Command {
  private $_view = null;

  protected $player;
  protected $game;

  protected $new_notifications;

  protected $data;

  /**
   * @param PlayerCharacter $player The player issuing the command
   */
  public function __construct(&$game, &$player) {
    $this->game = $game;
    $this->player = $player;
    $this->data = array();
    $this->new_notifications = array();
  }

  public function render() {
    extract($this->data);
    $player = $this->player;
    $game = $this->game;

    ob_start();
    require(dirname(__DIR__) . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . $this->getView() . ".html.php");
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
  }

  /**
   * Main method of any Command.
   *
   * @param array $params
   */
  public function run($params) {

  }

  public function getNewNotifications() {
    return $this->new_notifications;
  }

  public function set($new_data) {
    if(!is_array($new_data)) {
      throw new \Exception("Must pass an array to Command->set().");
    }

    $this->data = array_merge($this->data, $new_data);
  }

  /**
   * Allows child classes to specify a different view location than the default one based off of the command's name. This
   * should NOT include the ".html.php" file extension, as this will be auto-appended by the system.
   *
   * @param string $view
   * @throws \Exception
   */
  protected function setView($view) {
    if(!is_string($view)) {
      throw new \Exception("View names must be strings.");
    }

    $this->_view = $view;
  }

  protected function getView() {
    return (is_null($this->_view) ? $this->determineDefaultView() : $this->_view);
  }

  /**
   * If the child Command doesn't use ->setView(), this is the logic that converts something like "\command\SomeCommand"
   * to "some.html.php" for proper view loading.
   *
   * @return string
   */
  private function determineDefaultView() {
    $input = end(explode("\\", get_class($this))); // Get the last part of our fully namespaced Command name.

    $input = str_ireplace("Command", "", $input); // Remove "Command" from the name.

    // Convert from CamelCase to lower_underscored name.
    preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
    $ret = $matches[0];
    foreach ($ret as &$match) {
      $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
    }
    return implode('_', $ret);
  }
}