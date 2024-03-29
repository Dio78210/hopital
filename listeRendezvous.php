<?php
session_start();

define("TITLE","Liste des rendez-vous");


//controller
require_once(__DIR__."/controllers/employeeController.php");
$employeeController = new EmployeeController;
$employeeController->verifyLogin();


require_once(__DIR__."/controllers/PatientController.php");
$patientController = new PatientController;
$patients = $patientController->readAllListePatients();


require_once(__DIR__."/controllers/AppointmentController.php");
$appointmentController = new AppointmentController;
$appointments = $appointmentController->readAllRendezVous();
$messages = $appointmentController->appointment();




include(__DIR__."/assets/inc/header.php");
include(__DIR__."/views/listeRendezvous.php");
include(__DIR__."/assets/inc/footer.php");


?>