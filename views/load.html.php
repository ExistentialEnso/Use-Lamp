<?php
/**
 * View file for the "load" command (usually issued silently).
 *
 * @author Thorne Melcher <tmelcher@portdusk.com>
 */
?>
<strong><?=$game->getName()?> [<?=$game->getVersionDisplay()?>]</strong>
<br /><br />
<?=$game->getWelcomeMessage()?>
<br /><br />
<?=$location->getName()?><br />
<?=$location->getDescription()?>
<?php
foreach($location->getEntities() as $entity) {
  ?><br /><?=$entity->getLocationText()?><?php
}
?>