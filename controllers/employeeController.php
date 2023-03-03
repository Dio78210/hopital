<?php


require_once(__DIR__."/../models/employee.php");



class EmployeeController{

    //Methode d'inscription
    public function signUp(): array{
        $messages = [];

        if(isset($_POST["submit"])){

            //verif nom dutilisateur
            if(!isset($_POST["username"])|| strlen($_POST["username"]) == 0 || strlen($_POST["username"]) > 50){
                $messages[] = [
                    "success"=> false,
                    "text"=> "Veuillez indiquer un nom d'utilisateur entre 1 et 50 caractères"
                ];
            }else{
                // verif que le nom utilisateur soit pas en doublon
                if(Employee::readOne($_POST["username"]) != false){
                    $messages[] = [
                        "success"=> false,
                        "text"=> " Ce nom d'utilisateur est déjà pris"
                    ];
                }
            }

            //verif mot de passe
            $uppercase = preg_match('@[A-Z]@', $_POST["password"]);
            $lowercase = preg_match('@[a-z]@', $_POST["password"]);
            $number = preg_match('@[0-9]@', $_POST["password"]);

            if (!isset($_POST["password"]) || !$uppercase || !$lowercase || !$number || strlen($_POST["password"]) < 8) {
                $messages[] = [
                    "success" => false,
                    "text" => "Votre mot de passe n'est pas valide. Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule et un chiffre."
                ];
            }

            //verification de la concordance du password
            if(!isset($_POST["passwordVerify"]) || $_POST["password"] != $_POST["passwordVerify"]){
                $messages [] = [
                    "success" => false,
                    "text" => "Les 2 mots de passe ne correspondent pas."
                ];
            }

            if(count($messages) ==0 ){
                $messages [] = [
                    "success" => true,
                    "text" => "L'employé à été crée."
                ];

                //preparation des données
                $username = htmlspecialchars($_POST["username"]) ;
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

                //envoi des information au modele
                Employee::create($username,$password);

            }
        }
        return $messages;
    }


    //Methode de connexion
    public function signIn(): array{
        $messages = [];

        if(isset($_POST["submit"])){

            if(!isset($_POST["username"])){
                $messages [] = [
                    "success" => false,
                    "text" => "Indiquer un nom d'utilisateur"
                ];
            }

            if(!isset($_POST["password"])){
                $messages [] = [
                    "success" => false,
                    "text" => "Indiquer un mot de passe"
                ];
            }

            if(count($messages) ==0 ){
                $employee = Employee::readOne($_POST["username"]);

                if($employee == false){
                    $messages [] = [
                        "success" => false,
                        "text" => "Aucun employé avec ce nom trouvé"
                    ];
                }
                else{
                    if(!password_verify($_POST["password"], $employee->password)){
                        $messages [] = [
                            "success" => false,
                            "text" => "mot de passe incorrecte"
                        ];
                    }
                    else{
                        $messages [] = [
                            "success" => true,
                            "text" => "Vous etes connecté."
                        ];

                        $_SESSION["username"] = $_POST["username"];

                        //on peux faire une redirection
                        header("Location: /index.php");
                    }
                }
            }
        }


        return $messages;
    }

    //methode qui verifie si l'employer est connecté
    public function verifyLogin(): void {
        if(!isset($_SESSION["username"])){
            $_SESSION["message"] = "Merci de vous connecter pour accéder à ce contenu";
            header("Location: /connexion.php");
        }
    }

}