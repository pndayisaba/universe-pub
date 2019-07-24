<?php declare(strict_types=1);
namespace Universe;
class RR 
{
  private static $_instance = NULL;
  public $_model, $_controller, $_view;
  public $model, $controller, $view;

  public function __construct(array $S) 
  {
    if(!empty($S))
    {
      $model = '\App\Models\\'. $S['model_name'];
      $this->model = new $model();

      $controller = '\App\Controllers\\'. $S['controller_name'];
      $this->controller = new $controller($this->model);

      $view = '\App\Views\\'. $S['view_name'];
      $this->view = new $view($this->controller, $this->model);
    }
  }
  
  public static function setApp(array $S){
    if(self::$_instance==NULL)
      self::$_instance = new self($S);
  }
    
  public static function app()
  {
    return self::$_instance;
  }
}

?>

