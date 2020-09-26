<?php
class Client{
 
    // database connection and table name
    private $conn;
    private $table_name = "clientinfo";
 
    // object properties
    public $id;
    public $name;
    public $surname;
    public $email;
    public $address;
    public $code;
    public $cell;
    public $home;
    public $work;
    public $gender;
    public $reference;
   
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read all Clients
    function read(){
    
        // select all query
        $query = "SELECT
                    Client_id As id , C_name As name , C_surname As surname , C_Email As email , Address As address , Code As code ,
                     C_Tel_C As cell , C_Tel_H as home , C_Tel_W As work , Reference_ID As reference 
               
                FROM
                    " . $this->table_name . " 
                ORDER BY
                    Client_id 
                    LIMIT 100";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // get single Client data
    function read_single(){
    
        // select all query
        $query = "SELECT
                   Client_id As id , C_name As name , C_surname As surname , C_Email As email , Address As address , Code As code ,
                     C_Tel_C As cell , C_Tel_H as home , C_Tel_W As work , Reference_ID As reference
                FROM
                    " . $this->table_name . " 
                WHERE
                    Client_id= '".$this->id."'";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
        return $stmt;
    }

    // create Client
    function create(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        
        // query to insert record
        $query = "INSERT INTO  ". $this->table_name ." 
                        (`Client_id`, `C_name`, `C_surname`, `C_Email`, `Address`, `Code`, `C_Tel_C`, `C_Tel_H`, `C_Tel_W`, `Reference_ID`)
                  VALUES
                        ('".$this->id."', '".$this->name."', '".$this->surname."', '".$this->email."', '".$this->address."', '".$this->code."', '".$this->cell."', '".$this->home."', '".$this->work."', '".$this->reference."')";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    }

    // update Client 
    function update(){
    
        // query to insert record
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    C_name='".$this->name."', C_surname='".$this->surname."', C_Email='".$this->email."', Address='".$this->address."', Code='".$this->code."', C_Tel_C='".$this->cell."', C_Tel_H='".$this->home."', C_Tel_W='".$this->work."', Reference_ID='".$this->reference."'
                WHERE
                    Client_id='".$this->id."'";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // delete Client
    function delete(){
        
        // query to insert record
        $query = "DELETE FROM
                    " . $this->table_name . "
                WHERE
                    Client_id= '".$this->id."'";
        
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
                C_Email='".$this->email."'";

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