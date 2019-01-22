<?php
require 'models/database.php';
require 'models/patients.php';
require 'models/appointments.php';

$appointment = new appointment();
$appointmentsList = $appointment->getAppointmentsList();

?>