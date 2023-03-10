<?php
session_start();

define("TITLE","Creer un rendez-vous");


//controller
require_once(__DIR__."/controllers/employeeController.php");
$employeeController = new EmployeeController;
$employeeController->verifyLogin();


require_once(__DIR__."/controllers/PatientController.php");
$patientController = new PatientController;
$patients = $patientController->readAllListePatients();


require_once(__DIR__."/controllers/AppointmentController.php");
$appointmentController = new AppointmentController;
$messages = $appointmentController->updateRendezVous();
$appointment = $appointmentController->readOneRendezVous();


include(__DIR__."/assets/inc/header.php");
include(__DIR__."/views/infosRendezvous.php");
include(__DIR__."/views/modifierRendezvous.php");
include(__DIR__."/assets/inc/footer.php");


?>