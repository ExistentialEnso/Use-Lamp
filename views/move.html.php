<?php
/**
 * View file for the "move" command. This is very similar to the "look" command, except that it checks the user's
 * "verbose_mode_on" setting to see whether or not the description should be shown.
 *
 * @author Thorne Melcher <tmelcher@portdusk.com>
 */

$location = $player->getLocation();
?>
<?=$location->getName()?>
<?php
if($player->getUser()->isVerboseModeOn()) {
  ?><br /><?=$location->getDescription()?><?php
}
?>
<?php
foreach($location->getEntities() as $entity) {
  if(!($entity instanceof \models\entities\PlayerCharacter)) {
    ?><br /><?=$entity->getLocationText()?><?php
  }
}
?>