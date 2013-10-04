<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace models;

use ORM\Mapping\Entity;
use ORM\Mapping\Id;
use ORM\Mapping\Column;
use ORM\Mapping\GeneratedValue;

/**
 * @Entity
 * @package models
 */
class Game {
  /**
   * @Id
   * @Column(type="integer")
   * @GeneratedValue
   * @var int
   */
  protected $id;

  /**
   * @Column(type="string")
   * @var string
   */
  protected $name;

  /**
   * @Column(type="string")
   * @var string
   */
  protected $welcome_message;

  /**
   * @OneToOne(targetEntity="\models\map\Location")
   * @var \models\map\Location
   */
  protected $initial_location;

  /**
   * @Column(type="integer")
   * @var int
   */
  protected $version_numeric;

  /**
   * @Column(type="string")
   * @var string
   */
  protected $version_display;

  /**
   * @param int $id
   */
  public function setId($id) {
    $this->id = $id;
  }

  /**
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param string $name
   */
  public function setName($name) {
    $this->name = $name;
  }

  /**
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @param string $welcome_message
   */
  public function setWelcomeMessage($welcome_message) {
    $this->welcome_message = $welcome_message;
  }

  /**
   * @return string
   */
  public function getWelcomeMessage() {
    return $this->welcome_message;
  }

  /**
   * @param string $version_display
   */
  public function setVersionDisplay($version_display) {
    $this->version_display = $version_display;
  }

  /**
   * @return string
   */
  public function getVersionDisplay() {
    return $this->version_display;
  }

  /**
   * @param int $version_numeric
   */
  public function setVersionNumeric($version_numeric) {
    $this->version_numeric = $version_numeric;
  }

  /**
   * @return int
   */
  public function getVersionNumeric() {
    return $this->version_numeric;
  }

  /**
   * @param \models\map\Location $initial_location
   */
  public function setInitialLocation($initial_location) {
    $this->initial_location = $initial_location;
  }

  /**
   * @return \models\map\Location
   */
  public function getInitialLocation() {
    return $this->initial_location;
  }




}