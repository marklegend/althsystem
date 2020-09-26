<?php
class Supplier{
 
    // database connection and table name
    private $conn;
    private $table_name = "supplierinfo";
 
    // object properties
    public $id;
    public $supplier;
    public $sname;
    public $semail;
    public $stel;
    public $sbank;
    public $scode;
    public $sacc;
    public $stype;

    
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read all suppliers
    function read(){
    
        // select all query
        $query = "SELECT
                   num As id, Supplier_ID As supplier, Contact_Person As sname, Supplier_Tel As stel, Supplier_Email As semail, Bank As sbank,
                     Bank_code As scode, Supplier_BankNum As sacc, Supplier_Type_Bank_Account As stype
                FROM
                    " . $this->table_name . " 
                ORDER BY
                   num DESC
                   LIMIT 50";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // get single Supplier data
    function read_single(){
    
        // select all query
        $query =  "SELECT
        num As id, Supplier_ID As supplier, Contact_Person As sname, Supplier_Tel As stel, Supplier_Email As semail, Bank As sbank,
          Bank_code As scode, Supplier_BankNum As sacc, Supplier_Type_Bank_Account As stype
     FROM
         " . $this->table_name . " 
                WHERE
                    num='".$this->id."'";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
        return $stmt;
    }

    // create Supplier
    function create(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        
        // query to insert record
        $query = "INSERT INTO  ". $this->table_name ." 
                        (`Supplier_ID`, `Contact_Person`, `Supplier_Tel`, `Supplier_Email`, `Bank`, `Bank_code`,`Supplier_BankNum`, `Supplier_Type_Bank_Account`)
                  VALUES
                        ('".$this->supplier."', '".$this->sname."', '".$this->stel."', '".$this->semail."', '".$this->sbank."', '".$this->scode."','".$this->sacc."', '".$this->stype."')";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    }

    // update Supplier 
    function update(){
    
        // query to insert record
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    Contact_Person='".$this->sname."', Supplier_Tel='".$this->stel."', Supplier_Email='".$this->semail."', Bank='".$this->sbank."', Bank_code='".$this->scode."', Supplier_BankNum='".$this->sacc."', Supplier_Type_Bank_Account='".$this->stype."'
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

    // delete Supplier
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
                Contact_Person='".$this->sname."'";

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