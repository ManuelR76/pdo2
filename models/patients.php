<?php

class patients extends database {

    public $id;
    public $lastname;
    public $firstname;
    public $birthdate = '01/01/2000';
    public $phone;
    public $mail;

    public function addPatient() {
        $query = 'INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES (:lastname, :firstname, :birthdate, :phone, :mail)';
        $addPatient = $this->dataBase->prepare($query);
        $addPatient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $addPatient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $date = DateTime::createFromFormat('d/m/Y', $this->birthdate);
        $dateUs = $date->format('Y-m-d');
        $addPatient->bindValue(':birthdate', $dateUs, PDO::PARAM_STR);
        $addPatient->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $addPatient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $addPatient->execute();
    }

    public function getPatientsList() {
        $query = 'SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`, "%d/%m/%Y") AS `birthdate`, `phone`, `mail` FROM `patients` ORDER BY `lastname`';
        $result = $this->dataBase->query($query);
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
    
    public function getPatientProfil() {
        $query = 'SELECT `id`, `lastname`, `firstname`,'
                . ' DATE_FORMAT(`birthdate`, "%d/%m/%Y") AS `birthdate`,'
                .' `phone`, `mail` FROM `patients`'
                . ' WHERE `id` LIKE :id ORDER BY `lastname`';
        $getProfil = $this->dataBase->prepare($query);
        $getProfil->bindValue(':id', $this->id, PDO::PARAM_INT);
        $getProfil->execute();
        $data = $getProfil->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    
    public function updatePatientProfil() {
       $query = 'UPDATE patients SET lastname = :lastname,'
                . ' firstname = :firstname,'
                . ' birthdate = :birthdate,'
                . ' phone = :phone,'
                . ' mail = :mail'
                . ' WHERE id = :id';
        $updatePatientProfil = $this->dataBase->prepare($query);
        $updatePatientProfil->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updatePatientProfil->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $updatePatientProfil->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $date = DateTime::createFromFormat('d/m/Y', $this->birthdate);
        $dateUs = $date->format('Y-m-d');
        $updatePatientProfil->bindValue(':birthdate', $dateUs, PDO::PARAM_STR);
        $updatePatientProfil->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $updatePatientProfil->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $updatePatientProfil->execute(); 
   }

}
