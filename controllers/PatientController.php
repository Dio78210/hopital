<?php


require_once(__DIR__."/../models/patients.php");

class PatientController{

    public function ajoutPatient(){

        $messages = [];

        if(isset($_POST["submit"])){

            //verif nom d'utilisateur
            if(!isset($_POST["lastname"]) || strlen($_POST["lastname"]) == 0 ){
                $messages[] = [
                    "success"=> false,
                    "text"=> "Veuillez indiquer un nom d'utilisateur"
                ];
            }

            //verif prenom d'utilisateur
            if(!isset($_POST["firstname"])|| strlen($_POST["firstname"]) == 0 ){
                $messages[] = [
                    "success"=> false,
                    "text"=> "Veuillez indiquer un prénom d'utilisateur"
                ];
            }

            //verif de la date
            if (!isset($_POST["birthdate"]) || !DateTime::createFromFormat("Y-m-d", $_POST["birthdate"])) {
                $messages[] = [
                    "success"=> false,
                    "text"=> "La date envoyée est incorrecte"
                ];
            }
            else{
                $anniversaire = new DateTime($_POST["birthdate"]);
                $dateNow = new DateTime();

                if($anniversaire > $dateNow){ 
                    $messages[] = [
                        "success"=> false,
                        "text"=> "La date est dans le futur"
                    ];
                }
            }

            //verificaton numeros de telephone
            if (!isset($_POST['phone']) || !preg_match("@(0|\+33|0033)[1-7][0-9]{8}@", $_POST["phone"])) {
                $messages[] = [
                    "success"=> false,
                    "text"=> "Numéro de téléphone incorrect"
                ];
            }

            //verificaton nom de email
            if (!isset($_POST['mail']) || !filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
                $messages[] = [
                    "success"=> false,
                    "text"=> "Votre email n'est pas valide"
                ];
            }

            if(count($messages) ==0 ){
                $messages [] = [
                    "success" => true,
                    "text" => "Le patient à été crée."
                ];

                $lastname = htmlspecialchars($_POST["lastname"]) ;
                $firstname = htmlspecialchars($_POST["firstname"]) ;

                Patients::create($lastname, $firstname, $_POST["birthdate"], $_POST["phone"], $_POST["mail"]);

            }
        }
        return $messages;
    }

    public function readAllListePatients(): array{
            $listePatients = Patients::readAll();
            return $listePatients;
    }


    public function readOnePatient(): Patients{

        //verification des informations envoyées par l'utilisateur
        if (!isset($_GET["id"])) {
            echo "veuillez indiquer l'id d'un patient à afficher";
            die;
        } elseif (!is_numeric($_GET["id"])) {
            echo "l'id du patient à afficher doit etre un nombre";
            die;
        } else {
            $id = $_GET["id"];

            $patient = Patients::readOne($id);

            if ($patient == false) {
                    echo "Aucun patient n'a été trouvé avec l'ID" . $id;
                    die;
            }

            return $patient;
        }

    }

}