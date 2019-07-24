<?php declare (strict_types=1);
namespace Universe\Controllers;
/**
 * This is the base controller which all other
 * controllers extend from.
 *
 * @author Phil
 */
class BaseController
{
  protected $model;
  protected $actionName;
  protected $actionNameOverriden;
  protected $viewPath;
  protected $pageGlobals = [ ];
  public $pathConfig = [ ];
  
  public function __construct(Object $model)
  {   
    $this->pathConfig = require($_SERVER['DOCUMENT_ROOT'] .'/../app/config/path-config.php');

    $this->model = $model;
    $shared = \Universe\Shared::classLookupName();
    $this->actionName = $shared['action_name'];
    if(!method_exists($this, 'action'.$this->actionName))
    {
      $this->actionName = 'index';
      $this->actionNameOverriden = $shared['action_name'];
    }
  }
    
  /**
   * Set render options;
   * @viewPath: view path startin from the views registered path; 
   * For example, for view in [/app/views/signup/thank-you.php]
   * the expected viewPath would - signup/thank-you;
   * 
   * PHP file extentions assumed. 
   * 
   * @pageData: array of variables that will be globally available when the page renders;
   * return: void;
   */
  public function render(String $viewPath, array $pageData = [ ]): void
  {  
    $this->pageGlobals = $pageData;
    $this->viewPath = $this->pathConfig['viewPath'].'/'.$viewPath .'.php';  
  }
  
  public function getViewPath(): String 
  { 
    return $this->viewPath ? $this->viewPath : '';  
  }
  public function getActionName(): String
  { 
    return $this->actionName; 
  }
  public function getPageGlobals(): array
  { 
    return $this->pageGlobals; 
  } 
}
