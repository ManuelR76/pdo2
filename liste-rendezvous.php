<?php
require 'controllers/ctrl_liste-rendezvous.php'
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
                <div class="row">
                    <div class="input-field col s12 center-align">
                        <h2>Liste de RDV</h2>
                        <a href="index.php" class="waves-effect waves-light btn"><i class="material-icons left">home</i>RETOUR</a>
                        <a href="ajout-rendezvous.php" class="waves-effect waves-light btn"><i class="material-icons left">event_note</i>AJOUTER RDV</a>
                    </div>
                    <div class="row">
                        <table class="responsive-table col-sm-3 highlight">
                            <thead>
                                <tr>
                                    <th>Date de rdv</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($appointmentsList AS $appointment) { ?>
                                    <tr>
                                        <td><?= $appointment->date . ' '. $appointment->time?></td>
                                        <td><a href="rendezvous.php?id=<?= $appointment->id; ?>" class="waves-effect waves-light btn"><i class="material-icons left">search</i>Détails du rdv</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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