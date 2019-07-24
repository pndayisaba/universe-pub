<?php declare(strict_types=1);

namespace Universe\Database;

/**

 * Create database connection using PDO;

 *

 * @author pndayisaba

 */

class DatabaseConnection {

  protected $conn;

  protected $pathConfig;



  /**

   * @param options: PDO options;

   */

  public function __construct(array $options= [ ])

  {

    $this->pathConfig = new \Universe\PathConfig();

    $config = json_decode(file_get_contents($this->pathConfig->path['dbConfigPath']), true);

    try

    {

      // For the sake of stability, these cannot be overriden;

      $defaultOptions = [

        \PDO::ATTR_ERRMODE=> \PDO::ERRMODE_EXCEPTION, 

        \PDO::ATTR_DEFAULT_FETCH_MODE=> \PDO::FETCH_ASSOC

      ];

      if(!empty($options))

        $options = array_merge($options, $defaultOptions);

          

      $pdo = new \PDO(

        'mysql:host='.$config['servername'].';dbname='.$config['dbname'], 

        $config['username'],

        $config['password'],

        $options

      );

      $this->conn = $pdo;



    } catch (\PDOException $ex) {

      echo "Connection failed. " .$ex->getMessage();

      return NULL;

    }

    return NULL;

      

  }



  public function getConnection() 

  { 

    return $this->conn; 

  }

  

  public function __destruct() 

  {

    $this->conn=null;

  }

}

