<?php declare(strict_types=1);
namespace App\Controllers;

use Universe\Controllers\BaseController;

/**
 * 404 Not Found controller
 *
 * @author Phil
 */
class NotFound404Controller extends BaseController 
{
  public function actionIndex(): void
  {   
    $this->render('404/index');
  }
}

