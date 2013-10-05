<?php
/**
* @author Thorne Melcher <tmelcher@portdusk.com>
*/

namespace commands;


class Response {
  /**
   * @var string
   */
  protected $view;

  /**
   * @var array
   */
  protected $params;

  /**
   * @param string $view
   */
  public function setView($view) {
    $this->view = $view;
  }

  /**
   * @return string
   */
  public function getView() {
    return $this->view;
  }

  /**
   * @param array $params
   */
  public function setParams($params) {
    $this->params = $params;
  }

  /**
   * @return array
   */
  public function getParams() {
    return $this->params;
  }
}