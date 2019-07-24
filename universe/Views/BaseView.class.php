<?php declare(strict_types=1);
namespace Universe\Views;
/**
 * Description of View
 *
 * @author Phil
 */
class BaseView
{
  protected $model;
  protected $controller;

  public function __construct(Object $controller, Object $model) {
    $this->controller = $controller;
    $this->model = $model;
  }

  public function output()
  {
    //execute action function first for initialization;
    $actionName ='action'. ucfirst($this->controller->getActionName());
    $this->controller->$actionName();        
    if(!empty($this->controller->getPageGlobals()))
      extract($this->controller->getPageGlobals());
    
    if(!empty($this->controller->getViewPath()))
      include_once($this->controller->getViewPath());    
  }
}
