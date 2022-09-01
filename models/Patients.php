<?php
class Patient extends DataBase
{
    private int $_patient_id;
    private string $_patient_lastname;
    private string $_patient_firstname;
    private string $_patient_phonenumber;
    private string $_patient_address;
    private string $_patient_mail;


    public function getPatientId()
    {
        return $this->_patient_id;
    }
    public function setPatientId(int $id)
    {
        $this->_patient_id = $id;
    }
    public function getPatientLastname()
    {
        return $this->_patient_lastname;
    }
    public function setPatientLastname(string $lastname)
    {
        $this->_patient_lastname = $lastname;
    }
    public function getPatientFirstname()
    {
        return $this->_patient_firstname;
    }
    public function setPatientFirstname(string $firstname)
    {
        $this->_patient_firstname = $firstname;
    }
    public function getPatientPhoneNumber()
    {
        return $this->_patient_phonenumber;
    }
    public function setPatientPhoneNumber(string $phoneNumber)
    {
        $this->_patient_phonenumber = $phoneNumber;
    }
    public function getPatientAddress()
    {
        return $this->_patient_address;
    }
    public function setPatientAddress(string $address)
    {
        $this->_patient_address = $address;
    }
    public function getPatientMail()
    {
        return $this->_patient_mail;
    }
    public function setPatientMail(string $mail)
    {
        $this->_patient_mail = $mail;
    }

    // /**
    //  * Fonction permettant de savoir si un mail est present dans la table patient
    //  * 
    //  * @param string $mail : Mail à rechercher
    //  * 
    //  * @return bool
    //  */
    // public function checkIfPatientExists(string $mail): bool
    // {
    //     $pdo = parent::connectDb();
    //     $sql = "SELECT `patients_mail` FROM `patients` WHERE `patients_mail` = :mail";
    //     $query = $pdo->prepare($sql);
    //     $query->bindValue(':mail', $mail, PDO::PARAM_STR);
    //     $query->execute();
    //     $result = $query->fetchAll();

    //     if (count($result) == 0) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    /**
     * Permet de rajouter un patient dans la table patients
     * 
     * @param  string $lastname : Nom du patient
     * @param  string $firstname : Prenom duu patient
     * @param  string $phoneNumber : Numéro du patient
     * @param  string $address : Adresse du patient
     * @param  string $mail : Mail du patient 
     * 
     * @return void 
     */
    public function addNewPatient(string $lastname, string $firstname, string $phoneNumber, string $address, string $mail): void
    {
        $pdo = parent::connectDb();
        $sql = "INSERT INTO `patients` (`patients_lastname`, `patients_firstname`, `patients_phonenumber`, `patients_address`, `patients_mail`) VALUES (:lastname,:firstname,:phonenumber,:address,:mail)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':phonenumber', $phoneNumber, PDO::PARAM_STR);
        $query->bindValue(':address', $address, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);

        $query->execute();
    }

    public function getAllPatients()
    {
        $pdo = parent::connectDb();
        $sql = "SELECT * FROM `patients`";
        $query = $pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }
    public function getAOnePatients(int $patient)
    {
        $pdo = parent::connectDb();
        $sql = "SELECT * FROM patients 
        WHERE patients_id = $patient";
        $query = $pdo->query($sql);
        $result = $query->fetch();
        return $result;
    }
    public function updatePatients(int $patient,string $name,string $lastname,string $phoneNumber,string $mail, string $address)
    {
        $pdo = parent::connectDb();
        $sql = "UPDATE patients SET patients_firstname=:name, patients_lastname=:lastname,patients_phonenumber=:phonenumber,patients_mail=:mail,patients_address=:address WHERE patients_id = :id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':phonenumber', $phoneNumber, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->bindValue(':address', $address, PDO::PARAM_STR);        
        $query->bindValue(':id', $patient, PDO::PARAM_STR);

        $query->execute();
        
    }
    public function deletePatients(int $patient)
    {
        $pdo = parent::connectDb();
        $sql = "DELETE FROM patients WHERE patients_id = :id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':id', $patient, PDO::PARAM_STR);
        $query->execute();
    }
}
