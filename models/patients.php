<?php

require_once(__DIR__."/../database/pdo.php");

class Patients{

    public string $lastname;
    public string $firstname;
    public string $birthdate;
    public ?string $phone;
    public string $mail;

    public function displayDate():string{
        $dateTime = new DateTime($this->birthdate);
        return $dateTime->format("d/m/Y");
    }

    // function convertDate($date, $formatInput, $formatOutput)
    // {
    //     $myDateTime = DateTime::createFromFormat($formatInput, $date);
    //     return $myDateTime->format($formatOutput);
    // }


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








}