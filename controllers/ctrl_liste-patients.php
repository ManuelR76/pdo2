<?php
require 'models/database.php';
require 'models/patients.php';

$patients= new patients();
$patientsList = $patients->getPatientsList();
?>