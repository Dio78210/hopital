<?php

require_once(__DIR__."/../database/pdo.php");

require_once(__DIR__."/patients.php");


class Appointments{

    public int $id;
    public string $dateHour;
    public int $idPatients;
    public ?Patients $patient;

    public function displayDate():string{
        $dateTime = new DateTime($this->dateHour);
        return $dateTime->format("d/m/Y");
    }


    public static function create(string $dateHour, int $idPatients): void{
        global $pdo;

        $sql = "INSERT INTO appointments (dateHour, idPatients)
                Values (:dateHour, :idPatients)";
        
        $statement = $pdo->prepare($sql);

        //protection contre les injections SQL
        $statement->bindParam(":dateHour", $dateHour, PDO::PARAM_STR);
        $statement->bindParam(":idPatients", $idPatients, PDO::PARAM_INT);

        $statement->execute();
    }

    public static function readAll(){
        global $pdo;

        $sql = "SELECT * FROM appointments
                ORDER BY dateHour";
        
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Appointments");
        $appointments = $statement->fetchAll();

        foreach($appointments as $appointment){

            $idPatients = $appointment->idPatients;

            $sql = "SELECT * FROM patients
                    WHERE id = :idPatients";

            $statement = $pdo->prepare($sql);
            $statement->bindParam(":idPatients", $idPatients, PDO::PARAM_INT);

            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, "Patients");
            $patient = $statement->fetch();
            $appointment->patient = $patient;
        }

        return $appointments;

    }

    public function pastDate(){

        $dateHour = new DateTime($this->dateHour);
        $dateNow = new DateTime();

        if(!isset($this->dateHour) || $dateHour < $dateNow ){
                echo '<i class="bi bi-bell-slash-fill"></i>';
            }
            else{
                echo '<i class="bi bi-bell-fill"></i>';
            }
    }

}