<?php

class appointment extends database {

    public $id;
    public $dateHour;
    public $idPatients;

    public function checkFree() {
        $query = 'SELECT COUNT (*) FROM appointments WHERE dateHour = :dateHour';
        $checkFree = $this->dataBase->prepare($query);
        $checkFree->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        return $checkFree->execute();
    }
    
    public function addAppointment() {
        $query = 'INSERT INTO `appointments` (`dateHour`,`idPatients`) '
                . 'VALUES (:dateHour, :idPatients)';
        $addAppoitment = $this->dataBase->prepare($query);
        $addAppoitment->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $addAppoitment->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        return $addAppoitment->execute();
    }

    public function getAppointmentsList() {
        $query = 'SELECT `id`, `idPatients`, '
                . ' DATE_FORMAT(`dateHour`, "%d/%m/%Y") AS `date`,'
                . ' DATE_FORMAT(`dateHour`, "%H:%i") AS `time`'
                . ' FROM `appointments` ORDER BY `dateHour` ';
        $result = $this->dataBase->query($query);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function getAppointmentProfil() {
        $query = 'SELECT `appointments`.`id`, `appointments`.`idPatients`, '
                . ' DATE_FORMAT(`appointments`.`dateHour`, "%Y-%m-%d") AS `date`,'
                . ' DATE_FORMAT(`appointments`.`dateHour`, "%H:%i") AS `time`,'
                . ' `patients`.`lastname`,`patients`.`firstname` '
                . ' FROM `appointments` '
                . ' INNER JOIN `patients` '
                . ' ON `appointments`.`idPatients` = `patients`.`id` '
                . ' WHERE `appointments`.`id` LIKE :id ';
        $getProfil = $this->dataBase->prepare($query);
        $getProfil->bindValue(':id', $this->id, PDO::PARAM_INT);
        $getProfil->execute();
        $data = $getProfil->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    
      public function updateAppointment() {
       $query = 'UPDATE appointments SET dateHour = :dateHour, idPatients = :idPatients '
               . ' WHERE id = :id';
        $updateAppointment = $this->dataBase->prepare($query);
        $updateAppointment->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateAppointment->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        $updateAppointment->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        return $updateAppointment->execute(); 
   }

}
