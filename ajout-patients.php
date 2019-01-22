<?php
require 'controllers/ctrl_ajout-patients.php'
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="assets/css/style.css" />
        <title>E2N Hospital</title>
    </head>
    <body>
        <div class="container">
            <div class="card-panel">
                <?php if ($formSuccess) { ?>
                    <h2><?= 'Patient bien enregistré !' ?></h2>
                    <a href="liste-patients.php" class="waves-effect waves-light btn"><i class="material-icons left">home</i>RETOUR LISTE</a>
                <?php } else { ?>
                    <form id="addPatient" action="" method="POST">
                        <div class="row">
                            <div class="input-field col s12 center-align">
                                <h1>Enregistrement du patient</h1>
                                <a href="liste-patients.php" class="waves-effect waves-light btn"><i class="material-icons left">home</i>RETOUR LISTE</a>
                                <a href="index.php" class="waves-effect waves-light btn"><i class="material-icons left">home</i>RETOUR</a>

                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 l8 offset-l2">
                                <input id="lastname" name="lastname" type="text" class="validate" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>"/>
                                <label for="lastname">NOM </label>
                                <span class="error"><?= isset($formError['lastname']) ? $formError['lastname'] : '' ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 l8 offset-l2">
                                <input id="firstname" name="firstname" type="text" class="validate" />
                                <label for="firstname">Prénom </label>
                                <span class="error"><?= isset($formError['firstname']) ? $formError['firstname'] : '' ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 l8 offset-l2">
                                <input id="birthdate" name="birthdate" type="text" class="datepicker validate" />         
                                <label for="birthdate">Date de naissance (ex: 01/02/1988). </label>
                                <span class="error"><?= isset($formError['birthdate']) ? $formError['birthdate'] : '' ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 l8 offset-l2">
                                <input id="phone" name="phone" type="tel" class="validate" />
                                <label for="phone">Numéro de téléphone (ex: 0632736550). </label>
                                <span class="error"><?= isset($formError['phone']) ? $formError['phone'] : '' ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 l8 offset-l2">
                                <input id="mail" name="mail" type="email" class="validate" />
                                <label for="mail">Adresse Mail (ex: mail@mail.fr). </label>      
                                <span class="error"><?= isset($formError['mail']) ? $formError['mail'] : '' ?></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 center-align">
                                <input name="addButton" type="submit" value="ENREGISTRER LE PATIENT"/>
                                <span class="error"><?= isset($formError['add']) ? $formError['add'] : '' ?></span>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script type="text/javascript" src="assets/JS/script.js"></script>
    </body>
</html>