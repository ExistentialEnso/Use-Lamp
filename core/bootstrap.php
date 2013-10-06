<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/
require(__DIR__ . DIRECTORY_SEPARATOR . "config.php");

date_default_timezone_set("Europe/Paris");

// Define an autoloader for classes in the context of this project. Namespaces correspond to directories from the root path.
function __autoload($class)
{
  if(stripos($class, "Symfony") !== false) $class = "Doctrine\\" . $class;

  $class = str_replace("\\", "/", $class);
  $class = str_replace("DoctrineProxies/__CG__", "", $class);

  require_once(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . $class . ".php");
}

/** DOCTRINE SETUP FUN */
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(__DIR__ . DIRECTORY_SEPARATOR . "models"); // DB-saveable class path
$isDevMode = true;

$dbParams = array(
  'driver'   => 'pdo_mysql',
  'user'     => DB_USERNAME,
  'password' => DB_PASSWORD,
  'dbname'   => DB_NAME,
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$em = EntityManager::create($dbParams, $config);