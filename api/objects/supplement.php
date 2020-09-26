<?php
class Supplement{
 
    // database connection and table name
    private $conn;
    private $table_name = "supplements";
 
    // object properties
    public $id;
    public $supple;
    public $supplier;
    public $descript;
    public $cost_excl;
    public $cost_inc;
    public $cost_incl;
    public $min_lvls;
    public $cur_stock_lvls;
    public $nappi;

 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read all supplements
    function read(){
    
        // select all query
        $query = "SELECT
                    num As id, Supplement_id As supple, Supplier_ID As supplier, Description as descript,
                     Cost_excl As cost_excl, Cost_incl As cost_incl, Min_levels As min_lvls, Current_stock_levels As cur_stock_lvls, Nappi_code As nappi
                FROM
                    " . $this->table_name . " 
                ORDER BY
                    num DESC
                    LIMIT 50 ";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // get single supplement data
    function read_single(){
    
        // select all query
        $query = "SELECT
                    num As id, Supplement_id As supple, Supplier_ID As supplier, Description as descript, Cost_excl As cost_excl, Cost_incl As cost_incl,
                     Min_levels As min_lvls, Current_stock_levels As cur_stock_lvls, Nappi_code As nappi
                FROM
                    " . $this->table_name . " 
                WHERE
                    num= '".$this->id."'";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
        return $stmt;
    }

    // create supplement
    function create(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        
        // query to insert record
        $query = "INSERT INTO  ". $this->table_name ." 
                        (`Supplement_id`, `Supplier_ID`, `Description`, `Cost_excl`, `Cost_incl`, `Min_levels`,`Current_stock_levels`, `Nappi_code`)
                  VALUES
                        ('".$this->supple."', '".$this->supplier."', '".$this->descript."', '".$this->cost_excl."', '".$this->cost_incl."', '".$this->min_lvls."',
                         '".$this->cur_stock_lvls."', '".$this->nappi."')";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    }

    // update supplement 
    function update(){
    
        // query to insert record
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    Supplier_ID='".$this->supplier."', Description='".$this->descript."', Cost_excl='".$this->cost_excl."', Cost_incl='".$this->cost_incl."',
                     Min_levels='".$this->min_lvls."', Current_stock_levels='".$this->cur_stock_lvls."', Nappi_code='".$this->nappi."'
                WHERE
                    num='".$this->id."'";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // delete supplement
    function delete(){
        
        // query to insert record
        $query = "DELETE FROM
                    " . $this->table_name . "
                WHERE
                    num= '".$this->id."'";
        
        // prepare query
        $stmt = $this->conn->prepare($query);
        
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    function isAlreadyExist(){
        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
               Supplement_id='".$this->supple."'";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}