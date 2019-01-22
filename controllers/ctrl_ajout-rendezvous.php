<?php

require 'models/database.php';
require 'models/patients.php';
require 'models/appointments.php';

$patients = new patients();
$patientsList = $patients->getPatientsList();

$appointment = new appointment();

$formSuccess = false;

$formError = array();

if (isset($_POST['idPatients'])) {

    $patients->idPatients = $_POST['idPatients'];

    if (empty($idPatients)) {

        $formError['idPatients'] = 'Sélectionnez un patient';
    }
}

if (isset($_POST['date'])) {

    $date = $_POST['date'];

    if (empty($date)) {

        $formError['date'] = 'Sélectionnez une date';
    }
}

if (isset($_POST['hour'])) {

    $hour = $_POST['hour'];

    if (empty($hour)) {

        $formError['hour'] = 'Sélectionnez une heure';
    }
}

if (count($formError) == 0 && isset($_POST['addButton'])) {
    $hour = date('H:i:s', strtotime($hour));
    $appointment->dateHour = $date . ' ' . $hour;
    $appointment->idPatients = htmlspecialchars($_POST['idPatient']);
    $appointment->addAppointment();
    $formSuccess = true;
}
?>