<?php
session_start();

define("TITLE","Liste des rendez-vous");


//controller
require_once(__DIR__."/controllers/PatientController.php");
require_once(__DIR__."/controllers/AppointmentController.php");
require_once(__DIR__."/controllers/employeeController.php");


$employeeController = new EmployeeController;
$patientController = new PatientController;
$appointmentController = new AppointmentController;


$messages = $appointmentController->appointment();
$patients = $patientController->readAllListePatients();
$appointments = $appointmentController->readAllRendezVous();


$employeeController->verifyLogin();


include(__DIR__."/assets/inc/header.php");
include(__DIR__."/views/listeRendezvous.php");
include(__DIR__."/assets/inc/footer.php");


?>