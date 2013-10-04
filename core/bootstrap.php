<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

// Define an autoloader for classes in the context of this project. Namespaces correspond to directories from the root path.
function __autoload($class)
{
  if(stripos($class, "Symfony") !== false) $class = "Symfony\\" . $class;

  $class = str_replace("\\", "/", $class);
  $class = str_replace("DoctrineProxies/__CG__", "", $class);

  require_once(__DIR__ . "/../" . $class . ".php");
}

/** DOCTRINE SETUP FUN */
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(__DIR__ . DIRECTORY_SEPARATOR . "models"); // DB-saveable class path
$isDevMode = true;

$dbParams = array(
  'driver'   => 'pdo_mysql',
  'user'     => 'root',
  'password' => '',
  'dbname'   => 'use-lamp',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$em = EntityManager::create($dbParams, $config);