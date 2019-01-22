<?php
require 'controllers/ctrl_profil-patients.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <title>Mon docteur</title>
    </head>
    <body>
        <div class="container content">
            <div class="row row-content">
                <div class="col-lg-12 col-sm-12">
                    <h1>Profil patient</h1> 
                    <div class="col s12 m7">
                        <?php if (!$idExist) { ?>
                            <p>Erreur le patient n'existe pas!</p>
                        <?php } else { ?>
                            <div class="card horizontal">
                                <form id="updatePatientProfil" action="" method="POST">
                                    <div>
                                        <div class="input-field col s12 l8 offset-l2">
                                            <input id="lastname" name="lastname" type="text" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : $patientProfil->lastname ?>" class="validate" />
                                            <label for="lastname">NOM</label>
                                            <span class="error"><?= isset($modifyError['lastname']) ? $modifyError['lastname'] : '' ?></span>
                                        </div>
                                        <div class="input-field col s12 l8 offset-l2">
                                            <input id="firstname" name="firstname" type="text" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : $patientProfil->firstname ?>" class="validate" />
                                            <label for="firstname">Prénom</label>
                                            <span class="error"><?= isset($modifyError['firstname']) ? $modifyError['firstname'] : '' ?></span>
                                        </div>
                                        <div class="input-field col s12 l8 offset-l2">
                                            <input id="birthdate" name="birthdate" type="text" value="<?= isset($_POST['birthdate']) ? $_POST['birthdate'] : $patientProfil->birthdate ?>" class="validate" />
                                            <label for="birthdate">Date de naissance</label>
                                            <span class="error"><?= isset($modifyError['birthdate']) ? $modifyError['birthdate'] : '' ?></span>
                                        </div>
                                        <div class="input-field col s12 l8 offset-l2">
                                            <input id="phone" name="phone" type="text" value="<?= isset($_POST['phone']) ? $_POST['phone'] : $patientProfil->phone ?>" class="validate" />
                                            <label for="phone">Téléphone</label>
                                            <span class="error"><?= isset($modifyError['phone']) ? $modifyError['phone'] : '' ?></span>
                                        </div>
                                        <div class="input-field col s12 l8 offset-l2">
                                            <input id="mail" name="mail" type="text" value="<?= isset($_POST['mail']) ? $_POST['mail'] : $patientProfil->mail ?>" class="validate" />
                                            <label for="mail">Adresse mail</label>
                                            <span class="error"><?= isset($modifyError['mail']) ? $modifyError['mail'] : '' ?></span>
                                        </div>
                                    <?php } ?>
                                    <?php if ($modifySuccess) { ?>
                                        <h2><?= 'Patient bien enregistré !' ?></h2>
                                    <?php } ?>
                                </div>
                                <div class="input-field col s12 center-align">
                                    <a href="liste-patients.php" class="waves-effect waves-light btn"><i class="material-icons left">home</i>RETOUR LISTE</a>
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
        <script type="text/javascript" src="assets/js/script.js"></script>
    </body>
</html>