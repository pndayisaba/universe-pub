<?php declare(strict_types=1);
/**
 * Autoload register;
 */

require_once($_SERVER['DOCUMENT_ROOT'].'/../universe/Shared.class.php');
spl_autoload_register(function($className) {
  \Universe\Shared::doAutoload($className);    
});
\Universe\RR::setApp(\Universe\Shared::classLookupName());
?>

