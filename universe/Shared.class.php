<?php declare (strict_types=1);
namespace Universe;


/**
 * Description of Shared
 *
 * @author Phil
 */
class Shared
{
  public static function classLookupName(): array
  {
    $config = new \Universe\PathConfig(); 
    $pathConfig = $config->path;
    $routes = require($pathConfig['routePath']);
    
    $notFound404 = [
      'model_name'=> 'NotFound404Model',
      'view_name'=> 'NotFound404View',
      'controller_name'=> 'NotFound404Controller',
      'action_name'=> 'index'
    ];

    $default = [
      'model_name'=>'HomepageModel',
      'view_name'=>'HomepageView',
      'controller_name'=>'HomepageController',
      'action_name'=>'index'
    ];
    $lookupName = [
      'model_name'=> NULL,
      'view_name'=> NULL,
      'controller_name'=> NULL,
      'action_name'=> 'index'
    ];

    $requestURI = str_replace('?'.$_SERVER['QUERY_STRING'], '',$_SERVER['REQUEST_URI']);
    if($requestURI == '/')
    {
      return $default;
    }
    else
    {
      foreach($routes AS $key=>$value)
      {
        if(stripos($requestURI, $key) === 0)
        {
          $controllerParts = explode('@', $value);
          $lookupName['controller_name'] = $controllerParts[0];
          $lookupName['view_name'] = str_replace('Controller', 'View', $controllerParts[0]);
          $lookupName['model_name'] = str_replace('Controller', 'Model', $controllerParts[0]);
          if(count($controllerParts) > 1)
            $lookupName['action_name'] = $controllerParts[1];
        }
      }
      if (!empty($lookupName['controller_name']))
        return $lookupName;
    }
    return $notFound404;
  }
    
  /**
   * Auotload class name;
   * Lookup of class names begin at the root site root;
   * @return: void; 
   */
  public static function doAutoload(String $className = __CLASSNAME__): void
  {
    $cn = explode('\\', $className);
    $className = $cn[count($cn) - 1];
    $root = $_SERVER['DOCUMENT_ROOT'] .'/..';
    $rii = new \RecursiveIteratorIterator( new \RecursiveDirectoryIterator($root));
    foreach($rii AS $files=>$file)
    {
      if(substr($file->getPathname(), -10) =='.class.php')
      {
        $pathName = str_replace('\\', '/', $file->getPathname());
        $fileParts = explode('/', $pathName);
        $basename = $fileParts[count($fileParts)-1];                
        if($basename==$className.'.class.php')
        {
          require_once($file->getPathname());
        }
      }
    }
  } 
}
