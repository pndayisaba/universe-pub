<?php
/**
 * Application path configuration ;
 * 
 * @isContentOnly - when set to true, the response output will contain no theming.
 * This is for example useful for ajax requests as they do not required
 * themed output;
 */
$isContentOnly = false;
$psData = App\Services\SiteService::parseStr();

if((!empty($psData['is_ajax']) && $psData['is_ajax'] == 1))
  $isContentOnly = true;

return [
  'themePath'=> $_SERVER['DOCUMENT_ROOT'] .'/../app/Views/layout/' .($isContentOnly ? 'content-only.php' : 'master.php'),
  'viewPath'=> $_SERVER['DOCUMENT_ROOT'] .'/../app/Views',
  'controllerPath'=> $_SERVER['DOCUMENT_ROOT'] .'/../app/Controllers',
  'modelPath'=> $_SERVER['DOCUMENT_ROOT'] .'/../app/Models',
  'dbConfigPath'=> $_SERVER['DOCUMENT_ROOT'] .'/../app/config/database.json',
  'routePath'=> $_SERVER['DOCUMENT_ROOT'] .'/../app/config/routes.php'
];
?>