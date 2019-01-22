<?php

require 'models/database.php';
require 'models/patients.php';

$patients = new patients();
$patients->id = $_GET['id'];


if (isset($_GET['id'])) {
    $patients->id = $_GET['id'];
    $patientProfil = $patients->getPatientProfil();
    if ($patientProfil === false) {
        $idExist = false;
    }else {
        $idExist =true;
    }
}

$regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ-]+$/';
$regexBirthdate = '/^(0[1-9]|([1-2][0-9])|3[01])\/(0[1-9]|1[012])\/((19|20)[0-9]{2})$/';
$regexEmail = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/'; // regex date au format yyyy-mm-dd
$regexPhoneNumber = '/^[0-9]{10,10}$/';

$modifySuccess = false;

$modifyError = array();

if (isset($_POST['lastname'])) {

    $patients->lastname = htmlspecialchars($_POST['lastname']);

    if (!preg_match($regexName, $patients->lastname)) {

        $modifyError['lastname'] = 'Votre nom ne doit contenir que des lettres';
    }

    if (empty($patients->lastname)) {

        $modifyError['lastname'] = 'Champs obligatoire';
    }
}

if (isset($_POST['firstname'])) {

    $patients->firstname = htmlspecialchars($_POST['firstname']);

    if (!preg_match($regexName, $patients->firstname)) {

        $modifyError['firstname'] = 'Votre prénom ne doit contenir que des lettres';
    }
    if (empty($patients->firstname)) {
        // 
        $modifyError['firstname'] = 'Champs obligatoire';
    }
}

if (isset($_POST['birthdate'])) {

    $patients->birthdate = $_POST['birthdate'];

    if (!preg_match($regexBirthdate, $patients->birthdate)) {

        $modifyError['birthdate'] = 'Votre date de naissance doit être de type 01/02/1988';
    }

    if (empty($patients->birthdate)) {

        $modifyError['birthdate'] = 'Champs obligatoire';
    }
}

if (isset($_POST['phone'])) {

    $patients->phone = htmlspecialchars($_POST['phone']);

    if (!preg_match($regexPhoneNumber, $patients->phone)) {

        $modifyError['phone'] = 'Votre numéro de téléphone doit contenir 10 chiffres et doit être de type 0620300405';
    }

    if (empty($patients->phone)) {

        $modifyError['phone'] = 'Champs obligatoire';
    }
}

if (isset($_POST['mail'])) {

    $patients->mail = $_POST['mail'];

    if (!preg_match($regexEmail, $patients->mail)) {

        $modifyError['mail'] = 'Votre mail doit être du type mail@mail.com';
    }

    if (empty($patients->mail)) {

        $modifyError['mail'] = 'Champs obligatoire';
    }
}

if (count($modifyError) == 0 && isset($_POST['modifyButton'])) {
        $patients->updatePatientProfil();
        header('location:liste-patients.php');
}
