<?php


require_once(__DIR__."/../models/appointments.php");

class AppointmentController{

    public function appointment(){

        $messages = [];

        if(isset($_POST["submit"])){

            //verif de la date
            if (!isset($_POST["dateHour"]) || !DateTime::createFromFormat("Y-m-d\TH:i", $_POST["dateHour"])) {
                $messages[] = [
                    "success"=> false,
                    "text"=> "La date envoyée est incorrecte"
                ];
            }
            else{
                $anniversaire = new DateTime($_POST["dateHour"]);
                $dateNow = new DateTime();

                if($anniversaire < $dateNow){ 
                    $messages[] = [
                        "success"=> false,
                        "text"=> "La date est dans le futur"
                    ];
                }
            }

            if (!isset($_POST["patient"]) || !is_numeric($_POST["patient"])) {
                $messages[] = [
                        "success" => false,
                        "text" => "Indiquer un patient"
                ];
            }

            if (count($messages) == 0) {
                $messages[] = [
                        "success" => true,
                        "text" => "Bien ajouter"
                ];
                Appointments::create($_POST["dateHour"], $_POST["patient"]);
            }
        }
        return $messages;
    }

    public function readAllRendezVous(): array{
        $appointments = Appointments::readAll();
        return $appointments;
    }

    public function readOneRendezVous(): Appointments{
        if (!isset($_GET["id"])) {
            echo "veuillez indiquer l'id d'un rendez-vous a afficher à afficher";
            die;
        } elseif (!is_numeric($_GET["id"])) {
            echo "l'id du rendez-vous à afficher doit etre un nombre";
            die;
        } else {
            $appointment = Appointments::readOneRDV($_GET["id"]);

            if($appointment == false){
                echo "Aucun rendez-vous avec cet ID trouvé";
                die;
            }
            return $appointment;
        }
    }


    public function updateRendezVous(): array{
        $messages = [];

        if(isset($_POST["submit"])){

            //verif de la date
            if (!isset($_POST["dateHour"]) || !DateTime::createFromFormat("Y-m-d\TH:i", $_POST["dateHour"])) {
                $messages[] = [
                    "success"=> false,
                    "text"=> "La date envoyée est incorrecte"
                ];
            }
            else{
                $anniversaire = new DateTime($_POST["dateHour"]);
                $dateNow = new DateTime();

                if($anniversaire < $dateNow){ 
                    $messages[] = [
                        "success"=> false,
                        "text"=> "La date est dans le futur"
                    ];
                }
            }

            if (!isset($_POST["patient"]) || !is_numeric($_POST["patient"])) {
                $messages[] = [
                        "success" => false,
                        "text" => "Indiquer un patient"
                ];
            }
    
            if(count($messages) ==0 ){
                $messages [] = [
                    "success" => true,
                    "text" => "Le patient à été modifié."
                ];
    
                $id = $_GET["id"];
    
                Appointments::update($id, $_POST["dateHour"], $_POST["patient"]);
    
            }
        }

        return $messages;
    }


}