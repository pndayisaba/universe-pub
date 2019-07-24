<?php declare(strict_types=1);
namespace App\Models;

use Universe\Models\BaseModel;

/**
 * Description of LoginModal
 *
 * @author pndayisaba
 */
class LoginModel extends BaseModel
{
  public function userLogin(String $email, String $password): array
  {
    $userInfo = $this->executeQuery("CALL user_login_sps(:email, :password);", ['email'=>$email,'password'=>$password]);
    if(!empty($userInfo) && is_array($userInfo) && !empty($userInfo[0]['email']))
    {
      setcookie('email',$email,time()+(60*60),"/",$_SERVER['SERVER_NAME']);
      return $userInfo;
    }
    return [ ];
  }
}
