<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace models\entities;

/**
 * Model class to represent a stat that a player can have.
 *
 * @Entity
 * @Table(name="stat")
 * @package models\entities
 */
class Stat {
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
}