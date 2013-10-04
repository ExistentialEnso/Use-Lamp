<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace models\entities;

/**
 * Stores a stat's value for a given stat-player combination.
 *
 * @package models\entities
 * @Entity
 * @Table(name="statvalue")
 */
class StatValue {
  /**
   * @Column(type="integer")
   * @Id
   * @GeneratedValue
   * @var int
   */
  protected $id;

  /**
   * @ManyToOne(targetEntity="Stat")
   * @var Stat
   */
  protected $stat;

  /**
   * @ManyToOne(targetEntity="GameEntity", inversedBy="stat_values")
   * @var GameEntity
   */
  protected $entity;

  /**
   * @Column(type="integer")
   * @var int
   */
  protected $value;

  /**
   * @param \models\entities\GameEntity $entity
   */
  public function setEntity($entity) {
    $this->entity = $entity;
  }

  /**
   * @return \models\entities\GameEntity
   */
  public function getEntity() {
    return $this->entity;
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
   * @param \models\entities\Stat $stat
   */
  public function setStat($stat) {
    $this->stat = $stat;
  }

  /**
   * @return \models\entities\Stat
   */
  public function getStat() {
    return $this->stat;
  }

  /**
   * @param int $value
   */
  public function setValue($value) {
    $this->value = $value;
  }

  /**
   * @return int
   */
  public function getValue() {
    return $this->value;
  }
}