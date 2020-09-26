<?php
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "usersinfo";
 
    // object properties
    public $user_id;
    public $name;
    public $email;
    public $password;
    public $phone;
    public $gender;
    public $position;
    public $created;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read all users
    function read(){
    
        // select all query
        $query = "SELECT
                    `id`, `name`, `email`, `password`, `phone`, `gender`, `position`, `created`
                FROM
                    " . $this->table_name . " 
                ORDER BY
                    id DESC
                    LIMIT 50";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // get single User data
    function read_single(){
    
        // select all query
        $query = "SELECT
                    `id`, `name`, `email`, `password`, `phone`, `gender`, `position`, `created`
                FROM
                    " . $this->table_name . " 
                WHERE
                    id= '".$this->id."'";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
        return $stmt;
    }

    // create User
    function create(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        
        // query to insert record
        $query = "INSERT INTO  ". $this->table_name ." 
                        (`name`, `email`, `password`, `phone`, `gender`, `position`, `created`)
                  VALUES
                        ('".$this->name."', '".$this->email."', '".$this->password."', '".$this->phone."', '".$this->gender."', '".$this->position."', '".$this->created."')";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    }

    // update User 
    function update(){
    
        // query to insert record
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name='".$this->name."', email='".$this->email."', password='".$this->password."', phone='".$this->phone."', gender='".$this->gender."', position='".$this->position."'
                WHERE
                    id='".$this->id."'";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // delete User
    function delete(){
        
        // query to insert record
        $query = "DELETE FROM
                    " . $this->table_name . "
                WHERE
                    id= '".$this->id."'";
        
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
                email='".$this->email."'";

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