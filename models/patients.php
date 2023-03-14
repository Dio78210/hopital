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

    public static function update(int $id, string $lastname, string $firstname, string $birthdate, ?string $phone, string $mail):void{
        global $pdo;

        $sql = "UPDATE patients
                SET lastname = :lastname,
                    firstname = :firstname,
                    birthdate = :birthdate,
                    phone = :phone,
                    mail = :mail
                WHERE id = :id";

        $statement = $pdo->prepare($sql);

        $statement->bindParam(":lastname", $lastname, PDO::PARAM_STR);
        $statement->bindParam(":firstname", $firstname, PDO::PARAM_STR);
        $statement->bindParam(":birthdate", $birthdate, PDO::PARAM_STR);
        $statement->bindParam(":phone", $phone, PDO::PARAM_STR);
        $statement->bindParam(":mail", $mail, PDO::PARAM_STR);
        $statement->bindParam(":id", $id, PDO::PARAM_INT);

        $statement->execute();
    }

    public static function rechercherPatient(): array{
        
        global $pdo;

        $rechercher = '%'.$_GET["recherche"].'%';
        $sql = "SELECT * FROM patients
                WHERE lastname LIKE :rechercher
                OR firstname LIKE :rechercher";

        $statement = $pdo->prepare($sql);

        $statement->bindParam(":rechercher", $rechercher, PDO::PARAM_STR);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Patients");
        $patients = $statement->fetchAll();

        return $patients;

    }

    public static function deletePatient(int $id){

        global $pdo;

        $sql = "DELETE FROM patients WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

    }

    public static function paginationCount(int $parPage){
        global $pdo;

        $sql = "SELECT COUNT(*) AS nb_patients FROM patients";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $patients = $statement->fetch();

        $nbPatients = (int) $patients['nb_patients'];
        $pages = ceil($nbPatients / $parPage);

        return $pages;
    }

    public static function paginationPage(int $currentPage, int $parPage ){
        global $pdo;

        $premier = ($currentPage * $parPage) - $parPage;

        $sql = "SELECT * FROM patients ORDER BY id ASC LIMIT :premier, :parpage;";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":premier", $premier, PDO::PARAM_INT);
        $statement->bindParam(":parpage", $parPage, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Patients");
        $patients = $statement->fetchAll();

        return $patients;

    }




}