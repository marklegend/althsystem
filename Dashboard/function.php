<?php


class Dash
{
    private static $dbName = 'althealth' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
      
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}

?>



<?php

function count_total_user($connect)
{
	$query = "
    SELECT * FROM user_details WHERE user_status='active'";
    
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_total_clients($connect)
{
	$query = "
	SELECT Client_id FROM clientinfo
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_total_suppliers($connect)
{
	$query = "
	SELECT Supplier_ID FROM supplierinfo
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_total_products($connect)
{
	$query = "
	SELECT Supplement_id FROM supplements
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

?>

