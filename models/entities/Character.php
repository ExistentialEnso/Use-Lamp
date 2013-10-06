<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace models\entities;

/**
 * All Characters are either NonPlayerCharacters or PlayerCharacters, but not all GameEntity objects are Characters. This
 * defines functionality common to those two children classes.
 *
 * @package models\entities
 */
class Character extends GameEntity {
  /**
   * @Column(type="integer")
   * @var int
   */
  protected $strength = 100;

  /**
   * @Column(type="integer")
   * @var int
   */
  protected $intellect = 100;

  /**
   * @Column(type="integer")
   * @var int
   */
  protected $dexterity = 100;

  /**
   * @Column(type="integer")
   * @var int
   */
  protected $charisma = 100;

  /**
   * @Column(type="integer")
   * @var int
   */
  protected $luck = 100;

  /**
   * @param int $charisma
   */
  public function setCharisma($charisma) {
    $this->charisma = $charisma;
  }

  /**
   * @return int
   */
  public function getCharisma() {
    return $this->charisma;
  }

  /**
   * @param int $dexterity
   */
  public function setDexterity($dexterity) {
    $this->dexterity = $dexterity;
  }

  /**
   * @return int
   */
  public function getDexterity() {
    return $this->dexterity;
  }

  /**
   * @param int $intellect
   */
  public function setIntellect($intellect) {
    $this->intellect = $intellect;
  }

  /**
   * @return int
   */
  public function getIntellect() {
    return $this->intellect;
  }

  /**
   * @param int $luck
   */
  public function setLuck($luck) {
    $this->luck = $luck;
  }

  /**
   * @return int
   */
  public function getLuck() {
    return $this->luck;
  }

  /**
   * @param int $strength
   */
  public function setStrength($strength) {
    $this->strength = $strength;
  }

  /**
   * @return int
   */
  public function getStrength() {
    return $this->strength;
  }
}