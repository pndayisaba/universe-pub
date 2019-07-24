<?php declare(strict_types=1);
namespace App\Controllers;

use Universe\Controllers\BaseController;
/**
 * Description of LoginController
 *
 * @author pndayisaba
 */
class LoginController extends BaseController
{
  public function actionIndex(): void
  {
    $goTo = 'login/index';
    $data = [ ];
    if(!empty($_POST['password']))
    {
      $userInfo = $this->model->userLogin($_POST['email'],$_POST['password']);
      if(!empty($userInfo) && !empty($userInfo[0]['email']))
      {
        $data['success'] = 1;
        header("Location: /member/");
      }
      else
        $data['success'] = 0;
    }
    $this->render($goTo,['loginData'=>$data]);
  }
}
