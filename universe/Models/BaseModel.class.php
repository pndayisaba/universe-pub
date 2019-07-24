<?php declare(strict_types=1);
namespace Universe\Models;

use Universe\Database\DatabaseConnection;
use Universe\Shared;

/**
 * This is the base model which all other models extend;
 * @author Phil
 * 
 */
class BaseModel extends Shared
{
  /**
   * Execute a give database query.
   * @param query: query to execute;
   * @param bindParam: PDO bind parameters.;
   * @param options: PDO valid options;
   */
  public function executeQuery(String $query, array $bindParams = [ ], array $options = [ ]): array
  {
    $dataSet = [ ];
    $conn = new DatabaseConnection($options);
    $db = $conn->getConnection();

    $stm = NULL;
    if(empty($bindParams))
    {
      $stm = $db->query($query);
    } 
    else
    {
      $stm = $db->prepare($query);
      $stm->execute($bindParams);
    }
    
    if(empty($stm))
      return [ ];
    
    while($row=$stm->fetch(\PDO::FETCH_ASSOC))
    {
      $dataSet[] = $row;
    }
    return $dataSet;
  }
}
