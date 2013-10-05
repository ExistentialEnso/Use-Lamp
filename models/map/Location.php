<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace models\map;

use ORM\Mapping\Entity;
use ORM\Mapping\Id;
use ORM\Mapping\Column;
use ORM\Mapping\GeneratedValue;
use ORM\Mapping\ManyToOne;
use ORM\Mapping\OneToMany;

/**
 * @Entity
 * @Table(name="location")
 * @package models\map
 */
class Location {
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
  protected $description;

  /**
   * @ManyToOne(targetEntity="NavigationMatrix")
   * @var NavigationMatrix
   */
  protected $navigation_matrix;

  /**
   * @OneToMany(targetEntity="\models\entities\GameEntity", mappedBy="location")
   * @var array
   */
  protected $entities;

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
   * @param \models\map\NavigationMatrix $navigation_matrix
   */
  public function setNavigationMatrix($navigation_matrix) {
    $this->navigation_matrix = $navigation_matrix;
  }

  /**
   * @return \models\map\NavigationMatrix
   */
  public function getNavigationMatrix() {
    return $this->navigation_matrix;
  }

  public function getNearbyLocation($direction) {
    if(is_null($this->navigation_matrix)) return null;

    return $this->navigation_matrix->getLocation($direction);
  }

  /**
   * @param array $entities
   */
  public function setEntities($entities) {
    $this->entities = $entities;
  }

  /**
   * @return array
   */
  public function getEntities() {
    return $this->entities;
  }


}