<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/
?>
<?=$location->getName()?><br />
<?=$location->getDescription()?>
<?php
foreach($location->getEntities() as $entity) {
  ?><br /><?=$entity->getLocationText()?><?php
}
?>