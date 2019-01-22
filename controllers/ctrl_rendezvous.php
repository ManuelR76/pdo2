<?php
require 'models/database.php';
require 'models/patients.php';
require 'models/appointments.php';

$patients = new patients();
$patientsList = $patients->getPatientsList();

$appointment = new appointment();


//$idExist = false;

if (isset($_GET['id'])) {
    $appointment->id = $_GET['id'];
    $appointmentProfil = $appointment->getAppointmentProfil();
}

if ($appointmentProfil === false) {
    $idExist = false;
} else {
    $idExist = true;
}

$modifySuccess = false;

$modifyError = array();


if  (isset($_POST['modifyButton'])) {
    $appointment->id = htmlspecialchars($_GET['id']);
    $hour = htmlspecialchars($_POST['time']);
    $hour2 = date('H:i:s', strtotime($hour));
    $date = htmlspecialchars($_POST['date']);

    $appointment->dateHour = $date . ' ' . $hour2;
    $appointment->idPatients = htmlspecialchars($_POST['idPatient']);
    var_dump($appointment);
    $appointment->updateAppointment();
    
    $formSuccess = true;
    header('location:liste-rendezvous.php');
}