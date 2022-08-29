<?php

class medicalSpecialities extends DataBase {
    private $_medicalSpecialitiesId;
    private $_medicalSpecialitiesName;
    

    /**
     * Get the value of _medicalSpecialitiesId
     */ 
    public function get_medicalSpecialitiesId()
    {
        return $this->_medicalSpecialitiesId;
    }

    /**
     * Set the value of _medicalSpecialitiesId
     *
     * @return  self
     */ 
    public function set_medicalSpecialitiesId($_medicalSpecialitiesId)
    {
        $this->_medicalSpecialitiesId = $_medicalSpecialitiesId;

        return $this;
    }

    /**
     * Get the value of _medicalSpecialitiesName
     */ 
    public function get_medicalSpecialitiesName()
    {
        return $this->_medicalSpecialitiesName;
    }

    /**
     * Set the value of _medicalSpecialitiesName
     *
     * @return  self
     */ 
    public function set_medicalSpecialitiesName($_medicalSpecialitiesName)
    {
        $this->_medicalSpecialitiesName = $_medicalSpecialitiesName;

        return $this;
    }

    public function getAllMedicalSpecialities()
    {
        $pdo = parent::connectDb();
        $sql = "SELECT * FROM `medicalspecialities`";
        $query = $pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }
}