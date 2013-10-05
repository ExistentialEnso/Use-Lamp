<?php
/**
 * View file for the "load" command (usually issued silently).
 *
 * @author Thorne Melcher <tmelcher@portdusk.com>
 */

$location = $player->getLocation();
?>
<strong><?=$game->getName()?> [<?=$game->getVersionDisplay()?>]</strong>
<br /><br />
<?=$game->getWelcomeMessage()?>
<br /><br />
<?php require("look.html.php") ?>