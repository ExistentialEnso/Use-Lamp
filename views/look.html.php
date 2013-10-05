<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

$location = $player->getLocation();
?>
<?=$location->getName()?><br />
<?=$location->getDescription()?>
<?php
foreach($location->getEntities() as $entity) {
  if(!($entity instanceof \models\entities\PlayerCharacter)) {
    ?><br /><?=$entity->getLocationText()?><?php
  }
}
?>