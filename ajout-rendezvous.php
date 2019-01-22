<?php
require 'controllers/ctrl_ajout-rendezvous.php'
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
        <div class="container">
            <div class="card-panel">
                <?php if ($formSuccess) { ?>
                    <h2><?= 'Rendez-vous bien enregistré !' ?></h2>
                    <a href="liste-patients.php" class="waves-effect waves-light btn"><i class="material-icons left">home</i>RETOUR LISTE</a>
                <?php } else { ?>
                <form id="addPatient" action="ajout-rendezvous.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12 center-align">
                            <h2>Prise de RDV</h2>
                            <a href="index.php" class="waves-effect waves-light btn"><i class="material-icons left">home</i>RETOUR</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="input-field col s12 l8 offset-l2">
                                <select id="idPatient" name="idPatient">
                                    <option value="0" disabled selected>Choix du patient</option>
                                    <?php foreach ($patientsList AS $patient) { ?>
                                        <option value="<?= $patient->id ?>"><?= $patient->lastname . ' ' . $patient->firstname ?></option>
                                    <?php } ?>
                                </select>
                                <label for="idPatient">Nom du patient</label>
                                <p class="error"><?= isset($formError['idPatient']) ? $formError['idPatient'] : '' ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 l8 offset-l2">
                            <input id="date" name="date" type="text" class="datepicker" /> 
                            <label for="date">Date</label>
                            <span class="error"><?= isset($formError['date']) ? $formError['date'] : '' ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 l8 offset-l2">
                            <input id="hour" name="hour" type="text" class="timepicker" /> 
                            <label for="heure">Heure</label>
                            <span class="error"><?= isset($formError['hour']) ? $formError['hour'] : '' ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 center-align">
                            <input name="addButton" type="submit" value="ENREGISTRER LE RDV"/>
                        </div>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>            
        <script src="assets/JS/script.js" type="text/javascript"></script>
    </body>
</html>