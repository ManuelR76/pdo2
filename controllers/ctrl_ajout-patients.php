<?php

require 'models/database.php';
require 'models/patients.php';

$patients = new patients();

$regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ-]+$/';
$regexBirthdate = '/^(0[1-9]|([1-2][0-9])|3[01])\/(0[1-9]|1[012])\/((19|20)[0-9]{2})$/';
$regexEmail = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/'; // regex date au format yyyy-mm-dd
$regexPhoneNumber = '/^[0-9]{10,10}$/';

$formSuccess = false;

$formError = array();

if (isset($_POST['lastname'])) {

    $patients->lastname = htmlspecialchars($_POST['lastname']);

    if (!preg_match($regexName, $patients->lastname)) {

        $formError['lastname'] = 'Votre nom ne doit contenir que des lettres';
    }

    if (empty($patients->lastname)) {

        $formError['lastname'] = 'Champs obligatoire';
    }
}

if (isset($_POST['firstname'])) {

    $patients->firstname = htmlspecialchars($_POST['firstname']);

    if (!preg_match($regexName, $patients->firstname)) {

        $formError['firstname'] = 'Votre prénom ne doit contenir que des lettres';
    }
    if (empty($patients->firstname)) {
        // 
        $formError['firstname'] = 'Champs obligatoire';
    }
}

if (isset($_POST['birthdate'])) {

    $patients->birthdate = $_POST['birthdate'];

    if (!preg_match($regexBirthdate, $patients->birthdate)) {

        $formError['birthdate'] = 'Votre date de naissance doit être de type 01/02/1988';
    }

    if (empty($patients->birthdate)) {

        $formError['birthdate'] = 'Champs obligatoire';
    }
}

if (isset($_POST['phone'])) {

    $patients->phone = htmlspecialchars($_POST['phone']);

    if (!preg_match($regexPhoneNumber, $patients->phone)) {

        $formError['phone'] = 'Votre numéro de téléphone doit contenir 10 chiffres et doit être de type 0620300405';
    }

    if (empty($patients->phone)) {

        $formError['phone'] = 'Champs obligatoire';
    }
}

if (isset($_POST['mail'])) {

    $patients->mail = $_POST['mail'];

    if (!preg_match($regexEmail, $patients->mail)) {

        $formError['mail'] = 'Votre mail doit être du type mail@mail.com';
    }

    if (empty($patients->mail)) {

        $formError['mail'] = 'Champs obligatoire';
    }
}

if (count($formError) == 0 && isset($_POST['addButton'])) {
    if (!$patients->addPatient()) {
        $formError['add'] = 'l\'envoie du formulaire a échoué';
    } else {
        $formSuccess = true;
    }
}
?>