<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace models\entities\types;

/**
 * Model class to represent an Item "type" for which multiple instances can be generated.
 *
 * @Entity
 * @Table(name="itemtype")
 * @package models\entities\types
 */
class ItemType {
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
   * The slot in which this item may be equipped.
   *
   * @ManyToOne(targetEntity="\models\entities\EquipSlot")
   * @var array
   */
  protected $equips_in_slot;

  /**
   * @param array $equips_in_slot
   */
  public function setEquipsInSlot($equips_in_slot) {
    $this->equips_in_slot = $equips_in_slot;
  }

  /**
   * @return array
   */
  public function getEquipsInSlot() {
    return $this->equips_in_slot;
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