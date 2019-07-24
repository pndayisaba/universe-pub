<?php declare(strict_types=1);
namespace Universe;
/**
 * Load application path config;
 */

class PathConfig
{
  public $path = [ ];
  public function __construct()
  {
    $this->path = require($_SERVER['DOCUMENT_ROOT'] .'/../app/config/path-config.php');
  }
}

?>
