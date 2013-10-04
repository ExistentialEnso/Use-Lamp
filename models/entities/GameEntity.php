<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace models\entities;

/**
 * @Entity
 * @Table(name="gameentity")
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({"item" = "Item", "npc" = "NonPlayerCharacter", "player" = "PlayerCharacter"})
 * @package models\entities
 */
class GameEntity {
  /**
   * The unique ID of this entity.
   *
   * @Id
   * @GeneratedValue
   * @Column(type="integer")
   * @var int
   */
  protected $id;

  /**
   * @Column(type="string")
   * @var string
   */
  protected $name;

  /**
   * @ManyToOne(targetEntity="\models\Game", inversedBy="entities")
   * @var string
   */
  protected $location;

  /**
   * The text to show when viewing a location that this entity is in.
   *
   * @Column(type="string")
   * @var string
   */
  protected $location_text;

  /**
   * @Column(type="string")
   * @var string
   */
  protected $description;

  /**
   * @OneToMany(targetEntity="StatValue", mappedBy="entity")
   * @var array
   */
  protected $stat_values;

  /**
   * @param string $description
   */
  public function setDescription($description) {
    $this->description = $description;
  }

  /**
   * @return string
   */
  public function getDescription() {
    return $this->description;
  }

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
   * @param string $location_text
   */
  public function setLocationText($location_text) {
    $this->location_text = $location_text;
  }

  /**
   * @return string
   */
  public function getLocationText() {
    return $this->location_text;
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
   * @param string $location
   */
  public function setLocation($location) {
    $this->location = $location;
  }

  /**
   * @return string
   */
  public function getLocation() {
    return $this->location;
  }

  /**
   * @param array $stat_values
   */
  public function setStatValues($stat_values) {
    $this->stat_values = $stat_values;
  }

  /**
   * @return array
   */
  public function getStatValues() {
    return $this->stat_values;
  }


}