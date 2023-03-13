<?php
session_start();

define("TITLE","Creer un rendez-vous");




//controller
require_once(__DIR__."/controllers/PatientController.php");
$patientController = new PatientController;
$patients = $patientController->readAllListePatients();



require_once(__DIR__."/controllers/AppointmentController.php");
$appointmentController = new AppointmentController;
$messages = $appointmentController->appointment();



require_once(__DIR__."/controllers/employeeController.php");
$employeeController = new EmployeeController;
$employeeController->verifyLogin();




include(__DIR__."/assets/inc/header.php");
include(__DIR__."/views/ajoutRendezvous.php");
include(__DIR__."/assets/inc/footer.php");


?>