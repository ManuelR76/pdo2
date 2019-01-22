<?php

class database {

    public $dataBase;

    public function __construct() {
        try {
            $this->dataBase = new PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'manuel', 'Speedy76', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $errorMessage) {
            die('Erreur : ' . $errorMessage->getMessage());
        }
    }

    public function __destruct() {
        $this->dataBase = NULL;
    }

}

?>