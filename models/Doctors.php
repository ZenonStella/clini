<?php
class Doctors extends DataBase
{
    private int $_doctors_id;
    private string $_doctors_lastname;
    private string $_doctors_firstname;
    private string $_doctors_phonenumber;
    private string $_doctors_medicalspecialities;
    private string $_doctors_mail;


    public function getDoctorsId()
    {
        return $this->_doctors_id;
    }
    public function setDoctorsId(int $id)
    {
        $this->_doctors_id = $id;
    }
    public function getDoctorsLastname()
    {
        return $this->_doctors_lastname;
    }
    public function setDoctorsLastname(string $lastname)
    {
        $this->_doctors_lastname = $lastname;
    }
    public function getDoctorsFirstname()
    {
        return $this->_doctors_firstname;
    }
    public function setDoctorsFirstname(string $firstname)
    {
        $this->_doctors_firstname = $firstname;
    }
    public function getDoctorsPhoneNumber()
    {
        return $this->_doctors_phonenumber;
    }
    public function setDoctorsPhoneNumber(string $phoneNumber)
    {
        $this->_doctors_phonenumber = $phoneNumber;
    }
    public function getDoctorsMedicalSpecialities()
    {
        return $this->_doctors_medicalspecialities;
    }
    public function setDoctorsMedicalSpecialities(string $medicalspecialities)
    {
        $this->_doctors_medicalspecialities = $medicalspecialities;
    }
    public function getDoctorsMail()
    {
        return $this->_doctors_mail;
    }
    public function setDoctorsMail(string $mail)
    {
        $this->_doctors_mail = $mail;
    }

    /**
     * Permet de rajouter un doctors dans la table doctors
     * 
     * @param  string $lastname : Nom du doctors
     * @param  string $firstname : Prenom duu doctors
     * @param  string $phoneNumber : Numéro du doctors
     * @param  string $medicalspecialities : Spesialité du doctors
     * @param  string $mail : Mail du doctors 
     * 
     * @return void 
     */
    public function addNewdoctors(string $lastname, string $firstname, string $phoneNumber, string $medicalspecialities, string $mail): void
    {
        $pdo = parent::connectDb();
        $sql = "INSERT INTO `doctors` (`doctors_name`, `doctors_lastname`, `doctors_phonenumber`, `doctors_mail`, `medicalspecialities_id_medicalspecialities`) VALUES (:firstname,:lastname,:phonenumber,:mail,:medicalspecialities)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':phonenumber', $phoneNumber, PDO::PARAM_STR);
        $query->bindValue(':medicalspecialities', $medicalspecialities, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);

        $query->execute();
    }

    public function getAlldoctors()
    {
        $pdo = parent::connectDb();
        $sql = "SELECT * FROM doctors INNER JOIN medicalspecialities ON doctors.medicalspecialities_id_medicalspecialities = medicalspecialities.medicalspecialities_id";
        $query = $pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }
}
