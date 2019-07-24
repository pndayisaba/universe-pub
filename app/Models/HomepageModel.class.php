<?php declare(strict_types=1);
namespace App\Models;

/**
 * Description of HomepageModel
 *
 * @author pndayisaba
 */
class HomepageModel extends \Universe\Models\BaseModel 
{
  //put your code here
  
  public function actionIndex(): void
  {
      echo "<p>GREETING FROM HomepageModel::",__FUNCTION__,"</p>";
  }
}
