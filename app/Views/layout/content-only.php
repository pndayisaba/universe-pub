<?php declare(strict_types=1);

$contentType = (
  !empty($_REQUEST['contentType']) 
  && strlen(trim($_REQUEST['contentType'])) 
  ? $_REQUEST['contentType']
  : 'application/json'
);

header("Access-Control-Allow-Origin: *");
header("Content-Type: $contentType");
echo Universe\RR::app()->view->output();

?>


