<?php
require 'controllers/ctrl_rendezvous.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="assets/css/style.css" />
        <title>Mon docteur</title>
    </head>
    <body>
        <div class="container content appointment">
            <div class="row row-content">
                <div class="col-lg-12 col-sm-12">
                    <h1>Détail RDV</h1> 
                    <?php if (!$appointmentProfil) { ?>
                        <p>Erreur le patient n'existe pas!</p>
                        <a href="liste-patients.php" class="waves-effect waves-light btn"><i class="material-icons left">home</i>RETOUR LISTE</a>
                    <?php } else { ?>
                        <div class="col s12 l12">
                            <div class="card horizontal">
                                <form id="updatePatientProfil" action="" method="POST">
                                    <div>
                                        <div class="row">
                                            <div class="input-field col s12 l8 offset-l2">
                                                <select id="idPatient" name="idPatient">
                                                    <option value="0" disabled>Choix du patient</option>
                                                    <option value="<?= $appointmentProfil->idPatients ?>" selected=""><?= $appointmentProfil->lastname . ' ' . $appointmentProfil->firstname ?></option>
                                                    <?php foreach ($patientsList AS $patient) { ?>
                                                        <option value="<?= $patient->id; ?>"><?= $patient->lastname . ' ' . $patient->firstname ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="idPatient">Nom du patient</label>
                                                <p class="error"><?= isset($formError['idPatient']) ? $formError['idPatient'] : '' ?></p>
                                            </div>
                                        </div>
                                        <div class="input-field col s12 l8 offset-l2">
                                            <input id="date" name="date" type="text" class="datepicker" value="<?= isset($_POST['date']) ? $_POST['date'] : $appointmentProfil->date ?>"  class="validate" />
                                            <input id="time" name="time" type="text" class="timepicker" value="<?= isset($_POST['time']) ? $_POST['time'] : $appointmentProfil->time ?>" class="validate" />
                                            <label for="dateHour">Date du RDV</label>
                                            <span class="error"><?= isset($modifyError['dateHour']) ? $modifyError['dateHour'] : '' ?></span>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="input-field col s12 center-align">
                                    <a href="liste-rendezvous.php" class="waves-effect waves-light btn"><i class="material-icons left">home</i>RETOUR LISTE</a>
                                    <a><button class="waves-effect waves-light btn" name="modifyButton" type="submit" value="MODIFIER LE PATIENT"><i class="material-icons left">home</i>MODIFIER</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>            
        <script src="assets/JS/script.js" type="text/javascript"></script>
    </body>
</html>