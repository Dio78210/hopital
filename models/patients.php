<?php

require_once(__DIR__."/../database/pdo.php");

class Patients{

    public int $id;
    public string $lastname;
    public string $firstname;
    public string $birthdate;
    public ?string $phone;
    public string $mail;

    public function displayDate():string{
        $dateTime = new DateTime($this->birthdate);
        return $dateTime->format("d/m/Y");
    }


    public static function create(string $lastname, string $firstname, string $birthdate, ?string $phone, string $mail){
        global $pdo;

        $sql = "INSERT INTO patients (lastname, firstname, birthdate, phone, mail)
                VALUES (:lastname, :firstname, :birthdate, :phone, :mail)";

        $statement = $pdo->prepare($sql);

        //protection contre les injections SQL
        $statement->bindParam(":lastname", $lastname, PDO::PARAM_STR);
        $statement->bindParam(":firstname", $firstname, PDO::PARAM_STR);
        $statement->bindParam(":birthdate", $birthdate, PDO::PARAM_STR);
        $statement->bindParam(":phone", $phone, PDO::PARAM_STR);
        $statement->bindParam(":mail", $mail, PDO::PARAM_STR);

        $statement->execute();
    }

    public static function readAll(): array{
        global $pdo;

        $sql = "SELECT * FROM patients";
        
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Patients");
        $patients = $statement->fetchAll();

        return $patients;

    }

    public static function readOne(int $id): Patients|false{
        global $pdo;

        $sql = "SELECT * FROM patients
                        WHERE id = :id";
                $statement = $pdo->prepare($sql);

                //protection contre les injections SQL
                $statement->bindParam(":id", $id, PDO::PARAM_INT);

                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_CLASS, "patients");
                $patient = $statement->fetch();

                return $patient;

    }








}