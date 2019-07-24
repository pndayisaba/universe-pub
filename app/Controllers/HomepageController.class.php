<?php declare(strict_types=1);
namespace App\Controllers;

class HomepageController extends \Universe\Controllers\BaseController 
{
  public function actionIndex(): void
  {
    $this->render('homepage/index');
  }
}
