<?php
class Meets extends DataBase
{
    private int $_rendezvous_id;
    private $_rendezvous_date;
    private $_redezvous_hour;
    private $_redezvous_description;
    private $_paients_id_patients;
    private $_doctors_id_doctors;

    /**
     * Get the value of _rendezvous_id
     */
    public function get_rendezvous_id()
    {
        return $this->_rendezvous_id;
    }
    /**
     * Set the value of _rendezvous_id
     *
     * @return  self
     */
    public function set_rendezvous_id($_rendezvous_id)
    {
        $this->_rendezvous_id = $_rendezvous_id;

        return $this;
    }
    /**
     * Get the value of _rendezvous_date
     */
    public function get_rendezvous_date()
    {
        return $this->_rendezvous_date;
    }
    /**
     * Set the value of _rendezvous_date
     *
     * @return  self
     */
    public function set_rendezvous_date($_rendezvous_date)
    {
        $this->_rendezvous_date = $_rendezvous_date;

        return $this;
    }
    /**
     * Get the value of _redezvous_hour
     */
    public function get_redezvous_hour()
    {
        return $this->_redezvous_hour;
    }
    /**
     * Set the value of _redezvous_hour
     *
     * @return  self
     */
    public function set_redezvous_hour($_redezvous_hour)
    {
        $this->_redezvous_hour = $_redezvous_hour;

        return $this;
    }
    /**
     * Get the value of _redezvous_description
     */
    public function get_redezvous_description()
    {
        return $this->_redezvous_description;
    }
    /**
     * Set the value of _redezvous_description
     *
     * @return  self
     */
    public function set_redezvous_description($_redezvous_description)
    {
        $this->_redezvous_description = $_redezvous_description;

        return $this;
    }
    /**
     * Get the value of _paients_id_patients
     */
    public function get_paients_id_patients()
    {
        return $this->_paients_id_patients;
    }
    /**
     * Set the value of _paients_id_patients
     *
     * @return  self
     */
    public function set_paients_id_patients($_paients_id_patients)
    {
        $this->_paients_id_patients = $_paients_id_patients;

        return $this;
    }
    /**
     * Get the value of _doctors_id_doctors
     */
    public function get_doctors_id_doctors()
    {
        return $this->_doctors_id_doctors;
    }
    /**
     * Set the value of _doctors_id_doctors
     *
     * @return  self
     */
    public function set_doctors_id_doctors($_doctors_id_doctors)
    {
        $this->_doctors_id_doctors = $_doctors_id_doctors;

        return $this;
    }
    public function addMeets(int $doctors, int $patients, $date, $hour,string $description)
    {
        $pdo = parent::connectDb();
        $sql = "INSERT INTO rendezvous(rendezvous_date, rendezvous_hour, rendezvous_description, patients_id_patients, doctors_id_doctors) VALUES (:date,:hour,:description,:patients,:doctors)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':date', $date, PDO::PARAM_STR);
        $query->bindValue(':hour', $hour, PDO::PARAM_STR);
        $query->bindValue(':description', $description, PDO::PARAM_STR);
        $query->bindValue(':patients', $patients, PDO::PARAM_STR);
        $query->bindValue(':doctors', $doctors, PDO::PARAM_STR);
        $query->execute();
    }

    public function getAllMeets()
    {
        $pdo = parent::connectDb();
        $sql = "SELECT * FROM rendezvous 
        INNER JOIN doctors ON rendezvous.doctors_id_doctors = doctors.doctors_id
        INNER JOIN patients ON rendezvous.patients_id_patients = patients.patients_id";
        $query = $pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }
}
