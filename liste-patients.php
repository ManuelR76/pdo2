<?php
require 'controllers/ctrl_liste-patients.php'
?>
<?php ?>
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
                    <h1 class="patient-list">Liste des patients</h1> 
                    <table class="responsive-table col-sm-3 highlight">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>NOM</th>
                                <th>Prénom</th>
                                <th>Date de naissance</th>
                                <th>Numéro de téléphone</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($patientsList AS $patients) { ?>
                                <tr>
                                    <td><?= $patients->id ?></td>
                                    <td><?= $patients->lastname ?></td>
                                    <td><?= $patients->firstname ?></td>
                                    <td><?= $patients->birthdate ?></td>
                                    <td><?= $patients->phone ?></td>
                                    <td><?= $patients->mail ?></td>
                                    <td><a href="profil-patients.php?id=<?= $patients->id; ?>"><button type="button" class="waves-effect waves-light btn"><i class="material-icons left">search</i>Voir le profil</button></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="ajout-patients.php" class="waves-effect waves-light btn"><i class="material-icons left">create</i>Ajouter un patient</a>
                    <a href="index.php" class="waves-effect waves-light btn"><i class="material-icons left">home</i>RETOUR</a>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script type="text/javascript" src="assets/js/script.js"></script>
    </body>
</html>