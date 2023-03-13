<?php
session_start();

define("TITLE","Supprimer un rendez-vous");


//controller
require_once(__DIR__."/controllers/employeeController.php");
$employeeController = new EmployeeController;
$employeeController->verifyLogin();



require_once(__DIR__."/controllers/AppointmentController.php");
$appointmentController = new AppointmentController;
$appointmentController -> deleteRendezVous();


include(__DIR__."/assets/inc/header.php");
include(__DIR__."/views/suppressionRendezvous.php");
include(__DIR__."/assets/inc/footer.php");


?>