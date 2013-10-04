<?php
/**
 * @author Thorne Melcher <tmelcher@portdusk.com>
 */

namespace models\entities;

/**
 * Model class to represent a slot in which a character can equip an item.
 *
 * @Entity
 * @Table(name="equipslot")
 * @package models\entities
 */
class EquipSlot {
  /**
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
}