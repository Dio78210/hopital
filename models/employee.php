<?php

require_once(__DIR__."/../database/pdo.php");

class Employee{
    public int $id;
    public string $username;
    public string $password;


    public static function create(string $username, string $password): void{
        global $pdo;

        $sql = "INSERT INTO employees (username, password)
                Values (:username, :password)";
        
        $statement = $pdo->prepare($sql);

        //protection contre les injections SQL
        $statement->bindParam(":username", $username, PDO::PARAM_STR);
        $statement->bindParam(":password", $password, PDO::PARAM_STR);

        $statement->execute();
    }


    public static function readOne(string $username): Employee|false{
        global $pdo;

        $sql = "SELECT * FROM employees 
                WHERE username = :username";
        
        $statement = $pdo->prepare($sql);

        //protection contre les injections SQL
        $statement->bindParam(":username", $username, PDO::PARAM_STR);

        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Employee");
        $employee = $statement->fetch();

        return $employee;

    }





}