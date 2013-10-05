<?php
/**
 * Handles incoming textual commands from clients.
 *
 * @author Thorne Melcher <tmelcher@portdusk.com>
 */

// Handles db connection and basic setup
require("core/bootstrap.php");

// Array of commands to "verbosify" to avoid redundancies.
$_verbosify = array (
  "ex" => "examine",
  "l" => "look",
  "i" => "inventory",
  "st" => "status",
  "u" => "use"
);

// Array of commands that all route into the logic of "MoveCommand"
$_movements = array("w", "n", "s", "e", "ne", "nw", "se", "sw", "in", "out", "up", "down");

// Load our root game object
$game = $em->createQuery("SELECT g FROM \models\Game g")->getResult()[0];

// Some temporary logic to compensate for the fact that proper player login/saving/etc. isn't yet developed
session_start();
$l_id = is_numeric($_SESSION['location_id']) ? $_SESSION['location_id'] : $game->getInitialLocation()->getId();
$location = $em->createQuery("SELECT l FROM \models\map\Location l WHERE l.id=" . $l_id)->getResult()[0];
$player = new \models\entities\PlayerCharacter();
$player->setLocation($location);

// Placeholders
$target_entity = null;

// Begin breaking up the command
$cmd = $_POST['cmd'];
$cmd_pieces = explode(" ", $cmd);
$root_cmd = $cmd_pieces[0];

if(isset($_verbosify[$root_cmd])) {
  $root_cmd = $_verbosify[$root_cmd];
}

// Determine how the command should be routed
if(in_array($root_cmd, $_movements)) {
  // Error out if the user included extra parameters in the move command
  if(sizeof($cmd_pieces) > 1) {
    echo("Error: if you intended to make a movement command, do not include any extra text.");
    exit;
  }

  $command_class = "MoveCommand";
  $params = array($root_cmd);
} else {
  $command_class = ucfirst($root_cmd) . "Command";

  // Everything except the first part of the command becomes a parameter
  array_shift($cmd_pieces);
  $params = $cmd_pieces;
}

// If there isn't a Command class for the command we've decided on, it's an invalid command.
if(!file_exists(dirname(__FILE__) . DIRECTORY_SEPARATOR . "commands" . DIRECTORY_SEPARATOR . $command_class . ".php")) {
  echo("I didn't understand that command. Type 'help' or try something else.");
  exit;
}

// Get the full, namespaced path of our class
$command_class = "commands\\" . $command_class;

// Create and setup our actual Command
$command = new $command_class($game, $player);

// Actually run the command
$response = $command->run($params);

// Render and output the Command's View.
echo $command->render();