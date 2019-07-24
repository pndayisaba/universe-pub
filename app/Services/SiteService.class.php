<?php declare(strict_types=1);
namespace App\Services;

class SiteService extends \Universe\Services\BaseService
{
  public static function parseStr(): array
  {
    if(!empty($_SERVER['REQUEST_METHOD']))
    {
      switch($_SERVER['REQUEST_METHOD']):
        case 'POST':
          return $_POST;
          break;
        case 'GET':
          return $_GET;
        default:
          parse_str(file_get_contents("php://input"),$requestData);
          return $requestData;
          break;
      endswitch;
    }
    return [ ];
  }
}
?>