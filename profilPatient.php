<?php
session_start();

define("TITLE","informations des patients");


//controller
require_once(__DIR__."/controllers/employeeController.php");
$employeeController = new EmployeeController;
$employeeController->verifyLogin();


require_once(__DIR__."/controllers/PatientController.php");
$patientController = new PatientController;
$messages = $patientController->modifierPatient();
$patients = $patientController->readOnePatient();




require_once(__DIR__."/controllers/AppointmentController.php");
$appointmentController = new AppointmentController;
$appointments = $appointmentController->readForPatientValidate();




include(__DIR__."/assets/inc/header.php");
include(__DIR__."/views/profilPatient.php");
include(__DIR__."/views/modifierPatient.php");
include(__DIR__."/views/listeRendezvous.php");
include(__DIR__."/assets/inc/footer.php");


?>